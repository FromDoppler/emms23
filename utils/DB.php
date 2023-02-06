<?php
class DB
{

    protected $connection;
    public $query;
    protected $show_errors = TRUE;
    protected $query_closed = TRUE;
    public $query_count = 0;

    public function __construct($dbhost, $dbuser, $dbpass, $dbname, $charset = 'utf8')
    {
        $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($this->connection->connect_error) {
            echo "dbhost $dbhost";
            $this->error('Failed to connect to MySQL - ' . $this->connection->connect_error);
        }
        $this->connection->set_charset($charset);
    }

    public function query($query)
    {
        if (!$this->query_closed) {
            $this->query->close();
        }
        if ($this->query = $this->connection->prepare($query)) {
            if (func_num_args() > 1) {
                $x = func_get_args();
                $args = array_slice($x, 1);
                $types = '';
                $args_ref = array();
                foreach ($args as $k => &$arg) {
                    if (is_array($args[$k])) {
                        foreach ($args[$k] as $j => &$a) {
                            $types .= $this->_gettype($args[$k][$j]);
                            $args_ref[] = &$a;
                        }
                    } else {
                        $types .= $this->_gettype($args[$k]);
                        $args_ref[] = &$arg;
                    }
                }
                array_unshift($args_ref, $types);
                call_user_func_array(array($this->query, 'bind_param'), $args_ref);
            }
            $this->query->execute();
            if ($this->query->errno) {
                $this->error('Unable to process MySQL query (check your params) - ' . $this->query->error);
            }
            $this->query_closed = FALSE;
            $this->query_count++;
        } else {
            $this->error('Unable to prepare MySQL statement (check your syntax) - ' . $this->connection->error);
        }
        return $this;
    }

    public function fetchAll($callback = null)
    {
        $params = array();
        $row = array();
        $meta = $this->query->result_metadata();
        while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
        }
        call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            $r = array();
            foreach ($row as $key => $val) {
                $r[$key] = $val;
            }
            if ($callback != null && is_callable($callback)) {
                $value = call_user_func($callback, $r);
                if ($value == 'break') break;
            } else {
                $result[] = $r;
            }
        }
        $this->query->close();
        $this->query_closed = TRUE;
        return $result;
    }

    public function fetchArray()
    {
        $params = array();
        $row = array();
        $meta = $this->query->result_metadata();
        while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
        }
        call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            foreach ($row as $key => $val) {
                $result[$key] = $val;
            }
        }
        $this->query->close();
        $this->query_closed = TRUE;
        return $result;
    }

    public function close()
    {
        return $this->connection->close();
    }

    public function numRows()
    {
        $this->query->store_result();
        return $this->query->num_rows;
    }

    public function affectedRows()
    {
        return $this->query->affected_rows;
    }

    public function lastInsertID()
    {
        return $this->connection->insert_id;
    }

    public function error($error)
    {
        if ($this->show_errors) {
            throw new Exception('DB: Error ' . $error);
        }
    }

    private function _gettype($var)
    {
        if (is_string($var)) return 's';
        if (is_float($var)) return 'd';
        if (is_int($var)) return 'i';
        return 'b';
    }

    public function insertSubscriptionDoppler($subscription)
    {

        $fields = "(email, list, form_id, register, firstname, lastname, country, phone, industry , company, ";
        $fields .= "ip, country_ip, privacy, promotions, source_utm, medium_utm, campaign_utm, content_utm, term_utm)";
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $values = array(
            $subscription['email'],
            $subscription['list'],
            $subscription['form_id'],
            date("Y-m-d h:i:s A"),
            $subscription['firstname'],
            $subscription['lastname'],
            $subscription['country'],
            $subscription['phone'],
            $subscription['industry'],
            $subscription['company'],
            $subscription['ip'],
            $subscription['country_ip'],
            intval($subscription['privacy']),
            intval($subscription['promotions']),
            $subscription['source_utm'],
            $subscription['medium_utm'],
            $subscription['campaign_utm'],
            $subscription['content_utm'],
            $subscription['term_utm']
        );
        $this->query("INSERT INTO subscriptions_doppler $fields VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", $values);
    }

    public function getSubscriptionsDoppler()
    {
        $sql = $this->query("SELECT * FROM subscriptions_doppler order by id DESC LIMIT 100");
        $result = $sql->fetchAll();
        return $result;
    }

    public function saveRegistered($subscription)
    {
        $registered = $this->query("SELECT id FROM registered WHERE email='" . $subscription['email'] . "'");
        if ($registered->fetchArray()) {
            //update
            $fields = "firstname ='" . $subscription['firstname'] . "', lastname ='" . $subscription['lastname'] . "', register ='" . $subscription['register'] . "', phase ='" . $subscription['form_id'] . "', ";
            $fields .= "country ='" . $subscription['country'] . "', phone ='" . $subscription['phone'] . "', company ='" . $subscription['company'] . "', industry ='" . $subscription['industry'] . "', ";
            $fields .= "source_utm ='" . $subscription['source_utm'] . "', medium_utm ='" . $subscription['medium_utm'] . "', campaign_utm ='" . $subscription['campaign_utm'] . "', ";
            $fields .= "content_utm ='" . $subscription['content_utm'] . "', term_utm ='" . $subscription['term_utm'] . "' ";
            $update = $this->query("UPDATE registered SET $fields WHERE email='" . $subscription['email'] . "'");
        } else {
            //insert
            $fields = "(email, phase, register, firstname, lastname, country, phone, industry , company, ";
            $fields .= "source_utm, medium_utm, campaign_utm, content_utm, term_utm)";

            $values = array(
                $subscription['email'],
                $subscription['form_id'],
                $subscription['register'],
                $subscription['firstname'],
                $subscription['lastname'],
                $subscription['country'],
                $subscription['phone'],
                $subscription['industry'],
                $subscription['company'],
                $subscription['source_utm'],
                $subscription['medium_utm'],
                $subscription['campaign_utm'],
                $subscription['content_utm'],
                $subscription['term_utm']
            );
            $this->query("INSERT INTO registered $fields VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", $values);
        }
    }

    public function google_oauth_is_table_empty()
    {
        $result = $this->query("SELECT id FROM google_oauth WHERE provider = 'google'");
        if ($result->numRows()) {
            return false;
        }
        return true;
    }

    public function google_oauth_get_access_token()
    {
        $sql = $this->query("SELECT provider_value FROM google_oauth WHERE provider = 'google'");
        $result = $sql->fetchArray();
        return json_decode($result['provider_value']);
    }

    public function google_oauth_get_refersh_token()
    {
        $result = $this->google_oauth_get_access_token();
        return $result->refresh_token;
    }

    public function google_oauth_update_access_token($token)
    {
        if ($this->google_oauth_is_table_empty()) {
            $this->query("INSERT INTO google_oauth(provider, provider_value) VALUES('google', '$token')");
        } else {
            $this->query("UPDATE google_oauth SET provider_value = '$token' WHERE provider = 'google'");
        }
    }

    /********DATA ABMS*************/

    public function getSpeakersByDay($day)
    {
        $sql = $this->query("SELECT * FROM speakers WHERE day = " . $day . " order by orden");
        $result = $sql->fetchAll();
        return $result;
    }

    public function getAliadosPro($orden)
    {
        $sql = $this->query("SELECT * FROM aliados_pro order by " . $orden);
        $result = $sql->fetchAll();
        return $result;
    }

    public function getAliadosStarter($orden)
    {
        $sql = $this->query("SELECT * FROM aliados_starter order by " . $orden);
        $result = $sql->fetchAll();
        return $result;
    }

    public function getAliadosMedia($orden)
    {
        $sql = $this->query("SELECT * FROM aliados_media_partner order by " . $orden);
        $result = $sql->fetchAll();
        return $result;
    }

    public function getAliadoProBySlug($slug)
    {
        $sql = $this->query("SELECT * FROM aliados_pro where slug='" . $slug . "'");
        $result = $sql->fetchAll();
        return $result;
    }
    public function getAliadoStarterBySlug($slug)
    {
        $sql = $this->query("SELECT * FROM aliados_starter where slug='" . $slug . "'");
        $result = $sql->fetchAll();
        return $result;
    }

    public function getSpeakerBySlug($slug)
    {
        $sql = $this->query("SELECT * FROM speakers where slug='" . $slug . "'");
        $result = $sql->fetchAll();
        return $result;
    }

    public function updateCurrentPhase($phase)
    {
        $phases = array("pre" => 0, "during" => 0, "post" => 0);
        $phases[$phase] = 1;

        $this->query("UPDATE settings_phase SET pre =" . $phases['pre'] . ", during =" . $phases['during'] . ", post=" . $phases['post'] . " where 1=1");
    }
    public function getCurrentPhase()
    {

        $sql = $this->query("SELECT * from settings_phase where 1=1");
        $result = $sql->fetchAll();
        return $result;
    }

    public function getSimulator()
    {
        $sql = $this->query("SELECT * from settings_simulator where 1=1");
        $result = $sql->fetchAll();
        return $result;
    }

    function getSettingsTransmission()
    {
        $sql = $this->query("SELECT * from settings_transmission where 1=1");
        $result = $sql->fetchAll();
        return $result;
    }

    public function getDuringDay()
    {
        $sql = $this->query("SELECT * from settings_during_days where 1=1");
        $result = $sql->fetchAll();
        return $result;
    }
    public function getSimulatorDuringDay()
    {

        $sql = $this->query("SELECT * from settings_simulator_during_days where 1=1");
        $result = $sql->fetchAll();
        return $result;
    }

    public function updateSimulator($enabled, $phase)
    {
        $phases = array("pre" => 0, "during" => 0, "post" => 0);
        $phases[$phase] = 1;

        $this->query("UPDATE settings_simulator SET enabled =" . $enabled . ", pre =" . $phases['pre'] . ", during =" . $phases['during'] . ", post=" . $phases['post'] . " where 1=1");
    }

    public function updateDuringDays($day, $live)
    {
        $this->query("UPDATE settings_during_days SET day =" . $day . ", live =" . $live . " where 1=1");
    }

    public function updateSimulatorDuringDays($day, $live)
    {
        $this->query("UPDATE settings_simulator_during_days SET day =" . $day . ", live =" . $live . " where 1=1");
    }

    public function updateSettingsTransmission($problems, $youtube)
    {
        $this->query("UPDATE settings_transmission SET problems =" . $problems . ", youtube =" . $youtube . " where 1=1");
    }

    /******* log errors */
    public function insertLogErrors($date, $functionName, $description, $data)
    {
        $sql = "INSERT INTO log_errors (date, function_name, description, data) values ('" . $date . "', '" . $functionName . "', '" . $description . "', '" . $data . "')";

        $this->query($sql);
    }

    public function getLogErrors()
    {
        $sql = $this->query("SELECT * FROM log_errors order by id DESC LIMIT 100");
        $result = $sql->fetchAll();
        return $result;
    }
}

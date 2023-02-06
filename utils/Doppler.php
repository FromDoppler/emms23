<?php
class Doppler {

    private static $apiKey;
    private static $account;

    private const urlBase = 'https://restapi.fromdoppler.com/accounts/';

    private static function executeCurl($url, $data, $headers, $method) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        return curl_exec($ch);
    }

	public static function init($account, $apiKey) {
	    self::$apiKey = $apiKey;
		self::$account = $account;
	}

    private static function getCustomFields($data) {
        $customFields = array();

        if(isset($data['firstname']) && (trim($data['firstname']) != '')) {
            array_push($customFields, array('name' => 'FIRSTNAME', 'Value' => $data['firstname']));
        }
        if(isset($data['lastname']) && (trim($data['lastname']) != '')) {
            array_push($customFields, array('name' => 'LASTNAME', 'Value' => $data['lastname']));
        }
        if(isset($data['privacy']) && (trim($data['privacy']) != '')) {
            array_push($customFields, array('name' => 'AceptoPoliticaPrivacidad', 'Value' => boolval($data['privacy'])));
        }
        if(isset($data['promotions']) && (trim($data['promotions']) != '')) {
            array_push($customFields, array('name' => 'AceptoPromocionesDopplerAliados', 'Value' => boolval($data['promotions'])));
        }
        if(isset($data['phone']) && (trim($data['phone']) != '')) {
            array_push($customFields, array('name' => 'tel', 'Value' => $data['phone']));
        }
        if(isset($data['country']) && (trim($data['country']) != '')) {
            array_push($customFields, array('name' => 'pais', 'Value' => $data['country']));
        }
        if(isset($data['industry']) && (trim($data['industry']) != '')) {
            array_push($customFields, array('name' => 'Industria', 'Value' => $data['industry']));
        }
        if(isset($data['company']) && (trim($data['company']) != '')) {
            array_push($customFields, array('name' => 'Company', 'Value' => $data['company']));
        }
        if(isset($data['ip']) && (trim($data['ip']) != '')) {
            array_push($customFields, array('name' => 'IP', 'Value' => $data['ip']));
        }
        if(isset($data['country_ip']) && (trim($data['country_ip']) != '')) {
            array_push($customFields, array('name' => 'PaisIP', 'Value' => $data['country_ip']));
        }
        if(isset($data['source_utm']) && (trim($data['source_utm']) != '')) {
            array_push($customFields, array('name' => 'utmsource', 'Value' => $data['source_utm']));
        }
        if(isset($data['source_utm']) && (trim($data['source_utm']) != '')) {
            array_push($customFields, array('name' => 'utmmedium', 'Value' => $data['medium_utm']));
        }
        if(isset($data['campaign_utm']) && (trim($data['campaign_utm']) != '')) {
            array_push($customFields, array('name' => 'utmcampaign', 'Value' => $data['campaign_utm']));
        }
        if(isset($data['content_utm']) && (trim($data['content_utm']) != '')) {
            array_push($customFields, array('name' => 'utmcontent', 'Value' => $data['content_utm']));
        }
        if(isset($data['term_utm']) && (trim($data['term_utm']) != '')) {
            array_push($customFields, array('name' => 'utmterm', 'Value' => $data['term_utm']));
        }
        if(isset($data['join_url']) && (trim($data['join_url']) != '')) {
            array_push($customFields, array('name' => 'academyGTW', 'value' => $data['join_url']));
        }
        if(isset($data['origin']) && (trim($data['origin']) != '')) {
            array_push($customFields, array('name' => 'DOrigin', 'value' => $data['origin']));
        }
        return $customFields;

    }

    public static function subscriber($data) {
        $endPointSubscriber = self::urlBase.urlencode(self::$account).'/lists/'.$data['list'].'/subscribers?api_key='.self::$apiKey;
        $customFields = self::getCustomFields($data);
        $dataSubscriber = array(
		    "email" => $data['email'],
		    "fields" => $customFields
	    );
        $dataJson = json_encode($dataSubscriber);
        $headers = array(
            'Content-Type: application/json',
            'Content: '.strlen($dataJson)
        );
        $response = json_decode(self::executeCurl($endPointSubscriber, $dataJson, $headers, 'POST'));
        if(isset($response->errors)) :
            foreach($response->errors as $error) :
                throw new Exception('Doppler: Error '.$error->key. '->'.$error->detail);
            endforeach;
        endif;
        if(isset($response->errorCode)) :
            throw new Exception('Doppler: Error ' . $response->detail . ' | errorCode= ' . $response->errorCode);
        endif;
    }
}

?>

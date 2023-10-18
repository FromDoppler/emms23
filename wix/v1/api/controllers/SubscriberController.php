<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php';
require_once 'models/SubscriberWix.php';
require_once 'models/SubscriberDopplerList.php';
require_once 'models/SubscriberDatabase.php';
require_once 'models/WixContactsDatabase.php';
require_once 'utils/getCurrentPhase.php';
require_once 'utils/sendEmail.php';
require_once 'utils/toHex.php';
require_once 'utils/Logger.php';
require_once 'utils/SpreadSheetGoogle.php';
require_once 'utils/WixApiClient.php';

class SubscriberController
{
    public function handleRequest()
    {
        try {
            // Verificar el metodo de solicitud
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405); // Metodo no permitido
                throw new Exception('Metodo no permitido');
            }
            $jsonData = $this->getJsonDataFromRequest();

            // Crear una instancia de la clase SubscriberWix con los datos JSON
            $subscriberWix = new SubscriberWix($jsonData);

            // Procesar y guardar suscripciones
            $resultados = $this->processAndSaveSubscriptions($subscriberWix);
            $response = ['message' => 'Subscription saved successfully', 'data'=> $resultados];
            return $response;
        } catch (Exception $e) {
            http_response_code(500); // Error interno del servidor
            throw new Exception($e->getMessage());
        }
    }

    private function getJsonDataFromRequest()
    {
        $entityBody = file_get_contents('php://input');
        $jsonData = mb_convert_encoding($entityBody, 'UTF-8');
        $jsonData = json_decode($jsonData, true);
        // Verificar si el JSON es valido
        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400); // Solicitud incorrecta
            throw new Exception('JSON incorrecto'. $jsonData);
        }else{
            $logger = new Logger();
            $logger->registrarLog("success_raw", "objRaw", $jsonData);
        }
        return $jsonData;
    }

    private function CreateWixContact($padre, $addDopplerList, $invitado = null){
        if (!$invitado) {
            $wixUserData = $padre;
            $wixUserData['create_wix_member'] = 'success';
            $wixUserData['add_doppler_list'] = $addDopplerList;
            $isWixMemberSuccess = true;
        }else{
            $isWixMemberSuccess = (( isset($invitado['Order']) && isset($invitado['Order']['order']) )) || false;
                $nombre = explode("@",  $invitado['email']);
                $nombre = $nombre[0];
                $wixUserData = [
                    'contact_id' => $invitado['contactId'],
                    'contact_name' => "",
                    'contact_email' => $invitado['email'],
                    'paidplan_title' => "Plan Empresa - Invitado",
                    'paidplan_startdate' => ($isWixMemberSuccess)?$invitado['Order']['order']['startDate']:null,
                    'paidplan_subscriptionid' => ($isWixMemberSuccess)?$invitado['Order']['order']['subscriptionId']:null,
                    'paidplan_id' => ($isWixMemberSuccess)?$invitado['Order']['order']['planId']:null,
                    'paidplan_orderid' => ($isWixMemberSuccess)?$invitado['Order']['order']['id']:null,
                    'paidplan_price' => '0',
                    'paidplan_paymentmethod' => 'invited',
                    'invited_by' => $padre['contact_email'],
                    'create_wix_member' => ($isWixMemberSuccess)?'success':'fail',
                    'add_doppler_list' => $addDopplerList
                ];
            }
            //creo la conexion a la db
            $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            // Procesar las suscripciones
            $wixContactsModel = new WixContactsDatabase($db);

            $wixContactsModel->insertContact($wixUserData);
            return $wixUserData;
    }

    private function proccessPackEmpresa($wixApi, $allUsersData, $compradorData) {
        foreach ($allUsersData as $index => $email) {
            //Guardar el contacto wix en la base de datos
            // Asignar acceso a plan invitado
            $dopplerHandler = new SubscriberDopplerList();
            if ($index!=="user1") {
                $wixUserData = $wixApi->setInvitadoPlanMember($email);
                if ($wixUserData) {
                    $wixUserData['email'] = $email;
                    //cargo el user en la lista free de DT
                    $user = $this->CreateUserObj($email, $compradorData, true);
                    $addDopplerList = $dopplerHandler->saveSubscription($user);
                    //cargo el user en la lista paga de DT WIX
                    $user = $this->CreateUserObj($email, $compradorData, true, LIST_LANDING_DIGITALT_WIX);
                    $addDopplerList = $dopplerHandler->saveSubscription($user);
                    $wixContactObject = $this->CreateWixContact($compradorData, $addDopplerList, $wixUserData);
                }
            }else {
                //cargo el user en la lista free de DT
                $user = $this->CreateUserObj($email, $compradorData, false);
                $addDopplerList = $dopplerHandler->saveSubscription($user);
                //cargo el user en la lista paga de DT WIX
                $user = $this->CreateUserObj($email, $compradorData, false, LIST_LANDING_DIGITALT_WIX);
                $addDopplerList = $dopplerHandler->saveSubscription($user);
                $wixContactObject = $this->CreateWixContact($compradorData, $addDopplerList);
            }

            // Guardar la suscripcion en la base de datos
            $subscriberDatabase = new SubscriberDatabase($user);
            $subscriberDatabase->saveSubscriptionToDatabase();

            // Guardar la suscripcion en el SpreadSheet
            saveSubscriptionSpreadSheet($user);

            //Enviar email de nuevo usuario
            if (isset($wixContactObject['create_wix_member']) && $wixContactObject['create_wix_member'] === "success" ) {
                $user['paidplan_title'] = $wixContactObject['paidplan_title'];
                $user['paidplan_startdate'] = $wixContactObject['paidplan_startdate'];
                $user['paidplan_price'] = $wixContactObject['paidplan_price'];
                $user['paidplan_paymentmethod'] = $wixContactObject['paidplan_paymentmethod'];
                sendEmail($user, $user['subject']);
                $wixContactObject = null;
            }
        }
    }

    private function processAndSaveSubscriptions(SubscriberWix $subscriberWix)
    {
        try {
            $api_key = API_KEY_WIX;
            $account_id = WIX_ACCOUNT_ID;
            $site_id = WIX_SITE_ID;
            $wixApi = new WixApiClient($api_key, $account_id, $site_id);
            // Obtener datos de la empresa y de los individuales
            $allUsersData = $subscriberWix->getAllUsers();
            $compradorData = $subscriberWix->getCompradorData();

            if ( $compradorData['paidplan_id'] === WIX_PLAN_PACK_EMPRESA_BASIC_ID ||
            $compradorData['paidplan_id'] === WIX_PLAN_PACK_EMPRESA_FULL_ID ||
            $compradorData['paidplan_id'] === WIX_PLAN_INDIVIDUAL_ID ) {
                $this->proccessPackEmpresa($wixApi, $allUsersData, $compradorData);
                return $allUsersData;
            }
        } catch (Exception $e) {
            http_response_code(500); // Error interno del servidor
            throw new Exception($e->getMessage());
        }
    }

    private function getTiketType($paidplan_id, $hasPadre) {
        $planMappings = [
            WIX_PLAN_PACK_EMPRESA_FULL_ID => "Plan Empresa Full",
            WIX_PLAN_PACK_EMPRESA_BASIC_ID => "Plan Empresa Basic",
            WIX_PLAN_INDIVIDUAL_ID => "Plan VIP",
        ];

        if ($hasPadre && in_array($paidplan_id, [WIX_PLAN_PACK_EMPRESA_FULL_ID, WIX_PLAN_PACK_EMPRESA_BASIC_ID])) {
            return "Plan Invitado";
        }

        return $planMappings[$paidplan_id] ?? null;
    }

    private function CreateUserObj($email, $compradorData, $hasPadre, $listId = LIST_LANDING_DIGITALT)
    {
        $emailPadre = $compradorData['contact_email'];
        $tiketType = $this->getTiketType($compradorData['paidplan_id'], $hasPadre);

        $encode_email = toHex(json_encode([
            'userEmail' => $email,
            'userEvents' => ['digital-trends']
        ]));
        $nombre = explode("@", $email);
        $nombre = $nombre[0];
        return [
            'register' => date("Y-m-d h:i:s A"),
            'firstname' => "",
            'email' => $email,
            'company' =>  '',
            'jobPosition' =>  '',
            'phone' =>  '',
            'ecommerce' => 0,
            'digital_trends' => 1,
            'encode_email' => $encode_email,
            'privacy' => true,
            'promotions' => false,
            'ip' => '',
            'country_ip' => '',
            'source_utm' => "WIX",
            'medium_utm' => "",
            'campaign_utm' => $tiketType,
            'content_utm' => ($hasPadre)? "Invitado por $emailPadre" : "",
            'term_utm' => "",
            'origin' => "",
            'type' => "digital-trends",
            'tiketType' => $tiketType,
            'form_id' => "pre",
            'list' => $listId,
            'subject' => (($hasPadre)? "Fuiste Invitado! - $tiketType " : "Compraste! - $tiketType")
        ];
    }
}

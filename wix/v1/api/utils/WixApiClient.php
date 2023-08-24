<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
class WixApiClient {
  private $api_key;
  private $account_id;
  private $site_id;

  public function __construct($api_key, $account_id, $site_id) {
      $this->api_key = $api_key;
      $this->account_id = $account_id;
      $this->site_id = $site_id;
  }

  public function listOrders() {
      $endpoint = "https://www.wixapis.com/pricing-plans/v2/orders";
      return $this->makeApiRequest($endpoint);
  }

  public function queryContacts($queryData) {
      $endpoint = "https://www.wixapis.com/contacts/v4/contacts/query";
      return $this->makeApiPostRequest($endpoint, $queryData);
  }

  public function getContact($contactId) {
      $endpoint = "https://www.wixapis.com/contacts/v4/contacts/{$contactId}";
      return $this->makeApiRequest($endpoint);
  }

  public function getForm($submissionId) {
      $endpoint = "https://www.wixapis.com/_api/form-submission-service/v4/submissions/{$submissionId}";
      return $this->makeApiRequest($endpoint);
  }

  public function createContact($contactData) {
      $endpoint = "https://www.wixapis.com/contacts/v4/contacts";
      return $this->makeApiPostRequest($endpoint, $contactData);
  }

  public function getMember($memberId) {
      $endpoint = "https://www.wixapis.com/members/v1/members/{$memberId}";
      return $this->makeApiRequest($endpoint);
  }

  public function createMember($loginEmail, $contact = null, $profile = null, $privacyStatus = 'UNKNOWN') {
      $endpoint = "https://www.wixapis.com/members/v1/members";
      $data = [
          'member' => [
              'loginEmail' => $loginEmail,
              'contact' => $contact,
              'profile' => $profile,
              'privacyStatus' => $privacyStatus,
          ],
      ];
      return $this->makeApiPostRequest($endpoint, $data);
  }

  public function sendSetPasswordEmail($email) {
      $endpoint = "https://www.wixapis.com/members/v1/auth/members/send-set-password-email";
      $data = [
          "email" => $email,
          "hideIgnoreMessage" => false
      ];
      return $this->makeApiPostRequest($endpoint, $data);
  }

  public function getOfflineOrderPreview($planId, $memberId, $startDate, $couponCode) {
      $endpoint = "https://www.wixapis.com/pricing-plans/v2/checkout/orders/preview-offline";
      $data = [
          'planId' => $planId,
          'memberId' => $memberId,
          'startDate' => $startDate,
          'couponCode' => $couponCode
      ];
      return $this->makeApiPostRequest($endpoint, $data);
  }

  public function createOfflineOrder($planId, $memberId, $startDate = null, $paid = false, $couponCode = null, $submissionId = null) {
      $endpoint = "https://www.wixapis.com/pricing-plans/v2/checkout/orders/offline";
      $data = [
          'planId' => $planId,
          'memberId' => $memberId,
      ];
      if ($startDate !== null) {
          $data['startDate'] = $startDate;
      }
      if ($paid !== false) {
          $data['paid'] = $paid;
      }
      if ($couponCode !== null) {
          $data['couponCode'] = $couponCode;
      }
      if ($submissionId !== null) {
          $data['submissionId'] = $submissionId;
      }
      return $this->makeApiPostRequest($endpoint, $data);
  }

  private function makeApiRequest($endpoint) {
      $url = $endpoint;
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Authorization: Bearer $this->api_key",
          "wix-account-id: $this->account_id",
          "wix-site-id: $this->site_id"
      ));
      $response = curl_exec($ch);
      if ($response !== false) {
          return json_decode($response, true);
      } else {
          return false;
      }
      curl_close($ch);
  }

  private function makeApiPostRequest($endpoint, $data = null) {
      $url = $endpoint;
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POST, 1);
      if ($data !== null) {
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              "Authorization: Bearer $this->api_key",
              "wix-account-id: $this->account_id",
              "wix-site-id: $this->site_id",
              "Content-Type: application/json"
          ));
      } else {
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              "Authorization: Bearer $this->api_key",
              "wix-account-id: $this->account_id",
              "wix-site-id: $this->site_id"
          ));
      }
      $response = curl_exec($ch);
      if ($response !== false) {
          return json_decode($response, true);
      } else {
          return false;
      }
      curl_close($ch);
  }
}

//Los siguientes son ejemplos de uso de la clase.
//Al correr http://localhost/wix/v1/api/utils/WixApiClient.php
//podra ver todas las responses en el browser de los siguientes ejemplos.
//TODO quitar ejemplos.
// Uso de la clase WixApiClient
$api_key = API_KEY_WIX;
$account_id = '8c4681ba-2ec0-4f04-ae25-30a239c65f8b';
$site_id = '11c5bca2-2035-4967-8b4c-c06a8ab39761';

$wixApi = new WixApiClient($api_key, $account_id, $site_id);

$contactId = '58b2df41-6228-4eea-bc6a-62e97a4ea91f';
$responseContact = $wixApi->getContact($contactId);

$submissionId = 'ba0bd972-f1df-4579-a813-0a97ff03053d';
$responseForm = $wixApi->getForm($submissionId);

$memberId = '0439ca9c-8e3c-4e32-b79b-04d78346678a';
$responseMember = $wixApi->getMember($memberId);

if ($responseContact !== false) {
  echo "<pre> Solicitud de contacto";
  echo json_encode($responseContact, JSON_PRETTY_PRINT);
  echo "</pre>";
} else {
  echo "Error en la solicitud de contacto";
}

if ($responseMember !== false) {
  echo "<pre> Solicitud de miembro";
  echo json_encode($responseMember, JSON_PRETTY_PRINT);
  echo "</pre>";
} else {
  echo "Error en la solicitud de miembro";
}

$planId = '7f563e46-e606-4fc9-a468-5c9791f31c0b';
$memberId = '0439ca9c-8e3c-4e32-b79b-04d78346678a';
$startDate = null;
$couponCode = null;

$responsePreview = $wixApi->getOfflineOrderPreview($planId, $memberId, $startDate, $couponCode);

if ($responsePreview !== false) {
  echo "<pre> Vista previa del pedido offline";
  echo json_encode($responsePreview, JSON_PRETTY_PRINT);
  echo "</pre>";
} else {
  echo "Error en la solicitud de vista previa de pedido offline";
}


$responseListOrders = $wixApi->listOrders();

if ($responseListOrders !== false) {
    echo "<pre> Lista de ordenes";
    echo json_encode($responseListOrders, JSON_PRETTY_PRINT);
    echo "</pre>";
} else {
    echo "Error al obtener la lista de ordenes";
}


$queryData = null;

$responseQueryContacts = $wixApi->queryContacts($queryData);

if ($responseQueryContacts !== false) {
  echo "<pre> Respuesta de consulta de contactos";
  echo json_encode($responseQueryContacts, JSON_PRETTY_PRINT);
  echo "</pre>";
} else {
  echo "Error en la consulta de contactos";
}

if ($responseForm !== false) {
  echo "<pre> Datos de Formulario";
  echo json_encode($responseForm, JSON_PRETTY_PRINT);
  echo "</pre>";
} else {
  echo "Error en datos de formulario";
}


$newContactData = [
  "info" => [
      "name" => [
          "first" => "mcappato+2030"
      ],
      "emails" => [
          "items" => [
              [
                  "email" => "mcappato+2030@makingsense.com"
              ]
          ]
      ]
  ]
];

$responseCreateContact = $wixApi->createContact($newContactData);

if ($responseCreateContact !== false) {
  echo "<pre> Contact Created";
  echo json_encode($responseCreateContact, JSON_PRETTY_PRINT);
  echo "</pre>";
} else {
  echo "Error creating contact";
}

$loginEmail = 'mcappato+2030@makingsense.com';

$responseCreateMember = $wixApi->createMember($loginEmail);

if ($responseCreateMember !== false) {
    echo "<pre> Member Created";
    echo json_encode($responseCreateMember, JSON_PRETTY_PRINT);
    echo "</pre>";
} else {
    echo "Error creating member";
}



$planId = '9a3cbab2-2292-464a-a63e-afda6de6ef71';
//$memberId = $responseCreateContact['contact']['id'];
$memberId = '58b2df41-6228-4eea-bc6a-62e97a4ea91f';

//$startDate = '2023-08-23T12:00:00Z'; // Fecha de inicio válida en formato ISO8601
//$paid = true;

$responseCreateOrder = $wixApi->createOfflineOrder($planId, $memberId);

if ($responseCreateOrder !== false) {
    echo "<pre> Offline Order Created";
    echo json_encode($responseCreateOrder, JSON_PRETTY_PRINT);
    echo "</pre>";
} else {
    echo "Error creating offline order";
}


$emailToSendPassword = "mcappato+2030@makingsense.com";

$responseSendPasswordEmail = $wixApi->sendSetPasswordEmail($emailToSendPassword);

if ($responseSendPasswordEmail !== false) {
    echo "<pre> Password Set Email Sent";
    echo json_encode($responseSendPasswordEmail, JSON_PRETTY_PRINT);
    echo "</pre>";
} else {
    echo "Error sending password set email";
}

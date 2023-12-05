<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');
class Relay
{
    private static $apiKey;
    private static $account;

    private const urlBase = 'https://api.dopplerrelay.com/accounts/';
    private const fromName = 'EMMS 2023';
    private const fromEmail = 'info@goemms.com';
    private const TEMPLATE_DIR = __DIR__ . '/relay-templates/';

    private static function templateEmail($user)
    {
        $type = $user['type'];
        $phase = processPhaseToShow($type)["phaseToShow"];

        $templateMappings = [
            'Plan Empresa Full' => 'getWixEmpresaTemplate',
            'Plan Empresa Basic' => 'getWixEmpresaTemplate',
            'Plan VIP' => 'getWixVipTemplate',
            'Plan Invitado' => 'getWixInvitadoTemplate',
            'ecommerce' => [
                'pre' => 'getEcommerceEmailTemplate',
                'during' => 'getEcommerceEmailTemplateDuring',
                'post' => 'getEcommerceEmailTemplatePost',
            ],
            'digital-trends' => [
                'pre' => 'getDigitalTEmailTemplatePRE',
                'during' => 'getDigitalTEmailTemplateDuring',
                'post' => 'getDigitalTEmailTemplatePost',
            ],
        ];

        if (isset($user['tiketType']) && isset($templateMappings[$user['tiketType']])) {
            $templateFunction = $templateMappings[$user['tiketType']];
            $html = self::$templateFunction($user['encode_email'], $user);
        } elseif (isset($templateMappings[$type][$phase])) {
            $templateFunction = $templateMappings[$type][$phase];
            $html = self::$templateFunction($user['encode_email']);
        } else {
            die('Error: Template not found.');
        }

        return $html;
    }
    private static function executeCurl($url, $data, $headers, $method)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        return curl_exec($ch);
    }

    public static function init($account, $apiKey)
    {
        self::$apiKey = $apiKey;
        self::$account = $account;
    }

    public static function sendEmailRegister($user, $subject)
    {
        $html =  self::templateEmail($user);
        $data = array(
            'from_name' => self::fromName,
            'from_email' => self::fromEmail,
            'reply_to' => array("email" => self::fromEmail),
            'recipients' => array(array('type' => 'to', 'email' => $user['email'])),
            'subject' => $subject,
            'html' => $html
        );
        $dataJson = json_encode($data);
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: token ' . self::$apiKey;
        $headers[] = 'Content: ' . strlen($dataJson);
        $endPointSendEmail = self::urlBase . self::$account . "/messages";
        $response = json_decode(self::executeCurl($endPointSendEmail, $dataJson, $headers, 'POST'));

        if (isset($response->errorCode)) :
            throw new Exception(json_encode($response->errors));
        endif;
    }

    private static function getTemplate($templateType, $templateName, $encodeEmail, $userData = [])
    {
        $templatePath = self::TEMPLATE_DIR . $templateType . '/' . $templateName;

        if (file_exists($templatePath)) {
            $html = file_get_contents($templatePath);
            // Se hace un array merge dado que userData es opcional, pero en
            // caso de que venga lo mergamos para iterar sus valores en la maqueta respectiva
            foreach (array_merge(['$encodeEmail' => $encodeEmail], $userData) as $key => $value) {
                $html = str_replace('{' . $key . '}', $value, $html);
            }

            return $html;
        } else {
            die('Error: The template file could not be found.');
        }
    }

    public static function getEcommerceEmailTemplate($encodeEmail)
    {
        $templateName = 'ecommerce-pre-template.html';
        return self::getTemplate('ecommerce', $templateName, $encodeEmail);
    }

    public static function getEcommerceEmailTemplateDuring($encodeEmail)
    {
        $templateName = 'ecommerce-during-template.html';
        return self::getTemplate('ecommerce', $templateName, $encodeEmail);
    }

    public static function getEcommerceEmailTemplatePost($encodeEmail)
    {
        $templateName = 'ecommerce-post-template.html';
        return self::getTemplate('ecommerce', $templateName, $encodeEmail);
    }

    public static function getDigitalTEmailTemplatePREEarlyBirds($encodeEmail)
    {
        $templateName = 'dt-earybirds-template.html';
        return self::getTemplate('dt', $templateName, $encodeEmail);
    }

    public static function getDigitalTEmailTemplatePRE($encodeEmail)
    {
        $templateName = 'dt-pre-template.html';
        return self::getTemplate('dt', $templateName, $encodeEmail);
    }

    public static function getDigitalTEmailTemplateDuring($encodeEmail)
    {
        $templateName = 'dt-during-template.html';
        return self::getTemplate('dt', $templateName, $encodeEmail);
    }

    public static function getDigitalTEmailTemplatePost($encodeEmail)
    {
        $templateName = 'dt-post-template.html';
        return self::getTemplate('dt', $templateName, $encodeEmail);
    }

    public static function getDigitalTEmailTemplate($encodeEmail)
    {
        $templateName = 'dt-oldtemplate.html';
        return self::getTemplate('dt', $templateName, $encodeEmail);
    }

    //TEMPLATES DE WIX
    public static function getWixEmpresaTemplate($encodeEmail, $user)
    {
        $templateName = 'wix-empresa-template.html';
        $userData = [
            '$encodeEmail' => $encodeEmail,
            'type' => $user['paidplan_title'],
            'paymentMethod' => $user['paidplan_paymentmethod'],
            'date' => $user['paidplan_startdate'],
            'amount' => $user['paidplan_price'],
        ];
        return self::getTemplate('wix', $templateName, $encodeEmail, $userData);
    }

    public static function getWixVipTemplate($encodeEmail, $user)
    {
        $templateName = 'wix-vip-template.html';
        $userData = [
            '$encodeEmail' => $encodeEmail,
            'type' => $user['paidplan_title'],
            'paymentMethod' => $user['paidplan_paymentmethod'],
            'date' => $user['paidplan_startdate'],
            'amount' => $user['paidplan_price'],
        ];
        return self::getTemplate('wix', $templateName, $encodeEmail, $userData);
    }

    public static function getWixInvitadoTemplate($encodeEmail)
    {
        $templateName = 'wix-invitado-template.html';
        return self::getTemplate('wix', $templateName, $encodeEmail);
    }
}

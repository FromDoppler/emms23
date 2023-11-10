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

    private static function templateEmail($user)
    {

        $phase = processPhaseToShow($user['type'])["phaseToShow"];
        if (isset($user['tiketType'])) {
            if ($user['tiketType'] === "Plan Empresa Full") {
                $html = self::getWixEmpresaTemplate($user['encode_email'], $user);
            } else if ($user['tiketType'] === "Plan Empresa Basic") {
                $html = self::getWixEmpresaTemplate($user['encode_email'], $user);
            } else if ($user['tiketType'] === "Plan VIP") {
                $html = self::getWixVipTemplate($user['encode_email'], $user);
            } else if ($user['tiketType'] === "Plan Invitado") {
                $html = self::getWixInvitadoTemplate($user['encode_email'], $user);
            }
        } else if ($user['type'] === 'ecommerce') {
            switch ($phase) {
                case 'pre':
                    $html = self::getEcommerceEmailTemplate($user['encode_email']);
                    break;
                case 'during':
                    $html = self::getEcommerceEmailTemplateDuring($user['encode_email']);
                    break;
                case 'post':
                    $html = self::getEcommerceEmailTemplatePost($user['encode_email']);
                    break;
            }
        } else if ($user['type'] === 'digital-trends') {
            switch ($phase) {
                case 'pre':
                    $html = self::getDigitalTEmailTemplatePRE($user['encode_email']);
                    break;
                case 'during':
                    //TODO: Cambiar funcion con la maqueta correspondiente
                    $html = self::getDigitalTEmailTemplate($user['encode_email']);
                    break;
                case 'post':
                    //TODO: Cambiar funcion con la maqueta correspondiente
                    $html = self::getDigitalTEmailTemplate($user['encode_email']);
                    break;
            }
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

    public static function getEcommerceEmailTemplate($encodeEmail)
    {

        $html = '
            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
                <html lang="es">

                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="x-apple-disable-message-reformatting">
                    <title>EMMS</title>
                    <style>
                        html,
                        body {
                            margin: 0 auto !important;
                            padding: 0 !important;
                            background-color: #ffffff;
                        }

                        * {
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                        }

                        div[style*="margin: 16px 0"] {
                            margin: 0 !important;
                        }

                        table,
                        td {
                            mso-table-lspace: 0pt !important;
                            mso-table-rspace: 0pt !important;
                            border-collapse: separate !important;
                            border-spacing: 0 !important;
                        }

                        table {
                            table-layout: auto;
                            mso-table-lspace: 0pt !important;
                            mso-table-rspace: 0pt !important;
                            border-collapse: separate !important;
                            border-spacing: 0 !important;
                            border: none !important;
                            border-color: transparent !important;
                        }

                        img {
                            -ms-interpolation-mode: bicubic;
                            border: 0;
                            height: auto;
                            line-height: 100%;
                            outline: none;
                            text-decoration: none;
                        }

                        /* Hover styles for buttons */
                        .button--td:hover,
                        .button--a:hover {
                            background: #035A33 !important;
                        }

                        .link-hover:hover {
                            color: #035A33 !important;
                        }

                        *[x-apple-data-detectors],
                        .x-gmail-data-detectors,
                        .x-gmail-data-detectors *,
                        .aBn {
                            border-bottom: 0 !important;
                            cursor: default !important;
                            color: inherit !important;
                            text-decoration: none !important;
                            font-size: inherit !important;
                            font-family: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                        }

                        th {
                            font-weight: normal;
                        }

                        .mobileOn {
                            display: none !important;
                            max-height: none !important;
                        }

                        /* MEDIA QUERIES */
                        @media all and (max-width:480px) {
                            .wrapper {
                                width: 320px !important;
                                padding: 0 !important;
                            }

                            .container {
                                width: 300px !important;
                                padding: 0 !important;
                            }

                            .margin-mb-auto{
                                margin: 0 auto;
                            }

                            .mobile {
                                width: 300px !important;
                                display: block !important;
                                padding: 0 !important;
                            }

                            .img {
                                width: 100% !important;
                                height: auto !important;
                            }

                            .mobileOff {
                                width: 0px !important;
                                display: none !important;
                            }

                            .mobileOn {
                                display: block !important;
                                max-height: none !important;
                            }

                            .mobile-pl,
                            .mobile-pl-btn,
                            u+.body .mobile-pl,
                            u+.body .mobile-pl-btn {
                                padding-left: 14px !important;
                            }

                            .mobile-pl-20,
                            .mobile-pl-20-btn,
                            u+.body .mobile-pl-20,
                            u+.body .mobile-pl-20-btn {
                                padding-left: 20px !important;
                            }

                            .mobile-pt,
                            u+.body .mobile-pt {
                                padding-top: 20px !important;
                            }

                            .mobile-pr,
                            u+.body .mobile-pr {
                                padding-right: 0px !important;
                            }

                            .mobile-margin-0,
                            u+.body .mobile-margin-0 {
                                margin: 0px !important;
                            }

                            .mobilePadding {
                                padding-left: 3% !important;
                                padding-right: 3% !important;
                                width: 100% !important;
                            }

                            u~div .wrapper {
                                width: 100vw !important;
                            }

                            .mobile-center,
                            u+.body .mobile-center {
                                text-align: center !important;
                            }

                            .button-width{
                                padding: 16px 60px !important;
                            }

                        }
                    </style>
                    <!--[if gte mso 9]>
                    <xml>
                        <o:OfficeDocumentSettings>
                        <o:AllowPNG/>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                        </o:OfficeDocumentSettings>
                    </xml>
                    <![endif]-->

                    <!--[if (gte mso 9)|(IE)]>
                    <style type="text/css">
                    table {
                    border-collapse: collapse;
                    border-spacing: 0;
                    mso-table-lspace: 0pt !important;
                    mso-table-rspace: 0pt !important; }
                    </style>
                    <![endif]-->
                </head>

                <body style="margin:0; padding:0;">
                    <span
                            class="preheader"
                            style="
                                display: none !important;
                                visibility: hidden;
                                opacity: 0;
                                color: transparent;
                                height: 0;
                                width: 0;
                            "
                            >Ya reservaste tu cupo en el evento más esperado, ¡esta vez sobre E-commerce!
                            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                    </span>
                    <center>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #310E44; border-spacing: 0px !important; border: none;">
                            <tbody><tr>
                                <td align="center" valign="top" style="background-color: #310E44; border-spacing: 0px !important;">
                                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" style="border-spacing: 0px !important; border: none;">
                                        <tbody><tr>
                                            <td align="right" valign="top" style="background-color: #310E44">
                                                <table width="620" cellpadding="0" cellspacing="0" border="0" class="container">
                                                    <tbody>
                                                        <tr>
                    <th width="250" class="mobile" align="left" valign="top">
                    <a href="#" style="cursor: default;"><img src="https://i.imgur.com/4UafpYj.png" alt="Logo de EMMS" width="242"
                                                                        style="width:100%;max-width:242px !important;padding-top: 66px;"></a>
                        </th>
                                                                <th width="350" class="mobileOff" align="right" valign="top">
                                                                    <a href="#" style="cursor: default;"><img src="https://i.imgur.com/H28UgCi.png" alt="Imagen de textura separadora" width="315" style="margin-left: 84px;width:100%;max-width:315px !important; vertical-align: top !important;margin-top: -8px;" class="mobile-pr"></a>
                                                                </th>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                            <!-- <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation"
                                style="background-color: #310E44; border-spacing: 0px !important; border: none;">
                                <tr>
                                    <td align="center" valign="top" style="background-color: #310E44">
                                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper"
                                            style="border-spacing: 0px !important; border: none;">
                                            <tr>
                                                <td align="center" valign="top" style="border: none; background-color: #310E44;">
                                                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="container"
                                                        style="border-spacing: 0px !important; border: none; border-color: transparent;">
                                                        <tr>
                                                            <td height="50" style="font-size:50px; line-height:50px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" style="border-spacing: 0px !important;" class="mobile-margin-0">
                                                                <a href="#" style="cursor: default;"><img src="https://i.imgur.com/4UafpYj.png" alt="Logo de EMMS" width="242"
                                                                        style="width:100%;max-width:242px !important;"></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table> -->

                            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation"
                                style="background-color: #310E44;">
                                <tr>
                                    <td align="center" valign="top" style="background-color:#310E44">
                                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tr>
                                                <td align="center" valign="top" style="background-color: #310E44">
                                                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                        <tr>
                                                            <td height="25" style="font-size:25px; line-height:25px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" style="font-family:  Helvetica, Arial, sans-serif;">
                                                                <h2 style="Margin: 0;font-size: 25px;line-height: 35px;color:#FFFFFF;font-weight: 700; ">
                                                                    ¡Gracias por registrarte!
                                                                </h2>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="21" style="font-size:21px; line-height:21px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" style="font-family:  Helvetica, Arial, sans-serif;">
                                                                <p
                                                                    style="Margin: 0;font-size: 15px;line-height: 21px;color:#FFFFFF;font-weight: 400; max-width: 560px;">
                                                                    En breve te estaremos informando más detalles sobre la <strong>agenda del evento</strong> y todo lo que se trae esta nueva edición.
                                                                </p>
                                                                <p style="margin: 0; font-size: 21px; line-height: 21px;">&nbsp;</p>
                                                                <p
                                                                    style="Margin: 0;font-size: 15px;line-height: 21px;color:#FFFFFF;font-weight: 400; max-width: 550px;">
                                                                    Además, por ser parte de la comunidad EMMS, recibirás:
                                                                </p>
                                                                <p style="margin: 0; font-size: 21px; line-height: 21px;">&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th align="left" valign="middle" class="mobile">
                                                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                                    <tr>
                                                                        <th width="40" align="center" valign="top" >
                                                                            <p
                                                                                style="font-family:  Helvetica, Arial, sans-serif;font-weight: 400; font-size: 15px;line-height: 21px;color:#FFFFFF; Margin: 0">
                                                                                <img src="https://i.imgur.com/9tZ2xSO.png" alt="Emoji pin" width="19"
                                                                                    style="width:100%;max-width:19px !important; vertical-align: top;padding-top: 3px;">
                                                                            </p>
                                                                        </th>
                                                                        <th width="560" align="left" valign="top" >
                                                                            <p
                                                                                style="font-family:  Helvetica, Arial, sans-serif;font-weight: 500; font-size: 15px;line-height: 21px;color:#FFFFFF; Margin: 0;" class="mobile-pl">
                                                                                Herramientas para optimizar tu E-commerce
                                                                            </p>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="21" style="font-size:21px; line-height:21px;">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="40" align="center" valign="top" >
                                                                            <p
                                                                                style="font-family:  Helvetica, Arial, sans-serif;font-weight: 400; font-size: 15px;line-height: 21px;color:#FFFFFF; Margin: 0">
                                                                                <img src="https://i.imgur.com/9tZ2xSO.png" alt="Emoji pin" width="19"
                                                                                    style="width:100%;max-width:19px !important; vertical-align: top;padding-top: 3px;">
                                                                            </p>
                                                                        </th>
                                                                        <th width="560" align="left" valign="top" >
                                                                            <p
                                                                                style="font-family:  Helvetica, Arial, sans-serif;font-weight: 500; font-size: 15px;line-height: 21px;color:#FFFFFF; Margin: 0;" class="mobile-pl">
                                                                                Invitaciones a capacitaciones y eventos totalmente gratuitos para que <br> comiences a prepararte
                                                                            </p>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="21" style="font-size:21px; line-height:21px;">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="40" align="center" valign="top" >
                                                                            <p
                                                                                style="font-family:  Helvetica, Arial, sans-serif;font-weight: 400; font-size: 15px;line-height: 21px;color:#FFFFFF; Margin: 0">
                                                                                <img src="https://i.imgur.com/9tZ2xSO.png" alt="Emoji pin" width="19"
                                                                                    style="width:100%;max-width:19px !important; vertical-align: top;padding-top: 3px;">
                                                                            </p>
                                                                        </th>
                                                                        <th width="560" align="left" valign="top" >
                                                                            <p
                                                                                style="font-family:  Helvetica, Arial, sans-serif;font-weight: 500; font-size: 15px;line-height: 21px;color:#FFFFFF; Margin: 0;" class="mobile-pl">
                                                                                ¡Y mucho más!
                                                                            </p>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" style="font-family:  Helvetica, Arial, sans-serif;">
                                                                <p style="margin: 0; font-size: 21px; line-height: 21px;">&nbsp;</p>
                                                                <p
                                                                    style="Margin: 0;font-size: 14px;line-height: 19px;color:#FFFFFF;font-weight: 400; max-width: 560px;" class="mobile-center">
                                                                    ¡Agrega el evento a tu calendario para guardar la fecha y no perderlo de vista!
                                                                </p>
                                                                <p style="margin: 0; font-size: 21px; line-height: 21px;">&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="21" style="font-size:21px; line-height:21px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" style="font-family:  Helvetica, Arial, sans-serif;">
                                                                <!-- Button : BEGIN -->
                                                                <div style="font-size:13px; font-weight: bold; font-family: Helvetica, Arial, sans-serif;">
                                                                    <!--[if mso]>
                                                                                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://www.addevent.com/event/Cv16292107" style="height:41px;v-text-anchor:middle;width:166px;" arcsize="50%" strokecolor="#008046" strokeweight="1px" fillcolor="#008046" >
                                                                                                        <w:anchorlock/>
                                                                                                        <center style="color:#ffffff;font-family:sans-serif;font-size:13px;font-weight:bold;">
                                                                                                            SÚMALO A TU CALENDARIO
                                                                                                        </center>
                                                                                                        </v:roundrect>
                                                                                                        <![endif]-->
                                                                    <!--[if !mso] -->
                                                                    <table cellspacing="0" cellpadding="0" class="margin-mb-auto">
                                                                        <tr>
                                                                            <td
                                                                                style="border-radius: 99px; background-color: #008046; color: #ffffff; padding: 13px 26px; text-align: center;"
                                                                                class="button--td button-width">
                                                                                <a href="https://www.addevent.com/event/Cv16292107"
                                                                                    style="color: #ffffff; font-size:13px; font-weight: bold; font-family:sans-serif; text-decoration: none; width:100%; display:inline-block"
                                                                                    target="_blank"><span>SÚMALO A TU CALENDARIO</span></a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <!--[endif]-->
                                                                </div>
                                                                <!-- Button : END -->
                                                            </td>
                                                        </tr>
                    <tr>
                                                            <td height="65" style="font-size:65px; line-height:65px;">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #FFFFFF;">
                                <tbody><tr>
                                    <td align="center" valign="top" style="background-color: #FFFFFF;">
                                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tbody><tr>
                                                <td align="center" valign="top" style="background-color: #FFFFFF;">
                                                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                        <tbody><tr>
                                                            <td height="40" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" style="font-family:  Helvetica, Arial, sans-serif;" class="mobile-center">
                                                                <p style="margin: 0; line-height: 21px; font-size: 21px;">&nbsp;</p>
                                                                <p style="Margin: 0;font-size: 14px;line-height: 19px;color:#333333;font-weight: 400;">
                                                                    Mientras esperas la llegada del evento, descubre en la página web las Conferencias que te esperan en el
                                                                    <a href="https://goemms.com/ecommerce-registrado?utm_source=emmsecom&utm_medium=goemms&utm_campaign=et-email-confirmacionregistro-emmsecom-23&dplrid=' . $encodeEmail . '" target="_blank" style="text-decoration: none; color: #008046;font-weight: bold;" class="link-hover ">EMMS E-commerce 2023</a>.
                                                                </p>
                    <p height="10" style="font-size:10px; line-height:10px;" >&nbsp;</p>
                    <p style="Margin: 0;font-size: 14px;line-height: 19px;color:#333333;font-weight: 400;">
                                                                Entérate primero del Contenido Exclusivo que nuestros aliados están preparando para ti y empieza a capacitarte.
                    </p>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                        </tbody></table>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #FFFFFF;">
                            <tr>
                                <td align="center" valign="top" style="background-color: #FFFFFF;">
                                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                        <tr>
                                            <td align="center" valign="top" style="background-color: #FFFFFF;">
                                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                    <tr>
                                                        <td height="70" style="font-size:70px; line-height:70px;">&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <table cellpadding="0" cellspacing="0" border="0" width="100%" role="presentation"
                            style="background-color: #EFEFEF;">
                            <tr>
                                <td align="center" valign="top" style="background-color: #EFEFEF">
                                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                        <tr>
                                            <td align="center" valign="top" style="background-color: #EFEFEF">
                                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                    <tr>
                                                        <td align="left" valign="top" style="border-top: 1px solid #EFEFEF;">

                                                            <table width="185" border="0" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td height="50" style="font-size:50px; line-height:50px;">
                                                                            &nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="37" align="left">
                                                                            <a href="https://twitter.com/fromDoppler" target="_blank"><img src="https://i.imgur.com/UvfLF0E.png"
                                                                                    style="width: 100%; max-width: 32px !important;" width="32" class="img"
                                                                                    alt="Twitter" /></a>
                                                                        </td>
                                                                        <td width="37" align="left">
                                                                            <a href="https://www.facebook.com/DopplerEmailMarketing" target="_blank"><img
                                                                                    src="https://i.imgur.com/0xfikRi.png" style="width: 100%; max-width: 32px !important;" width="32"
                                                                                    class="img" alt="Facebook" /></a>
                                                                        </td>
                                                                        <td width="37" align="left">
                                                                            <a href="https://www.linkedin.com/company/228261" target="_blank"><img
                                                                                    src="https://i.imgur.com/LwTtEZo.png" style="width: 100%; max-width: 32px !important;" width="32"
                                                                                    class="img" alt="Linkedin" /></a>
                                                                        </td>
                                                                        <td width="37" align="left">
                                                                            <a href="https://www.youtube.com/user/FromDoppler" target="_blank"><img
                                                                                    src="https://i.imgur.com/PsCcOJr.png" style="width: 100%; max-width: 32px !important;" width="32"
                                                                                    class="img" alt="Youtube" /></a>
                                                                        </td>
                                                                        <td width="37" align="left">
                                                                            <a href="https://www.instagram.com/fromdoppler" target="_blank"><img
                                                                                    src="https://i.imgur.com/HphAUWD.png" style="width: 100%; max-width: 32px !important;" width="32"
                                                                                    class="img" alt="Instagram" /></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="25" style="font-size:25px; line-height:25px;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left">
                                                            <p style="
                                                                                padding: 0;
                                                                                margin: 0;
                                                                                font-family: Helvetica, Arial, sans-serif;
                                                                                font-size: 11px;
                                                                                line-height: 16px;
                                                                                color: #999999;
                                                                                ">
                                                                &copy;
                                                                <a href="https://www.fromdoppler.com" target="_blank"
                                                                    style="text-decoration: none; color: #008046;" class="link-hover ">Doppler
                                                                    LLC</a>. Todos
                                                                los derechos reservados.
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top">
                                                            <p style="
                                                                        padding: 0;
                                                                        margin: 0;
                                                                        font-family: Helvetica, Arial, sans-serif;
                                                                        font-size: 11px;
                                                                        line-height: 14px;
                                                                        color: #999999;
                                                                        ">
                                                                Te informamos que los datos personales
                                                                contenidos en esta comunicaci&oacute;n fueron recogidos
                                                                en nuestro Formulario de registro, cuyo
                                                                responsable es Doppler LLC, dado que prestaste
                                                                tu consentimiento para recibir nuestras
                                                                comunicaciones. Al registrarte como usuario,
                                                                acept&aacute;s y consent&iacute;s que tus datos sean
                                                                almacenados por nuestra plataforma, cuyos
                                                                servidores est&aacute;n en Estados Unidos, para
                                                                gestionar el env&iacute;o de las comunicaciones
                                                                correspondientes. Podr&aacute;s ejercer tus derechos de
                                                                acceso, rectificaci&oacute;n, limitaci&oacute;n y eliminaci&oacute;n
                                                                de los datos escribiendo a
                                                                <a href="mailto:legal@fromdoppler.com" target="_blank"
                                                                    style="text-decoration: none; color: #008046;"
                                                                    class="link-hover">legal@fromdoppler.com</a>,
                                                                as&iacute; como presentar una reclamaci&oacute;n ante una
                                                                autoridad de control. Si no dese&aacute;s seguir
                                                                recibiendo nuestras Campa&ntilde;as, pod&eacute;s darte de
                                                                baja autom&aacute;ticamente haciendo clic en el enlace
                                                                que se encuentra debajo. Pod&eacute;s consultar
                                                                informaci&oacute;n adicional y detallada sobre la
                                                                protecci&oacute;n de tus datos personales en nuestra
                                                                <a href="https://www.fromdoppler.com/legal/privacidad" target="_blank"
                                                                    style="text-decoration: none; color: #008046; "
                                                                    class="link-hover">Pol&iacute;tica de
                                                                    Privacidad</a>.
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </center>
                </body>

                </html>

        ';

        return $html;
    }

    public static function getEcommerceEmailTemplateDuring($encodeEmail)
    {
        $html = '
            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
                <html lang="es">

                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="x-apple-disable-message-reformatting">
                    <meta content="telephone=no" name="format-detection">
                    <title>Doppler</title>
                    <style>
                        html,
                        body {
                            margin: 0 auto !important;
                            padding: 0 !important;
                        }

                        * {
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                        }

                        div[style*="margin: 16px 0"] {
                            margin: 0 !important;
                        }

                        table,
                        td {
                            mso-table-lspace: 0pt !important;
                            mso-table-rspace: 0pt !important;
                        }

                        table table table {
                            table-layout: auto;
                        }

                        img {
                            -ms-interpolation-mode: bicubic;
                            border: 0;
                            height: auto;
                            line-height: 100%;
                            outline: none;
                            text-decoration: none;
                        }

                        /* Hover styles for buttons */
                        .button--td:hover,
                        .button--a:hover {
                            background: #026C3C !important;
                        }

                        .link-hover:hover {
                            color: #026C3C !important
                        }

                        *[x-apple-data-detectors],
                        .x-gmail-data-detectors,
                        .x-gmail-data-detectors *,
                        .aBn {
                            border-bottom: 0 !important;
                            cursor: default !important;
                            color: inherit !important;
                            text-decoration: none !important;
                            font-size: inherit !important;
                            font-family: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                        }

                        th {
                            font-weight: normal;
                        }

                        /* MEDIA QUERIES */
                        @media all and (max-width:480px) {
                            .wrapper {
                                width: 320px !important;
                                padding: 0 !important;
                            }

                            .container {
                                width: 300px !important;
                                padding: 0 !important;
                            }

                            .mobile {
                                width: 300px !important;
                                display: block !important;
                                padding: 0 !important;
                            }

                            .mobile-btn {
                                width: 240px !important;
                                display: block !important;
                            }

                            .mobile-center {
                                text-align: center !important;
                            }

                            .mobile-title {
                                font-size: 24px !important;
                            }

                            .img {
                                width: 100% !important;
                                height: auto !important;
                            }

                            .mobileOff {
                                width: 0px !important;
                                display: none !important;
                            }

                            .mobileOn {
                                display: block !important;
                                max-height: none !important;
                            }

                            .no-background {
                                background-image: none !important;
                                background-color: #ffffff !important;
                            }

                            .mobile-pl,
                            .mobile-pl-btn,
                            u+.body .mobile-pl,
                            u+.body .mobile-pl-btn {
                                padding-left: 0 !important;
                            }

                            .mobile-pr,
                            .mobile-pr-btn,
                            u+.body .mobile-pr,
                            u+.body .mobile-pr-btn {
                                padding-right: 0 !important;
                            }

                            .mobile-pt,
                            u+.body .mobile-pt {
                                padding-top: 20px !important;
                            }

                            .mobilePadding {
                                padding-left: 3% !important;
                                padding-right: 3% !important;
                            }

                            u~div .wrapper {
                                width: 100vw !important;
                            }
                        }
                    </style>
                    <!--[if gte mso 9]>
                    <xml>
                        <o:OfficeDocumentSettings>
                        <o:AllowPNG/>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                        </o:OfficeDocumentSettings>
                    </xml>
                    <![endif]-->
                </head>

                <body style="margin:0; padding:0;">
                    <span
                                class="preheader"
                                style="
                                    display: none !important;
                                    visibility: hidden;
                                    opacity: 0;
                                    color: transparent;
                                    height: 0;
                                    width: 0;
                                "
                                >Asistir al evento más esperado por la Comunidad del Marketing, ¡exclusivo para la industria E-commerce!
                                &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                        </span>
                        <center>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" valign="top" style="background-color: #EEEEEE;">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">

                                            <tr>
                                                <td align="center" valign="top" style="background-color: #310E44;">
                                                    <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                                        <tr>
                                                            <td height="60" style="font-size:60px; line-height:60px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top">
                                                                <a href="#" style="cursor: default;"><img src="https://i.imgur.com/sMS6CH8.png"
                                                                        alt="Logo de Doppler" width="189"
                                                                        style="width:100%;max-width:240px !important;"></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="60" style="font-size:60px; line-height:60px;">&nbsp;
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" valign="top" style="background-color: #EEEEEE;">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tr>
                                                <td align="center" valign="top" style="background-color: #310E44;">
                                                    <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                                        <tr>
                                                            <td align="center" valign="top" width="300px" class="mobile">
                                                                <table ellpadding="0" cellspacing="0" border="0" class="container">
                                                                    <tr>
                                                                        <td align="center" valign="top" class="mobile"
                                                                            style="font-family: Helvetica, Arial, sans-serif; color:#FFFFFF;">
                                                                            <p
                                                                                style="margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 15px;font-weight: 700;color:#EF2AAC;">
                                                                                Ya comenzó el EMMS E-commerce 2023
                                                                            </p>
                                                                            <p style="margin:0; font-size: 5px; line-height: 5px;">&nbsp;
                                                                            </p>
                                                                            <p style="margin: 0; font-size: 30px;line-height: 30px;font-weight: 700;color:#FFFFFF;"
                                                                                class="mobile-title">¡Gracias por registrarte!</p>
                                                                            <p style="margin:0; font-size: 25px; line-height: 25px;">&nbsp;
                                                                            </p>
                                                                            <p
                                                                                style="margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 22px;font-weight: 400;color:#FFFFFF; max-width: 495px;">
                                                                                Te estaremos informando por Email los detalles sobre la
                                                                                agenda del evento y todo lo que se trae esta nueva edición.
                                                                            </p>
                                                                            <p style="margin:0; font-size: 22px; line-height: 22px;">&nbsp;
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="30" style="font-size:30px; line-height:30px;">&nbsp;
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" valign="top" style="background-color: #EEEEEE;">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tr>
                                                <td align="center" valign="top" style="background-color: #FFFFFF;">
                                                    <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                                        <tr>
                                                            <td height="20" style="font-size:20px; line-height:20px;" class="mobile-pt">
                                                                &nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="container ">
                                                                <table cellpadding="0" cellspacing="0" border="0" class="container">
                                                                    <tr>
                                                                        <th align="left" valign="middle" width="165"
                                                                            class="mobile mobile-center">
                                                                            <p
                                                                                style="margin: 0; font-family: Helvetica, Arial, sans-serif; font-size: 14px;line-height: 22px;font-weight: 400;color:#333333;max-width: 272; ">
                                                                                Mantente pendiente de todas las tendencias en el sector del
                                                                                E-commerce</p>
                                                                        </th>
                                                                        <th align="center" valign="top" width="400" class="mobile">
                                                                            <a href="#" style="cursor: default !important;"><img
                                                                                    src="https://i.imgur.com/mInuzae.gif"
                                                                                    alt="IA - AUTOMATION MARKETING - UX - CRO - SEO - RETARGETING - SOCIAL SELLING - EMAIL MARKETING - ESTRATEGIAS DE VENTA"
                                                                                    width="300"
                                                                                    style="width:100%; max-width:300px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" valign="top" style="background-color: #EEEEEE;">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tr>
                                                <td align="center" valign="top" class="container" style="background-color: #FFFFFF">
                                                    <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                                        <tr>
                                                            <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top">
                                                                <a href="#" style="cursor: default;"><img src="https://i.imgur.com/2VMIfv5.png"
                                                                        alt="imagen separadora" width="21"
                                                                        style="width:100%;max-width:21px !important;"
                                                                        class="mobile-margin-0 "></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="40" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top"
                                                                style="font-family: Helvetica, Arial, sans-serif;color:#333333;"
                                                                class="container ">
                                                                <p
                                                                    style="Margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 22px;font-weight: 700;color:#333333; max-width: 440px;">
                                                                    Conoce a los máximos referentes de la industria e inspírate
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="top" style="background-color: #FFFFFF;">
                                                    <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                                        <tr>
                                                            <td height="40" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" class="container ">
                                                                <table cellpadding="0" cellspacing="0" border="0" class="container">
                                                                    <tr>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                        <th align="center" valign="middle" width="100" class="mobile">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tr>
                                                                                    <th align="center" valign="middle" width="200"
                                                                                        class="mobile">
                                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                                            class="container">
                                                                                            <tr>
                                                                                                <th align="center" valign="middle"
                                                                                                    width="190">
                                                                                                    <a href="#"
                                                                                                        style="cursor: default !important;"><img
                                                                                                            src="https://i.imgur.com/Qse4y7Y.png"
                                                                                                            alt="Ana Ivars" width="91"
                                                                                                            style="width:100%; max-width:91px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                        <th align="center" valign="middle" width="100"
                                                                            class="mobile mobile-pt">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tr>
                                                                                    <th align="center" valign="middle" width="200"
                                                                                        class="mobile mobile-pt">
                                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                                            class="container">
                                                                                            <tr>
                                                                                                <th align="center" valign="middle"
                                                                                                    width="190">
                                                                                                    <a href="#"
                                                                                                        style="cursor: default !important;"><img
                                                                                                            src="https://i.imgur.com/Yh122zC.png"
                                                                                                            alt="Manuel García Cuerva"
                                                                                                            width="91"
                                                                                                            style="width:100%; max-width:91px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                        <th align="center" valign="middle" width="100" class="mobile  mobile-pt">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tr>
                                                                                    <th align="center" valign="middle" width="200"
                                                                                        class="mobile mobile-pt">
                                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                                            class="container">
                                                                                            <tr>
                                                                                                <th align="center" valign="middle"
                                                                                                    width="190">
                                                                                                    <a href="#"
                                                                                                        style="cursor: default !important;"><img
                                                                                                            src="https://i.imgur.com/Hmg2bYO.png"
                                                                                                            alt="Ricardo Tayar"
                                                                                                            width="91"
                                                                                                            style="width:100%; max-width:91px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                        <th align="center" valign="middle" width="100"
                                                                            class="mobile mobile-pt">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tr>
                                                                                    <th align="center" valign="middle" width="200"
                                                                                        class="mobile mobile-pt">
                                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                                            class="container">
                                                                                            <tr>
                                                                                                <th align="center" valign="middle"
                                                                                                    width="190">
                                                                                                    <a href="#"
                                                                                                        style="cursor: default !important;"><img
                                                                                                            src="https://i.imgur.com/gZ15IBH.png"
                                                                                                            alt="Federico Muñoz Villavicencio"
                                                                                                            width="91"
                                                                                                            style="width:100%; max-width:91px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="40" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" class="container ">
                                                                <table cellpadding="0" cellspacing="0" border="0" class="container">
                                                                    <tr>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                        <th align="center" valign="middle" width="100" class="mobile">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tr>
                                                                                    <th align="center" valign="middle" width="200"
                                                                                        class="mobile">
                                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                                            class="container">
                                                                                            <tr>
                                                                                                <th align="center" valign="middle"
                                                                                                    width="190">
                                                                                                    <a href="#"
                                                                                                        style="cursor: default !important;"><img
                                                                                                            src="https://i.imgur.com/KsfMOBB.png"
                                                                                                            alt="José A.Robles" width="91"
                                                                                                            style="width:100%; max-width:91px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                        <th align="center" valign="middle" width="100"
                                                                            class="mobile mobile-pt">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tr>
                                                                                    <th align="center" valign="middle" width="200"
                                                                                        class="mobile mobile-pt">
                                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                                            class="container">
                                                                                            <tr>
                                                                                                <th align="center" valign="middle"
                                                                                                    width="190">
                                                                                                    <a href="#"
                                                                                                        style="cursor: default !important;"><img
                                                                                                            src="https://i.imgur.com/hiEmf1N.png"
                                                                                                            alt="José Ramón Padrón"
                                                                                                            width="91"
                                                                                                            style="width:100%; max-width:91px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                        <th align="center" valign="middle" width="100" class="mobile  mobile-pt">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tr>
                                                                                    <th align="center" valign="middle" width="200"
                                                                                        class="mobile mobile-pt">
                                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                                            class="container">
                                                                                            <tr>
                                                                                                <th align="center" valign="middle"
                                                                                                    width="190">
                                                                                                    <a href="#"
                                                                                                        style="cursor: default !important;"><img
                                                                                                            src="https://i.imgur.com/sPT5nOM.png"
                                                                                                            alt="Emiliano Canova"
                                                                                                            width="91"
                                                                                                            style="width:100%; max-width:91px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                        <th align="center" valign="middle" width="100"
                                                                            class="mobile mobile-pt">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tr>
                                                                                    <th align="center" valign="middle" width="200"
                                                                                        class="mobile mobile-pt">
                                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                                            class="container">
                                                                                            <tr>
                                                                                                <th align="center" valign="middle"
                                                                                                    width="190">
                                                                                                    <a href="#"
                                                                                                        style="cursor: default !important;"><img
                                                                                                            src="https://i.imgur.com/Lv4z79l.png"
                                                                                                            alt="Ana Victoria Odonel"
                                                                                                            width="91"
                                                                                                            style="width:100%; max-width:91px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="40" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" class="container ">
                                                                <table cellpadding="0" cellspacing="0" border="0" class="container">
                                                                    <tr>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                        <th align="center" valign="middle" width="100" class="mobile">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tr>
                                                                                    <th align="center" valign="middle" width="200"
                                                                                        class="mobile">
                                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                                            class="container">
                                                                                            <tr>
                                                                                                <th align="center" valign="middle"
                                                                                                    width="190">
                                                                                                    <a href="#"
                                                                                                        style="cursor: default !important;"><img
                                                                                                            src="https://i.imgur.com/0V1QpaG.png"
                                                                                                            alt="Xavier Idevik" width="91"
                                                                                                            style="width:100%; max-width:91px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                        <th align="center" valign="middle" width="100"
                                                                            class="mobile mobile-pt">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tr>
                                                                                    <th align="center" valign="middle" width="200"
                                                                                        class="mobile mobile-pt">
                                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                                            class="container">
                                                                                            <tr>
                                                                                                <th align="center" valign="middle"
                                                                                                    width="190">
                                                                                                    <a href="#"
                                                                                                        style="cursor: default !important;"><img
                                                                                                            src="https://i.imgur.com/Vt90DRL.png"
                                                                                                            alt="Alicia Macías Hernández"
                                                                                                            width="91"
                                                                                                            style="width:100%; max-width:91px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                        <th align="center" valign="middle" width="100" class="mobile mobile-pt">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tr>
                                                                                    <th align="center" valign="middle" width="200"
                                                                                        class="mobile  mobile-pt">
                                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                                            class="container">
                                                                                            <tr>
                                                                                                <th align="center" valign="middle"
                                                                                                    width="190">
                                                                                                    <a href="#"
                                                                                                        style="cursor: default !important;"><img
                                                                                                            src="https://i.imgur.com/e5mcNIp.png"
                                                                                                            alt="Ana Laura Fleba"
                                                                                                            width="91"
                                                                                                            style="width:100%; max-width:91px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                        <th align="center" valign="middle" width="100"
                                                                            class="mobile mobile-pt">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tr>
                                                                                    <th align="center" valign="middle" width="200"
                                                                                        class="mobile mobile-pt">
                                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                                            class="container">
                                                                                            <tr>
                                                                                                <th align="center" valign="middle"
                                                                                                    width="190">
                                                                                                    <a href="#"
                                                                                                        style="cursor: default !important;"><img
                                                                                                            src="https://i.imgur.com/y2TR1oN.png"
                                                                                                            alt="Federico Osorio"
                                                                                                            width="91"
                                                                                                            style="width:100%; max-width:91px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th align="center" valign="middle" width="25" class="mobileOff">
                                                                            &nbsp;
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="40" style="font-size:40px; line-height:40px;" class="mobileOff">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td align="center" valign="top" style="background-color: #EEEEEE;">
                                            <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" valign="top" style="background-color: #FFFFFF;">
                                                            <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" valign="top" class="container ">
                                                                            <table cellpadding="0" cellspacing="0" border="0"
                                                                                class="container">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td height="40"
                                                                                            style="font-size:40px; line-height:40px;">&nbsp;
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th align="center" valign="top"
                                                                                            style="font-family:  Helvetica, Arial, sans-serif;">
                                                                                            <p
                                                                                                style="Margin: 0;font-size: 18px;line-height: 28px;color:#333333;font-weight: 700; ">
                                                                                                Accede a:
                                                                                            </p>
                                                                                            <p
                                                                                                style="Margin: 0;font-size: 24px;line-height: 24px;">
                                                                                                &nbsp;</p>

                                                                                                <table cellpadding="0" cellspacing="0" border="0" class="container">
                                                                                                    <tr>
                                                                                                        <th align="left" valign="middle" width="250"
                                                                                                            class="mobile mobile-center">
                                                                                                            <p
                                                                                                style="Margin: 0;font-size: 15px;line-height: 24px;color:#333333;font-weight: 400; ">
                                                                                                <img src="https://i.imgur.com/LdnajjJ.png" alt="check"
                                                                                                    width="20"
                                                                                                    style="width:100%;max-width:20px !important; vertical-align: middle;">&nbsp;&nbsp;Capacitaciones
                                                                                                        </p>
                                                                                                                    </th>
                                                                                                        <th align="left" valign="top" width="250" class="mobile mobile-center mobile-pt">
                                                                                                                        <p
                                                                                                            style="Margin: 0;font-size: 15px;line-height: 24px;color:#333333;font-weight: 400; ">
                                                                                                            <img src="https://i.imgur.com/LdnajjJ.png" alt="check"
                                                                                                                width="20"
                                                                                                                style="width:100%;max-width:20px !important; vertical-align: middle;">&nbsp;&nbsp;Herramientas
                                                                                                            gratuitas
                                                                                                        </p>
                                                                                                        </th>

                                                                                                    </tr>
                                                                                                </table>
                                                                                                <p
                                                                                                style="Margin: 0;font-size: 24px;line-height: 24px;" class="mobileOff">
                                                                                                &nbsp;</p>
                                                                                                <table cellpadding="0" cellspacing="0" border="0" class="container">
                                                                                                    <tr>
                                                                                                        <th align="left" valign="middle" width="250"
                                                                                                            class="mobile mobile-center mobile-pt">
                                                                                                            <p
                                                                                                style="Margin: 0;font-size: 15px;line-height: 24px;color:#333333;font-weight: 400; ">
                                                                                                <img src="https://i.imgur.com/LdnajjJ.png" alt="check"
                                                                                                    width="20"
                                                                                                    style="width:100%;max-width:20px !important; vertical-align: middle;">&nbsp;&nbsp;Recursos descargables
                                                                                                        </p>
                                                                                                                    </th>
                                                                                                        <th align="left" valign="top" width="250" class="mobile mobile-center mobile-pt">
                                                                                                                        <p
                                                                                                            style="Margin: 0;font-size: 15px;line-height: 24px;color:#333333;font-weight: 400; ">
                                                                                                            <img src="https://i.imgur.com/LdnajjJ.png" alt="check"
                                                                                                                width="20"
                                                                                                                style="width:100%;max-width:20px !important; vertical-align: middle;">&nbsp;&nbsp;Beneficios y sorteos exclusivos
                                                                                                        </p>
                                                                                                        </th>

                                                                                                    </tr>
                                                                                                </table>

                                                                                        </th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="40"
                                                                                            style="font-size:40px; line-height:40px;">&nbsp;
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                    <table ellpadding="0" cellspacing="0" border="0" class="container">
                                                                    <tr>
                                                                        <td align="left" valign="top"
                                                                            style="font-family:  Helvetica, Arial, sans-serif;font-size: 15px;color:#FFFFFF;font-weight: 400;"
                                                                            class="mobile">
                                                                            <!-- Button : BEGIN -->
                                                                            <div>
                                                                                <!--[if mso]>  <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://goemms.com/ecommerce-registrado?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-confirmacion-registro-during-emmsecom-23&dplrid=' . $encodeEmail . '" style="height:47px;v-text-anchor:middle;width:266px;" arcsize="50%" strokecolor="#008046" strokeweight="1px" fillcolor="#008046" >	<w:anchorlock/><center style="color:#ffffff;font-family:sans-serif;font-size:15px;font-weight:bold;">ÚNETE AHORA</center></v:roundrect><![endif]-->
                                                                                <!--[if !mso] -->
                                                                                <table cellspacing="0" cellpadding="0">
                                                                                    <tr>
                                                                                        <td style="border-radius: 99px; background-color: #008046; color: #ffffff; padding: 15px 30px; text-align: center;"
                                                                                            class="button--td mobile-btn">
                                                                                            <a href="https://goemms.com/ecommerce-registrado?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-confirmacion-registro-during-emmsecom-23&dplrid=' . $encodeEmail . '"
                                                                                                style="color: #ffffff; font-size:15px; font-weight: bold; font-family:sans-serif; text-decoration: none; width:100%; display:inline-block"
                                                                                                target="_blank"><span>ÚNETE AHORA</span></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                                <!--[endif]-->
                                                                            </div>
                                                                            <!-- Button : END -->
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                        </td>
                                                                    </tr>
                    <tr>
                                                            <td height="40" style="font-size:40px; line-height:40px;">&nbsp;
                                                            </td>
                                                        </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td align="center" valign="top" style="background-color: #EEEEEE">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tr>
                                                <td align="center" valign="top" style="background-color: #310E44">
                                                    <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                                        <tr>
                                                            <td height="40" style="font-size:40px; line-height:40px;">&nbsp;
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th align="center" valign="middle" width="265" class="mobile">
                                                                <table ellpadding="0" cellspacing="0" border="0" class="container">
                                                                    <tr>
                                                                        <td align="center" valign="top" class="mobile mobile-center"
                                                                            style="font-family: Helvetica, Arial, sans-serif; color:#FFFFFF;">
                                                                            <p
                                                                                style="margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 21px;font-weight: 400;color:#FFFFFF;max-width: 520px;">
                                                                            Recuerda que en la Web <strong>quedarán subidas todas las Conferencias</strong> una vez finalizado el evento.
                                                                            </p>
                    <p style="font-size:10px; line-height:10px;">&nbsp;</p>
                    <p
                                                                            style="margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 21px;font-weight: 400;color:#FFFFFF;max-width: 510px;">
                                                                        Y no te olvides de <strong>descargar tu certificado</strong> de asistencia durante el vivo 📃
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="30" style="font-size:30px; line-height:30px;">&nbsp;
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td height="20" style="font-size:20px; line-height:20px;">&nbsp;
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                </td>
                            </tr>
                        </table>

                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center" valign="top" style="background-color: #EEEEEE">
                                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                        <tr>
                                            <td align="center" valign="top" style="background-color: #FFFFFF">
                                                <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                                    <tr>
                                                        <td height="40" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" valign="top"
                                                            style="font-family:  Helvetica, Arial, sans-serif;">
                                                            <p
                                                                style="Margin: 0;font-size: 15px;line-height: 24px;color:#333333;font-weight: 400; ">
                                                                ¡Nos vemos allí!
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" valign="top"
                                                            style="font-family:  Helvetica, Arial, sans-serif;">
                                                            <p
                                                                style="Margin: 0;font-size: 15px;line-height: 24px;color:#333333;font-weight: 400; ">
                                                                El equipo
                                                                de Doppler&nbsp;:)
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="40" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!--footer begin-->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td align="center" valign="top" style="background-color: #EEEEEE">
                                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                        <tr>
                                            <td align="center" valign="top" style="background-color: #FFFFFF">
                                                <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                                    <tr>
                                                        <td align="center" valign="top" style="border-top: 1px solid #A9A9A9;">
                                                            <table width="555" cellpadding="0" cellspacing="0" border="0"
                                                                class="container">
                                                                <tr>
                                                                    <td height="40" style="font-size:40px; line-height:40px;">
                                                                        &nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <table width="185" border="0" cellpadding="0" cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://twitter.com/fromDoppler"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/twitter-icon.png"
                                                                                                style="width: 100%; max-width: 32px !important;"
                                                                                                width="32" class="img"
                                                                                                alt="Twitter" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.facebook.com/DopplerEmailMarketing"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/facebook-icon.png"
                                                                                                style="width: 100%; max-width: 32px !important;"
                                                                                                width="32" class="img"
                                                                                                alt="Facebook" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.linkedin.com/company/228261"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/linkedin-icon.png"
                                                                                                style="width: 100%; max-width: 32px !important;"
                                                                                                width="32" class="img"
                                                                                                alt="Linkedin" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.youtube.com/user/FromDoppler"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/youtube-icon.png"
                                                                                                style="width: 100%; max-width: 32px !important;"
                                                                                                width="32" class="img"
                                                                                                alt="Youtube" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.instagram.com/fromdoppler"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/instagram-icon.png"
                                                                                                style="width: 100%; max-width: 32px !important;"
                                                                                                width="32" class="img"
                                                                                                alt="Instagram" /></a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="padding: 25px 0 0;">
                                                                        <p style="
                                                                                                                        padding: 0;
                                                                                                                        margin: 0;
                                                                                                                        font-family: Helvetica, Arial, sans-serif;
                                                                                                                        font-size: 11px;
                                                                                                                        line-height: 16px;
                                                                                                                        color: #666666;
                                                                                                                    ">
                                                                            &copy;
                                                                            <a href="https://www.fromdoppler.com/" target="_blank"
                                                                                style="color: #33AD73;font-weight: normal; text-decoration: none;"
                                                                                class="link-hover ">Doppler
                                                                                LLC</a>. Todos
                                                                            los derechos reservados.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" style="font-size:20px; line-height:20px;">&nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <p style="
                                                                                                                        padding: 0;
                                                                                                                        margin: 0;
                                                                                                                        font-family: Helvetica, Arial, sans-serif;
                                                                                                                        font-size: 11px;
                                                                                                                        line-height: 14px;
                                                                                                                        color: #666666;
                                                                                                                        ">
                                                                            Te informamos que los datos personales
                                                                            contenidos en esta comunicaci&oacute;n fueron recogidos
                                                                            en nuestro Formulario de registro, cuyo
                                                                            responsable es Doppler LLC, dado que prestaste
                                                                            tu consentimiento para recibir nuestras
                                                                            comunicaciones. Al registrarte como usuario,
                                                                            acept&aacute;s y consent&iacute;s que tus datos sean
                                                                            almacenados por nuestra plataforma, cuyos
                                                                            servidores est&aacute;n en Estados Unidos, para
                                                                            gestionar el env&iacute;o de las comunicaciones
                                                                            correspondientes. Podr&aacute;s ejercer tus derechos de
                                                                            acceso, rectificaci&oacute;n, limitaci&oacute;n y
                                                                            eliminaci&oacute;n
                                                                            de los datos escribiendo a
                                                                            <a href="mailto:legal@fromdoppler.com" target="_blank"
                                                                                style=" color: #33AD73;font-weight: normal; text-decoration: none;"
                                                                                class="link-hover">legal@fromdoppler.com</a>,
                                                                            as&iacute; como presentar una reclamaci&oacute;n ante una
                                                                            autoridad de control. Si no dese&aacute;s seguir
                                                                            recibiendo nuestras Campa&ntilde;as, pod&eacute;s darte de
                                                                            baja autom&aacute;ticamente haciendo clic en el enlace
                                                                            que se encuentra debajo. Pod&eacute;s consultar
                                                                            informaci&oacute;n adicional y detallada sobre la
                                                                            protecci&oacute;n de tus datos personales en nuestra
                                                                            <a href="https://www.fromdoppler.com/legal/privacidad/"
                                                                                target="_blank"
                                                                                style=" color: #33AD73; font-weight: normal; text-decoration: none;"
                                                                                class="link-hover">Pol&iacute;tica
                                                                                de
                                                                                Privacidad</a>.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="40" style="font-size:40px; line-height:40px;">&nbsp;
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </center>
                </body>

                </html>
        ';

        return $html;
    }

    public static function getEcommerceEmailTemplatePost($encodeEmail)
    {

        $html = '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <meta content="telephone=no" name="format-detection">
    <title>Doppler</title>
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
        }

        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        table table table {
            table-layout: auto;
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        /* Hover styles for buttons */
        .button--td:hover,
        .button--a:hover {
            background: #026C3C !important;
        }

        .link-hover:hover {
            color: #026C3C !important
        }

        *[x-apple-data-detectors],
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        th {
            font-weight: normal;
        }

        /* MEDIA QUERIES */
        @media all and (max-width:480px) {
            .wrapper {
                width: 320px !important;
                padding: 0 !important;
            }

            .container {
                width: 300px !important;
                padding: 0 !important;
            }

            .mobile {
                width: 300px !important;
                display: block !important;
                padding: 0 !important;
            }

            .mobile-btn {
                width: 240px !important;
                display: block !important;
            }

            .mobile-center {
                text-align: center !important;
            }

            .mobile-title {
                font-size: 24px !important;
            }

            .img {
                width: 100% !important;
                height: auto !important;
            }

            .mobileOff {
                width: 0px !important;
                display: none !important;
            }

            .mobileOn {
                display: block !important;
                max-height: none !important;
            }

            .no-background {
                background-image: none !important;
                background-color: #ffffff !important;
            }

            .mobile-pl,
            .mobile-pl-btn,
            u+.body .mobile-pl,
            u+.body .mobile-pl-btn {
                padding-left: 0 !important;
            }

            .mobile-pr,
            .mobile-pr-btn,
            u+.body .mobile-pr,
            u+.body .mobile-pr-btn {
                padding-right: 0 !important;
            }

            .mobile-pt,
            u+.body .mobile-pt {
                padding-top: 20px !important;
            }

            .mobilePadding {
                padding-left: 3% !important;
                padding-right: 3% !important;
            }

            u~div .wrapper {
                width: 100vw !important;
            }
        }
    </style>
    <!--[if gte mso 9]>
      <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
      </xml>
      <![endif]-->
</head>

<body style="margin:0; padding:0;">
    <span class="preheader" style="
                display: none !important;
                visibility: hidden;
                opacity: 0;
                color: transparent;
                height: 0;
                width: 0;
            ">Ya puedes revivir el evento más esperado por la Comunidad del Marketing, ¡ahora para la industria E-commerce!
        &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </span>
    <center>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top" style="background-color: #EEEEEE;">
                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">

                        <tr>
                            <td align="center" valign="top" style="background-color: #fff;">
                                <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <td height="60" style="font-size:60px; line-height:60px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top">
                                            <a href="#" style="cursor: default;"><img
                                                    src="https://i.imgur.com/SM2wIMp.png" alt="Logo de Doppler"
                                                    width="189" style="width:100%;max-width:240px !important;"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="60" style="font-size:60px; line-height:60px;">&nbsp;
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top" style="background-color: #EEEEEE;">
                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                        <tr>
                            <td align="center" valign="top" style="background-color: #fff;">
                                <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <td align="center" valign="top" width="300px" class="mobile">
                                            <table ellpadding="0" cellspacing="0" border="0" class="container">
                                                <tr>
                                                    <td align="center" valign="top" class="mobile"
                                                        style="font-family: Helvetica, Arial, sans-serif; color:#333333;">
                                                        <p style="margin: 0; font-size: 30px;line-height: 30px;font-weight: 700;color:#333333;"
                                                            class="mobile-title">¡Gracias por registrarte!</p>
                                                        <p style="margin:0; font-size: 25px; line-height: 15px;">&nbsp;
                                                        </p>
                                                        <p
                                                            style="margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 22px;font-weight: 400;color:#333333; max-width: 495px;">
                                                            Ingresa ahora a <a href="https://goemms.com/ecommerce-registrado?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-confirmacion-registro-post-emmsecom-23&dplrid=' . $encodeEmail . '"
                                                                target="_blank"
                                                                style="font-weight: 700; color: #33AD73; text-decoration: none;">la
                                                                Web</a> y revive el EMMS E-commerce 2023.
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top" style="background-color: #EEEEEE;">
                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                        <tr>
                            <td align="center" valign="top" style="background-color: #FFFFFF;">
                                <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <td height="20" style="font-size:20px; line-height:20px;" class="mobile-pt">
                                            &nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" class="container ">
                                            <table cellpadding="0" cellspacing="0" border="0" class="container">
                                                <tr>
                                                    <th align="center" valign="top" width="400" class="mobile">
                                                        <a href="#" style="cursor: default !important;"><img
                                                                src="https://i.imgur.com/86xPLLo.gif"
                                                                alt="IA - AUTOMATION MARKETING - UX - CRO - SEO - RETARGETING - SOCIAL SELLING - EMAIL MARKETING - ESTRATEGIAS DE VENTA"
                                                                width="300"
                                                                style="width:100%; max-width:300px !important; margin-bottom: 0; padding-bottom: 0;display: block;"></a>
                                                    </th>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>


        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #EEEEEE;">
                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #FFFFFF;">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="top" class="container ">
                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                            class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="40"
                                                                        style="font-size:40px; line-height:40px;">&nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th align="center" valign="top"
                                                                        style="font-family:  Helvetica, Arial, sans-serif;">
                                                                        <p
                                                                            style="Margin: 0;font-size: 15px;line-height: 28px;color:#333333;font-weight: 700; ">
                                                                            Accede a:
                                                                        </p>
                                                                        <p
                                                                            style="Margin: 0;font-size: 24px;line-height: 24px;">
                                                                            &nbsp;</p>

                                                                        <table cellpadding="0" cellspacing="0"
                                                                            border="0" class="container">
                                                                            <tr>
                                                                                <th align="left" valign="middle"
                                                                                    width="250"
                                                                                    class="mobile mobile-center">
                                                                                    <table cellpadding="0"
                                                                                        cellspacing="0" border="0"
                                                                                        class="container">
                                                                                        <tr>
                                                                                            <th style="width:20px; vertical-align: initial;">
                                                                                                <img src="https://i.imgur.com/QkZqpkS.png"
                                                                                                    alt="check"
                                                                                                    width="20"
                                                                                                    style="width:100%;max-width:20px !important; vertical-align: middle;">
                                                                                            </th>
                                                                                            <th style="width:10px;">
                                                                                            </th>
                                                                                            <th align="left">
                                                                                                <p
                                                                                                    style="Margin: 0;font-size: 15px;line-height: 21px;color:#333333;font-weight: 400; ">
                                                                                                    Conferencias con los
                                                                                                    mayores expertos en
                                                                                                    la industria
                                                                                                </p>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </table>
                                                                                </th>
                                                                                <th align="left" valign="middle" width="30" class="mobile mobile-center"></th>
                                                                                <th align="left" valign="top"
                                                                                    width="250"
                                                                                    class="mobile mobile-center mobile-pt">
                                                                                    <table cellpadding="0"
                                                                                        cellspacing="0" border="0"
                                                                                        class="container">
                                                                                        <tr>
                                                                                            <th style="width:20px; vertical-align: initial;">
                                                                                                <img src="https://i.imgur.com/QkZqpkS.png"
                                                                                                    alt="check"
                                                                                                    width="20"
                                                                                                    style="width:100%;max-width:20px !important; vertical-align: middle;">
                                                                                            </th>
                                                                                            <th style="width:10px;">
                                                                                            </th>
                                                                                            <th align="left">
                                                                                                <p
                                                                                                    style="Margin: 0;font-size: 15px;line-height: 21px;color:#333333;font-weight: 400; ">
                                                                                                    Casos de éxito imperdibles
                                                                                                </p>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </table>
                                                                                </th>

                                                                            </tr>
                                                                        </table>
                                                                        <p style="Margin: 0;font-size: 24px;line-height: 24px;"
                                                                            class="mobileOff">
                                                                            &nbsp;</p>
                                                                        <table cellpadding="0" cellspacing="0"
                                                                            border="0" class="container">
                                                                            <tr>
                                                                                <th align="left" valign="middle"
                                                                                    width="250"
                                                                                    class="mobile mobile-center mobile-pt">
                                                                                    <table cellpadding="0" cellspacing="0" border="0" class="container">
                                                                                        <tr>
                                                                                            <th style="width:20px; vertical-align: initial;">
                                                                                                <img src="https://i.imgur.com/QkZqpkS.png"
                                                                                                alt="check" width="20"
                                                                                                style="width:100%;max-width:20px !important; vertical-align: middle;">
                                                                                            </th>
                                                                                            <th style="width:10px;"></th>
                                                                                            <th align="left"><p
                                                                                                style="Margin: 0;font-size: 15px;line-height: 21px;color:#333333;font-weight: 400; ">
                                                                                                Consejos e insights para aplicar IA en tu E-commerce
                                                                                            </p></th>
                                                                                        </tr>
                                                                                    </table>
                                                                                </th>
                                                                                <th align="left" valign="middle" width="30" class="mobile mobile-center"></th>
                                                                                <th align="left" valign="top"
                                                                                    width="250"
                                                                                    class="mobile mobile-center mobile-pt">
                                                                                    <table cellpadding="0" cellspacing="0" border="0" class="container">
                                                                                        <tr>
                                                                                            <th style="width:20px; vertical-align: initial;">
                                                                                                <img src="https://i.imgur.com/QkZqpkS.png"
                                                                                                alt="check" width="20"
                                                                                                style="width:100%;max-width:20px !important; vertical-align: middle;">
                                                                                            </th>
                                                                                            <th style="width:10px;"></th>
                                                                                            <th align="left"><p
                                                                                                style="Margin: 0;font-size: 15px;line-height: 21px;color:#333333;font-weight: 400; ">
                                                                                                Herramientas para optimizar tu tienda online
                                                                                            </p></th>
                                                                                        </tr>
                                                                                    </table>
                                                                                </th>

                                                                            </tr>
                                                                        </table>
                                                                        <p style="Margin: 0;font-size: 24px;line-height: 24px;"
                                                                            class="mobileOff">
                                                                            &nbsp;</p>
                                                                        <table cellpadding="0" cellspacing="0"
                                                                            border="0" class="container">
                                                                            <tr>
                                                                                <th align="left" valign="middle"
                                                                                    width="250"
                                                                                    class="mobile mobile-center mobile-pt">
                                                                                    <table cellpadding="0" cellspacing="0" border="0" class="container">
                                                                                        <tr>
                                                                                            <th style="width:20px; vertical-align: initial;">
                                                                                                <img src="https://i.imgur.com/QkZqpkS.png"
                                                                                                alt="check" width="20"
                                                                                                style="width:100%;max-width:20px !important; vertical-align: middle;">
                                                                                            </th>
                                                                                            <th style="width:10px;"></th>
                                                                                            <th align="left"><p
                                                                                                style="Margin: 0;font-size: 15px;line-height: 21px;color:#333333;font-weight: 400; ">
                                                                                                Capacitaciones y eventos totalmente gratuitos
                                                                                            </p></th>
                                                                                        </tr>
                                                                                    </table>
                                                                                </th>
                                                                                <th align="left" valign="middle" width="30" class="mobile mobile-center"></th>
                                                                                <th align="left" valign="middle"
                                                                                width="250"
                                                                                class="mobile mobile-center"></th>
                                                                            </tr>
                                                                        </table>

                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td height="60"
                                                                        style="font-size:60px; line-height:60px;">&nbsp;
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table ellpadding="0" cellspacing="0" border="0"
                                                            class="container">
                                                            <tr>
                                                                <td align="left" valign="top"
                                                                    style="font-family:  Helvetica, Arial, sans-serif;font-size: 15px;color:#FFFFFF;font-weight: 400;"
                                                                    class="mobile">
                                                                    <!-- Button : BEGIN -->
                                                                    <div>
                                                                        <!--[if mso]>  <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://goemms.com/ecommerce-registrado?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-confirmacion-registro-during-emmsecom-23&dplrid=' . $encodeEmail . '" style="height:47px;v-text-anchor:middle;width:266px;" arcsize="50%" strokecolor="#008046" strokeweight="1px" fillcolor="#008046" >	<w:anchorlock/><center style="color:#ffffff;font-family:sans-serif;font-size:15px;font-weight:bold;">ÚNETE AHORA</center></v:roundrect><![endif]-->
                                                                        <!--[if !mso] -->
                                                                        <table cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td style="border-radius: 99px; background-color: #008046; color: #ffffff; padding: 15px 30px; text-align: center;"
                                                                                    class="button--td mobile-btn">
                                                                                    <a href="https://goemms.com/ecommerce-registrado?utm_source=fromdoppler&utm_campaign=et-confirmacion-registro-post-emmsecom-23&utm_medium=email&dplrid=' . $encodeEmail . '"
                                                                                        style="color: #ffffff; font-size:15px; font-weight: bold; font-family:sans-serif; text-decoration: none; width:100%; display:inline-block"
                                                                                        target="_blank"><span>ACCEDE AHORA</span></a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <!--[endif]-->
                                                                    </div>
                                                                    <!-- Button : END -->
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="40" style="font-size:40px; line-height:40px;">&nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>


        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top" style="background-color: #EEEEEE">
                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                        <tr>
                            <td align="center" valign="top" style="background-color: #FFFFFF">
                                <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top"
                                            style="font-family:  Helvetica, Arial, sans-serif;">
                                            <p
                                                style="Margin: 0;font-size: 15px;line-height: 24px;color:#333333;font-weight: 700; ">
                                                ¡Inspírate y comienza a potenciar tus ventas!
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top"
                                            style="font-family:  Helvetica, Arial, sans-serif;">
                                            <p
                                                style="Margin: 0;font-size: 15px;line-height: 24px;color:#333333;font-weight: 400; ">
                                                El equipo
                                                de Doppler&nbsp;:)
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="40" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!--footer begin-->
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td align="center" valign="top" style="background-color: #EEEEEE">
                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                        <tr>
                            <td align="center" valign="top" style="background-color: #FFFFFF">
                                <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <td align="center" valign="top" style="border-top: 1px solid #A9A9A9;">
                                            <table width="555" cellpadding="0" cellspacing="0" border="0"
                                                class="container">
                                                <tr>
                                                    <td height="40" style="font-size:40px; line-height:40px;">
                                                        &nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top">
                                                        <table width="185" border="0" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="37" align="left">
                                                                        <a href="https://twitter.com/fromDoppler"
                                                                            target="_blank"><img
                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/twitter-icon.png"
                                                                                style="width: 100%; max-width: 32px !important;"
                                                                                width="32" class="img"
                                                                                alt="Twitter" /></a>
                                                                    </td>
                                                                    <td width="37" align="left">
                                                                        <a href="https://www.facebook.com/DopplerEmailMarketing"
                                                                            target="_blank"><img
                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/facebook-icon.png"
                                                                                style="width: 100%; max-width: 32px !important;"
                                                                                width="32" class="img"
                                                                                alt="Facebook" /></a>
                                                                    </td>
                                                                    <td width="37" align="left">
                                                                        <a href="https://www.linkedin.com/company/228261"
                                                                            target="_blank"><img
                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/linkedin-icon.png"
                                                                                style="width: 100%; max-width: 32px !important;"
                                                                                width="32" class="img"
                                                                                alt="Linkedin" /></a>
                                                                    </td>
                                                                    <td width="37" align="left">
                                                                        <a href="https://www.youtube.com/user/FromDoppler"
                                                                            target="_blank"><img
                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/youtube-icon.png"
                                                                                style="width: 100%; max-width: 32px !important;"
                                                                                width="32" class="img"
                                                                                alt="Youtube" /></a>
                                                                    </td>
                                                                    <td width="37" align="left">
                                                                        <a href="https://www.instagram.com/fromdoppler"
                                                                            target="_blank"><img
                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/instagram-icon.png"
                                                                                style="width: 100%; max-width: 32px !important;"
                                                                                width="32" class="img"
                                                                                alt="Instagram" /></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" style="padding: 25px 0 0;">
                                                        <p style="
  																								        padding: 0;
  																								        margin: 0;
  																								        font-family: Helvetica, Arial, sans-serif;
  																								        font-size: 11px;
  																								        line-height: 16px;
  																								        color: #666666;
  																								      ">
                                                            &copy;
                                                            <a href="https://www.fromdoppler.com/" target="_blank"
                                                                style="color: #33AD73;font-weight: normal; text-decoration: none;"
                                                                class="link-hover ">Doppler
                                                                LLC</a>. Todos
                                                            los derechos reservados.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="20" style="font-size:20px; line-height:20px;">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top">
                                                        <p style="
  																								          padding: 0;
  																								          margin: 0;
  																								          font-family: Helvetica, Arial, sans-serif;
  																								         font-size: 11px;
  																								           line-height: 14px;
  																								          color: #666666;
  																								        ">
                                                            Te informamos que los datos personales
                                                            contenidos en esta comunicaci&oacute;n fueron recogidos
                                                            en nuestro Formulario de registro, cuyo
                                                            responsable es Doppler LLC, dado que prestaste
                                                            tu consentimiento para recibir nuestras
                                                            comunicaciones. Al registrarte como usuario,
                                                            acept&aacute;s y consent&iacute;s que tus datos sean
                                                            almacenados por nuestra plataforma, cuyos
                                                            servidores est&aacute;n en Estados Unidos, para
                                                            gestionar el env&iacute;o de las comunicaciones
                                                            correspondientes. Podr&aacute;s ejercer tus derechos de
                                                            acceso, rectificaci&oacute;n, limitaci&oacute;n y
                                                            eliminaci&oacute;n
                                                            de los datos escribiendo a
                                                            <a href="mailto:legal@fromdoppler.com" target="_blank"
                                                                style=" color: #33AD73;font-weight: normal; text-decoration: none;"
                                                                class="link-hover">legal@fromdoppler.com</a>,
                                                            as&iacute; como presentar una reclamaci&oacute;n ante una
                                                            autoridad de control. Si no dese&aacute;s seguir
                                                            recibiendo nuestras Campa&ntilde;as, pod&eacute;s darte de
                                                            baja autom&aacute;ticamente haciendo clic en el enlace
                                                            que se encuentra debajo. Pod&eacute;s consultar
                                                            informaci&oacute;n adicional y detallada sobre la
                                                            protecci&oacute;n de tus datos personales en nuestra
                                                            <a href="https://www.fromdoppler.com/legal/privacidad/"
                                                                target="_blank"
                                                                style=" color: #33AD73; font-weight: normal; text-decoration: none;"
                                                                class="link-hover">Pol&iacute;tica
                                                                de
                                                                Privacidad</a>.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="40" style="font-size:40px; line-height:40px;">&nbsp;
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>

        ';

        return $html;
    }

    public static function getDigitalTEmailTemplatePREEarlyBirds($encodeEmail)
    {
        $html = '
            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
            <html lang="es">

            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="x-apple-disable-message-reformatting">
                <meta content="telephone=no" name="format-detection">
                <title>Doppler</title>
                <style>
                    html,
                    body {
                        margin: 0 auto !important;
                        padding: 0 !important;
                    }

                    * {
                        -ms-text-size-adjust: 100%;
                        -webkit-text-size-adjust: 100%;
                    }

                    div[style*="margin: 16px 0"] {
                        margin: 0 !important;
                    }

                    table,
                    td {
                        mso-table-lspace: 0pt !important;
                        mso-table-rspace: 0pt !important;
                    }

                    table table table {
                        table-layout: auto;
                    }

                    img {
                        -ms-interpolation-mode: bicubic;
                        border: 0;
                        height: auto;
                        line-height: 100%;
                        outline: none;
                        text-decoration: none;
                    }

                    /* Hover styles for buttons */
                    .button--td:hover,
                    .button--a:hover {
                        background: #026C3C !important;
                    }

                    .link-hover:hover {
                        color: #026C3C !important
                    }

                    *[x-apple-data-detectors],
                    .x-gmail-data-detectors,
                    .x-gmail-data-detectors *,
                    .aBn {
                        border-bottom: 0 !important;
                        cursor: default !important;
                        color: inherit !important;
                        text-decoration: none !important;
                        font-size: inherit !important;
                        font-family: inherit !important;
                        font-weight: inherit !important;
                        line-height: inherit !important;
                    }

                    th {
                        font-weight: normal;
                    }

                    .mobileOn {
                        display: none;
                    }

                    /* MEDIA QUERIES */
                    @media all and (max-width:480px) {
                        .wrapper {
                            width: 320px !important;
                            padding: 0 !important;
                        }

                        .container {
                            width: 300px !important;
                            padding: 0 !important;
                        }

                        .mobile {
                            width: 300px !important;
                            display: block !important;
                            padding: 0 !important;
                        }

                        .mobile-btn {
                            width: 240px !important;
                            display: block !important;
                        }

                        .mobile-center {
                            text-align: center !important;
                        }

                        .img {
                            width: 100% !important;
                            height: auto !important;
                        }

                        .mobileOff {
                            width: 0px !important;
                            display: none !important;
                        }

                        .mobileOn {
                            display: inline-table !important;
                            max-height: none !important;
                        }

                        .no-background {
                            background-image: none !important;
                            background-color: #ffffff !important;
                        }

                        .mobile-pl,
                        .mobile-pl-btn,
                        u+.body .mobile-pl,
                        u+.body .mobile-pl-btn {
                            padding-left: 0 !important;
                        }

                        .mobile-pr,
                        .mobile-pr-btn,
                        u+.body .mobile-pr,
                        u+.body .mobile-pr-btn {
                            padding-right: 0 !important;
                        }

                        .mobile-pt,
                        u+.body .mobile-pt {
                            padding-top: 20px !important;
                        }

                        .mobilePadding {
                            padding-left: 3% !important;
                            padding-right: 3% !important;
                        }

                        u~div .wrapper {
                            width: 100vw !important;
                        }

                        .mobile-title-fontsize {
                            font-size: 25px !important;
                            line-height: 25px !important;
                        }

                        .mobile-text-center {
                            text-align: center !important;
                        }
                    }
                </style>
                <!--[if gte mso 9]>
                <xml>
                    <o:OfficeDocumentSettings>
                    <o:AllowPNG/>
                    <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                </xml>
                <![endif]-->
            </head>

            <body style="margin:0; padding:0;">
            <span
                        class="preheader"
                        style="
                            display: none !important;
                            visibility: hidden;
                            opacity: 0;
                            color: transparent;
                            height: 0;
                            width: 0;
                        "
                        >Prepárate para otra edición de tu evento de Marketing Digital preferido.
                        &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                </span>
                <center>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                        style="background-color: #310E44; border-spacing: 0px !important; border: none;">
                        <tbody>
                            <tr>
                                <td align="center" valign="top" style="background-color: #310E44; border-spacing: 0px !important;">
                                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper"
                                        style="border-spacing: 0px !important; border: none;">
                                        <tbody>
                                            <tr>
                                                <td align="right" valign="top" style="background-color: #310E44">
                                                    <table width="620" cellpadding="0" cellspacing="0" border="0" class="container">
                                                        <tbody>
                                                            <tr>
                                                                <th width="250" class="mobile mobile-text-center" align="left"
                                                                    valign="top">
                                                                    <a href="#" style="cursor: default;">
                                                                        <img src="https://i.imgur.com/SdDovdD.png" alt="Logo de EMMS"
                                                                            width="196"
                                                                            style="width:100%;max-width:196px !important;padding-top: 66px;"></a>
                                                                    <p style="margin:0; font-size:70px; line-height:70px;">&nbsp;
                                                                    </p>
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="center" valign="top" style="background-color: #310E44;">
                                <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                    <tr>
                                        <td align="center" valign="top">
                                            <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                <tr>
                                                    <th align="center" valign="top" width="78" class="mobile mobileOff">
                                                        <a href="#" style="cursor: default !important;"><img src="https://i.imgur.com/vrCoK4s.png"
                                                                alt="Icono de microfono" width="78"
                                                                style="width:100%;max-width:78px !important;display: block;"></a>
                                                    </th>
                                                    <th align="left" valign="middle" width="287" class="mobile">
                                                        <table ellpadding="0" cellspacing="0" border="0" class="container">
                                                            <tr>
                                                                <td align="left" valign="top" class="mobile mobile-center"
                                                                    style="font-family: Helvetica, Arial, sans-serif; color:#FFFFFF;">
                                                                    <p style="margin: 0; font-size: 30px;line-height: 30px;font-weight: 700;color:#FFFFFF;"
                                                                        class="mobile-title-fontsize">¡Gracias por registrarte!</p>

                                                                    <p style="margin:0; font-size: 22px; line-height: 22px;">&nbsp;
                                                                    </p>
                                                                    <p
                                                                        style="margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 20px;font-weight: 400;color:#FFFFFF;">
                                                                        Ya eres parte del <a
                                                                            href="https://goemms.com/digital-trends-registrado?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-email-confirmacion-registro-emmsdt-earlybirds&dplrid=' . $encodeEmail . '"
                                                                            target="_blank"
                                                                            style="text-decoration: none; color: #33AD73;font-weight: bold;"
                                                                            class="link-hover ">EMMS Digital Trends.</a>
                                                                    </p>
                                                                    <p style="margin:0; font-size: 15px; line-height: 15px;">&nbsp;
                                                                    </p>
                                                                    <p
                                                                        style="margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 20px;font-weight: 400;color:#FFFFFF;">
                                                                        Presta atención a tu casilla de Emails para enterarte el
                                                                        minuto a minuto del evento online de Marketing Digital del
                                                                        año y descubrir a los ponentes que nos estarán acompañando.
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="70" style="font-size:70px; line-height:70px;">&nbsp;
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </th>
                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="center" valign="top" style="background-color: #FFFFFF;">
                                <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                    <tr>
                                        <td align="center" valign="top" style="background-color: #FFFFFF;">
                                            <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                <tr>
                                                    <td align="left" valign="top" class="container ">
                                                        <table cellpadding="0" cellspacing="0" border="0" class="container">
                                                            <tr>
                                                                <td height="60" style="font-size:60px; line-height:60px;">&nbsp;
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="left" valign="top"
                                                                    style="font-family:  Helvetica, Arial, sans-serif;">
                                                                    <p
                                                                        style="Margin: 0;font-size: 20px;line-height: 27px;color:#333333;font-weight: 700; ">
                                                                        Encontrarás
                                                                    </p>
                                                                    <p style="Margin: 0;font-size: 24px;line-height: 24px;">&nbsp;
                                                                    </p>
                                                                    <p
                                                                        style="Margin: 0;font-size: 15px;line-height: 24px;color:#333333;font-weight: 400; ">
                                                                        <img src="https://i.imgur.com/TWIOLHM.png" alt="check" width="20"
                                                                            style="width:100%;max-width:20px !important; vertical-align: middle;">&nbsp;
                                                                        <strong>Conferencias, workshops y casos de éxito</strong> de
                                                                        la mano de speakers internacionales y las empresas que
                                                                        marcan tendencia en el mercado
                                                                    </p>
                                                                    <p style="Margin: 0;font-size: 24px;line-height: 24px;">&nbsp;
                                                                    </p>
                                                                    <p
                                                                        style="Margin: 0;font-size: 15px;line-height: 24px;color:#333333;font-weight: 400; ">
                                                                        <img src="https://i.imgur.com/TWIOLHM.png" alt="check" width="20"
                                                                            style="width:100%;max-width:20px !important; vertical-align: middle;">&nbsp;<strong>Descuentos
                                                                            exclusivos</strong>, para aprovechar al máximo tus
                                                                        plataformas de Marketing preferidas
                                                                    </p>
                                                                    <p style="Margin: 0;font-size: 24px;line-height: 24px;">&nbsp;
                                                                    </p>
                                                                    <p
                                                                        style="Margin: 0;font-size: 15px;line-height: 24px;color:#333333;font-weight: 400; ">
                                                                        <img src="https://i.imgur.com/TWIOLHM.png" alt="check" width="20"
                                                                            style="width:100%;max-width:20px !important; vertical-align: middle;">&nbsp;<strong>Espacios
                                                                            de networking</strong> con profesionales y referentes en
                                                                        la industria
                                                                    </p>
                                                                    <p style="Margin: 0;font-size: 24px;line-height: 24px;">&nbsp;
                                                                    </p>
                                                                    <p
                                                                        style="Margin: 0;font-size: 15px;line-height: 24px;color:#333333;font-weight: 400; ">
                                                                        <img src="https://i.imgur.com/TWIOLHM.png" alt="check" width="20"
                                                                            style="width:100%;max-width:20px !important; vertical-align: middle;">&nbsp;<strong>Y
                                                                            muchas otras sorpresas</strong> que revelaremos más
                                                                        cerca de la fecha
                                                                    </p>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td height="40" style="font-size:40px; line-height:40px;">&nbsp;
                                                                </td>
                                                            </tr>
                                                            <tr class="mobileOn">
                                                                <td align="center" valign="top"
                                                                    style="font-family:  Helvetica, Arial, sans-serif;font-size: 13px;color:#FFFFFF;font-weight: 400;"
                                                                    class="mobile">
                                                                    <!-- Button : BEGIN -->
                                                                    <div>
                                                                        <!--[if mso]> <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://goemms.com/ecommerce?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-email-confirmacion-registro-earlybirds-23&dplrid=' . $encodeEmail . '" style="height:47px;v-text-anchor:middle;width:210px;" arcsize="50%" strokecolor="#008046" strokeweight="1px" fillcolor="#008046" ><w:anchorlock/><center style="color:#ffffff;font-family:sans-serif;font-size:15px;font-weight:bold;">DESCÚBRELOS AQUÍ</center></v:roundrect><![endif]--><!--[if !mso] -->
                                                                        <table cellspacing="0" cellpadding="0" class="mobile">
                                                                            <tr>
                                                                                <td style="border-radius: 99px; background-color: #008046; color: #ffffff; padding: 15px 30px; text-align: center;"
                                                                                    class="button--td mobile-btn">
                                                                                    <a href="http://goemms.com/ecommerce?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-email-confirmacion-registro-earlybirds-23&dplrid=' . $encodeEmail . '"
                                                                                        style="color: #ffffff; font-size:15px; font-weight: bold; font-family:sans-serif; text-decoration: none; width:100%; display:inline-block"
                                                                                        target="_blank"><span>DESCÚBRELOS
                                                                                            AQUÍ</span></a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <!--[endif]-->
                                                                    </div>
                                                                    <!-- Button : END -->
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>


                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="mobileOff">
                        <tr>
                            <td align="center" valign="top" style="background-color: #310E44;">
                                <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                    <tr>
                                        <td height="40" style="font-size:40px; line-height:40px;">&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" class="container" style="background-color: #310E44">
                                            <table width="450" cellpadding="0" cellspacing="0" border="0" class="container">
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif;color:#333333;"
                                                        class="container ">
                                                        <p
                                                            style="Margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 20px;font-weight: 400;color:#FFFFFF;">
                                                            Mientras esperas por la llegada del evento, te esperamos en el
                                                            <strong>EMMS E-commerce 2023</strong> para revivir las mejores conferencias, casos de éxito y entrevistas que tuvimos en la última edición.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family:  Helvetica, Arial, sans-serif;font-size: 13px;color:#FFFFFF;font-weight: 400;"
                                                        class="mobile">
                                                        <!-- Button : BEGIN -->
                                                        <div>
                                                            <!--[if mso]> <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://goemms.com/ecommerce?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-email-confirmacion-registro-earlybirds-23" style="height:47px;v-text-anchor:middle;width:210px;" arcsize="50%" strokecolor="#008046" strokeweight="1px" fillcolor="#008046" ><w:anchorlock/><center style="color:#ffffff;font-family:sans-serif;font-size:15px;font-weight:bold;">SÚMATE AHORA</center></v:roundrect><![endif]--><!--[if !mso] -->
                                                            <table cellspacing="0" cellpadding="0" class="mobile">
                                                                <tr>
                                                                    <td style="border-radius: 99px; background-color: #008046; color: #ffffff; padding: 15px 52px; text-align: center;"
                                                                        class="button--td mobile-btn">
                                                                        <a href="http://goemms.com/ecommerce?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-email-confirmacion-registro-emmsdt-earlybirds-23"
                                                                            style="color: #ffffff; font-size:15px; font-weight: bold; font-family:sans-serif; text-decoration: none; width:100%; display:inline-block"
                                                                            target="_blank"><span>SÚMATE AHORA</span></a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!--[endif]-->
                                                        </div>
                                                        <!-- Button : END -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="50" style="font-size:50px; line-height:50px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif;color:#333333;"
                                                        class="container ">
                                                        <p
                                                            style="Margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 20px;font-weight: 400;color:#FFFFFF;">
                                                            El equipo de Doppler :)
                                                        </p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td height="40" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="mobileOn">
                        <tr>
                            <td align="center" valign="top" style="background-color: #FFFFFF;">
                                <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                    <tr>
                                        <td height="40" style="font-size:40px; line-height:40px;">&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" class="container" style="background-color: #FFFFFF">
                                            <table width="450" cellpadding="0" cellspacing="0" border="0" class="container">
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif;color:#333333;"
                                                        class="container ">
                                                        <p
                                                            style="Margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 13px;line-height: 20px;font-weight: 400;color:#333333;">
                                                            ¡Pronto te comunicaremos todas las novedades!
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top">
                                                        <a href="#" style="cursor: default;"><img src="https://i.imgur.com/C1Co0D9.png"
                                                                alt="imagen separadora" width="21"
                                                                style="width:100%;max-width:21px !important;"
                                                                class="mobile-margin-0 "></a>
                                                    </td>
                                                </tr>
            <tr>
                                                    <td height="40" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif;color:#333333;"
                                                        class="container ">
                                                        <p
                                                            style="Margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 12px;line-height: 20px;font-weight: 400;color:#333333;">
                                                            Capacítate e inspírate en el EMMS Digital Trends 2023 </p>
                                                    </td>
                                                </tr>
            <tr>
                                                    <td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif;color:#333333;"
                                                        class="container ">
                                                        <p
                                                            style="Margin: 0; font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 20px;font-weight: 400;color:#333333;">
                                                            El equipo de Doppler :)
                                                        </p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td height="40" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <!--footer begin-->
                    <table cellpadding="0" cellspacing="0" border="0" width="100%" role="presentation"
                        style="background-color: #EFEFEF;">
                        <tbody>
                            <tr>
                                <td align="center" valign="top" style="background-color: #EFEFEF">
                                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="top" style="background-color: #EFEFEF">
                                                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                        <tbody>
                                                            <tr>
                                                                <td align="left" valign="top"
                                                                    style="border-top: 1px solid #EFEFEF;">

                                                                    <table width="185" border="0" cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="50"
                                                                                    style="font-size:50px; line-height:50px;">
                                                                                    &nbsp;</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="37" align="left">
                                                                                    <a href="https://twitter.com/fromDoppler"
                                                                                        target="_blank"><img
                                                                                            src="https://i.imgur.com/UvfLF0E.png"
                                                                                            style="width: 100%; max-width: 32px !important;"
                                                                                            width="32" class="img"
                                                                                            alt="Twitter"></a>
                                                                                </td>
                                                                                <td width="37" align="left">
                                                                                    <a href="https://www.facebook.com/DopplerEmailMarketing"
                                                                                        target="_blank"><img
                                                                                            src="https://i.imgur.com/0xfikRi.png"
                                                                                            style="width: 100%; max-width: 32px !important;"
                                                                                            width="32" class="img"
                                                                                            alt="Facebook"></a>
                                                                                </td>
                                                                                <td width="37" align="left">
                                                                                    <a href="https://www.linkedin.com/company/228261"
                                                                                        target="_blank"><img
                                                                                            src="https://i.imgur.com/LwTtEZo.png"
                                                                                            style="width: 100%; max-width: 32px !important;"
                                                                                            width="32" class="img"
                                                                                            alt="Linkedin"></a>
                                                                                </td>
                                                                                <td width="37" align="left">
                                                                                    <a href="https://www.youtube.com/user/FromDoppler"
                                                                                        target="_blank"><img
                                                                                            src="https://i.imgur.com/PsCcOJr.png"
                                                                                            style="width: 100%; max-width: 32px !important;"
                                                                                            width="32" class="img"
                                                                                            alt="Youtube"></a>
                                                                                </td>
                                                                                <td width="37" align="left">
                                                                                    <a href="https://www.instagram.com/fromdoppler"
                                                                                        target="_blank"><img
                                                                                            src="https://i.imgur.com/HphAUWD.png"
                                                                                            style="width: 100%; max-width: 32px !important;"
                                                                                            width="32" class="img"
                                                                                            alt="Instagram"></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="25" style="font-size:25px; line-height:25px;">&nbsp;
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <p style="
                                                                            padding: 0;
                                                                            margin: 0;
                                                                            font-family: Helvetica, Arial, sans-serif;
                                                                            font-size: 11px;
                                                                            line-height: 16px;
                                                                            color: #999999;
                                                                            ">
                                                                        ©
                                                                        <a href="https://www.fromdoppler.com" target="_blank"
                                                                            style="text-decoration: none; color: #008046;"
                                                                            class="link-hover ">Doppler
                                                                            LLC</a>. Todos
                                                                        los derechos reservados.
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="20" style="font-size:20px; line-height:20px;">&nbsp;
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" valign="top">
                                                                    <p style="
                                                                    padding: 0;
                                                                    margin: 0;
                                                                    font-family: Helvetica, Arial, sans-serif;
                                                                    font-size: 11px;
                                                                    line-height: 14px;
                                                                    color: #999999;
                                                                    ">
                                                                        Te informamos que los datos personales
                                                                        contenidos en esta comunicación fueron recogidos
                                                                        en nuestro Formulario de registro, cuyo
                                                                        responsable es Doppler LLC, dado que prestaste
                                                                        tu consentimiento para recibir nuestras
                                                                        comunicaciones. Al registrarte como usuario,
                                                                        aceptás y consentís que tus datos sean
                                                                        almacenados por nuestra plataforma, cuyos
                                                                        servidores están en Estados Unidos, para
                                                                        gestionar el envío de las comunicaciones
                                                                        correspondientes. Podrás ejercer tus derechos de
                                                                        acceso, rectificación, limitación y eliminación
                                                                        de los datos escribiendo a
                                                                        <a href="mailto:legal@fromdoppler.com" target="_blank"
                                                                            style="text-decoration: none; color: #008046;"
                                                                            class="link-hover">legal@fromdoppler.com</a>,
                                                                        así como presentar una reclamación ante una
                                                                        autoridad de control. Si no deseás seguir
                                                                        recibiendo nuestras Campañas, podés darte de
                                                                        baja automáticamente haciendo clic en el enlace
                                                                        que se encuentra debajo. Podés consultar
                                                                        información adicional y detallada sobre la
                                                                        protección de tus datos personales en nuestra
                                                                        <a href="https://www.fromdoppler.com/legal/privacidad"
                                                                            target="_blank"
                                                                            style="text-decoration: none; color: #008046; "
                                                                            class="link-hover">Política de
                                                                            Privacidad</a>.
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="20" style="font-size:20px; line-height:20px;">&nbsp;
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </center>
            </body>

            </html>
        ';
        return $html;
    }

    public static function getDigitalTEmailTemplatePRE($encodeEmail)
    {
        $html = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta content="telephone=no" name="format-detection" />
    <title>Doppler</title>
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
        }

        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        table table table {
            table-layout: auto;
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        /* Hover styles for buttons */
        .button--td:hover,
        .button--a:hover {
            background: #026c3c !important;
        }

        .link-hover:hover {
            color: #026c3c !important;
        }

        *[x-apple-data-detectors],
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        th {
            font-weight: normal;
        }

        /* MEDIA QUERIES */
        @media all and (max-width: 480px) {
            .wrapper {
                width: 320px !important;
                padding: 0 !important;
            }

            .container {
                width: 300px !important;
                padding: 0 !important;
            }

            .mobile {
                width: 300px !important;
                display: block !important;
                padding: 0 !important;
            }

            .mobile-btn {
                width: 240px !important;
                display: block !important;
            }

            .mobile-center {
                text-align: center !important;
            }

            .img {
                width: 100% !important;
                height: auto !important;
            }

            .mobileOff {
                width: 0px !important;
                display: none !important;
            }

            .mobileOn {
                display: block !important;
                max-height: none !important;
            }

            .no-background {
                background-image: none !important;
                background-color: #ffffff !important;
            }

            .mobile-pl,
            .mobile-pl-btn,
            u+.body .mobile-pl,
            u+.body .mobile-pl-btn {
                padding-left: 0 !important;
            }

            .mobile-pr,
            .mobile-pr-btn,
            u+.body .mobile-pr,
            u+.body .mobile-pr-btn {
                padding-right: 0 !important;
            }

            .mobile-pt,
            u+.body .mobile-pt {
                padding-top: 20px !important;
            }

            .mobilePadding {
                padding-left: 3% !important;
                padding-right: 3% !important;
            }

            u~div .wrapper {
                width: 100vw !important;
            }
        }
    </style>
    <!--[if gte mso 9]>
      <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG />
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
      </xml>
    <![endif]-->
</head>

<body style="margin: 0; padding: 0">
    <center>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top" style="background-color: #310e44">
                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                        <tr>
                            <td height="30" style="font-size: 30px; line-height: 30px">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <th align="center" valign="middle" width="60" class="mobileOff">
                                            &nbsp;
                                        </th>
                                        <th align="center" valign="middle" width="480" class="mobile mobile-pt">
                                            <a href="#" style="cursor: default"><img
                                                    src="https://i.imgur.com/vduHpou.png" alt="Logo EMMS Digital Trends"
                                                    width="177" style="width: 100%; max-width: 177px !important" /></a>
                                        </th>
                                        <th align="center" valign="middle" width="60" class="mobileOff">
                                            &nbsp;
                                        </th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" style="font-size: 30px; line-height: 30px">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <th align="center" valign="middle" width="60" class="mobileOff">
                                            &nbsp;
                                        </th>
                                        <th align="center" valign="middle" width="480" class="mobile mobile-pt">
                                            <a href="#" style="cursor: default"><img
                                                    src="https://i.imgur.com/ZWuQoI8.png" alt="Cohete" width="65"
                                                    style="width: 100%; max-width: 65px !important" /></a>
                                        </th>
                                        <th align="center" valign="middle" width="60" class="mobileOff">
                                            &nbsp;
                                        </th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" style="font-size: 30px; line-height: 30px">
                                &nbsp;
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top" style="background-color: #310e44">
                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                        <tr>
                            <td align="center" valign="top">
                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <td height="15" style="font-size: 15px; line-height: 15px">
                                            &nbsp;
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center" valign="top" class="mobile" style="
                          font-family: Helvetica, Arial, sans-serif;
                          color: #ffffff;
                        ">
                                            <p style="
                            margin: 0;
                            font-size: 25px;
                            line-height: 27px;
                            font-weight: 700;
                            color: #ffffff;
                            max-width: 391px;
                          " class="mobile-title-fontsize">
                                                ¡Gracias por registrarte!
                                            </p>
                                            <p style="margin: 0; font-size: 25px; line-height: 25px">
                                                &nbsp;
                                            </p>
                                            <p style="
                            margin: 0;
                            font-family: Helvetica, Arial, sans-serif;
                            font-size: 15px;
                            line-height: 25px;
                            font-weight: 700;
                            color: #ffffff;
                            max-width: 560px;
                          ">
                                                Ya eres parte del EMMS Digital Trends.
                                            </p>
                                            <p style="margin: 0; font-size: 20px; line-height: 20px">
                                                &nbsp;
                                            </p>
                                            <p style="
                            margin: 0;
                            font-family: Helvetica, Arial, sans-serif;
                            font-size: 15px;
                            line-height: 25px;
                            font-weight: 400;
                            color: #ffffff;
                            max-width: 560px;
                          ">
                                                Presta atención a tu casilla de Emails para enterarte el minuto a minuto
                                                del evento online de Marketing Digital del año y descubrir a los
                                                ponentes que nos estarán acompañando.
                                            </p>
                                            <p style="margin: 0; font-size: 25px; line-height: 25px">
                                                &nbsp;
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20" style="font-size: 20px; line-height: 20px">
                                            &nbsp;
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #ffffff">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">

                                            <tbody>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 16px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 500;
                                  text-align: center;
                                ">
                                                            ¿Quieres convertirte en Asistente VIP?
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="20" style="font-size: 20px; line-height: 20px">
                                                        &nbsp;
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 16px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 500;
                                  max-width: 560px;
                                  text-align: center;
                                ">
                                                            ¡Lleva tus conocimientos al límite! <a
                                                                href="http://goemms.com/digital-trends?utm_source=fromdoppler&amp;utm_medium=email&dplrid=' . $encodeEmail . '&amp;utm_campaign=et-emmsdt-confirmacion-entrada-invitado-empresa-23#entradas"
                                                                target="_blank" style="
                              text-decoration: none;
                              color: #33ad73;
                              font-weight: 700;
                            " class="link-hover">
                                                                Obtén tu entrada VIP ahora</a> y disfruta también de
                                                            estos espacios:
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td align="left" valign="top" class="container">
                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                            class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <th align="center" valign="top" width="300"
                                                                        class="mobile">
                                                                        <a href="#"
                                                                            style="cursor: default !important"><img
                                                                                src="https://i.imgur.com/x4Wgng0.png"
                                                                                alt="Networking" width="200" style="
                                    width: 100%;
                                    max-width: 200px !important;
                                    margin-bottom: 0;
                                    padding-bottom: 0;
                                    display: block;
                                  "></a>
                                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 15px;
                                ">
                                                                            &nbsp;
                                                                        </p>
                                                                        <p style="
                                  margin: 0;
                                  font-family: Helvetica, Arial, sans-serif;
                                  font-size: 15px;
                                  line-height: 21px;
                                  font-weight: 400;
text-align: left;
max-width: 200px;
                                  color: #333333;
                                ">
                                                                            <strong>Networking</strong> con
                                                                            profesionales y referentes en la industria
                                                                        </p>
                                                                    </th>
                                                                    <th align="center" valign="top" width="300"
                                                                        class="mobile mobile-pt">
                                                                        <a href="#"
                                                                            style="cursor: default !important"><img
                                                                                src="https://i.imgur.com/4j9Gwc1.png"
                                                                                alt="Workshop" width="200" style="
                                    width: 100%;
                                    max-width: 200px !important;
                                    margin-bottom: 0;
                                    padding-bottom: 0;
                                    display: block;
                                  "></a>
                                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 15px;
                                ">
                                                                            &nbsp;
                                                                        </p>
                                                                        <p style="
                                  margin: 0;
                                  font-family: Helvetica, Arial, sans-serif;
                                  font-size: 15px;
                                  line-height: 21px;
                                  font-weight: 400;
text-align: left;
max-width: 200px;
                                  color: #333333;
                                ">
                                                                            <strong>Workshops prácticos</strong> para
                                                                            incorporar herramientas y técnicas
                                                                        </p>
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top" style="
                          font-family: Helvetica, Arial, sans-serif;
                          font-size: 13px;
                          color: #ffffff;
                          font-weight: 400;
                        " class="mobile">
                                                        <!-- Button : BEGIN -->
                                                        <div>
                                                            <!--[if mso]>
                            <v:roundrect
                              xmlns:v="urn:schemas-microsoft-com:vml"
                              xmlns:w="urn:schemas-microsoft-com:office:word"
                              href="https://goemms.com/digital-trends?utm_source=fromdoppler&utm_medium=email&dplrid=' . $encodeEmail . '&utm_campaign=et-confirmacion-registro-free-emmsdt-23#entradas"
                              style="
                                height: 47px;
                                v-text-anchor: middle;
                                width: 215px;
                              "
                              arcsize="50%"
                              strokecolor="#008046"
                              strokeweight="1px"
                              fillcolor="#008046"
                            >
                              <w:anchorlock />
                              <center
                                style="
                                  color: #ffffff;
                                  font-family: sans-serif;
                                  font-size: 15px;
                                  font-weight: bold;
                                "
                              >
                                COMPRA TU ENTRADA
                              </center></v:roundrect
                            ><!
                          [endif]-->
                                                            <!--[if !mso] -->
                                                            <table cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="
                                  border-radius: 99px;
                                  background-color: #008046;
                                  color: #ffffff;
                                  padding: 15px 40px;
                                  text-align: center;
                                " class="button--td mobile-btn">
                                                                            <a href="https://goemms.com/digital-trends?utm_source=fromdoppler&utm_medium=email&dplrid=' . $encodeEmail . '&utm_campaign=et-confirmacion-registro-free-emmsdt-23#entradas"
                                                                                style="
                                    color: #ffffff;
                                    font-size: 15px;
                                    font-weight: bold;
                                    font-family: sans-serif;
                                    text-decoration: none;
                                    width: 100%;
                                    display: inline-block;
                                  " target="_blank"><span>COMPRA TU ENTRADA</span></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!--[endif]-->
                                                        </div>
                                                        <!-- Button : END -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="middle">
                                                        <img src="https://i.imgur.com/rr8jRin.png" alt="Separador"
                                                            width="21" style="width: 100%; max-width: 21px !important">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #ffffff">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">

                                            <tbody>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 16px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 700;
                                  text-align: center;
                                ">
                                                            Conoce algunos de los Workshops del EMMS DT 2023
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td align="left" valign="top" class="container">
                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                            class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <th align="center" valign="top" width="320"
                                                                        class="mobile">
                                                                        <a href="#"
                                                                            style="cursor: default !important"><img
                                                                                src="https://i.imgur.com/nfyY8Lw.png"
                                                                                alt="Imagen Workshop" width="272" style="
                                    width: 100%;
                                    max-width: 272px !important;
                                    margin-bottom: 0;
                                    padding-bottom: 0;
                                    display: block;
                                  "></a>
                                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 15px;
                                ">
                                                                            &nbsp;
                                                                        </p>
                                                                    </th>
                                                                    <th align="center" valign="top" width="280"
                                                                        class="mobile mobile-pt">
                                                                        <a href="#"
                                                                            style="cursor: default !important"><img
                                                                                src="https://i.imgur.com/cl75hK9.png"
                                                                                alt="Imagen Workshop" width="272" style="
                                    width: 100%;
                                    max-width: 272px !important;
                                    margin-bottom: 0;
                                    padding-bottom: 0;
                                    display: block;
                                  "></a>
                                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 15px;
                                ">
                                                                            &nbsp;
                                                                        </p>
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="20" style="font-size: 20px; line-height: 20px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" class="container">
                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                            class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <th align="center" valign="top" width="320"
                                                                        class="mobile">
                                                                        <a href="#"
                                                                            style="cursor: default !important"><img
                                                                                src="https://i.imgur.com/LctmaEv.png"
                                                                                alt="Imagen Workshop" width="272" style="
                                    width: 100%;
                                    max-width: 272px !important;
                                    margin-bottom: 0;
                                    padding-bottom: 0;
                                    display: block;
                                  "></a>
                                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 15px;
                                ">
                                                                            &nbsp;
                                                                        </p>
                                                                    </th>
                                                                    <th align="center" valign="top" width="280"
                                                                        class="mobile mobile-pt">
                                                                        <a href="#"
                                                                            style="cursor: default !important"><img
                                                                                src="https://i.imgur.com/Nsx6D7z.png"
                                                                                alt="Imagen Workshop" width="272" style="
                                    width: 100%;
                                    max-width: 272px !important;
                                    margin-bottom: 0;
                                    padding-bottom: 0;
                                    display: block;
                                  "></a>
                                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 15px;
                                ">
                                                                            &nbsp;
                                                                        </p>
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle">
                                        <img src="https://i.imgur.com/r5Ku8lJ.png" alt="Imagen Workshop" width="272"
                                            style="width: 100%; max-width: 272px !important">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="35" style="font-size: 35px; line-height: 35px">
                                        &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top" style="
                          font-family: Helvetica, Arial, sans-serif;
                          font-size: 13px;
                          color: #ffffff;
                          font-weight: 400;
                        " class="mobile">
                                                        <!-- Button : BEGIN -->
                                                        <div>
                                                            <!--[if mso]>
                            <v:roundrect
                              xmlns:v="urn:schemas-microsoft-com:vml"
                              xmlns:w="urn:schemas-microsoft-com:office:word"
                              href="https://goemms.com/digital-trends?utm_source=fromdoppler&utm_medium=email&dplrid=' . $encodeEmail . '&utm_campaign=et-confirmacion-registro-free-emmsdt-23#entradas"
                              style="
                                height: 47px;
                                v-text-anchor: middle;
                                width: 215px;
                              "
                              arcsize="50%"
                              strokecolor="#008046"
                              strokeweight="1px"
                              fillcolor="#008046"
                            >
                              <w:anchorlock />
                              <center
                                style="
                                  color: #ffffff;
                                  font-family: sans-serif;
                                  font-size: 15px;
                                  font-weight: bold;
                                "
                              >
                                ACCEDE CON TU ENTRADA VIP
                              </center></v:roundrect
                            ><!
                          [endif]-->
                                                            <!--[if !mso] -->
                                                            <table cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="
                                  border-radius: 99px;
                                  background-color: #008046;
                                  color: #ffffff;
                                  padding: 15px 35px;
                                  text-align: center;
                                " class="button--td mobile-btn">
                                                                            <a href="https://goemms.com/digital-trends?utm_source=fromdoppler&utm_medium=email&dplrid=' . $encodeEmail . '&utm_campaign=et-confirmacion-registro-free-emmsdt-23#entradas"
                                                                                style="
                                    color: #ffffff;
                                    font-size: 15px;
                                    font-weight: bold;
                                    font-family: sans-serif;
                                    text-decoration: none;
                                    width: 100%;
                                    display: inline-block;
                                  " target="_blank"><span>ACCEDE CON TU ENTRADA VIP</span></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!--[endif]-->
                                                        </div>
                                                        <!-- Button : END -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" class="container" style="background-color: #ffffff">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="top" class="container"
                                                        style="background-color: #ffffff">
                                                        <table width="600" cellpadding="0" cellspacing="0" border="0"
                                                            class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="60"
                                                                        style="font-size: 60px; line-height: 60px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="middle">
                                                                        <img src="https://i.imgur.com/rr8jRin.png"
                                                                            alt="Separador" width="21"
                                                                            style="width: 100%; max-width: 21px !important">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20"
                                                                        style="font-size: 20px; line-height: 20px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #ffffff">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 16px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 700;
                                  text-align: center;
                                ">
                                                            El equipo de Doppler :)
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10" style="font-size: 10px; line-height: 10px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="50" style="font-size: 50px; line-height: 50px">
                                        &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        <!--footer begin-->
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #EFEFEF">
                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #EFEFEF">
                                        <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="top">
                                                        <table width="555" cellpadding="0" cellspacing="0" border="0"
                                                            class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="50"
                                                                        style="font-size: 50px; line-height: 50px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <table width="185" border="0" cellpadding="0"
                                                                            cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://twitter.com/fromDoppler"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/twitter-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Twitter" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.facebook.com/DopplerEmailMarketing"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/facebook-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Facebook" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.linkedin.com/company/228261"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/linkedin-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Linkedin" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.youtube.com/user/FromDoppler"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/youtube-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Youtube" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.instagram.com/fromdoppler"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/instagram-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Instagram" /></a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="padding: 25px 0 0">
                                                                        <p style="
                                          padding: 0;
                                          margin: 0;
                                          font-family: proxima-nova, Arial,
                                            sans-serif !important;
                                          font-size: 11px;
                                          line-height: 16px;
                                          color: #666666;
                                        ">
                                                                            © 2023
                                                                            <a href="http://fromdoppler.com/?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-asistente-free-23"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: normal;
                                            text-decoration: none;
                                          " class="link">Doppler LLC</a>. Todos los derechos reservados.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20"
                                                                        style="font-size: 20px; line-height: 20px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <p style="
                                          padding: 0;
                                          margin: 0;
                                          font-family: proxima-nova, Arial,
                                            sans-serif !important;
                                          font-size: 11px;
                                          line-height: 16px;
                                          color: #666666;
                                        ">
                                                                            Te informamos que los datos personales
                                                                            contenidos en esta comunicación fueron
                                                                            recogidos en nuestro Formulario de
                                                                            registro, cuyo responsable es Doppler
                                                                            LLC, dado que prestaste tu
                                                                            consentimiento para recibir nuestras
                                                                            comunicaciones. Al registrarte como
                                                                            usuario, aceptás y consentís que tus
                                                                            datos sean almacenados por nuestra
                                                                            plataforma, cuyos servidores están en
                                                                            Estados Unidos, para gestionar el envío
                                                                            de las comunicaciones correspondientes.
                                                                            Podrás ejercer tus derechos de acceso,
                                                                            rectificación, limitación y eliminación
                                                                            de los datos escribiendo a
                                                                            <a href="mailto:legal@fromdoppler.com"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: normal;
                                            text-decoration: none;
                                          " class="link">legal@fromdoppler.com</a>, así como presentar una reclamación
                                                                            ante una autoridad de control. Si no
                                                                            deseás seguir recibiendo nuestras
                                                                            Campañas, podés darte de baja
                                                                            automáticamente haciendo clic en el
                                                                            enlace que se encuentra debajo. Podés
                                                                            consultar información adicional y
                                                                            detallada sobre la protección de tus
                                                                            datos personales en nuestra
                                                                            <a href="https://www.fromdoppler.com/legal/privacidad/"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: normal;
                                            text-decoration: none;
                                          " class="link">Política de Privacidad</a>.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="50"
                                                                        style="font-size: 50px; line-height: 50px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="top">
                                                                        <p style="
                                          padding: 0;
                                          margin: 0;
                                          font-family: proxima-nova, Arial,
                                            sans-serif !important;
                                          font-size: 12px;
                                          line-height: 16px;
                                          color: #666666;
                                        ">
                                                                            Este email fue enviado por
                                                                            <a href="http://goemms.com/?utm_source=fromdoppler&amp;utm_medium=email&dplrid=' . $encodeEmail . '&amp;utm_campaign=et-confirmacion-registro-free-emmsdt-23#entradas"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: bold;
                                            text-decoration: none;
                                          " class="link">EMMS</a>, un evento creado por
                                                                            <a href="http://fromdoppler.com/?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-asistente-free-23"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: bold;
                                            text-decoration: none;
                                          " class="link">Doppler</a>.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="40"
                                                                        style="font-size: 40px; line-height: 40px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>

</html>

        ';
        return $html;
    }

    //TODO: Cambiar funcion con la maqueta correspondiente
    public static function getDigitalTEmailTemplate($encodeEmail)
    {

        $html = '
            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
                <html lang="es">

                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="x-apple-disable-message-reformatting">
                    <title>EMMS</title>
                    <style>
                        html,
                        body {
                            margin: 0 auto !important;
                            padding: 0 !important;
                            background-color: #ffffff;
                        }

                        * {
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                        }

                        div[style*="margin: 16px 0"] {
                            margin: 0 !important;
                        }

                        table,
                        td {
                            mso-table-lspace: 0pt !important;
                            mso-table-rspace: 0pt !important;
                            border-collapse: separate !important;
                            border-spacing: 0 !important;
                        }

                        table {
                            table-layout: auto;
                            mso-table-lspace: 0pt !important;
                            mso-table-rspace: 0pt !important;
                            border-collapse: separate !important;
                            border-spacing: 0 !important;
                            border: none !important;
                            border-color: transparent !important;
                        }

                        img {
                            -ms-interpolation-mode: bicubic;
                            border: 0;
                            height: auto;
                            line-height: 100%;
                            outline: none;
                            text-decoration: none;
                        }

                        /* Hover styles for buttons */
                        .button--td:hover,
                        .button--a:hover {
                            background: #035A33 !important;
                        }

                        .link-hover:hover {
                            color: #035A33 !important;
                        }

                        *[x-apple-data-detectors],
                        .x-gmail-data-detectors,
                        .x-gmail-data-detectors *,
                        .aBn {
                            border-bottom: 0 !important;
                            cursor: default !important;
                            color: inherit !important;
                            text-decoration: none !important;
                            font-size: inherit !important;
                            font-family: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                        }

                        th {
                            font-weight: normal;
                        }

                        .mobileOn {
                            display: none !important;
                            max-height: none !important;
                        }

                        /* MEDIA QUERIES */
                        @media all and (max-width:480px) {
                            .wrapper {
                                width: 320px !important;
                                padding: 0 !important;
                            }

                            .container {
                                width: 300px !important;
                                padding: 0 !important;
                            }

                            .margin-mb-auto{
                                margin: 0 auto;
                            }

                            .mobile {
                                width: 300px !important;
                                display: block !important;
                                padding: 0 !important;
                            }

                            .img {
                                width: 100% !important;
                                height: auto !important;
                            }

                            .mobileOff {
                                width: 0px !important;
                                display: none !important;
                            }

                            .mobileOn {
                                display: block !important;
                                max-height: none !important;
                            }

                            .mobile-pl,
                            .mobile-pl-btn,
                            u+.body .mobile-pl,
                            u+.body .mobile-pl-btn {
                                padding-left: 14px !important;
                            }

                            .mobile-pl-20,
                            .mobile-pl-20-btn,
                            u+.body .mobile-pl-20,
                            u+.body .mobile-pl-20-btn {
                                padding-left: 20px !important;
                            }

                            .mobile-pt,
                            u+.body .mobile-pt {
                                padding-top: 20px !important;
                            }

                            .mobile-pr,
                            u+.body .mobile-pr {
                                padding-right: 0px !important;
                            }

                            .mobile-margin-0,
                            u+.body .mobile-margin-0 {
                                margin: 0px !important;
                            }

                            .mobilePadding {
                                padding-left: 3% !important;
                                padding-right: 3% !important;
                                width: 100% !important;
                            }

                            u~div .wrapper {
                                width: 100vw !important;
                            }

                            .mobile-center,
                            u+.body .mobile-center {
                                text-align: center !important;
                            }

                            .button-width{
                                padding: 16px 60px !important;
                            }

                        }
                    </style>
                    <!--[if gte mso 9]>
                    <xml>
                        <o:OfficeDocumentSettings>
                        <o:AllowPNG/>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                        </o:OfficeDocumentSettings>
                    </xml>
                    <![endif]-->

                    <!--[if (gte mso 9)|(IE)]>
                    <style type="text/css">
                    table {
                    border-collapse: collapse;
                    border-spacing: 0;
                    mso-table-lspace: 0pt !important;
                    mso-table-rspace: 0pt !important; }
                    </style>
                    <![endif]-->
                </head>

                <body style="margin:0; padding:0;">
                    <span
                            class="preheader"
                            style="
                                display: none !important;
                                visibility: hidden;
                                opacity: 0;
                                color: transparent;
                                height: 0;
                                width: 0;
                            "
                            >Ya reservaste tu cupo en el evento más esperado, ¡esta vez sobre E-commerce!
                            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                    </span>
                    <center>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #310E44; border-spacing: 0px !important; border: none;">
                            <tbody><tr>
                                <td align="center" valign="top" style="background-color: #310E44; border-spacing: 0px !important;">
                                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" style="border-spacing: 0px !important; border: none;">
                                        <tbody><tr>
                                            <td align="right" valign="top" style="background-color: #310E44">
                                                <table width="620" cellpadding="0" cellspacing="0" border="0" class="container">
                                                    <tbody>
                                                        <tr>
                    <th width="250" class="mobile" align="left" valign="top">
                    <a href="#" style="cursor: default;"><img src="https://i.imgur.com/4UafpYj.png" alt="Logo de EMMS" width="242"
                                                                        style="width:100%;max-width:242px !important;padding-top: 66px;"></a>
                        </th>
                                                                <th width="350" class="mobileOff" align="right" valign="top">
                                                                    <a href="#" style="cursor: default;"><img src="https://i.imgur.com/H28UgCi.png" alt="Imagen de textura separadora" width="315" style="margin-left: 84px;width:100%;max-width:315px !important; vertical-align: top !important;margin-top: -8px;" class="mobile-pr"></a>
                                                                </th>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                            <!-- <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation"
                                style="background-color: #310E44; border-spacing: 0px !important; border: none;">
                                <tr>
                                    <td align="center" valign="top" style="background-color: #310E44">
                                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper"
                                            style="border-spacing: 0px !important; border: none;">
                                            <tr>
                                                <td align="center" valign="top" style="border: none; background-color: #310E44;">
                                                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="container"
                                                        style="border-spacing: 0px !important; border: none; border-color: transparent;">
                                                        <tr>
                                                            <td height="50" style="font-size:50px; line-height:50px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" style="border-spacing: 0px !important;" class="mobile-margin-0">
                                                                <a href="#" style="cursor: default;"><img src="https://i.imgur.com/4UafpYj.png" alt="Logo de EMMS" width="242"
                                                                        style="width:100%;max-width:242px !important;"></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table> -->

                            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation"
                                style="background-color: #310E44;">
                                <tr>
                                    <td align="center" valign="top" style="background-color:#310E44">
                                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tr>
                                                <td align="center" valign="top" style="background-color: #310E44">
                                                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                        <tr>
                                                            <td height="25" style="font-size:25px; line-height:25px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" style="font-family:  Helvetica, Arial, sans-serif;">
                                                                <h2 style="Margin: 0;font-size: 25px;line-height: 35px;color:#FFFFFF;font-weight: 700; ">
                                                                    ¡Gracias por registrarte!
                                                                </h2>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="21" style="font-size:21px; line-height:21px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" style="font-family:  Helvetica, Arial, sans-serif;">
                                                                <p
                                                                    style="Margin: 0;font-size: 15px;line-height: 21px;color:#FFFFFF;font-weight: 400; max-width: 560px;">
                                                                    En breve te estaremos informando más detalles sobre la <strong>agenda del evento</strong> y todo lo que se trae esta nueva edición.
                                                                </p>
                                                                <p style="margin: 0; font-size: 21px; line-height: 21px;">&nbsp;</p>
                                                                <p
                                                                    style="Margin: 0;font-size: 15px;line-height: 21px;color:#FFFFFF;font-weight: 400; max-width: 550px;">
                                                                    Además, por ser parte de la comunidad EMMS, recibirás:
                                                                </p>
                                                                <p style="margin: 0; font-size: 21px; line-height: 21px;">&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th align="left" valign="middle" class="mobile">
                                                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                                    <tr>
                                                                        <th width="40" align="center" valign="top" >
                                                                            <p
                                                                                style="font-family:  Helvetica, Arial, sans-serif;font-weight: 400; font-size: 15px;line-height: 21px;color:#FFFFFF; Margin: 0">
                                                                                <img src="https://i.imgur.com/9tZ2xSO.png" alt="Emoji pin" width="19"
                                                                                    style="width:100%;max-width:19px !important; vertical-align: top;padding-top: 3px;">
                                                                            </p>
                                                                        </th>
                                                                        <th width="560" align="left" valign="top" >
                                                                            <p
                                                                                style="font-family:  Helvetica, Arial, sans-serif;font-weight: 500; font-size: 15px;line-height: 21px;color:#FFFFFF; Margin: 0;" class="mobile-pl">
                                                                                Herramientas para optimizar tu E-commerce
                                                                            </p>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="21" style="font-size:21px; line-height:21px;">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="40" align="center" valign="top" >
                                                                            <p
                                                                                style="font-family:  Helvetica, Arial, sans-serif;font-weight: 400; font-size: 15px;line-height: 21px;color:#FFFFFF; Margin: 0">
                                                                                <img src="https://i.imgur.com/9tZ2xSO.png" alt="Emoji pin" width="19"
                                                                                    style="width:100%;max-width:19px !important; vertical-align: top;padding-top: 3px;">
                                                                            </p>
                                                                        </th>
                                                                        <th width="560" align="left" valign="top" >
                                                                            <p
                                                                                style="font-family:  Helvetica, Arial, sans-serif;font-weight: 500; font-size: 15px;line-height: 21px;color:#FFFFFF; Margin: 0;" class="mobile-pl">
                                                                                Invitaciones a capacitaciones y eventos totalmente gratuitos para que <br> comiences a prepararte
                                                                            </p>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="21" style="font-size:21px; line-height:21px;">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="40" align="center" valign="top" >
                                                                            <p
                                                                                style="font-family:  Helvetica, Arial, sans-serif;font-weight: 400; font-size: 15px;line-height: 21px;color:#FFFFFF; Margin: 0">
                                                                                <img src="https://i.imgur.com/9tZ2xSO.png" alt="Emoji pin" width="19"
                                                                                    style="width:100%;max-width:19px !important; vertical-align: top;padding-top: 3px;">
                                                                            </p>
                                                                        </th>
                                                                        <th width="560" align="left" valign="top" >
                                                                            <p
                                                                                style="font-family:  Helvetica, Arial, sans-serif;font-weight: 500; font-size: 15px;line-height: 21px;color:#FFFFFF; Margin: 0;" class="mobile-pl">
                                                                                ¡Y mucho más!
                                                                            </p>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" style="font-family:  Helvetica, Arial, sans-serif;">
                                                                <p style="margin: 0; font-size: 21px; line-height: 21px;">&nbsp;</p>
                                                                <p
                                                                    style="Margin: 0;font-size: 14px;line-height: 19px;color:#FFFFFF;font-weight: 400; max-width: 560px;" class="mobile-center">
                                                                    ¡Agrega el evento a tu calendario para guardar la fecha y no perderlo de vista!
                                                                </p>
                                                                <p style="margin: 0; font-size: 21px; line-height: 21px;">&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="21" style="font-size:21px; line-height:21px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" style="font-family:  Helvetica, Arial, sans-serif;">
                                                                <!-- Button : BEGIN -->
                                                                <div style="font-size:13px; font-weight: bold; font-family: Helvetica, Arial, sans-serif;">
                                                                    <!--[if mso]>
                                                                                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://www.addevent.com/event/Cv16292107" style="height:41px;v-text-anchor:middle;width:166px;" arcsize="50%" strokecolor="#008046" strokeweight="1px" fillcolor="#008046" >
                                                                                                        <w:anchorlock/>
                                                                                                        <center style="color:#ffffff;font-family:sans-serif;font-size:13px;font-weight:bold;">
                                                                                                            SÚMALO A TU CALENDARIO
                                                                                                        </center>
                                                                                                        </v:roundrect>
                                                                                                        <![endif]-->
                                                                    <!--[if !mso] -->
                                                                    <table cellspacing="0" cellpadding="0" class="margin-mb-auto">
                                                                        <tr>
                                                                            <td
                                                                                style="border-radius: 99px; background-color: #008046; color: #ffffff; padding: 13px 26px; text-align: center;"
                                                                                class="button--td button-width">
                                                                                <a href="https://www.addevent.com/event/Cv16292107"
                                                                                    style="color: #ffffff; font-size:13px; font-weight: bold; font-family:sans-serif; text-decoration: none; width:100%; display:inline-block"
                                                                                    target="_blank"><span>SÚMALO A TU CALENDARIO</span></a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <!--[endif]-->
                                                                </div>
                                                                <!-- Button : END -->
                                                            </td>
                                                        </tr>
                    <tr>
                                                            <td height="65" style="font-size:65px; line-height:65px;">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #FFFFFF;">
                                <tbody><tr>
                                    <td align="center" valign="top" style="background-color: #FFFFFF;">
                                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tbody><tr>
                                                <td align="center" valign="top" style="background-color: #FFFFFF;">
                                                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                        <tbody><tr>
                                                            <td height="40" style="font-size:40px; line-height:40px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" style="font-family:  Helvetica, Arial, sans-serif;" class="mobile-center">
                                                                <p style="margin: 0; line-height: 21px; font-size: 21px;">&nbsp;</p>
                                                                <p style="Margin: 0;font-size: 14px;line-height: 19px;color:#333333;font-weight: 400;">
                                                                    Mientras esperas la llegada del evento, descubre en la página web las Conferencias que te esperan en el
                                                                    <a href="https://goemms.com/ecommerce-registrado?utm_source=emmsecom&utm_medium=goemms&utm_campaign=et-email-confirmacionregistro-emmsecom-23&dplrid=' . $encodeEmail . '" target="_blank" style="text-decoration: none; color: #008046;font-weight: bold;" class="link-hover ">EMMS E-commerce 2023</a>.
                                                                </p>
                    <p height="10" style="font-size:10px; line-height:10px;" >&nbsp;</p>
                    <p style="Margin: 0;font-size: 14px;line-height: 19px;color:#333333;font-weight: 400;">
                                                                Entérate primero del Contenido Exclusivo que nuestros aliados están preparando para ti y empieza a capacitarte.
                    </p>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                        </tbody></table>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #FFFFFF;">
                            <tr>
                                <td align="center" valign="top" style="background-color: #FFFFFF;">
                                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                        <tr>
                                            <td align="center" valign="top" style="background-color: #FFFFFF;">
                                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                    <tr>
                                                        <td height="70" style="font-size:70px; line-height:70px;">&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <table cellpadding="0" cellspacing="0" border="0" width="100%" role="presentation"
                            style="background-color: #EFEFEF;">
                            <tr>
                                <td align="center" valign="top" style="background-color: #EFEFEF">
                                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                        <tr>
                                            <td align="center" valign="top" style="background-color: #EFEFEF">
                                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                    <tr>
                                                        <td align="left" valign="top" style="border-top: 1px solid #EFEFEF;">

                                                            <table width="185" border="0" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td height="50" style="font-size:50px; line-height:50px;">
                                                                            &nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="37" align="left">
                                                                            <a href="https://twitter.com/fromDoppler" target="_blank"><img src="https://i.imgur.com/UvfLF0E.png"
                                                                                    style="width: 100%; max-width: 32px !important;" width="32" class="img"
                                                                                    alt="Twitter" /></a>
                                                                        </td>
                                                                        <td width="37" align="left">
                                                                            <a href="https://www.facebook.com/DopplerEmailMarketing" target="_blank"><img
                                                                                    src="https://i.imgur.com/0xfikRi.png" style="width: 100%; max-width: 32px !important;" width="32"
                                                                                    class="img" alt="Facebook" /></a>
                                                                        </td>
                                                                        <td width="37" align="left">
                                                                            <a href="https://www.linkedin.com/company/228261" target="_blank"><img
                                                                                    src="https://i.imgur.com/LwTtEZo.png" style="width: 100%; max-width: 32px !important;" width="32"
                                                                                    class="img" alt="Linkedin" /></a>
                                                                        </td>
                                                                        <td width="37" align="left">
                                                                            <a href="https://www.youtube.com/user/FromDoppler" target="_blank"><img
                                                                                    src="https://i.imgur.com/PsCcOJr.png" style="width: 100%; max-width: 32px !important;" width="32"
                                                                                    class="img" alt="Youtube" /></a>
                                                                        </td>
                                                                        <td width="37" align="left">
                                                                            <a href="https://www.instagram.com/fromdoppler" target="_blank"><img
                                                                                    src="https://i.imgur.com/HphAUWD.png" style="width: 100%; max-width: 32px !important;" width="32"
                                                                                    class="img" alt="Instagram" /></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="25" style="font-size:25px; line-height:25px;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left">
                                                            <p style="
                                                                                padding: 0;
                                                                                margin: 0;
                                                                                font-family: Helvetica, Arial, sans-serif;
                                                                                font-size: 11px;
                                                                                line-height: 16px;
                                                                                color: #999999;
                                                                                ">
                                                                &copy;
                                                                <a href="https://www.fromdoppler.com" target="_blank"
                                                                    style="text-decoration: none; color: #008046;" class="link-hover ">Doppler
                                                                    LLC</a>. Todos
                                                                los derechos reservados.
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top">
                                                            <p style="
                                                                        padding: 0;
                                                                        margin: 0;
                                                                        font-family: Helvetica, Arial, sans-serif;
                                                                        font-size: 11px;
                                                                        line-height: 14px;
                                                                        color: #999999;
                                                                        ">
                                                                Te informamos que los datos personales
                                                                contenidos en esta comunicaci&oacute;n fueron recogidos
                                                                en nuestro Formulario de registro, cuyo
                                                                responsable es Doppler LLC, dado que prestaste
                                                                tu consentimiento para recibir nuestras
                                                                comunicaciones. Al registrarte como usuario,
                                                                acept&aacute;s y consent&iacute;s que tus datos sean
                                                                almacenados por nuestra plataforma, cuyos
                                                                servidores est&aacute;n en Estados Unidos, para
                                                                gestionar el env&iacute;o de las comunicaciones
                                                                correspondientes. Podr&aacute;s ejercer tus derechos de
                                                                acceso, rectificaci&oacute;n, limitaci&oacute;n y eliminaci&oacute;n
                                                                de los datos escribiendo a
                                                                <a href="mailto:legal@fromdoppler.com" target="_blank"
                                                                    style="text-decoration: none; color: #008046;"
                                                                    class="link-hover">legal@fromdoppler.com</a>,
                                                                as&iacute; como presentar una reclamaci&oacute;n ante una
                                                                autoridad de control. Si no dese&aacute;s seguir
                                                                recibiendo nuestras Campa&ntilde;as, pod&eacute;s darte de
                                                                baja autom&aacute;ticamente haciendo clic en el enlace
                                                                que se encuentra debajo. Pod&eacute;s consultar
                                                                informaci&oacute;n adicional y detallada sobre la
                                                                protecci&oacute;n de tus datos personales en nuestra
                                                                <a href="https://www.fromdoppler.com/legal/privacidad" target="_blank"
                                                                    style="text-decoration: none; color: #008046; "
                                                                    class="link-hover">Pol&iacute;tica de
                                                                    Privacidad</a>.
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </center>
                </body>

                </html>

        ';

        return $html;
    }

    //TEMPLATES DE WIX
    public static function getWixEmpresaTemplate($encodeEmail,  $user)
    {
        $type = $user['paidplan_title'];
        $paymentMethod = $user['paidplan_paymentmethod'];
        $date = $user['paidplan_startdate'];
        $amount = $user['paidplan_price'];
        $html = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta content="telephone=no" name="format-detection" />
    <title>Doppler</title>
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
        }

        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        table table table {
            table-layout: auto;
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        /* Hover styles for buttons */
        .button--td:hover,
        .button--a:hover {
            background: #026c3c !important;
        }

        .link-hover:hover {
            color: #026c3c !important;
        }

        *[x-apple-data-detectors],
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        th {
            font-weight: normal;
        }

        /* MEDIA QUERIES */
        @media all and (max-width: 480px) {
            .wrapper {
                width: 320px !important;
                padding: 0 !important;
            }

            .container {
                width: 300px !important;
                padding: 0 !important;
            }

            .mobile {
                width: 300px !important;
                display: block !important;
                padding: 0 !important;
            }

            .mobile-btn {
                width: 240px !important;
                display: block !important;
            }

            .mobile-center {
                text-align: center !important;
            }

            .img {
                width: 100% !important;
                height: auto !important;
            }

            .mobileOff {
                width: 0px !important;
                display: none !important;
            }

            .mobileOn {
                display: block !important;
                max-height: none !important;
            }

            .no-background {
                background-image: none !important;
                background-color: #ffffff !important;
            }

            .mobile-pl,
            .mobile-pl-btn,
            u+.body .mobile-pl,
            u+.body .mobile-pl-btn {
                padding-left: 0 !important;
            }

            .mobile-pr,
            .mobile-pr-btn,
            u+.body .mobile-pr,
            u+.body .mobile-pr-btn {
                padding-right: 0 !important;
            }

            .mobile-pt,
            u+.body .mobile-pt {
                padding-top: 20px !important;
            }

            .mobilePadding {
                padding-left: 3% !important;
                padding-right: 3% !important;
            }

            u~div .wrapper {
                width: 100vw !important;
            }
        }
    </style>
    <!--[if gte mso 9]>
      <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG />
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
      </xml>
    <![endif]-->
</head>

<body style="margin: 0; padding: 0">
    <center>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top" style="background-color: #310e44">
                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                        <tr>
                            <td height="30" style="font-size: 30px; line-height: 30px">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <th align="center" valign="middle" width="60" class="mobileOff">
                                            &nbsp;
                                        </th>
                                        <th align="center" valign="middle" width="480" class="mobile mobile-pt">
                                            <a href="#" style="cursor: default"><img
                                                    src="https://i.imgur.com/xYS5gM3.png" alt="Logo EMMS Digital Trends"
                                                    width="177" style="width: 100%; max-width: 177px !important" /></a>
                                        </th>
                                        <th align="center" valign="middle" width="60" class="mobileOff">
                                            &nbsp;
                                        </th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" style="font-size: 30px; line-height: 30px">
                                &nbsp;
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top" style="background-color: #310e44">
                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                        <tr>
                            <td align="center" valign="top">
                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <td height="15" style="font-size: 15px; line-height: 15px">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="middle" width="200" class="mobile">
                                            <a href="#" target="_blank"><img src="https://i.imgur.com/zWGDO6M.png"
                                                    alt="Emoji de confites" width="81"
                                                    style="width: 100%; max-width: 81px !important" /></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20" style="font-size: 20px; line-height: 20px">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" class="mobile" style="
                          font-family: Helvetica, Arial, sans-serif;
                          color: #ffffff;
                        ">
                                            <p style="
                            margin: 0;
                            font-size: 25px;
                            line-height: 31px;
                            font-weight: 700;
                            color: #ffffff;
                            max-width: 580px;
                          " class="mobile-title-fontsize">
                                                Has comprado tu entrada con éxito
                                            </p>
                                            <p style="margin: 0; font-size: 25px; line-height: 25px">
                                                &nbsp;
                                            </p>
                                            <p style="
                            margin: 0;
                            font-family: Helvetica, Arial, sans-serif;
                            font-size: 15px;
                            line-height: 25px;
                            font-weight: 400;
                            color: #ffffff;
                            max-width: 560px;
                          ">
                                                ¡Felicitaciones! Ya eres parte del <strong>EMMS Digital Trends
                                                    2023</strong> y podrás disfrutar de todo el contenido exclusivo
                                                para <strong>Asistentes VIP</strong>.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20" style="font-size: 20px; line-height: 20px">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="middle"
                                            style="font-family: Helvetica, Arial, sans-serif">
                                            <p class="mobile-center" style="
                            font-family: Helvetica;
                            font-size: 15px;
                            font-weight: 400;
                            line-height: 21px;
                            letter-spacing: 0px;
                            text-align: center;

                            color: #ffffff;
                            margin: 0;
                          ">
                                                <img src="https://i.imgur.com/JYbP4My.png" alt="Emoji microfono"
                                                    width="13" style="
                              width: 100%;
                              max-width: 13px !important;
                              vertical-align: middle;
                            " />&nbsp;&nbsp;Conferencias&nbsp;&nbsp;
                                                <span style="text-align: center"><img
                                                        src="https://i.imgur.com/hptTjNe.png" alt="Emoji libros"
                                                        width="23" style="
                                width: 100%;
                                max-width: 23px !important;
                                vertical-align: middle;
                              " />&nbsp;&nbsp;Recursos&nbsp;&nbsp;</span>
                                                <span><img src="https://i.imgur.com/ipiXcuR.png" alt="Emoji workshop"
                                                        width="21" style="
                                width: 100%;
                                max-width: 21px !important;
                                vertical-align: middle;
                              " />&nbsp;&nbsp;Workshops&nbsp;&nbsp;</span>
                                                <span><img src="https://i.imgur.com/ca6ZSOj.png" alt="Emoji networking"
                                                        width="20" style="
                                width: 100%;
                                max-width: 20px !important;
                                vertical-align: middle;
                              " />&nbsp;&nbsp;Networking&nbsp;&nbsp;</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="30" style="font-size: 30px; line-height: 30px">
                                            &nbsp;
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 16px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 570px;
                                  text-align: left;
                                ">
                                                            Te hemos enviado un
                                                            <strong>Email para establecer la contraseña de la cuenta con
                                                                la que accederás al contenido VIP.</strong>
                                                            Una vez confirmada, inicia sesión y ¡listo! Llegada la
                                                            fecha, <a
                                                                href="https://www.digital-trends.goemms.com/?utm_medium=email&utm_source=fromdoppler&utm_campaign=et-emmsdt-confirmacion-compra-entrada-packempresa-23"
                                                                target="_blank" style="
                                    text-decoration: none;
                                    color: #33ad73;
                                    font-weight: 700;
                                  " class="link-hover">
                                                                aquí</a>
                                                            encontrarás los enlaces de ingreso a estos espacios.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 16px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 570px;
                                  text-align: left;
                                ">
                                                            Además, descubre la agenda y todo lo que
                                                            aprenderás durante estos cuatro días de
                                                            capacitación en el
                                                            <a href="http://goemms.com/digital-trends?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-compra-entrada-packempresa-23#agenda&dplrid=' . $encodeEmail . '"
                                                                target="_blank" style="
                                    text-decoration: none;
                                    color: #33ad73;
                                    font-weight: 700;
                                  " class="link-hover">
                                                                sitio web del evento</a>.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top">
                                                        <a href="#" style="cursor: default"><img
                                                                src="https://i.imgur.com/22FXDPO.png"
                                                                alt="imagen separadora" width="21" style="
                                    width: 100%;
                                    max-width: 21px !important;
                                  " class="img" /></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td height="20" style="font-size: 20px; line-height: 20px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 16px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 700;
                                  max-width: 520px;
                                  text-align: left;
                                ">
                                                            Mira el detalle de tu compra:
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 520px;
                                  text-align: left;
                                ">
                                                            &nbsp; &nbsp;Categoría: ' . $type . '
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10" style="font-size: 10px; line-height: 10px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 520px;
                                  text-align: left;
                                ">
                                                            &nbsp; &nbsp;Medio de pago: ' . $paymentMethod  . '
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10" style="font-size: 10px; line-height: 10px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 520px;
                                  text-align: left;
                                ">
                                                            &nbsp; &nbsp;Fecha de compra: ' . $date   . '
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10" style="font-size: 10px; line-height: 10px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 520px;
                                  text-align: left;
                                ">
                                                            &nbsp; &nbsp;Monto: ' . $amount . '
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 13px;
                                  line-height: 18px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 570px;
                                ">
                                                            ¿Tienes dudas sobre tu pago? Utiliza el chat
                                                            <a href="https://www.digital-trends.goemms.com/?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-resumen-compra-packempresa-23"
                                                                target="_blank" style="
                                    text-decoration: none;
                                    color: #33ad73;
                                    font-weight: 700;
                                  " class="link-hover">
                                                                en la página</a>
                                                            para recibir asistencia en vivo o escríbenos a
                                                            <a href="mailto:administracion@fromdoppler.com"
                                                                target="_blank" style="
                                    text-decoration: none;
                                    color: #33ad73;
                                    font-weight: 700;
                                  " class="link-hover">
                                                                administracion@fromdoppler.com</a>
                                                            contándonos lo sucedido y resolveremos en breve
                                                            todas tus inquietudes 😉
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #310e44">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #310e44">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" class="container">
                                                        <table width="600" cellpadding="0" cellspacing="0" border="0"
                                                            class="container">
                                                            <tbody>
                                                                <tr>

                                                                    <th align="center" valign="middle" class="mobile"
                                                                        width="20">
                                                                        &nbsp;
                                                                        <table width="20" cellpadding="0"
                                                                            cellspacing="0" border="0"
                                                                            class="container">
                                                                            <tbody>
                                                                                <tr></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </th>
                                                                    <th align="left" valign="middle" class="mobile"
                                                                        width="290">
                                                                        <table width="290" cellpadding="0"
                                                                            cellspacing="0" border="0"
                                                                            class="container">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th align="left" valign="middle"
                                                                                        style="
                                        font-family: Helvetica, Arial,
                                          sans-serif;
                                      " class="mobile-center wrapper">
                                                                                        <p style="
                                          margin: 0;
                                          font-size: 11px;
                                          line-height: 11px;
                                        ">
                                                                                            &nbsp;
                                                                                        </p>
                                                                                    </th>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td height="20"
                                                                                        style="font-size: 20px; line-height: 20px">
                                                                                        &nbsp;
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </th>
                                                                    <th align="center" valign="middle" class="mobileOn"
                                                                        width="260" style="display: none">
                                                                        <table width="260" cellpadding="0"
                                                                            cellspacing="0" border="0"
                                                                            class="container">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th align="center" valign="top"
                                                                                        style="
                                        font-family: Helvetica, Arial,
                                          sans-serif;
                                      ">
                                                                                        <a href="#"
                                                                                            style="cursor: default"><img
                                                                                                src="https://i.imgur.com/8TeHW0R.png"
                                                                                                alt="asset" width="167"
                                                                                                style="
                                            width: 100%;
                                            max-width: 167px !important;
                                          "></a>
                                                                                    </th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                            class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <th align="center" valign="top" width="200"
                                                                        class="mobileOff">
                                                                        <a href="#"
                                                                            style="cursor: default !important"><img
                                                                                src="https://i.imgur.com/8TeHW0R.png"
                                                                                alt="asset" width="167" style="
                                            width: 100%;
                                            max-width: 167px !important;
                                            margin-bottom: 0;
                                            padding-bottom: 0;
                                            display: block;
                                          " /></a>
                                                                    </th>
                                                                    <th align="left" valign="top" width="387"
                                                                        class="mobilePadding">
                                                                        <p height="10" style="
                                          font-size: 10px;
                                          line-height: 10px;
                                        ">
                                                                            &nbsp;
                                                                        </p>

                                                                        <p style="
                                          margin: 0;
                                          font-family: Helvetica, Arial,
                                            sans-serif;
                                          font-size: 16px;
                                          line-height: 21   px;
                                          font-weight: 400;
                                          color: #ffffff;
max-width: 365px;
                                        " class="mobile-center">
                                                                            Mientras esperas por la llegada del
                                                                            evento, ¡invita a todo tu equipo a
                                                                            capacitarse con la <strong> biblioteca de
                                                                                recursos</strong> que ya están
                                                                            preparando
                                                                            nuestros aliados! Podrás encontrar
                                                                            materiales descargables y on demand, ya
                                                                            disponibles
                                                                            <a href="http://goemms.com/sponsors?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-resumen-compra-packempresa-23"
                                                                                target="_blank" style="
                                            text-decoration: none;
                                            color: #33ad73;
                                            font-weight: 700;
                                          " class="link-hover">
                                                                                en este enlace</a>
                                                                            de forma gratuita.
                                                                        </p>
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                        &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <!--footer begin-->
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #ffffff">
                                        <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="border-top: 1px solid #b4b1a5">
                                                        <table width="555" cellpadding="0" cellspacing="0" border="0"
                                                            class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="40"
                                                                        style="font-size: 40px; line-height: 40px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <table width="185" border="0" cellpadding="0"
                                                                            cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://twitter.com/fromDoppler"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/twitter-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Twitter" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.facebook.com/DopplerEmailMarketing"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/facebook-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Facebook" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.linkedin.com/company/228261"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/linkedin-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Linkedin" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.youtube.com/user/FromDoppler"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/youtube-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Youtube" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.instagram.com/fromdoppler"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/instagram-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Instagram" /></a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="padding: 25px 0 0">
                                                                        <p style="
                                          padding: 0;
                                          margin: 0;
                                          font-family: proxima-nova, Arial,
                                            sans-serif !important;
                                          font-size: 11px;
                                          line-height: 16px;
                                          color: #666666;
                                        ">
                                                                            © 2023
                                                                            <a href="http://fromdoppler.com/?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-resumen-compra-packempresa-23"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: normal;
                                            text-decoration: none;
                                          " class="link">Doppler LLC</a>. Todos los derechos reservados.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20"
                                                                        style="font-size: 20px; line-height: 20px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <p style="
                                          padding: 0;
                                          margin: 0;
                                          font-family: proxima-nova, Arial,
                                            sans-serif !important;
                                          font-size: 11px;
                                          line-height: 14px;
                                          color: #666666;
                                        ">
                                                                            Te informamos que los datos personales
                                                                            contenidos en esta comunicación fueron
                                                                            recogidos en nuestro Formulario de
                                                                            registro, cuyo responsable es Doppler
                                                                            LLC, dado que prestaste tu
                                                                            consentimiento para recibir nuestras
                                                                            comunicaciones. Al registrarte como
                                                                            usuario, aceptás y consentís que tus
                                                                            datos sean almacenados por nuestra
                                                                            plataforma, cuyos servidores están en
                                                                            Estados Unidos, para gestionar el envío
                                                                            de las comunicaciones correspondientes.
                                                                            Podrás ejercer tus derechos de acceso,
                                                                            rectificación, limitación y eliminación
                                                                            de los datos escribiendo a
                                                                            <a href="mailto:legal@fromdoppler.com"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: normal;
                                            text-decoration: none;
                                          " class="link">legal@fromdoppler.com</a>, así como presentar una reclamación
                                                                            ante una autoridad de control. Si no
                                                                            deseás seguir recibiendo nuestras
                                                                            Campañas, podés darte de baja
                                                                            automáticamente haciendo clic en el
                                                                            enlace que se encuentra debajo. Podés
                                                                            consultar información adicional y
                                                                            detallada sobre la protección de tus
                                                                            datos personales en nuestra
                                                                            <a href="https://www.fromdoppler.com/legal/privacidad/"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: normal;
                                            text-decoration: none;
                                          " class="link">Política de Privacidad</a>.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20"
                                                                        style="font-size: 20px; line-height: 20px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="top">
                                                                        <p style="
                                          padding: 0;
                                          margin: 0;
                                          font-family: proxima-nova, Arial,
                                            sans-serif !important;
                                          font-size: 11px;
                                          line-height: 14px;
                                          color: #666666;
                                        ">
                                                                            Este email fue enviado por
                                                                            <a href="https://goemms.com/?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-resumen-compra-packempresa-23&dplrid=' . $encodeEmail . '"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: bold;
                                            text-decoration: none;
                                          " class="link">EMMS</a>, un evento creado por
                                                                            <a href="http://fromdoppler.com/?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-resumen-compra-packempresa-23"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: bold;
                                            text-decoration: none;
                                          " class="link">Doppler</a>.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="40"
                                                                        style="font-size: 40px; line-height: 40px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>

</html>
        ';
        return $html;
    }

    public static function getWixVipTemplate($encodeEmail, $user)
    {
        $type = $user['paidplan_title'];
        $paymentMethod = $user['paidplan_paymentmethod'];
        $date = $user['paidplan_startdate'];
        $amount = $user['paidplan_price'];
        $html = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta content="telephone=no" name="format-detection" />
    <title>Doppler</title>
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
        }

        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        table table table {
            table-layout: auto;
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        /* Hover styles for buttons */
        .button--td:hover,
        .button--a:hover {
            background: #026c3c !important;
        }

        .link-hover:hover {
            color: #026c3c !important;
        }

        *[x-apple-data-detectors],
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        th {
            font-weight: normal;
        }

        /* MEDIA QUERIES */
        @media all and (max-width: 480px) {
            .wrapper {
                width: 320px !important;
                padding: 0 !important;
            }

            .container {
                width: 300px !important;
                padding: 0 !important;
            }

            .mobile {
                width: 300px !important;
                display: block !important;
                padding: 0 !important;
            }

            .mobile-btn {
                width: 240px !important;
                display: block !important;
            }

            .mobile-center {
                text-align: center !important;
            }

            .img {
                width: 100% !important;
                height: auto !important;
            }

            .mobileOff {
                width: 0px !important;
                display: none !important;
            }

            .mobileOn {
                display: block !important;
                max-height: none !important;
            }

            .no-background {
                background-image: none !important;
                background-color: #ffffff !important;
            }

            .mobile-pl,
            .mobile-pl-btn,
            u+.body .mobile-pl,
            u+.body .mobile-pl-btn {
                padding-left: 0 !important;
            }

            .mobile-pr,
            .mobile-pr-btn,
            u+.body .mobile-pr,
            u+.body .mobile-pr-btn {
                padding-right: 0 !important;
            }

            .mobile-pt,
            u+.body .mobile-pt {
                padding-top: 20px !important;
            }

            .mobilePadding {
                padding-left: 3% !important;
                padding-right: 3% !important;
            }

            u~div .wrapper {
                width: 100vw !important;
            }
        }
    </style>
    <!--[if gte mso 9]>
      <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG />
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
      </xml>
    <![endif]-->
</head>

<body style="margin: 0; padding: 0">
    <center>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top" style="background-color: #310e44">
                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                        <tr>
                            <td height="30" style="font-size: 30px; line-height: 30px">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <th align="center" valign="middle" width="60" class="mobileOff">
                                            &nbsp;
                                        </th>
                                        <th align="center" valign="middle" width="480" class="mobile mobile-pt">
                                            <a href="#" style="cursor: default"><img
                                                    src="https://i.imgur.com/xYS5gM3.png" alt="Logo EMMS Digital Trends"
                                                    width="177" style="width: 100%; max-width: 177px !important" /></a>
                                        </th>
                                        <th align="center" valign="middle" width="60" class="mobileOff">
                                            &nbsp;
                                        </th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" style="font-size: 30px; line-height: 30px">
                                &nbsp;
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top" style="background-color: #310e44">
                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                        <tr>
                            <td align="center" valign="top">
                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <td height="15" style="font-size: 15px; line-height: 15px">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="middle" width="200" class="mobile">
                                            <a href="#" target="_blank"><img src="https://i.imgur.com/zWGDO6M.png"
                                                    alt="Emoji de confetis" width="81"
                                                    style="width: 100%; max-width: 81px !important" /></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20" style="font-size: 20px; line-height: 20px">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" class="mobile" style="
                          font-family: Helvetica, Arial, sans-serif;
                          color: #ffffff;
                        ">
                                            <p style="
                            margin: 0;
                            font-size: 25px;
                            line-height: 31px;
                            font-weight: 700;
                            color: #ffffff;
                            max-width: 580px;
                          " class="mobile-title-fontsize">
                                                Has comprado tu entrada con éxito
                                            </p>
                                            <p style="margin: 0; font-size: 25px; line-height: 25px">
                                                &nbsp;
                                            </p>
                                            <p style="
                            margin: 0;
                            font-family: Helvetica, Arial, sans-serif;
                            font-size: 15px;
                            line-height: 25px;
                            font-weight: 400;
                            color: #ffffff;
                            max-width: 540px;
                          ">
                                                ¡Felicitaciones! Ya eres parte del <strong>EMMS Digital Trends
                                                    2023</strong> y podrás disfrutar de todo el contenido exclusivo
                                                para <strong>Asistentes VIP</strong>.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20" style="font-size: 20px; line-height: 20px">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="middle"
                                            style="font-family: Helvetica, Arial, sans-serif">
                                            <p class="mobile-center" style="
                            font-family: Helvetica;
                            font-size: 15px;
                            font-weight: 400;
                            line-height: 21px;
                            letter-spacing: 0px;
                            text-align: center;

                            color: #ffffff;
                            margin: 0;
                          ">
                                                <img src="https://i.imgur.com/JYbP4My.png" alt="Emoji microfono"
                                                    width="13" style="
                              width: 100%;
                              max-width: 13px !important;
                              vertical-align: middle;
                            " />&nbsp;&nbsp;Conferencias&nbsp;&nbsp;
                                                <span style="text-align: center"><img
                                                        src="https://i.imgur.com/hptTjNe.png" alt="Emoji libros"
                                                        width="23" style="
                                width: 100%;
                                max-width: 23px !important;
                                vertical-align: middle;
                              " />&nbsp;&nbsp;Recursos&nbsp;&nbsp;</span>
                                                <span><img src="https://i.imgur.com/ipiXcuR.png" alt="Emoji workshop"
                                                        width="21" style="
                                width: 100%;
                                max-width: 21px !important;
                                vertical-align: middle;
                              " />&nbsp;&nbsp;Workshops&nbsp;&nbsp;</span>
                                                <span><img src="https://i.imgur.com/ca6ZSOj.png" alt="Emoji networking"
                                                        width="20" style="
                                width: 100%;
                                max-width: 20px !important;
                                vertical-align: middle;
                              " />&nbsp;&nbsp;Networking&nbsp;&nbsp;</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="30" style="font-size: 30px; line-height: 30px">
                                            &nbsp;
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 16px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 570px;
                                  text-align: left;
                                ">
                                                            Llegada la
                                                            fecha,<a
                                                                href="https://www.digital-trends.goemms.com/?utm_medium=email&utm_source=fromdoppler&utm_campaign=et-emmsdt-confirmacion-compra-entrada-general-23"
                                                                target="_blank" style="
                                    text-decoration: none;
                                    color: #33ad73;
                                    font-weight: 700;
                                  " class="link-hover">
                                                                aquí</a>
                                                            encontrarás los enlaces de ingreso a estos espacios.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 16px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 570px;
                                  text-align: left;
                                ">
                                                            Además, descubre la agenda y todo lo que aprenderás durante
                                                            estos cuatro días de capacitación en el
                                                            <a href="http://goemms.com/digital-trends?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-compra-entrada-general-23#agenda&dplrid= ' . $encodeEmail   . '"
                                                                target="_blank" style="
                                    text-decoration: none;
                                    color: #33ad73;
                                    font-weight: 700;
                                  " class="link-hover">
                                                                sitio web del evento</a>.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top">
                                                        <a href="#" style="cursor: default"><img
                                                                src="https://i.imgur.com/22FXDPO.png"
                                                                alt="imagen separadora" width="21" style="
                                    width: 100%;
                                    max-width: 21px !important;
                                  " class="img" /></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td height="20" style="font-size: 20px; line-height: 20px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 16px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 700;
                                  max-width: 520px;
                                  text-align: left;
                                ">
                                                            Mira el detalle de tu compra:
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 520px;
                                  text-align: left;
                                ">
                                                            &nbsp; &nbsp;Categoría: ' . $type  . '
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10" style="font-size: 10px; line-height: 10px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 520px;
                                  text-align: left;
                                ">
                                                            &nbsp; &nbsp;Medio de pago:  ' . $paymentMethod   . '
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10" style="font-size: 10px; line-height: 10px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 520px;
                                  text-align: left;
                                ">
                                                            &nbsp; &nbsp;Fecha de compra:  ' . $date . '
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10" style="font-size: 10px; line-height: 10px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 15px;
                                  line-height: 22px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 520px;
                                  text-align: left;
                                ">
                                                            &nbsp; &nbsp;Monto:  ' . $amount . '
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                        class="mobile-center">
                                                        <p style="
                                  margin: 0;
                                  font-size: 13px;
                                  line-height: 18px;
                                  color: #333333;
                                  font-weight: 400;
                                  max-width: 570px;
                                ">
                                                            ¿Tienes dudas sobre tu pago? Utiliza el chat
                                                            <a href="https://www.digital-trends.goemms.com/?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-resumen-compra-asistentevip-23"
                                                                target="_blank" style="
                                    text-decoration: none;
                                    color: #33ad73;
                                    font-weight: 700;
                                  " class="link-hover">
                                                                en la página</a>
                                                            para recibir asistencia en vivo o escríbenos a
                                                            <a href="mailto:administracion@fromdoppler.com"
                                                                target="_blank" style="
                                    text-decoration: none;
                                    color: #33ad73;
                                    font-weight: 700;
                                  " class="link-hover">
                                                                administracion@fromdoppler.com</a>
                                                            contándonos lo sucedido y resolveremos en breve
                                                            todas tus inquietudes 😉
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        <!--footer begin-->
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-color: #ffffff">
                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #ffffff">
                                        <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="top"
                                                        style="border-top: 1px solid #b4b1a5">
                                                        <table width="555" cellpadding="0" cellspacing="0" border="0"
                                                            class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="40"
                                                                        style="font-size: 40px; line-height: 40px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <table width="185" border="0" cellpadding="0"
                                                                            cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://twitter.com/fromDoppler"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/twitter-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Twitter" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.facebook.com/DopplerEmailMarketing"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/facebook-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Facebook" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.linkedin.com/company/228261"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/linkedin-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Linkedin" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.youtube.com/user/FromDoppler"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/youtube-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Youtube" /></a>
                                                                                    </td>
                                                                                    <td width="37" align="left">
                                                                                        <a href="https://www.instagram.com/fromdoppler"
                                                                                            target="_blank"><img
                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/instagram-icon.png"
                                                                                                style="
                                                    width: 100%;
                                                    max-width: 32px !important;
                                                  " width="32" class="img" alt="Instagram" /></a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="padding: 25px 0 0">
                                                                        <p style="
                                          padding: 0;
                                          margin: 0;
                                          font-family: proxima-nova, Arial,
                                            sans-serif !important;
                                          font-size: 11px;
                                          line-height: 16px;
                                          color: #666666;
                                        ">
                                                                            © 2023
                                                                            <a href="http://fromdoppler.com?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-compra-entrada-asistentevip-23"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: normal;
                                            text-decoration: none;
                                          " class="link">Doppler LLC</a>. Todos los derechos reservados.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20"
                                                                        style="font-size: 20px; line-height: 20px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <p style="
                                          padding: 0;
                                          margin: 0;
                                          font-family: proxima-nova, Arial,
                                            sans-serif !important;
                                          font-size: 11px;
                                          line-height: 14px;
                                          color: #666666;
                                        ">
                                                                            Te informamos que los datos personales
                                                                            contenidos en esta comunicación fueron
                                                                            recogidos en nuestro Formulario de
                                                                            registro, cuyo responsable es Doppler
                                                                            LLC, dado que prestaste tu
                                                                            consentimiento para recibir nuestras
                                                                            comunicaciones. Al registrarte como
                                                                            usuario, aceptás y consentís que tus
                                                                            datos sean almacenados por nuestra
                                                                            plataforma, cuyos servidores están en
                                                                            Estados Unidos, para gestionar el envío
                                                                            de las comunicaciones correspondientes.
                                                                            Podrás ejercer tus derechos de acceso,
                                                                            rectificación, limitación y eliminación
                                                                            de los datos escribiendo a
                                                                            <a href="mailto:legal@fromdoppler.com"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: normal;
                                            text-decoration: none;
                                          " class="link">legal@fromdoppler.com</a>, así como presentar una reclamación
                                                                            ante una autoridad de control. Si no
                                                                            deseás seguir recibiendo nuestras
                                                                            Campañas, podés darte de baja
                                                                            automáticamente haciendo clic en el
                                                                            enlace que se encuentra debajo. Podés
                                                                            consultar información adicional y
                                                                            detallada sobre la protección de tus
                                                                            datos personales en nuestra
                                                                            <a href="https://www.fromdoppler.com/legal/privacidad/"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: normal;
                                            text-decoration: none;
                                          " class="link">Política de Privacidad</a>.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20"
                                                                        style="font-size: 20px; line-height: 20px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="top">
                                                                        <p style="
                                          padding: 0;
                                          margin: 0;
                                          font-family: proxima-nova, Arial,
                                            sans-serif !important;
                                          font-size: 11px;
                                          line-height: 14px;
                                          color: #666666;
                                        ">
                                                                            Este email fue enviado por
                                                                            <a href="https://goemms.com/?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-resumen-compra-asistentevip-23&dplrid=' . $encodeEmail . '"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: bold;
                                            text-decoration: none;
                                          " class="link">EMMS</a>, un evento creado por
                                                                            <a href="http://fromdoppler.com?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-compra-entrada-asistentevip-23"
                                                                                target="_blank" style="
                                            color: #33ad73;
                                            font-weight: bold;
                                            text-decoration: none;
                                          " class="link">Doppler</a>.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="40"
                                                                        style="font-size: 40px; line-height: 40px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>

</html>

        ';
        return $html;
    }

    public static function getWixInvitadoTemplate($encodeEmail, $planTitle)
    {
        $html = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
            <html lang="es">

                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                    <meta name="x-apple-disable-message-reformatting" />
                    <meta content="telephone=no" name="format-detection" />
                    <title>Doppler</title>
                    <style>
                        html,
                        body {
                            margin: 0 auto !important;
                            padding: 0 !important;
                        }

                        * {
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                        }

                        div[style*="margin: 16px 0"] {
                            margin: 0 !important;
                        }

                        table,
                        td {
                            mso-table-lspace: 0pt !important;
                            mso-table-rspace: 0pt !important;
                        }

                        table table table {
                            table-layout: auto;
                        }

                        img {
                            -ms-interpolation-mode: bicubic;
                            border: 0;
                            height: auto;
                            line-height: 100%;
                            outline: none;
                            text-decoration: none;
                        }

                        /* Hover styles for buttons */
                        .button--td:hover,
                        .button--a:hover {
                            background: #026c3c !important;
                        }

                        .link-hover:hover {
                            color: #026c3c !important;
                        }

                        *[x-apple-data-detectors],
                        .x-gmail-data-detectors,
                        .x-gmail-data-detectors *,
                        .aBn {
                            border-bottom: 0 !important;
                            cursor: default !important;
                            color: inherit !important;
                            text-decoration: none !important;
                            font-size: inherit !important;
                            font-family: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                        }

                        th {
                            font-weight: normal;
                        }

                        /* MEDIA QUERIES */
                        @media all and (max-width: 480px) {
                            .wrapper {
                                width: 320px !important;
                                padding: 0 !important;
                            }

                            .container {
                                width: 300px !important;
                                padding: 0 !important;
                            }

                            .mobile {
                                width: 300px !important;
                                display: block !important;
                                padding: 0 !important;
                            }

                            .mobile-btn {
                                width: 240px !important;
                                display: block !important;
                            }

                            .mobile-center {
                                text-align: center !important;
                            }

                            .img {
                                width: 100% !important;
                                height: auto !important;
                            }

                            .mobileOff {
                                width: 0px !important;
                                display: none !important;
                            }

                            .mobileOn {
                                display: block !important;
                                max-height: none !important;
                            }

                            .no-background {
                                background-image: none !important;
                                background-color: #ffffff !important;
                            }

                            .mobile-pl,
                            .mobile-pl-btn,
                            u+.body .mobile-pl,
                            u+.body .mobile-pl-btn {
                                padding-left: 0 !important;
                            }

                            .mobile-pr,
                            .mobile-pr-btn,
                            u+.body .mobile-pr,
                            u+.body .mobile-pr-btn {
                                padding-right: 0 !important;
                            }

                            .mobile-pt,
                            u+.body .mobile-pt {
                                padding-top: 20px !important;
                            }

                            .mobilePadding {
                                padding-left: 3% !important;
                                padding-right: 3% !important;
                            }

                            u~div .wrapper {
                                width: 100vw !important;
                            }
                        }
                    </style>
                    <!--[if gte mso 9]>
                    <xml>
                        <o:OfficeDocumentSettings>
                        <o:AllowPNG />
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                        </o:OfficeDocumentSettings>
                    </xml>
                    <![endif]-->
                </head>

                <body style="margin: 0; padding: 0">
                    <center>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center" valign="top" style="background-color: #310e44">
                                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                        <tr>
                                            <td height="30" style="font-size: 30px; line-height: 30px">
                                                &nbsp;
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top">
                                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                    <tr>
                                                        <th align="center" valign="middle" width="60" class="mobileOff">
                                                            &nbsp;
                                                        </th>
                                                        <th align="center" valign="middle" width="480" class="mobile mobile-pt">
                                                            <a href="#" style="cursor: default"><img
                                                                    src="https://i.imgur.com/xYS5gM3.png" alt="Logo EMMS Digital Trends"
                                                                    width="177" style="width: 100%; max-width: 177px !important" /></a>
                                                        </th>
                                                        <th align="center" valign="middle" width="60" class="mobileOff">
                                                            &nbsp;
                                                        </th>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="30" style="font-size: 30px; line-height: 30px">
                                                &nbsp;
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top">
                                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                    <tr>
                                                        <th align="center" valign="middle" width="60" class="mobileOff">
                                                            &nbsp;
                                                        </th>
                                                        <th align="center" valign="middle" width="480" class="mobile mobile-pt">
                                                            <a href="#" style="cursor: default"><img
                                                                    src="https://i.imgur.com/noZMwnu.png" alt="Ticket" width="116"
                                                                    style="width: 100%; max-width: 116px !important" /></a>
                                                        </th>
                                                        <th align="center" valign="middle" width="60" class="mobileOff">
                                                            &nbsp;
                                                        </th>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="30" style="font-size: 30px; line-height: 30px">
                                                &nbsp;
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center" valign="top" style="background-color: #310e44">
                                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                        <tr>
                                            <td align="center" valign="top">
                                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                    <tr>
                                                        <td height="15" style="font-size: 15px; line-height: 15px">
                                                            &nbsp;
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" valign="top" class="mobile" style="
                                        font-family: Helvetica, Arial, sans-serif;
                                        color: #ffffff;
                                        ">
                                                            <p style="
                                            margin: 0;
                                            font-size: 25px;
                                            line-height: 27px;
                                            font-weight: 700;
                                            color: #ffffff;
                                            max-width: 391px;
                                        " class="mobile-title-fontsize">
                                                                ¡Has recibido una invitación VIP al EMMS Digital Trends 2023!
                                                            </p>
                                                            <p style="margin: 0; font-size: 25px; line-height: 25px">
                                                                &nbsp;
                                                            </p>
                                                            <p style="
                                            margin: 0;
                                            font-family: Helvetica, Arial, sans-serif;
                                            font-size: 15px;
                                            line-height: 25px;
                                            font-weight: 400;
                                            color: #ffffff;
                                            max-width: 560px;
                                        ">
                                                                Te damos la bienvenida al mayor evento de Marketing Digital
                                                            </p>
                                                            <p style="margin: 0; font-size: 25px; line-height: 25px">
                                                                &nbsp;
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="20" style="font-size: 20px; line-height: 20px">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #ffffff">
                                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="top" style="background-color: #ffffff">
                                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">

                                                            <tbody>
                                                                <tr>
                                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td align="center" valign="top"
                                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                                        class="mobile-center">
                                                                        <p style="
                                                margin: 0;
                                                font-size: 16px;
                                                line-height: 22px;
                                                color: #333333;
                                                font-weight: 500;
                                                text-align: center;
                                                ">
                                                                            Con tu entrada VIP accederás a:

                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td align="left" valign="top" class="container">
                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                            class="container">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th align="center" valign="top" width="300"
                                                                                        class="mobile">
                                                                                        <a href="#"
                                                                                            style="cursor: default !important"><img
                                                                                                src="https://i.imgur.com/aXRrpWG.png"
                                                                                                alt="Conferencias" width="200" style="
                                                    width: 100%;
                                                    max-width: 200px !important;
                                                    margin-bottom: 0;
                                                    padding-bottom: 0;
                                                    display: block;
                                                "></a>
                                                                                        <p style="
                                                margin: 0;
                                                font-size: 15px;
                                                line-height: 15px;
                                                ">
                                                                                            &nbsp;
                                                                                        </p>
                                                                                        <p style="
                                                margin: 0;
                                                font-family: Helvetica, Arial, sans-serif;
                                                font-size: 15px;
                                                line-height: 21px;
                                                font-weight: 400;
                text-align: left;
                max-width: 200px;
                                                color: #333333;
                                                ">
                                                                                            <strong>Conferencias</strong> con referentes
                                                                                            internacionales
                                                                                        </p>
                                                                                    </th>
                                                                                    <th align="center" valign="top" width="300"
                                                                                        class="mobile mobile-pt">
                                                                                        <a href="#"
                                                                                            style="cursor: default !important"><img
                                                                                                src="https://i.imgur.com/Lqj22Cb.png"
                                                                                                alt="Recursos" width="200" style="
                                                    width: 100%;
                                                    max-width: 200px !important;
                                                    margin-bottom: 0;
                                                    padding-bottom: 0;
                                                    display: block;
                                                "></a>
                                                                                        <p style="
                                                margin: 0;
                                                font-size: 15px;
                                                line-height: 15px;
                                                ">
                                                                                            &nbsp;
                                                                                        </p>
                                                                                        <p style="
                                                margin: 0;
                                                font-family: Helvetica, Arial, sans-serif;
                                                font-size: 15px;
                                                line-height: 21px;
                                                font-weight: 400;
                text-align: left;
                max-width: 200px;
                                                color: #333333;
                                                ">
                                                                                            <strong>Contenido descargable y on
                                                                                                demand</strong> único
                                                                                        </p>
                                                                                    </th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" style="font-size: 20px; line-height: 20px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top" class="container">
                                                                        <table cellpadding="0" cellspacing="0" border="0"
                                                                            class="container">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th align="center" valign="top" width="300"
                                                                                        class="mobile">
                                                                                        <a href="#"
                                                                                            style="cursor: default !important"><img
                                                                                                src="https://i.imgur.com/LV52HKa.png"
                                                                                                alt="Workshop" width="200" style="
                                                    width: 100%;
                                                    max-width: 200px !important;
                                                    margin-bottom: 0;
                                                    padding-bottom: 0;
                                                    display: block;
                                                "></a>
                                                                                        <p style="
                                                margin: 0;
                                                font-size: 15px;
                                                line-height: 15px;
                                                ">
                                                                                            &nbsp;
                                                                                        </p>
                                                                                        <p style="
                                                margin: 0;
                                                font-family: Helvetica, Arial, sans-serif;
                                                font-size: 15px;
                                                line-height: 21px;
                                                font-weight: 400;
                text-align: left;
                max-width: 200px;
                                                color: #333333;
                                                ">
                                                                                            Todos los <strong>Workshops
                                                                                                Prácticos</strong> que quieras ⭐
                                                                                        </p>
                                                                                    </th>
                                                                                    <th align="center" valign="top" width="300"
                                                                                        class="mobile mobile-pt">
                                                                                        <a href="#"
                                                                                            style="cursor: default !important"><img
                                                                                                src="https://i.imgur.com/toOznVP.png"
                                                                                                alt="Networking" width="200" style="
                                                    width: 100%;
                                                    max-width: 200px !important;
                                                    margin-bottom: 0;
                                                    padding-bottom: 0;
                                                    display: block;
                                                "></a>
                                                                                        <p style="
                                                margin: 0;
                                                font-size: 15px;
                                                line-height: 15px;
                                                ">
                                                                                            &nbsp;
                                                                                        </p>
                                                                                        <p style="
                                                margin: 0;
                                                font-family: Helvetica, Arial, sans-serif;
                                                font-size: 15px;
                                                line-height: 21px;
                                                font-weight: 400;
                text-align: left;
                max-width: 200px;
                                                color: #333333;
                                                ">
                                                                                            Exclusivas <strong>salas de Networking
                                                                                                ⭐</strong>
                                                                                        </p>
                                                                                    </th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #ffffff">
                                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="top" class="container" style="background-color: #ffffff">
                                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" valign="top" class="container"
                                                                        style="background-color: #ffffff">
                                                                        <table width="600" cellpadding="0" cellspacing="0" border="0"
                                                                            class="container">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="40"
                                                                                        style="font-size: 40px; line-height: 40px">
                                                                                        &nbsp;
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" valign="middle">
                                                                                        <img src="https://i.imgur.com/22FXDPO.png"
                                                                                            alt="Separador" width="21"
                                                                                            style="width: 100%; max-width: 21px !important">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td height="20"
                                                                                        style="font-size: 20px; line-height: 20px">
                                                                                        &nbsp;
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #ffffff">
                                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="top" style="background-color: #ffffff">
                                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="top"
                                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                                        class="mobile-center">
                                                                        <p style="
                                                margin: 0;
                                                font-size: 15px;
                                                line-height: 22px;
                                                color: #333333;
                                                font-weight: 400;
                                                text-align: left;
                                                ">
                                                                            Te hemos enviado un <strong>Email para establecer la
                                                                                contraseña de la cuenta con la que accederás al
                                                                                contenido VIP</strong>. Una vez confirmada, inicia
                                                                            sesión y ¡listo! <br> Llegada la fecha, <a
                                                                                href="https://www.digital-trends.goemms.com/?utm_medium=email&utm_source=fromdoppler&utm_campaign=et-emmsdt-confirmacion-entrada-invitado-empresa-23"
                                                                                target="_blank" style="
                                            text-decoration: none;
                                            color: #33ad73;
                                            font-weight: 700;
                                            " class="link-hover">
                                                                                aquí
                                                                            </a> encontrarás los enlaces de ingreso a estos espacios.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="30" style="font-size: 30px; line-height: 30px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="top"
                                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                                        class="mobile-center">
                                                                        <p style="
                                                margin: 0;
                                                font-size: 15px;
                                                line-height: 22px;
                                                color: #333333;
                                                font-weight: 400;
                                                text-align: left;
                                                ">
                                                                            Además, descubre la agenda y todo lo que aprenderás durante
                                                                            estos cuatro días de capacitación en el<a
                                                                                href="http://goemms.com/digital-trends?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-entrada-invitado-empresa-23#agenda&dplrid=' . $encodeEmail . '" target="_blank" style="
                                            text-decoration: none;
                                            color: #33ad73;
                                            font-weight: 700;
                                            " class="link-hover">
                                                                                sitio web del evento.
                                                                            </a>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="10" style="font-size: 10px; line-height: 10px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="50" style="font-size: 50px; line-height: 50px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #ffffff">
                                        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="top" style="background-color: #ffffff">
                                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="40" style="font-size: 40px; line-height: 40px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="top"
                                                                        style="font-family: Helvetica, Arial, sans-serif"
                                                                        class="mobile-center">
                                                                        <p style="
                                                margin: 0;
                                                font-size: 16px;
                                                line-height: 22px;
                                                color: #333333;
                                                font-weight: 700;
                                                text-align: center;
                                                ">
                                                                            ¡Esperamos verte allí pronto! 🙌
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="10" style="font-size: 10px; line-height: 10px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="50" style="font-size: 50px; line-height: 50px">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!--footer begin-->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="background-color: #EFEFEF">
                                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="wrapper">
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="top" style="background-color: #EFEFEF">
                                                        <table width="555" cellpadding="0" cellspacing="0" border="0" class="container">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" valign="top">
                                                                        <table width="555" cellpadding="0" cellspacing="0" border="0"
                                                                            class="container">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="50"
                                                                                        style="font-size: 50px; line-height: 50px">
                                                                                        &nbsp;
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" valign="top">
                                                                                        <table width="185" border="0" cellpadding="0"
                                                                                            cellspacing="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="37" align="left">
                                                                                                        <a href="https://twitter.com/fromDoppler"
                                                                                                            target="_blank"><img
                                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/twitter-icon.png"
                                                                                                                style="
                                                                    width: 100%;
                                                                    max-width: 32px !important;
                                                                " width="32" class="img" alt="Twitter" /></a>
                                                                                                    </td>
                                                                                                    <td width="37" align="left">
                                                                                                        <a href="https://www.facebook.com/DopplerEmailMarketing"
                                                                                                            target="_blank"><img
                                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/facebook-icon.png"
                                                                                                                style="
                                                                    width: 100%;
                                                                    max-width: 32px !important;
                                                                " width="32" class="img" alt="Facebook" /></a>
                                                                                                    </td>
                                                                                                    <td width="37" align="left">
                                                                                                        <a href="https://www.linkedin.com/company/228261"
                                                                                                            target="_blank"><img
                                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/linkedin-icon.png"
                                                                                                                style="
                                                                    width: 100%;
                                                                    max-width: 32px !important;
                                                                " width="32" class="img" alt="Linkedin" /></a>
                                                                                                    </td>
                                                                                                    <td width="37" align="left">
                                                                                                        <a href="https://www.youtube.com/user/FromDoppler"
                                                                                                            target="_blank"><img
                                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/youtube-icon.png"
                                                                                                                style="
                                                                    width: 100%;
                                                                    max-width: 32px !important;
                                                                " width="32" class="img" alt="Youtube" /></a>
                                                                                                    </td>
                                                                                                    <td width="37" align="left">
                                                                                                        <a href="https://www.instagram.com/fromdoppler"
                                                                                                            target="_blank"><img
                                                                                                                src="https://www.fromdoppler.com/images/emails/2022/rrss/instagram-icon.png"
                                                                                                                style="
                                                                    width: 100%;
                                                                    max-width: 32px !important;
                                                                " width="32" class="img" alt="Instagram" /></a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" style="padding: 25px 0 0">
                                                                                        <p style="
                                                        padding: 0;
                                                        margin: 0;
                                                        font-family: proxima-nova, Arial,
                                                            sans-serif !important;
                                                        font-size: 11px;
                                                        line-height: 16px;
                                                        color: #666666;
                                                        ">
                                                                                            © 2023
                                                                                            <a href="http://fromdoppler.com/?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-entrada-invitado-empresa-23"
                                                                                                target="_blank" style="
                                                            color: #33ad73;
                                                            font-weight: normal;
                                                            text-decoration: none;
                                                        " class="link">Doppler LLC</a>. Todos los derechos reservados.
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td height="20"
                                                                                        style="font-size: 20px; line-height: 20px">
                                                                                        &nbsp;
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" valign="top">
                                                                                        <p style="
                                                        padding: 0;
                                                        margin: 0;
                                                        font-family: proxima-nova, Arial,
                                                            sans-serif !important;
                                                        font-size: 11px;
                                                        line-height: 16px;
                                                        color: #666666;
                                                        ">
                                                                                            Te informamos que los datos personales
                                                                                            contenidos en esta comunicación fueron
                                                                                            recogidos en nuestro Formulario de
                                                                                            registro, cuyo responsable es Doppler
                                                                                            LLC, dado que prestaste tu
                                                                                            consentimiento para recibir nuestras
                                                                                            comunicaciones. Al registrarte como
                                                                                            usuario, aceptás y consentís que tus
                                                                                            datos sean almacenados por nuestra
                                                                                            plataforma, cuyos servidores están en
                                                                                            Estados Unidos, para gestionar el envío
                                                                                            de las comunicaciones correspondientes.
                                                                                            Podrás ejercer tus derechos de acceso,
                                                                                            rectificación, limitación y eliminación
                                                                                            de los datos escribiendo a
                                                                                            <a href="mailto:legal@fromdoppler.com"
                                                                                                target="_blank" style="
                                                            color: #33ad73;
                                                            font-weight: normal;
                                                            text-decoration: none;
                                                        " class="link">legal@fromdoppler.com</a>, así como presentar una reclamación
                                                                                            ante una autoridad de control. Si no
                                                                                            deseás seguir recibiendo nuestras
                                                                                            Campañas, podés darte de baja
                                                                                            automáticamente haciendo clic en el
                                                                                            enlace que se encuentra debajo. Podés
                                                                                            consultar información adicional y
                                                                                            detallada sobre la protección de tus
                                                                                            datos personales en nuestra
                                                                                            <a href="https://www.fromdoppler.com/legal/privacidad/"
                                                                                                target="_blank" style="
                                                            color: #33ad73;
                                                            font-weight: normal;
                                                            text-decoration: none;
                                                        " class="link">Política de Privacidad</a>.
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td height="50"
                                                                                        style="font-size: 50px; line-height: 50px">
                                                                                        &nbsp;
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" valign="top">
                                                                                        <p style="
                                                        padding: 0;
                                                        margin: 0;
                                                        font-family: proxima-nova, Arial,
                                                            sans-serif !important;
                                                        font-size: 12px;
                                                        line-height: 16px;
                                                        color: #666666;
                                                        ">
                                                                                            Este email fue enviado por
                                                                                            <a href="http://goemms.com/?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-entrada-invitado-empresa-23&dplrid=' . $encodeEmail . '"
                                                                                                target="_blank" style="
                                                            color: #33ad73;
                                                            font-weight: bold;
                                                            text-decoration: none;
                                                        " class="link">EMMS</a>, un evento creado por
                                                                                            <a href="http://fromdoppler.com/?utm_source=fromdoppler&utm_medium=email&utm_campaign=et-emmsdt-confirmacion-entrada-invitado-empresa-23"
                                                                                                target="_blank" style="
                                                            color: #33ad73;
                                                            font-weight: bold;
                                                            text-decoration: none;
                                                        " class="link">Doppler</a>.
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td height="40"
                                                                                        style="font-size: 40px; line-height: 40px">
                                                                                        &nbsp;
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </body>

            </html>
        ';
        return $html;
    }
}

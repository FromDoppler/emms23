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

        if ($user['type'] === 'ecommerce') {
            switch ($phase) {
                case 'pre':
                    $html = self::getEcommerceEmailTemplate($user['encode_email']);
                    break;
                case 'during':
                    //TODO: Cambiar funcion con la maqueta correspondiente
                    $html = self::getEcommerceEmailTemplate($user['encode_email']);
                    break;
                case 'post':
                    //TODO: Cambiar funcion con la maqueta correspondiente
                    $html = self::getEcommerceEmailTemplate($user['encode_email']);
                    break;
            }
        } else if ($user['type'] === 'digital-trends') {
            switch ($phase) {
                case 'pre':
                    //TODO: Cambiar funcion con la maqueta correspondiente
                    $html = self::getDigitalTEmailTemplate($user['encode_email']);
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
                                                                    <a href="https://goemms.com/ecommerce-registrado.php?utm_source=emmsecom&utm_medium=goemms&utm_campaign=et-email-confirmacionregistro-emmsecom-23&dplrid=' . $encodeEmail . '" target="_blank" style="text-decoration: none; color: #008046;font-weight: bold;" class="link-hover ">EMMS E-commerce 2023</a>.
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
                                                                    <a href="https://goemms.com/ecommerce-registrado.php?utm_source=emmsecom&utm_medium=goemms&utm_campaign=et-email-confirmacionregistro-emmsecom-23&dplrid=' . $encodeEmail . '" target="_blank" style="text-decoration: none; color: #008046;font-weight: bold;" class="link-hover ">EMMS E-commerce 2023</a>.
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
}

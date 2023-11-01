<?php
require_once 'spread/write.php';

class SpreadSheetGoogle
{
    const RANGE = 'A1:R1';

    public static function write($idSpreadSheet, $user, $db)
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $values = array(
            array(
                date('h:i:s A'),
                date('d-m-Y'),
                $user['promotions'],
                $user['privacy'],
                $user['firstname'] . " ",
                $user['email'],
                $user['source_utm'] . " ",
                $user['medium_utm'] . " ",
                $user['campaign_utm'] . " ",
                $user['content_utm'] . " ",
                $user['term_utm'] . " ",
                $user['origin'] . " ",
                $user['country_ip'] . " ",
                $user['ecommerce'] . " ",
                $user['digital_trends'] . " ",
                $user['company'] . " ",
                $user['jobPosition'] . " ",
                $user['phone'] . " ",
            )
        );
        write_to_sheet($idSpreadSheet, self::RANGE, $values, $db);
    }
}

<?php
require_once 'spread/write.php';

class SpreadSheetGoogle {

    public static function write($idSpreadSheet, $user, $db) {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $range = 'A1:R1';
        $values = array( array(
            date('h:i:s A'),
            date('d-m-Y'),
            $user['promotions'],
            $user['privacy'],
            $user['firstname']. " ",
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
        ));
        write_to_sheet($idSpreadSheet, $range, $values, $db);
    }
}

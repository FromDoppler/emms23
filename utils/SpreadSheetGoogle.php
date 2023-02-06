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
            $user['lastname']. " ",
            $user['email'],
            "[" . $user['phone'] . "]",
            $user['country']. " ",
            $user['industry']. " ",
            $user['company']. " ",
            $user['source_utm'] . " ",
            $user['medium_utm'] . " ",
            $user['campaign_utm'] . " ",
            $user['content_utm'] . " ",
            $user['term_utm'] . " ",
            $user['origin'] . " ",
            $user['country_ip'] . " ",
        ));
        write_to_sheet($idSpreadSheet, $range, $values, $db);
    }
}

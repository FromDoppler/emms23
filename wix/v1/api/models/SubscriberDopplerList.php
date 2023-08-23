<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/Doppler.php');

class SubscriberDopplerList
{
    public function saveSubscription($user)
    {
        try {
            Doppler::init(ACCOUNT_DOPPLER, API_KEY_DOPPLER);
            Doppler::subscriber($user);
        } catch (Exception $e) {
            $errorMessage = json_encode(["saveSubscriptionDoppler (Almacena en Lista)", $e->getMessage(), ['user' => $user]]);
            http_response_code(500); // Error interno del servidor
            throw new Exception($errorMessage);
        }
    }
}

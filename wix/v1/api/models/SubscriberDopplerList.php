<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/Doppler.php');
require_once 'utils/Logger.php';
class SubscriberDopplerList
{
    public function saveSubscription($user)
    {
        try {
            Doppler::init(ACCOUNT_DOPPLER, API_KEY_DOPPLER);
            Doppler::subscriber($user);
            return 'success';
        } catch (Exception $e) {
            $logger = new Logger();
            $errorMessage = json_encode(["saveSubscriptionDoppler", $e->getMessage(), ['user' => $user]]);
            echo $errorMessage;
            $logger->registrarLog("error", "DOPPLER API", $errorMessage);
            return 'fail';
        }
    }
}

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/Doppler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/SubscriptionErrors.php');
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
            $errorMessage = $e->getMessage();
            if (stripos($errorMessage, "Unsubscribed") !== false) {
                return $this->dobleOptin($user);
            } else {
            $logger = new Logger();
            $errorMessage = json_encode(["saveSubscriptionDoppler", $e->getMessage(), ['user' => $user]]);
            echo $errorMessage;
            $subscriptionErrors = new SubscriptionErrors();
            $subscriptionErrors->saveSubscriptionErrors($user['email'], $user['list'], $errorMessage);
            $logger->registrarLog("error", "DOPPLER API", $errorMessage);
            return 'fail';
            }
        }
    }

    private function dobleOptin($user)
    {
        try {
            Doppler::init(ACCOUNT_DOPPLER, API_KEY_DOPPLER);
            Doppler::dobleOptin($user);
            return 'success-doble-optin';
        } catch (Exception $e) {
            $logger = new Logger();
            $errorMessage = json_encode(["dobleOptinDoppler", $e->getMessage(), ['user' => $user]]);
            echo $errorMessage;
            $logger->registrarLog("error", "DOPPLER API", $errorMessage);
            return 'fail-doble-optin';
        }
    }
}

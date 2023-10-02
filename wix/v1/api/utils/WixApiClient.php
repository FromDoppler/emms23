<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

class WixApiClient {
    private $api_key;
    private $account_id;
    private $site_id;
    private $memcached;

    public function __construct($api_key, $account_id, $site_id) {
        $this->api_key = $api_key;
        $this->account_id = $account_id;
        $this->site_id = $site_id;

        // Configurar la conexión Memcached en el constructor
        $this->memcached = new Memcached();
        $this->memcached->addServer(MEMCACHED_SERVER, 11211);
    }

    public function listOrders() {
        try {
            $endpoint = "https://www.wixapis.com/pricing-plans/v2/orders";
            return $this->makeApiRequest($endpoint);
        } catch (Exception $e) {
            throw new Exception("An error occurred while listing orders: " . $e->getMessage());
        }
    }

    public function queryContacts($queryData) {
        try {
            $endpoint = "https://www.wixapis.com/contacts/v4/contacts/query";
            return $this->makeApiPostRequest($endpoint, $queryData);
        } catch (Exception $e) {
            throw new Exception("An error occurred while querying contacts: " . $e->getMessage());
        }
    }

    public function getContact($contactId) {
        try {
            $endpoint = "https://www.wixapis.com/contacts/v4/contacts/{$contactId}";
            return $this->makeApiRequest($endpoint);
        } catch (Exception $e) {
            throw new Exception("An error occurred while fetching contact: " . $e->getMessage());
        }
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
        try {
            $endpoint = "https://www.wixapis.com/members/v1/members/{$memberId}?fieldsets=FULL";
            return $this->makeApiRequest($endpoint);
        } catch (Exception $e) {
            throw new Exception("An error occurred while fetching member: " . $e->getMessage());
        }
    }

    public function createMember($loginEmail, $contact = null, $profile = null, $privacyStatus = 'UNKNOWN') {
        try {
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
        } catch (Exception $e) {
            throw new Exception("An error occurred while creating member: " . $e->getMessage());
        }
    }

    public function sendSetPasswordEmail($email) {
        try {
            $endpoint = "https://www.wixapis.com/members/v1/auth/members/send-set-password-email";
            $data = [
                "email" => $email,
                "hideIgnoreMessage" => false,
                "language" => "es"
            ];
            return $this->makeApiPostRequest($endpoint, $data, "oauth2");
        } catch (Exception $e) {
            throw new Exception("An error occurred while sending password set email: " . $e->getMessage());
        }
    }

    public function getOfflineOrderPreview($planId, $memberId, $startDate, $couponCode) {
        try {
            $endpoint = "https://www.wixapis.com/pricing-plans/v2/checkout/orders/preview-offline";
            $data = [
                'planId' => $planId,
                'memberId' => $memberId,
                'startDate' => $startDate,
                'couponCode' => $couponCode
            ];
            return $this->makeApiPostRequest($endpoint, $data);
        } catch (Exception $e) {
            throw new Exception("An error occurred while getting offline order preview: " . $e->getMessage());
        }
    }

    public function createOfflineOrder($planId, $memberId, $startDate = null, $paid = false, $couponCode = null, $submissionId = null) {
        try {
            $endpoint = "https://www.wixapis.com/pricing-plans/v2/checkout/orders/offline";
            $data = [
                'planId' => $planId,
                'memberId' => $memberId,
                'paid' => true
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
        } catch (Exception $e) {
            throw new Exception("An error occurred while creating offline order: " . $e->getMessage());
        }
    }

    public function setInvitadoPlanMember($memberEmail) {
        try {
            $responseCreateMember = $this->createMember($memberEmail);
            if ($responseCreateMember === false) {
                throw new Exception("Error creating member - " . json_encode($responseCreateMember, JSON_PRETTY_PRINT));
            }

            $response['contactId'] = $responseCreateMember['member']['contactId'] ?? null;

            if ($response['contactId'] === null) {
                //el usuario ya existia como miembro, por lo tanto cortamos aca no le reiniciamos la contraseña ni le intentamos asignar un nuevo plan. Asumimos uqe estan intentando agregar un usuario por segunda vez.
                echo "El usuario $memberEmail ya existe  - " . json_encode($responseCreateMember, JSON_PRETTY_PRINT);
                return false;
            }

            $invitadoPlanId = WIX_PLAN_INVITADO_ID;

            $response['Order'] = $this->createOfflineOrder($invitadoPlanId, $response['contactId']);
            if ( $response['Order']  === false) {
                throw new Exception("Error creating offline order - " . json_encode( $response['Order'] , JSON_PRETTY_PRINT));
            }

            $responseSendPasswordEmail = $this->sendSetPasswordEmail($memberEmail);
            if ($responseSendPasswordEmail === false) {
                throw new Exception("Error sending password set email - " . json_encode($responseSendPasswordEmail, JSON_PRETTY_PRINT));
            }

            return $response;
        } catch (Exception $e) {
            throw new Exception("An error occurred: " . $e->getMessage());
        }
    }

    private function makeApiRequest($endpoint) {
        try {
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
                throw new Exception("Error in makeApiRequest: " . curl_error($ch));
            }
        } catch (Exception $e) {
            throw new Exception("An error occurred while making the API request: " . $e->getMessage());
        } finally {
            curl_close($ch);
        }
    }

    private function requestNewAccessToken($refreshToken = null) {
        try {
            $endpoint = "https://www.wixapis.com/oauth2/token";  // URL para obtener un nuevo token de acceso
            if ($refreshToken) {
                $data = [
                    "grantType" => "refresh_token",
                    "refreshToken" => $refreshToken
                ];
            } else {
                $data = [
                    "clientId" => WIX_CLIENT_ID,
                    "grantType" => "anonymous"
                ];
            }
            return $this->makeApiPostRequest($endpoint, $data)["access_token"];
        } catch (Exception $e) {
            throw new Exception("Error en requestNewAccessToken: " . $e->getMessage());
        }
    }

    private function getAccessToken() {
        try {
            $accessToken = $this->memcached->get('access_token');
            if (!$accessToken) {
                $refreshToken = $this->memcached->get('refresh_token');
                if ($refreshToken) {
                    $accessToken = $this->requestNewAccessToken($refreshToken);
                    $this->memcached->set('access_token', $accessToken, 3600 * 4); // 4 horas de validez
                } else {
                    $accessToken = $this->requestNewAccessToken();
                }
            }
            return $accessToken;
        } catch (Exception $e) {
            throw new Exception("Error en getAccessToken: " . $e->getMessage());
        }
    }
    private function makeApiPostRequest($endpoint, $data = null, $typeAuth = "api_key") {
        $ch = null; // Initialize $ch here to ensure it's available in the finally block
        try {
            $url = $endpoint;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, 1);

            $headers = [
                "wix-account-id: $this->account_id",
                "wix-site-id: $this->site_id",
            ];

            $authorization = ($typeAuth === "oauth2") ? $this->getAccessToken() : "Bearer $this->api_key";

            if ($data !== null) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                $headers[] = "Authorization: $authorization";
                $headers[] = "Content-Type: application/json";
            } else {
                $headers[] = "Authorization: Bearer $this->api_key";
            }

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch);
            if ($response !== false) {
                return json_decode($response, true);
            } else {
                throw new Exception("Error en makeApiPostRequest: " . curl_error($ch));
            }
        } catch (Exception $e) {
            throw new Exception("Error en makeApiPostRequest: " . $e->getMessage());
        } finally {
            if ($ch !== null) {
                curl_close($ch);
            }
        }
    }
}

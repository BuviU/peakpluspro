<?php

namespace App\Helpers;

class HrmApiRequestHelper
{

    public function NewRequest($url, $requestType = 'GET', $params = [])
    {

        // get the access token from session
        $accessToken = $this->getAccessToken();

        //if access token is not null
        if ($accessToken != null) {

            try {
                $options = [
                    'baseURI' => 'https://billing.waterboard.lk/hrm/',
                ];
                $client = \Config\Services::curlrequest($options);

                $response = null;

                if ($requestType == "POST") {
                    $response = $client->request($requestType, $url, [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $accessToken,
                            'Accept'     => 'application/json',
                        ],
                        'json' => $params,
                        'http_errors' => false
                    ]);
                } else {
                    $response = $client->request($requestType, $url, [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $accessToken,
                            'Accept'     => 'application/json',
                        ],
                        'json' => $params,
                        'http_errors' => false
                    ]);
                }

                $response_data = json_decode($response->getBody(), true);

                // Check if the access token is expired (401 Unauthorized)
                if ($response->getStatusCode() == 401) {

                    // Refresh the access token
                    $response = $this->refreshAccessToken();
                    if ($response['status'] == 200) {
                        // Retry the API request with the new access token
                        return $this->NewRequest($url, $requestType, $params);
                    } else {
                        return $response;
                    }
                }

                $final_response = [
                    'status' => 200,
                    'error' => null,
                    'message' => 'Success',
                    'data' => $response_data
                ];

                return $final_response;
            } catch (\Exception $e) {
                return [
                    'status' => 500,
                    'error' => null,
                    'code' => '00X11',
                    'message' => $e->getMessage()
                ];
            }
        } else {
            // Refresh the access token
            $response = $this->refreshAccessToken();
            if ($response['status'] == 200) {
                // Retry the API request with the new access token
                return $this->NewRequest($url, $requestType, $params);
            } else {
                return $response;
            }
        }
    }

    // get the access token from the session
    private function getAccessToken()
    {
        return isset($_SESSION['hrm_access_token']) ? $_SESSION['hrm_access_token'] : null;
    }

    // refresh the access token
    private function refreshAccessToken()
    {
        try {
            $options = [
                'baseURI' => 'https://billing.waterboard.lk/hrm/',
            ];
            $client = \Config\Services::curlrequest($options);

            $url = 'ValidateUser';

            $response = $client->request('POST', $url, [
                'json' => [
                    'userName' => '2010585',
                    'password' => 'E2010585@1'
                ],
                'http_errors' => false
            ]);

            // if response status is 200
            if ($response->getStatusCode() == 200) {

                $accessToken = $response->getBody();
                $_SESSION['hrm_access_token'] = $accessToken;

                return [
                    'status' => 200,
                    'error' => null,
                    'code' => '00X00',
                    'message' => 'Access token refreshed successfully'
                ];
            } else {
                return [
                    'status' => 500,
                    'error' => null,
                    'code' => '00X10',
                    'message' => 'Failed to refresh the access token'
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'error' => null,
                'code' => '00X14',
                'message' => $e->getMessage()
            ];
        }
    }
}

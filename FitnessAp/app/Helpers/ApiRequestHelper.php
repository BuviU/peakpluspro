<?php

namespace App\Helpers;

class ApiRequestHelper
{
    /**
     * Sends a new HTTP request to the EDMS backend API.
     * @param string $url The API endpoint URL except baseURL.
     * @param string $requestType The HTTP request type (GET, POST, PUT, DELETE).
     * @param array $params The request parameters for (POST, PUT, DELETE).
     * @return array The response from the API.
     */
    public function NewRequest($url, $requestType = 'GET', $params = [])
    {

        // get the access token from session
        $accessToken = $this->getAccessToken();

        //if access token is not null
        if ($accessToken != null) {

            try {
                $options = [
                    'baseURI' => 'http://192.168.1.98/EDMS/api/v1/',
                ];
                $client = \Config\Services::curlrequest($options);

                $response = null;

                if ($requestType == "POST") {
                    $response = $client->request($requestType, $url, [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $accessToken,
                            'Accept'     => 'application/json',
                        ],
                        'multipart' => $params,
                        'http_errors' => false
                    ]);
                } else {
                    $response = $client->request($requestType, $url, [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $accessToken,
                            'Accept'     => 'application/json',
                        ],
                        'form_params' => $params,
                        'http_errors' => false
                    ]);
                }

                // get content type of the response
                $contentType = $response->getHeaderLine('Content-Type');
                if (trim($contentType) != 'application/json; charset=UTF-8') {
                    return $response;
                }

                $response = json_decode($response->getBody(), true);

                // Check if the access token is expired (401 Unauthorized)
                if ($response['status'] === 401) {

                    // Refresh the access token
                    $response = $this->refreshAccessToken();
                    if ($response['status'] == 200) {
                        // Retry the API request with the new access token
                        return $this->NewRequest($url, $requestType, $params);
                    } else {
                        return $response;
                    }
                }

                return $response;
            } catch (\Exception $e) {
                // log error in log file
                // log_message('error', 'API REQUEST HELPER :: 00X11 :: ' . $e->getMessage());
                return [
                    'status' => 500,
                    'error' => null,
                    'code' => '00X15',
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
        return isset($_SESSION['access_token']) ? $_SESSION['access_token'] : null;
    }

    // refresh the access token
    private function refreshAccessToken()
    {
        try {
            $options = [
                'baseURI' => 'http://192.168.1.98/EDMS/api/v1/',
            ];
            $client = \Config\Services::curlrequest($options);

            $url = 'auth/token';

            $response = $client->request('POST', $url, [
                'json' => [
                    'system_id' => '655c4f0746ee4',
                    'api_key' => '161b93dac0eb868857a6f0b17b4af328c705df97a21ed42eb9eb4f5142d46f8f',
                    'emp_code' => session()->get('emp_code'),
                ],
                'http_errors' => false
            ]);

            $response = json_decode($response->getBody(), true);
            // print_r($response);
            if ($response['status'] == 200) {
                $_SESSION['access_token'] = $response['access_token'];
                return [
                    'status' => 200,
                    'error' => null,
                    'message' => "Token refreshed successfully."
                ];
            }
        } catch (\Exception $e) {
            // log error in log file
            //  log_message('error', 'API REQUEST HELPER :: 00X13 :: ' . $e->getMessage());
            return [
                'status' => 500,
                'error' => null,
                'code' => '00X13',
                'message' => $e->getMessage()
            ];
        }
    }
}

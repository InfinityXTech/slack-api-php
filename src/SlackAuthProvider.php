<?php

namespace SlackApi;

use GuzzleHttp\Client;
use Exception;

class SlackAuthProvider {
    protected $clientId;
    protected $clientSecret;
    protected $redirectUrl;
    protected $client;
    protected $scopes = ['identity.basic', 'identity.email', 'identity.team', 'identity.avatar'];

    protected $baseUrl = 'https://slack.com';

    public function __construct($clientId, $clientSecret, $redirectUrl) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUrl = $redirectUrl;
        $this->client = new Client(['base_uri' => $this->baseUrl]);
    }

    protected function getAuthUrl() {
        return $this->baseUrl . '/oauth/v2/authorize' . '?' . http_build_query($this->getCodeFields(), '', '&', PHP_QUERY_RFC1738);
    }

    protected function getCodeFields() {
        return [
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUrl,
            'user_scope' => implode(',', $this->scopes),
            'response_type' => 'code',
        ];
    }

    public function redirect() {
        header("Location: " . $this->getAuthUrl());
        exit;
    }

    protected function getTokenUrl() {
        return '/api/oauth.v2.access';
    }

    public function getAccessToken($code) {
        try {
            $response = $this->client->request('POST', $this->getTokenUrl(), [
                'form_params' => $this->getTokenFields($code)
            ]);

            $responseData = json_decode($response->getBody(), true);

            if (!empty($responseData['ok']) && isset($responseData['authed_user']['access_token'])) {
                return $responseData['authed_user']['access_token'];
            }
            throw new Exception('Access token not found in the response');
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            throw new Exception("HTTP request failed: " . $e->getMessage());
        }
    }

    protected function getTokenFields($code) {
        return [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code' => $code,
            'redirect_uri' => $this->redirectUrl,
        ];
    }
}

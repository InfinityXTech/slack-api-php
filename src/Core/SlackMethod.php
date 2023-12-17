<?php

namespace SlackApi\Core;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

abstract class SlackMethod {
    protected $prefix;

    public function __construct(protected Client $client) {}

    protected function sendRequest($method, $uri, $options = [], $headers = []) {
        try {
            $options['headers'] = $headers;
            $response = $this->client->request($method, $this->prefix . $uri, $options);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            throw new \Exception("HTTP request failed: " . $e->getMessage());
        }
    }

    public function preparePayload(...$fields) {
        $payload = [];

        foreach ($fields as $field => $value) {
            if (!is_null($value)) {
                $payload[$field] = is_array($value) ? json_encode($value) : $value;
            }
        }

        return $payload;
    }

    // Other methods...
}

<?php

namespace SlackApi\Methods;

use SlackApi\Core\SlackMethod;

class SlackAuth extends SlackMethod {
    protected $prefix = '/auth.';

    public function revoke (?bool $test = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'revoke', $this->preparePayload([
            'test' => $test
        ]));
        
        return $response->revoked;
    }
    
    public function teamsList (?string $cursor = null, ?bool $includeIcon = null, ?int $limit = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'teams.list', $this->preparePayload([
            'cursor' => $cursor,
            'include_icon' => $includeIcon,
            'limit' => $limit,
        ]));
        
        return $response;
    }

    public function test () {
        return $this->sendRequest('POST', $this->prefix . 'test');
    }
}
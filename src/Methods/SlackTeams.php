<?php

namespace SlackApi\Methods;

use SlackApi\Core\SlackMethod;
use SlackApi\Enums\SlackPlans;

class SlackTeams extends SlackMethod {
    protected $prefix = '/team.';

    public function accessLogs (?string $before = null, ?string $count = null, ?string $cursor = null, ?int $limit = null, ?string $page = null, ?string $teamId = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'accessLogs', $this->preparePayload([
            'before' => $before,
            'count' => $count,
            'cursor' => $cursor,
            'limit' => $limit,
            'page' => $page,
            'team_id' => $teamId,
        ]));
        
        return $response;
    }

    public function billableInfo (?string $userId = null, ?string $cursor = null, ?int $limit = null, ?string $teamId = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'billableInfo', $this->preparePayload([
            'user' => $userId,
            'cursor' => $cursor,
            'limit' => $limit,
            'team_id' => $teamId,
        ]));
        
        return $response->billable_info;
    }

    public function info (?string $domain = null, ?string $teamId = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'info', $this->preparePayload([
            'domain' => $domain,
            'team' => $teamId,
        ]));
        
        return $response->team;
    }

    public function integrationLogs (?string $appId = null, ?string $changeType = null, ?string $count = null, ?string $page = null, ?string $serviceId = null, ?string $teamId = null, ?string $userId = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'integrationLogs', $this->preparePayload([
            'app_id' => $appId,
            'change_type' => $changeType,
            'count' => $count,
            'page' => $page,
            'service_id' => $serviceId,
            'team' => $teamId,
            'user' => $userId,
        ]));
        
        return $response;
    }

    public function billingInfo () {
        $response = $this->sendRequest('GET', $this->prefix . 'billing.info');
        
        return SlackPlans::from($response->plan)->description();
    }

    public function preferencesList () {
        $response = $this->sendRequest('GET', $this->prefix . 'preferences.list');
        
        return $response;
    }

    public function profileGet (?string $visibility = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'profile.get', $this->preparePayload(['visibility' => $visibility]));
        
        return $response->profile;
    }
}
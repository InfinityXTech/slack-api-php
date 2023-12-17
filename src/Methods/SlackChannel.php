<?php

namespace SlackApi\Methods;
use SlackApi\Core\SlackMethod;

class SlackChannel extends SlackMethod {
    protected $prefix = '/conversations.';

    public function list (array $channels = ['public_channel', 'private_channel']) {
        $response = $this->sendRequest('POST', $this->prefix . 'list', $this->preparePayload([
            'types' => implode(',', $channels)
        ]));
        
        return $response->channels;
    }

    public function archive (string $channelId) {
        $this->sendRequest('POST', $this->prefix . 'archive', $this->preparePayload([
            'channel' => $channelId
        ]));
        
        return 'Channel was archived!';
    }

    public function create (string $name, ?bool $isPrivate = null, ?string $teamId = null) {
        $response = $this->sendRequest('POST', $this->prefix . 'create', $this->preparePayload([
            'name' => $name,
            'is_private' => $isPrivate,
            'team_id' => $teamId
        ]));
        
        return $response->channel;
    }

    public function info (string $channelId, ?bool $includeLocale = null, ?bool $includeNumMembers = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'info', $this->preparePayload([
            'channel' => $channelId,
            'include_locale' => $includeLocale,
            'include_num_members' => $includeNumMembers
        ]));
        
        return $response->channel;
    }

    public function members (string $channelId, ?string $cursor = null, ?int $limit = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'members', $this->preparePayload([
            'channel' => $channelId,
            'cursor' => $cursor,
            'limit' => $limit
        ]));
        
        return $response->members;
    }

    public function invite (string $channelId, array $users) {
        $response = $this->sendRequest('POST', $this->prefix . 'invite', $this->preparePayload([
            'channel' => $channelId,
            'users' => implode(',', $users)
        ]));
        
        return $response->channel;
    }

    public function rename (string $channelId, string $name) {
        $response = $this->sendRequest('POST', $this->prefix . 'rename', $this->preparePayload([
            'channel' => $channelId,
            'name' => $name
        ]));
        
        return $response->channel;
    }

    public function setPurpose (string $channelId, string $purpose) {
        $response = $this->sendRequest('POST', $this->prefix . 'setPurpose', $this->preparePayload([
            'channel' => $channelId,
            'purpose' => $purpose
        ]));
        
        return $response->channel;
    }

    public function kick (string $channelId, string $userId) {
        $response = $this->sendRequest('POST', $this->prefix . 'kick', $this->preparePayload([
            'channel' => $channelId,
            'user' => $userId
        ]));
        
        return $response;
    }
}
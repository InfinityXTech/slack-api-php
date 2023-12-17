<?php

namespace SlackApi\Methods;

use SlackApi\Core\SlackMethod;

class SlackReactions extends SlackMethod {
    protected $prefix = '/reactions.';

    public function add (string $channelId, string $name, string $timestamp) {
        $response = $this->sendRequest('POST', $this->prefix . 'add', $this->preparePayload([
            'channel' => $channelId,
            'name' => $name,
            'timestamp' => $timestamp,
        ]));
        
        return $response;
    }

    public function get (?string $channelId = null, ?string $file = null, ?string $fileComment = null, ?bool $full = null, ?string $timestamp = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'get', $this->preparePayload([
            'channel' => $channelId,
            'file' => $file,
            'file_comment' => $fileComment,
            'full' => $full,
            'timestamp' => $timestamp,
        ]));
        
        return $response;
    }

    public function list (?int $count = null, ?string $cursor = null, ?bool $full = null, ?int $limit = null, ?int $page = null, ?string $teamId = null, ?string $userId = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'list', $this->preparePayload([
            'count' => $count,
            'cursor' => $cursor,
            'limit' => $limit,
            'full' => $full,
            'team_id' => $teamId,
            'page' => $page,
            'user' => $userId,
        ]));
        
        return $response;
    }

    public function remove (string $name, ?string $channelId = null, ?string $file = null, ?string $fileComment = null, ?string $timestamp = null) {
        $response = $this->sendRequest('POST', $this->prefix . 'remove', $this->preparePayload([
            'name' => $name,
            'channel' => $channelId,
            'file' => $file,
            'file_comment' => $fileComment,
            'timestamp' => $timestamp,
        ]));
        
        return $response;
    }
}
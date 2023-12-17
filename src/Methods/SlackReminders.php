<?php

namespace SlackApi\Methods;

use SlackApi\Core\SlackMethod;

class SlackReminders extends SlackMethod {
    protected $prefix = '/reminders.';

    public function add (string $text, string $time, ?array $recurrence = null, ?string $teamId = null, ?string $userId = null) {
        $response = $this->sendRequest('POST', $this->prefix . 'add', $this->preparePayload([
            'text' => $text,
            'time' => $time,
            'recurrence' => $recurrence,
            'team_id' => $teamId,
            'user' => $userId,
        ]));
        
        return $response->reminder;
    }

    public function complete (string $reminder, ?string $teamId = null) {
        $response = $this->sendRequest('POST', $this->prefix . 'complete', $this->preparePayload([
            'reminder' => $reminder,
            'team_id' => $teamId,
        ]));
        
        return $response;
    }

    public function delete (string $reminder, ?string $teamId = null) {
        $response = $this->sendRequest('POST', $this->prefix . 'delete', $this->preparePayload([
            'reminder' => $reminder,
            'team_id' => $teamId,
        ]));
        
        return $response;
    }

    public function info (string $reminder, ?string $teamId = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'info', $this->preparePayload([
            'reminder' => $reminder,
            'team_id' => $teamId,
        ]));
        
        return $response->reminder;
    }

    public function list (string $reminder, ?string $teamId = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'list', $this->preparePayload(['team_id' => $teamId]));
        
        return $response->reminders;
    }
}
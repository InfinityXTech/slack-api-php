<?php

namespace SlackApi\Methods;

use SlackApi\Core\SlackMethod;

class SlackViews extends SlackMethod {
    protected $prefix = '/views.';

    public function open (?string $triggerId = null, ?string $interactivityPointer = null) {
        if (is_null($triggerId) && is_null($interactivityPointer)) {
            throw new \Exception("Either trigger id or interactivity pointer must be used!");
        }
        
        $response = $this->sendRequest('POST', $this->prefix . 'open', $this->preparePayload([
            'trigger_id' => $triggerId,
            'interactivity_pointer' => $interactivityPointer
        ]));
        
        return $response->view;
    }

    public function publish (string $userId, array $view, ?string $hash = null) {        
        $response = $this->sendRequest('POST', $this->prefix . 'publish', $this->preparePayload([
            'user_id' => $userId,
            'view' => $view,
            'hash' => $hash
        ]));
        
        return $response->view;
    }
    
    public function push (array $view, ?string $triggerId = null, ?string $interactivityPointer = null, ?string $hash = null) {
        if (is_null($triggerId) && is_null($interactivityPointer)) {
            throw new \Exception("Either trigger id or interactivity pointer must be used!");
        }

        $response = $this->sendRequest('POST', $this->prefix . 'push', $this->preparePayload([
            'trigger_id' => $triggerId,
            'interactivity_pointer' => $interactivityPointer,
            'view' => $view,
            'hash' => $hash
        ]));
        
        return $response->view;
    }
    
    public function update (array $view, ?string $externalId = null, ?string $viewId = null, ?string $hash = null) {
        if (is_null($externalId) && is_null($viewId)) {
            throw new \Exception("Either external id or view id must be used!");
        }

        $response = $this->sendRequest('POST', $this->prefix . 'update', $this->preparePayload([
            'external_id' => $externalId,
            'view_id' => $viewId,
            'view' => $view,
            'hash' => $hash
        ]));
        
        return $response->view;
    }

}
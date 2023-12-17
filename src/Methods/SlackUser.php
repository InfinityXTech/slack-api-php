<?php

namespace SlackApi\Methods;

use SlackApi\Core\SlackMethod;
use SlackApiz\Core\ExceptionMessages;

class SlackUser extends SlackMethod {
    protected $prefix = '/users.';

    public function list (string $cursor = null, bool $includeLocale = false, int $limit = 0, string $teamId = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'list', [
            'cursor' => $cursor,
            'include_locale' => $includeLocale,
            'limit' => $limit,
            'team_id' => $teamId,
        ]);
        
        return $response->members;
    }

    public function conversations (string $cursor = null, bool $excludeArchived = false, int $limit = 100, string $teamId = null, array $channelTypes = ['public_channel', 'private_channel', 'mpim', 'im'], string $userId) {
        $response = $this->sendRequest('GET', $this->prefix . 'conversations', [
            'cursor' => $cursor,
            'exclude_archived' => $excludeArchived,
            'limit' => $limit,
            'team_id' => $teamId,
            'types' => implode(',', $channelTypes),
            'user' => $userId
        ]);

        return $response->channels;
    }

    public function deletePhoto () {
        $this->sendRequest('GET', $this->prefix . 'deletePhoto');
        
        return 'Photo was removed!';
    }

    public function getPresence (?string $userId = null) {
        return $this->sendRequest('GET', $this->prefix . 'getPresence', $this->preparePayload([
            'user' => $userId
        ]));
    }

    public function identity () {
        return $this->sendRequest('GET', $this->prefix . 'identity');
    }

    public function info (?bool $includeLocale = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'info', $this->preparePayload([
            'include_locale' => $includeLocale
        ]));
        
        return $response->user;
    }

    public function lookupByEmail (string $email) {
        $response = $this->sendRequest('GET', $this->prefix . 'lookupByEmail', $this->preparePayload([
            'email' => $email
        ]));
        
        return $response->user;
    }

    public function setActive () {
        $response = $this->sendRequest('POST', $this->prefix . 'setActive');
        
        return 'Status set as active.';
    }

    public function setPhoto ($image, ?string $cropW = null, ?string $cropX = null, ?string $cropY = null) {
        $response = $this->sendRequest('POST', $this->prefix . 'setPhoto', $this->preparePayload([
            'image' => $image,
            'crop_w' => $cropW,
            'crop_x' => $cropX,
            'crop_y' => $cropY,
        ]), [
            'Content-Type: multipart/form-data'
        ]);
        
        return 'Photo has been set.';
    }

    public function setPresence ($presence) {
        if (!in_array($presence, ['auto', 'away'])) {
            throw new \Exception(ExceptionMessages::message("invalid_presence"));
        }

        $response = $this->sendRequest('POST', $this->prefix . 'setPresence', $this->preparePayload([
            'presence' => $presence,
        ]));
        
        return 'Presence has been set.';
    }

    public function getProfile (?string $userId = null, ?bool $includeLabels = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'profile.get', $this->preparePayload([
            'user' => $userId,
            'include_labels' => $includeLabels
        ]));
        
        return $response->profile;
    }

    /**
     * https://api.slack.com/methods/users.profile.set for more details
     */
    public function setProfile (?string $name = null, ?array $profile = null, ?string $userId = null, ?string $value = null) {
        $response = $this->sendRequest('POST', $this->prefix . 'profile.set', $this->preparePayload([
            'name' => $name,
            'user' => $userId,
            'value' => $value,
            'profile' => $profile,
        ]));
        
        return $response->profile;
    }
}
<?php

namespace SlackApi\Methods;

use SlackApi\Core\SlackMethod;

class SlackUserGroups extends SlackMethod {
    protected $prefix = '/usergroups.';

    public function create (?array $channels = null, ?string $description = null, ?string $hanlde = null, ?bool $includeCount = null, ?string $teamId = null) {
        $response = $this->sendRequest('POST', $this->prefix . 'create', $this->preparePayload([
            'channels' => implode(',', $channels),
            'description' => $description,
            'hanlde' => $hanlde,
            'include_count' => $includeCount,
            'team_id' => $teamId,
        ]));
        
        return $response->usergroup;
    }
    public function update (?array $channels = null, ?string $description = null, ?string $hanlde = null, ?bool $includeCount = null, ?string $teamId = null, ?string $name = null) {
        $response = $this->sendRequest('POST', $this->prefix . 'update', $this->preparePayload([
            'channels' => implode(',', $channels),
            'description' => $description,
            'hanlde' => $hanlde,
            'include_count' => $includeCount,
            'team_id' => $teamId,
            'name' => $name
        ]));
        
        return $response->usergroup;
    }
    public function disable (string $userGroupId, ?bool $includeCount = null, ?string $teamId = null) {
        $response = $this->sendRequest('POST', $this->prefix . 'disable', $this->preparePayload([
            'usergroup' => $userGroupId,
            'include_count' => $includeCount,
            'team_id' => $teamId,
        ]));
        
        return $response->usergroup;
    }

    public function enable (string $userGroupId, ?bool $includeCount = null, ?string $teamId = null) {
        $response = $this->sendRequest('POST', $this->prefix . 'enable', $this->preparePayload([
            'usergroup' => $userGroupId,
            'include_count' => $includeCount,
            'team_id' => $teamId,
        ]));
        
        return $response->usergroup;
    }

    public function list (?bool $includeCount = null, ?bool $includeDisabled = null, ?bool $includeUsers = null, ?string $teamId = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'list', $this->preparePayload([
            'include_count' => $includeCount,
            'include_disabled' => $includeDisabled,
            'include_users' => $includeUsers,
            'team_id' => $teamId,
        ]));
        
        return $response->usergroups;
    }

    public function usersList (string $userGroupId, ?bool $includeDisabled = null, ?string $teamId = null) {
        $response = $this->sendRequest('GET', $this->prefix . 'users.list', $this->preparePayload([
            'usergroup' => $userGroupId,
            'include_disabled' => $includeDisabled,
            'team_id' => $teamId,
        ]));
        
        return $response->users;
    }

    public function usersUpdate (string $userGroupId, array $users, ?bool $includeCount = null, ?string $teamId = null) {
        $response = $this->sendRequest('POST', $this->prefix . 'users.update', $this->preparePayload([
            'usergroup' => $userGroupId,
            'users' => implode(',', $users),
            'include_count' => $includeCount,
            'team_id' => $teamId,
        ]));
        
        return $response->usergroup;
    }
}
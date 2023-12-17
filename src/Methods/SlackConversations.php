<?php

namespace SlackApi\Methods;

use SlackApi\Core\SlackMethod;

class SlackConversations extends SlackMethod {
    protected $prefix = '/conversations.';

    public function acceptSharedInvite (
        string $channelName,
        ?string $channelId = null,
        ?bool $freeTrialAccepted = null,
        ?string $inviteId = null,
        ?bool $isPrivate = null,
        ?string $teamId = null
    ) {
        return $this->sendRequest('POST', $this->prefix . 'acceptSharedInvite', $this->preparePayload([
            'channel_name' => $channelName,
            'channel_id' => $channelId,
            'free_trial_accepted' => $freeTrialAccepted,
            'invite_id' => $inviteId,
            'is_private' => $isPrivate,
            'team_id' => $teamId
        ]));
    }

    public function approveSharedInvite (
        string $inviteId,
        ?string $targetTeam = null
    ) {
        return $this->sendRequest('POST', $this->prefix . 'approveSharedInvite', $this->preparePayload([
            'invite_id' => $inviteId,
            'target_team' => $targetTeam
        ]));
    }
    
    public function archive (string $channel) {
        return $this->sendRequest('POST', $this->prefix . 'archive', $this->preparePayload([
            'channel' => $channel
        ]));
    }
    
    public function close (string $channel) {
        return $this->sendRequest('POST', $this->prefix . 'close', $this->preparePayload([
            'channel' => $channel
        ]));
    }
    
    public function create (string $name, bool $isPrivate = false, ?string $teamId = null) {
        return $this->sendRequest('POST', $this->prefix . 'create', $this->preparePayload([
            'name' => $name,
            'is_private' => $isPrivate,
            'team_id' => $teamId
        ]));
    }
    
    public function declineSharedInvite (string $inviteId, ?string $targetTeam = null) {
        return $this->sendRequest('GET', $this->prefix . 'declineSharedInvite', $this->preparePayload([
            'invite_id' => $inviteId,
            'target_team' => $targetTeam
        ]));
    }
    
    public function history (
        string $channel,
        ?string $cursor = null,
        ?bool $includeAllMetadata = null,
        ?bool $inclusive = null,
        ?string $latest = null,
        ?int $limit = null,
        ?string $oldest = null
    ) {
        return $this->sendRequest('POST', $this->prefix . 'history', $this->preparePayload([
            'channel' => $channel,
            'cursor' => $cursor,
            'include_all_metadata' => $includeAllMetadata,
            'inclusive' => $inclusive,
            'latest' => $latest,
            'limit' => $limit,
            'oldest' => $oldest
        ]));
    }
    
    public function info (
        string $channel,
        ?bool $includeLocale = null,
        ?bool $includeNumMembers = null
    ) {
        return $this->sendRequest('GET', $this->prefix . 'info', $this->preparePayload([
            'channel' => $channel,
            'include_locale' => $includeLocale,
            'include_num_members' => $includeNumMembers
        ]));
    }
    
    public function inviteTo (
        string $channel,
        string $users
    ) {
        return $this->sendRequest('POST', $this->prefix . 'invite', $this->preparePayload([
            'channel' => $channel,
            'users' => $users
        ]));
    }
    
    public function inviteToShared (
        string $channel,
        ?array $emails = null,
        ?bool $externalLimited = null,
        ?array $userIds = null
    ) {
        return $this->sendRequest('GET', $this->prefix . 'inviteShared', $this->preparePayload([
            'channel' => $channel,
            'emails' => $emails,
            'external_limited' => $externalLimited,
            'user_ids' => $userIds
        ]));
    }
    
    public function join (string $channel) {
        return $this->sendRequest('POST', $this->prefix . 'join', $this->preparePayload([
            'channel' => $channel
        ]));
    }
    
    public function kick (string $channel, string $user) {
        return $this->sendRequest('POST', $this->prefix . 'kick', $this->preparePayload([
            'channel' => $channel,
            'user' => $user
        ]));
    }
    
    public function leave (string $channel) {
        return $this->sendRequest('POST', $this->prefix . 'leave', $this->preparePayload([
            'channel' => $channel
        ]));
    }
    
    public function list (?string $cursor = null, ?bool $excludeArchived = null, ?int $limit = null, ?string $teamId = null, ?string $types = null) {
        return $this->sendRequest('GET', $this->prefix . 'list', $this->preparePayload([
            'cursor' => $cursor,
            'exclude_archived' => $excludeArchived,
            'limit' => $limit,
            'team_id' => $teamId,
            'types' => $types
        ]));
    }
    
    public function listConnectInvites (?int $count = null, ?string $cursor = null, ?string $teamId = null) {
        return $this->sendRequest('POST', $this->prefix . 'listConnectInvites', $this->preparePayload([
            'count' => $count,
            'cursor' => $cursor,
            'team_id' => $teamId
        ]));
    }
    
    public function mark (string $channel, string $ts) {
        return $this->sendRequest('POST', $this->prefix . 'mark', $this->preparePayload([
            'channel' => $channel,
            'ts' => $ts
        ]));
    }
    
    public function members (string $channel, ?string $cursor = null, ?int $limit = null) {
        return $this->sendRequest('GET', $this->prefix . 'members', $this->preparePayload([
            'channel' => $channel,
            'cursor' => $cursor,
            'limit' => $limit
        ]));
    }
    
    public function open (?string $channel = null, ?bool $preventCreation = null, ?bool $returnIM = null, ?string $users = null) {
        return $this->sendRequest('POST', $this->prefix . 'open', $this->preparePayload([
            'channel' => $channel,
            'prevent_creation' => $preventCreation,
            'return_im' => $returnIM,
            'users' => $users
        ]));
    }
    
    public function rename (string $channel, string $name) {
        return $this->sendRequest('POST', $this->prefix . 'rename', $this->preparePayload([
            'channel' => $channel,
            'name' => $name
        ]));
    }
    
    public function replies (string $channel, string $ts, ?string $cursor = null, ?bool $includeAllMetadata = null, ?bool $inclusive = null, ?string $latest = null, ?int $limit = null, ?string $oldest = null) {
        return $this->sendRequest('GET', $this->prefix . 'replies', $this->preparePayload([
            'channel' => $channel,
            'ts' => $ts,
            'cursor' => $cursor,
            'include_all_metadata' => $includeAllMetadata,
            'inclusive' => $inclusive,
            'latest' => $latest,
            'limit' => $limit,
            'oldest' => $oldest
        ]));
    }
    
    public function setPurpose (string $channel, string $purpose) {
        return $this->sendRequest('POST', $this->prefix . 'setPurpose', $this->preparePayload([
            'channel' => $channel,
            'purpose' => $purpose
        ]));
    }
    
    public function setTopic(string $channel, string $topic) {
        return $this->sendRequest('POST', $this->prefix . 'setTopic', $this->preparePayload([
            'channel' => $channel,
            'topic' => $topic
        ]));
    }
    
    public function unarchive (string $channel) {
        return $this->sendRequest('POST', $this->prefix . 'unarchive', $this->preparePayload([
            'channel' => $channel
        ]));
    }    
}
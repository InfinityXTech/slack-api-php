<?php

namespace SlackApi;

use GuzzleHttp\Client;
use SlackApi\Methods\SlackApps;
use SlackApi\Methods\SlackAuth;
use SlackApi\Methods\SlackChannel;
use SlackApi\Methods\SlackChat;
use SlackApi\Methods\SlackConversations;
use SlackApi\Methods\SlackFiles;
use SlackApi\Methods\SlackReactions;
use SlackApi\Methods\SlackReminders;
use SlackApi\Methods\SlackTeams;
use SlackApi\Methods\SlackUser;
use SlackApi\Methods\SlackUserGroups;
use SlackApi\Methods\SlackViews;

class SlackApiProvider {
    protected SlackChannel $channel;
    protected SlackUser $user;
    protected SlackChat $chat;
    protected SlackAuth $auth;
    protected SlackApps $apps;
    protected SlackConversations $conversations;
    protected SlackFiles $files;
    protected SlackReactions $reactions;
    protected SlackReminders $reminders;
    protected SlackTeams $teams;
    protected SlackUserGroups $userGroups;
    protected SlackViews $views;
    protected Client $client;

    public function __construct(protected ?string $token = null) {
        if (!is_null($token)) {
            $this->init();
        }
    }

    public function setToken (string $token) {
        $this->token = $token;
        $this->init();
    }

    protected function init () {
        $this->client = new Client([
            'base_uri' => 'https://slack.com/api',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8'
            ]
        ]);
    }

    public function channel () {
        return $this->channel ??= new SlackChannel($this->client);
    }

    public function user () {
        return $this->user ??= new SlackUser($this->client);
    }

    public function chat () {
        return $this->chat ??= new SlackChat($this->client);
    }

    public function auth () {
        return $this->auth ??= new SlackAuth($this->client);
    }

    public function apps () {
        return $this->apps ??= new SlackApps($this->client);
    }

    public function conversations () {
        return $this->conversations ??= new SlackConversations($this->client);
    }

    public function files () {
        return $this->files ??= new SlackFiles($this->client);
    }

    public function reactions () {
        return $this->reactions ??= new SlackReactions($this->client);
    }

    public function reminders () {
        return $this->reminders ??= new SlackReminders($this->client);
    }

    public function teams () {
        return $this->teams ??= new SlackTeams($this->client);
    }

    public function userGroups () {
        return $this->userGroups ??= new SlackUserGroups($this->client);
    }

    public function views () {
        return $this->views ??= new SlackViews($this->client);
    }
}
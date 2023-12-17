<?php

namespace SlackApi\Methods;

use Exception;
use SlackApi\Core\SlackMethod;

class SlackChat extends SlackMethod {
    protected $prefix = '/chat.';

    public function postMessage (string $channelId, ?string $text = null, ?array $blocks = null, ?array $attachments = null, ?bool $asUser = null, ?string $iconEmoji = null, ?string $iconUrl = null, ?bool $linkNames = null, ?array $metadata = null, ?bool $mrkdwn = null, ?string $parse = null, ?bool $replyBroadcast = null, ?string $threadTs = null, ?bool $unfurlLinks = null, ?bool $unfurlMedia = null, ?string $username = null) {
        if (is_null($text) && is_null($blocks) && is_null($attachments)) {
            throw new Exception("Either text, blocks or attachments must be used!");
        }

        $response = $this->sendRequest('POST', $this->prefix . 'postMessage', $this->preparePayload([
            'channel' => $channelId,
            'text' => $text,
            'blocks' => $blocks,
            'attachments' => $attachments,
            'as_user' => $asUser,
            'icon_emoji' => $iconEmoji,
            'icon_url' => $iconUrl,
            'link_names' => $linkNames,
            'metadata' => $metadata,
            'mrkdwn' => $mrkdwn,
            'parse' => $parse,
            'reply_broadcast' => $replyBroadcast,
            'threads_ts' => $threadTs,
            'unfurl_links' => $unfurlLinks,
            'unfurl_media' => $unfurlMedia,
            'username' => $username,
        ]));
        
        return $response->message;
    }

    public function update (string $channelId, string $ts, ?string $text = null, ?array $blocks = null, ?array $attachments = null, ?bool $asUser = null, ?bool $linkNames = null, ?array $metadata = null, ?string $parse = null, ?bool $replyBroadcast = null, ?array $fileIds = null) {
        if (is_null($text) && is_null($blocks) && is_null($attachments)) {
            throw new Exception("Either text, blocks or attachments must be used!");
        }

        return $this->sendRequest('POST', $this->prefix . 'update', $this->preparePayload([
            'channel' => $channelId,
            'text' => $text,
            'blocks' => $blocks,
            'attachments' => $attachments,
            'as_user' => $asUser,
            'link_names' => $linkNames,
            'metadata' => $metadata,
            'parse' => $parse,
            'reply_broadcast' => $replyBroadcast,
            'ts' => $ts,
            'file_ids' => $fileIds, // maybe needs to be encoded as well but it says array not string like for others fields

        ]));
    }
    
    public function scheduledMessagesList (string $channelId, string $cursor = null, string $latest = null, int $limit = 100, string $oldest = null, string $teamId = null) {

        return $this->sendRequest('POST', $this->prefix . 'scheduledMessages.list', $this->preparePayload([
            'channel' => $channelId,
            'cursor' => $cursor,
            'latest' => $latest,
            'oldest' => $oldest,
            'limit' => $limit,
            'team_id' => $teamId
        ]));
    }

    public function unfurl (string $channelId, string $ts, array $unfurls, ?string $source = null, ?string $unfurlId = null, ?array $userAuthBlocks = null, ?string $userAuthMessage = null, ?bool $userAuthRequired = null, ?string $userAuthUrl = null) {

        return $this->sendRequest('POST', $this->prefix . 'unfurl', $this->preparePayload([
            'channel' => $channelId,
            'ts' => $ts,
            'unfurls' => $unfurls,
            'source' => $source,
            'unfurl_id' => $unfurlId,
            'user_auth_blocks' => $userAuthBlocks,
            'user_auth_message' => $userAuthMessage,
            'user_auth_required' => $userAuthRequired,
            'user_auth_url' => $userAuthUrl
        ]));
    }

    public function scheduleMessage (string $channelId, string $threadTs, ?int $postAt = null, ?string $text = null, ?array $blocks = null, ?array $attachments = null, ?bool $asUser = null, ?bool $linkNames = null, ?array $metadata = null, ?string $parse = null, ?bool $replyBroadcast = null, ?bool $unfurlLinks = null, ?bool $unfurlMedia = null) {
        if (is_null($text) && is_null($blocks) && is_null($attachments)) {
            throw new Exception("Either text, blocks or attachments must be used!");
        }

        return $this->sendRequest('POST', $this->prefix . 'scheduleMessage', $this->preparePayload([
            'channel' => $channelId,
            'post_at' => $postAt ?? time(),
            'unfurl_links' => $unfurlLinks,
            'unfurl_media' => $unfurlMedia,
            'text' => $text,
            'blocks' => $blocks,
            'attachments' => $attachments,
            'as_user' => $asUser,
            'link_names' => $linkNames,
            'metadata' => $metadata,
            'parse' => $parse,
            'reply_broadcast' => $replyBroadcast,
            'thread_ts' => $threadTs,
        ]));
    }

    public function postEphemeral (string $channelId, string $userId, ?string $text = null, array $blocks = null, ?array $attachments = null, ?bool $asUser = null, ?string $iconEmoji = null, ?string $iconUrl = null, ?bool $linkNames = null, ?string $parse = null, ?string $threadTs = null, ?string $username = null) {
        if (is_null($text) && is_null($blocks) && is_null($attachments)) {
            throw new Exception("Either text, blocks or attachments must be used!");
        }

        return $this->sendRequest('POST', $this->prefix . 'postEphemeral', $this->preparePayload([
            'channel' => $channelId,
            'user' => $userId,
            'text' => $text,
            'blocks' => $blocks,
            'attachments' => $attachments,
            'as_user' => $asUser,
            'icon_emoji' => $iconEmoji,
            'icon_url' => $iconUrl,
            'link_names' => $linkNames,
            'parse' => $parse,
            'threads_ts' => $threadTs,
            'username' => $username,
        ]));
    }

    public function meMessage (string $channelId, string $text) {
        return $this->sendRequest('POST', $this->prefix . 'meMessage', $this->preparePayload([
            'channel' => $channelId,
            'text' => $text
        ]));
    }

    public function deleteScheduledMessage (string $channelId, string $scheduledMessageId, ?bool $asUser = null) {
        return $this->sendRequest('POST', $this->prefix . 'deleteScheduledMessage', $this->preparePayload([
            'channel' => $channelId,
            'scheduled_message_id' => $scheduledMessageId,
            'as_user' => $asUser
        ]));
    }

    public function delete (string $channelId, string $ts, ?bool $asUser = null) {
        return $this->sendRequest('POST', $this->prefix . 'delete', $this->preparePayload([
            'channel' => $channelId,
            'ts' => $ts,
            'as_user' => $asUser
        ]));
    }

    public function getPermalink (string $channelId, string $messageTs) {
        return $this->sendRequest('GET', $this->prefix . 'getPermalink', $this->preparePayload([
            'channel' => $channelId,
            'message_ts' => $messageTs,
        ]));
    }
}
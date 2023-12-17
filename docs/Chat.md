# Slack Chat API Methods ([Go Back](../README.md))

This PHP class provides methods to interact with the Slack Chat API. Below are instructions on how to use each method.

## Method: postMessage

```php
postMessage(
    string $channelId,
    ?string $text = null,
    ?array $blocks = null,
    ?array $attachments = null,
    ?bool $asUser = null,
    ?string $iconEmoji = null,
    ?string $iconUrl = null,
    ?bool $linkNames = null,
    ?array $metadata = null,
    ?bool $mrkdwn = null,
    ?string $parse = null,
    ?bool $replyBroadcast = null,
    ?string $threadTs = null,
    ?bool $unfurlLinks = null,
    ?bool $unfurlMedia = null,
    ?string $username = null
)
```

Post a message to a channel.

## Method: update

```php
update(
    string $channelId,
    string $ts,
    ?string $text = null,
    ?array $blocks = null,
    ?array $attachments = null,
    ?bool $asUser = null,
    ?bool $linkNames = null,
    ?array $metadata = null,
    ?string $parse = null,
    ?bool $replyBroadcast = null,
    ?array $fileIds = null
)
```

Update a message in a channel.

## Method: scheduledMessagesList

```php
scheduledMessagesList(
    string $channelId,
    string $cursor = null,
    string $latest = null,
    int $limit = 100,
    string $oldest = null,
    string $teamId = null
)
```

List scheduled messages for a channel.

## Method: unfurl

```php
unfurl(
    string $channelId,
    string $ts,
    array $unfurls,
    ?string $source = null,
    ?string $unfurlId = null,
    ?array $userAuthBlocks = null,
    ?string $userAuthMessage = null,
    ?bool $userAuthRequired = null,
    ?string $userAuthUrl = null
)
```

Unfurl message links in a channel.

## Method: scheduleMessage

```php
scheduleMessage(
    string $channelId,
    string $threadTs,
    ?int $postAt = null,
    ?string $text = null,
    ?array $blocks = null,
    ?array $attachments = null,
    ?bool $asUser = null,
    ?bool $linkNames = null,
    ?array $metadata = null,
    ?string $parse = null,
    ?bool $replyBroadcast = null,
    ?bool $unfurlLinks = null,
    ?bool $unfurlMedia = null
)
```

Schedule a message to be sent in the future.

## Method: postEphemeral

```php
postEphemeral(
    string $channelId,
    string $userId,
    ?string $text = null,
    array $blocks = null,
    ?array $attachments = null,
    ?bool $asUser = null,
    ?string $iconEmoji = null,
    ?string $iconUrl = null,
    ?bool $linkNames = null,
    ?string $parse = null,
    ?string $threadTs = null,
    ?string $username = null
)
```

Post an ephemeral message to a user in a channel.

## Method: meMessage

```php
meMessage(
    string $channelId,
    string $text
)
```

Send a "me" message to a channel.

## Method: deleteScheduledMessage

```php
deleteScheduledMessage(
    string $channelId,
    string $scheduledMessageId,
    ?bool $asUser = null
)
```

Delete a scheduled message in a channel.

## Method: delete

```php
delete(
    string $channelId,
    string $ts,
    ?bool $asUser = null
)
```

Delete a message from a channel.

## Method: getPermalink

```php
getPermalink(
    string $channelId,
    string $messageTs
)
```

Get a permalink URL for a message.

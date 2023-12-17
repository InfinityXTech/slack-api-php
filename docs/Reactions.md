# Slack Reactions API Methods ([Go Back](../README.md))

This PHP class provides methods to interact with the Slack Reactions API. Below are instructions on how to use each method.

## Method: add

```php
add(
    string $channelId,
    string $name,
    string $timestamp
)
```

Add a reaction to a message.

## Method: get

```php
get(
    ?string $channelId = null,
    ?string $file = null,
    ?string $fileComment = null,
    ?bool $full = null,
    ?string $timestamp = null
)
```

Get reactions from a message.

## Method: list

```php
list(
    ?int $count = null,
    ?string $cursor = null,
    ?bool $full = null,
    ?int $limit = null,
    ?int $page = null,
    ?string $teamId = null,
    ?string $userId = null
)
```

List reactions made by a user.

## Method: remove

```php
remove(
    string $name,
    ?string $channelId = null,
    ?string $file = null,
    ?string $fileComment = null,
    ?string $timestamp = null
)
```

Remove a reaction from a message.

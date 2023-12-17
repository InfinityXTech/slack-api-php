# Slack Channel API Methods ([Go Back](../README.md))

This PHP class provides methods to interact with the Slack Channel API. Below are instructions on how to use each method.

## Method: list

```php
list(array $channels = ['public_channel', 'private_channel'])
```

List channels based on the provided channel types.

## Method: archive

```php
archive(string $channelId)
```

Archive a channel.

## Method: create

```php
create(string $name, ?bool $isPrivate = null, ?string $teamId = null)
```

Create a new channel.

## Method: info

```php
info(string $channelId, ?bool $includeLocale = null, ?bool $includeNumMembers = null)
```

Retrieve information about a channel.

## Method: members

```php
members(string $channelId, ?string $cursor = null, ?int $limit = null)
```

List members of a channel.

## Method: invite

```php
invite(string $channelId, array $users)
```

Invite users to a channel.

## Method: rename

```php
rename(string $channelId, string $name)
```

Rename a channel.

## Method: setPurpose

```php
setPurpose(string $channelId, string $purpose)
```

Set the purpose for a channel.

## Method: kick

```php
kick(string $channelId, string $userId)
```

Remove a user from a channel.

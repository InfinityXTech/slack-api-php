# Slack Conversations API Methods ([Go Back](../README.md))

This PHP class provides methods to interact with the Slack Conversations API. Below are instructions on how to use each method.

## Accept Shared Invite

```php
acceptSharedInvite(string $channelName, ?string $channelId = null, ?bool $freeTrialAccepted = null, ?string $inviteId = null, ?bool $isPrivate = null, ?string $teamId = null)
```

Accepts a shared channel invite.

## Approve Shared Invite

```php
approveSharedInvite(string $inviteId, ?string $targetTeam = null)
```

Approves a Slack Connect shared channel invite.

## Archive

```php
archive(string $channel)
```

Archives a conversation.

## Close

```php
close(string $channel)
```

Closes a conversation.

## Create

```php
create(string $name, bool $isPrivate = false, ?string $teamId = null)
```

Creates a public or private channel.

## Decline Shared Invite

```php
declineSharedInvite(string $inviteId, ?string $targetTeam = null)
```

Declines a Slack Connect shared channel invite.

## History

```php
history(string $channel, ?string $cursor = null, ?bool $includeAllMetadata = null, ?bool $inclusive = null, ?string $latest = null, ?int $limit = null, ?string $oldest = null)
```

Fetches conversation history.

## Info

```php
info(string $channel, ?bool $includeLocale = null, ?bool $includeNumMembers = null)
```

Fetches information about a conversation.

## Invite To

```php
inviteTo(string $channel, string $users)
```

Invites users to a conversation.

## Invite To Shared

```php
inviteToShared(string $channel, ?array $emails = null, ?bool $externalLimited = null, ?array $userIds = null)
```

Invites users to a shared channel.

## Join

```php
join(string $channel)
```

Joins a conversation.

## Kick

```php
kick(string $channel, string $user)
```

Removes a user from a conversation.

## Leave

```php
leave(string $channel)
```

Leaves a conversation.

## List

```php
list(?string $cursor = null, ?bool $excludeArchived = null, ?int $limit = null, ?string $teamId = null, ?string $types = null)
```

Lists conversations.

## List Connect Invites

```php
listConnectInvites(?int $count = null, ?string $cursor = null, ?string $teamId = null)
```

Lists Slack Connect channel invites.

## Mark

```php
mark(string $channel, string $ts)
```

Sets the read cursor for a conversation.

## Members

```php
members(string $channel, ?string $cursor = null, ?int $limit = null)
```

Lists members of a conversation.

## Open

```php
open(?string $channel = null, ?bool $preventCreation = null, ?bool $returnIM = null, ?string $users = null)
```

Opens a direct message or multi-person direct message.

## Rename

```php
rename(string $channel, string $name)
```

Renames a conversation.

## Replies

```php
replies(string $channel, string $ts, ?string $cursor = null, ?bool $includeAllMetadata = null, ?bool $inclusive = null, ?string $latest = null, ?int $limit = null, ?string $oldest = null)
```

Fetches thread replies.

## Set Purpose

```php
setPurpose(string $channel, string $purpose)
```

Sets the purpose of a conversation.

## Set Topic

```php
setTopic(string $channel, string $topic)
```

Sets the topic of a conversation.

## Unarchive

```php
unarchive(string $channel)
```

Unarchives a conversation.

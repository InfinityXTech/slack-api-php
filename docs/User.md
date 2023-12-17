# Slack User API Methods ([Go Back](../README.md))

This PHP class provides methods to interact with the Slack User API. Below are instructions on how to use each method.

## Method: list

```php
list(
    ?string $cursor = null,
    bool $includeLocale = false,
    int $limit = 0,
    string $teamId = null
)
```

Retrieve a list of users in a team.

## Method: conversations

```php
conversations(
    ?string $cursor = null,
    bool $excludeArchived = false,
    int $limit = 100,
    string $teamId = null,
    array $channelTypes = ['public_channel', 'private_channel', 'mpim', 'im'],
    string $userId
)
```

Retrieve a list of conversations for a user.

## Method: deletePhoto

```php
deletePhoto()
```

Delete a user's profile photo.

## Method: getPresence

```php
getPresence(
    ?string $userId = null
)
```

Retrieve a user's presence information.

## Method: identity

```php
identity()
```

Retrieve a user's identity information.

## Method: info

```php
info(
    ?bool $includeLocale = null
)
```

Retrieve information about a user.

## Method: lookupByEmail

```php
lookupByEmail(
    string $email
)
```

Lookup a user by their email address.

## Method: setActive

```php
setActive()
```

Set a user's presence status as active.

## Method: setPhoto

```php
setPhoto(
    $image,
    ?string $cropW = null,
    ?string $cropX = null,
    ?string $cropY = null
)
```

Set a user's profile photo.

## Method: setPresence

```php
setPresence(
    $presence
)
```

Set a user's presence status.

## Method: getProfile

```php
getProfile(
    ?string $userId = null,
    ?bool $includeLabels = null
)
```

Retrieve a user's profile information.

## Method: setProfile

```php
setProfile(
    ?string $name = null,
    ?array $profile = null,
    ?string $userId = null,
    ?string $value = null
)
```

Set a user's profile information.


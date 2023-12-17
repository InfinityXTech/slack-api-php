# Slack User Groups API Methods ([Go Back](../README.md))

This PHP class provides methods to interact with the Slack User Groups API. Below are instructions on how to use each method.

## Method: create

```php
create(
    ?array $channels = null,
    ?string $description = null,
    ?string $hanlde = null,
    ?bool $includeCount = null,
    ?string $teamId = null
)
```

Create a new user group.

## Method: update

```php
update(
    ?array $channels = null,
    ?string $description = null,
    ?string $hanlde = null,
    ?bool $includeCount = null,
    ?string $teamId = null,
    ?string $name = null
)
```

Update an existing user group.

## Method: disable

```php
disable(
    string $userGroupId,
    ?bool $includeCount = null,
    ?string $teamId = null
)
```

Disable a user group.

## Method: enable

```php
enable(
    string $userGroupId,
    ?bool $includeCount = null,
    ?string $teamId = null
)
```

Enable a user group.

## Method: list

```php
list(
    ?bool $includeCount = null,
    ?bool $includeDisabled = null,
    ?bool $includeUsers = null,
    ?string $teamId = null
)
```

Retrieve a list of user groups.

## Method: usersList

```php
usersList(
    string $userGroupId,
    ?bool $includeDisabled = null,
    ?string $teamId = null
)
```

Retrieve a list of users in a user group.

## Method: usersUpdate

```php
usersUpdate(
    string $userGroupId,
    array $users,
    ?bool $includeCount = null,
    ?string $teamId = null
)
```

Update the list of users in a user group.


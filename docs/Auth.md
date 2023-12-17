# Slack Auth API Methods ([Go Back](../README.md))

This PHP class provides methods to interact with the Slack Auth API. Below are instructions on how to use each method.

## Method: revoke

```php
revoke(?bool $test = null)
```

Revoke an access token.

## Method: teamsList

```php
teamsList(?string $cursor = null, ?bool $includeIcon = null, ?int $limit = null)
```

List teams that the authenticated user is a member of.

## Method: test

```php
test()
```

Check authentication and get user identity.

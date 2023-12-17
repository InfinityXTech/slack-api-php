# Slack Teams API Methods ([Go Back](../README.md))

This PHP class provides methods to interact with the Slack Teams API. Below are instructions on how to use each method.

## Method: accessLogs

```php
accessLogs(
    ?string $before = null,
    ?string $count = null,
    ?string $cursor = null,
    ?int $limit = null,
    ?string $page = null,
    ?string $teamId = null
)
```

Retrieve access logs for a team.

## Method: billableInfo

```php
billableInfo(
    ?string $userId = null,
    ?string $cursor = null,
    ?int $limit = null,
    ?string $teamId = null
)
```

Retrieve billable information for a user.

## Method: info

```php
info(
    ?string $domain = null,
    ?string $teamId = null
)
```

Retrieve information about a team.

## Method: integrationLogs

```php
integrationLogs(
    ?string $appId = null,
    ?string $changeType = null,
    ?string $count = null,
    ?string $page = null,
    ?string $serviceId = null,
    ?string $teamId = null,
    ?string $userId = null
)
```

Retrieve integration logs for a team.

## Method: billingInfo

```php
billingInfo()
```

Retrieve billing information for a team.

## Method: preferencesList

```php
preferencesList()
```

List preferences for a team.

## Method: profileGet

```php
profileGet(
    ?string $visibility = null
)
```

Retrieve profile information for a team.


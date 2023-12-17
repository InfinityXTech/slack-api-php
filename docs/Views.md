# Slack Views API Methods ([Go Back](../README.md))

This PHP class provides methods to interact with the Slack Views API. Below are instructions on how to use each method.

## Method: open

```php
open(
    ?string $triggerId = null,
    ?string $interactivityPointer = null
)
```

Open a view for a user by using a trigger ID or an interactivity pointer.

## Method: publish

```php
publish(
    string $userId,
    array $view,
    ?string $hash = null
)
```

Publish a view for a user.

## Method: push

```php
push(
    array $view,
    ?string $triggerId = null,
    ?string $interactivityPointer = null,
    ?string $hash = null
)
```

Push a view onto the stack of a root view using a trigger ID or an interactivity pointer.

## Method: update

```php
update(
    array $view,
    ?string $externalId = null,
    ?string $viewId = null,
    ?string $hash = null
)
```

Update a published view using an external ID or a view ID.


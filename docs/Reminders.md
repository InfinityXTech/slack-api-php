# Slack Reminders API Methods ([Go Back](../README.md))

This PHP class provides methods to interact with the Slack Reminders API. Below are instructions on how to use each method.

## Method: add

```php
add(
    string $text,
    string $time,
    ?array $recurrence = null,
    ?string $teamId = null,
    ?string $userId = null
)
```

Create a new reminder.

## Method: complete

```php
complete(
    string $reminder,
    ?string $teamId = null
)
```

Mark a reminder as complete.

## Method: delete

```php
delete(
    string $reminder,
    ?string $teamId = null
)
```

Delete a reminder.

## Method: info

```php
info(
    string $reminder,
    ?string $teamId = null
)
```

Retrieve information about a reminder.

## Method: list

```php
list(
    string $reminder,
    ?string $teamId = null
)
```

List reminders for a user.


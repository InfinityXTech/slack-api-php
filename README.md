# Slack API Documentation ([Examples](docs/Examples.md))

This repository contains PHP classes for interacting with the Slack API. Below are links to documentation for each class:

- [Slack Apps API Methods](docs/Apps.md)
- [Slack Auth API Methods](docs/Auth.md)
- [Slack Channel API Methods](docs/Channel.md)
- [Slack Chat API Methods](docs/Chat.md)
- [Slack Conversations API Methods](docs/Conversations.md)
- [Slack Files API Methods](docs/Files.md)
- [Slack Reactions API Methods](docs/Reactions.md)
- [Slack Reminders API Methods](docs/Reminders.md)
- [Slack Teams API Methods](docs/Teams.md)
- [Slack User API Methods](docs/User.md)
- [Slack User Groups API Methods](docs/UserGroups.md)
- [Slack Views API Methods](docs/Views.md)

## SlackAuthProvider and SlackApiProvider Usage

To interact with the Slack API, you'll need to use the `SlackAuthProvider` and `SlackApiProvider` classes. Here's how you can set up and use them:

```php
use SlackApi\Auth\SlackAuthProvider;
use SlackApi\Core\SlackApiProvider;

$clientId = getenv('SLACK_CLIENT_ID');
$clientSecret = getenv('SLACK_CLIENT_SECRET');
$redirectUrl = getenv('SLACK_REDIRECT_URL');

$provider = new SlackAuthProvider($clientId, $clientSecret, $redirectUrl);

// Call this when you wish to redirect user to authorize with slack
$provider->redirect();

// Call this on $redirectUrl when slack authorization redirect to $redirectUrl
$token = $provider->getAccessToken($_GET['code']);

// Create a new SlackApiProvider instance with access token
$slackApi = new SlackApiProvider($token);

// Below this point, you can use various API methods:
$slackApi->channel()->someMethod();
$slackApi->user()->someMethod();
$slackApi->chat()->someMethod();
$slackApi->auth()->someMethod();
$slackApi->apps()->someMethod();
$slackApi->conversations()->someMethod();
$slackApi->files()->someMethod();
$slackApi->reactions()->someMethod();
$slackApi->reminders()->someMethod();
$slackApi->teams()->someMethod();
$slackApi->userGroups()->someMethod();
$slackApi->views()->someMethod();
```

Please replace the placeholders (`SLACK_CLIENT_ID`, `SLACK_CLIENT_SECRET`, `SLACK_REDIRECT_URL`) with your actual Slack app details. The `redirectUrl` must also be set within your Slack app configuration. After successful authentication and being redirected to the callback URL, you can obtain the access token.

You can then use the `$slackApi` instance to interact with various API methods from different classes within the repository.

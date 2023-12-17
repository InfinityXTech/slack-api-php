# Slack API Methods Examples ([Go Back](../README.md))

## Send Callback Message

- Callback URL must be added to your Slack App and there can be only one URL per app.

```php
$response = $slackApi->chat->postMessage(
    channelId: 'CHANNEL-ID',
    text: "Would you like to approve or decline?",
    attachments: [
        [
            "fallback" => "You are unable to choose an option",
            "callback_id" => "button_tutorial",
            "color" => "#3AA3E3",
            "attachment_type" => "default",
            "actions" => [
                [
                    "name" => "approve",
                    "text" => "Approve",
                    "type" => "button",
                    "value" => "approve"
                ],
                [
                    "name" => "decline",
                    "text" => "Decline",
                    "type" => "button",
                    "value" => "decline"
                ]
            ]
        ]
    ],
    mrkdwn: false
)
```

## Receive Callback Message

- You can check which message is sent by "callback_id".

```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payload = json_decode(file_get_contents('php://input'), true);

    // Check if $payload['callback_id'] === 'something'

    $response = [
        "replace_original" => "true",
        "text" => "Thanks for your response!"
    ];

    header('Content-Type: application/json');

    echo json_encode($response);
    
    exit;
}
```
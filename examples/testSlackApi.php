<?php
require 'vendor/autoload.php';

use SlackApi\SlackAuthProvider;
use SlackApi\SlackApiProvider;

$url = getenv('APP_URL');
$clientId = getenv('SLACK_CLIENT_ID');
$clientSecret = getenv('SLACK_CLIENT_SECRET');
$redirectUrl = getenv('SLACK_REDIRECT_URL');

$provider = new SlackAuthProvider($clientId, $clientSecret, $redirectUrl);

if (isset($_GET['redirect'])) {
    $provider->redirect();
} else if (isset($_GET['callback']) && isset($_GET['code'])) {
    $token = $provider->getAccessToken($_GET['code']);

    setcookie('token', $token, time() + (365 * 24 * 60 * 60), "/");

    header("Location: $url");
} else {
    if (!isset($_COOKIE['token'])) {
        header("Location: $url?redirect");
    }

    $token = $_COOKIE['token'];
    $api = new SlackApiProvider($token);

    switch (true) {
        case isset($_GET['listUsers']):
            print_r($api->user()->list());
            break;
        
        case isset($_GET['listChannels']):
            $channels = $api->channel()->list();
            foreach ($channels as $channel) {
                $channel = (object) $channel;
                if (!$channel->is_archived) {
                    echo "Channel name: " . $channel->name;
                    echo "<br>Channel visibility: ";
                    echo $channel->is_private ? 'Private' : 'Public';
                    echo "<br><a href=" . $url . "'?channelMembers=". $channel->id ."'>List members</a>";
                    echo "<br><a href=" . $url . "'?channelPurpose=". $channel->id ."&purpose' onclick=\"this.href = this.href + '=' + encodeURIComponent(prompt('Please enter your channel purpose:'));\">Set Porpose</a>";
                    echo "<br><a href=" . $url . "'?renameChannel=". $channel->id ."&name' onclick=\"this.href = this.href + '=' + encodeURIComponent(prompt('Please enter your channel name:'));\">Rename Channel</a>";
                    echo "<br><a href=" . $url . "'?archiveChannel=". $channel->id ."'>Archive channel</a>";
                    echo "<br><br><br><a href=" . $url . "'?sendCallbackMessage=". $channel->id ."'>Send Callback Message</a><hr>";
                }
            }
            break;

        case isset($_GET['createChannel']):
            print_r($api->channel()->create($_GET['createChannel']) ?: 'test-' . rand());
            break;
        
        case isset($_GET['channelMembers']):
            print_r($api->channel()->members($_GET['channelMembers']));
            break;
        
        case isset($_GET['renameChannel']) && isset($_GET['name']):
            print_r($api->channel()->rename($_GET['renameChannel'], $_GET['name']));
            break;

        case isset($_GET['channelPurpose']) && isset($_GET['purpose']):
            print_r($api->channel()->setPurpose($_GET['channelPurpose'], $_GET['purpose']));
            break;
            
        case isset($_GET['archiveChannel']):
            print_r($api->channel()->archive($_GET['archiveChannel']));
            break;

        case isset($_GET['sendCallbackMessage']):
            print_r($api->chat()->postMessage(channelId: $_GET['sendCallbackMessage'], text: "Would you like to approve or decline?", attachments: [
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
            ], mrkdwn: false));
            break;

        default:
            echo $token ? "<a href=" . $url . "'?redirect'>Connect Slack</a><hr>" : "";
            echo "<a href=" . $url . "'?listUsers'>List all users</a><hr>";
            echo "<a href=" . $url . "'?listChannels'>List channels</a><hr>";
            echo "<a href=" . $url . "'?createChannel' onclick=\"this.href = this.href + '=' + encodeURIComponent(prompt('Please enter your channel name:'));\">Create channel</a><hr>";
            break;
    }
}

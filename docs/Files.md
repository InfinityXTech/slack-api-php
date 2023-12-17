# Slack Files API Methods ([Go Back](../README.md))

This PHP class provides methods to interact with the Slack Files API. Below are instructions on how to use each method.

## Method: deleteComment

```php
deleteComment(
    string $fileId,
    string $commentId
)
```

Delete a comment on a file.

## Method: completeUploadExternal

```php
completeUploadExternal(
    array $files,
    ?string $channelId = null,
    ?string $initialComment = null,
    ?string $threadTs = null
)
```

Complete an external file upload.

## Method: delete

```php
delete(
    string $fileId
)
```

Delete a file.

## Method: getUploadURLExternal

```php
getUploadURLExternal(
    string $filename,
    int $length,
    ?string $altTxt = null,
    ?string $snippetType = null
)
```

Get an external file upload URL.

## Method: info

```php
info(
    string $fileId,
    ?int $count = null,
    ?string $cursor = null,
    ?int $limit = null,
    ?int $page = null
)
```

Get information about a file.

## Method: list

```php
list(
    ?string $channel = null,
    ?int $count = null,
    ?int $page = null,
    ?bool $showFilesHiddenByLimit = null,
    ?string $teamId = null,
    ?string $tsFrom = null,
    ?string $tsTo = null,
    ?string $types = null,
    ?string $user = null
)
```

List files.

## Method: revokePublicURL

```php
revokePublicURL(
    string $fileId
)
```

Revoke a public file URL.

## Method: sharePublicURL

```php
sharePublicURL(
    string $fileId
)
```

Share a public file URL.

## Method: upload

```php
upload(
    ?string $channels = null,
    ?string $content = null,
    $file = null,
    ?string $filename = null,
    ?string $filetype = null,
    ?string $initialComment = null,
    ?string $threadTs = null,
    ?string $title = null
)
```

Upload a file.

## Method: addRemote

```php
addRemote(
    string $externalId,
    string $externalUrl,
    string $title,
    ?string $filetype = null,
    $indexableFileContents = null,
    $previewImage = null
)
```

Add a remote file.

## Method: remoteInfo

```php
remoteInfo(
    ?string $externalId = null,
    ?string $file = null
)
```

Get information about a remote file.

## Method: remoteList

```php
remoteList(
    ?string $channel = null,
    ?string $cursor = null,
    ?int $limit = null,
    ?string $tsFrom = null,
    ?string $tsTo = null
)
```

List remote files.

## Method: removeRemoteFile

```php
removeRemoteFile(
    ?string $externalId = null,
    ?string $file = null
)
```

Remove a remote file.

## Method: shareRemote

```php
shareRemote(
    string $channels,
    ?string $externalId = null,
    ?string $file = null
)
```

Share a remote file.

## Method: updateRemote

```php
updateRemote(
    string $token,
    ?string $externalId = null,
    ?string $externalUrl = null,
    ?string $file = null,
    ?string $filetype = null,
    $indexableFileContents = null,
    $previewImage = null,
    ?string $title = null
)
```

Update a remote file.

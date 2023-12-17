<?php

namespace SlackApi\Methods;

use SlackApi\Core\SlackMethod;

class SlackFiles extends SlackMethod {
    protected $prefix = '/files.';

    public function deleteComment(string $fileId, string $commentId) {
        return $this->sendRequest('POST', $this->prefix . 'comments.delete', $this->preparePayload([
            'file' => $fileId,
            'id' => $commentId,
        ]));
    }

    public function completeUploadExternal (array $files, ?string $channelId = null, ?string $initialComment = null, ?string $threadTs = null) {
        return $this->sendRequest('POST', $this->prefix . 'completeUploadExternal', $this->preparePayload([
            'files' => $files,
            'channel_id' => $channelId,
            'initial_comment' => $initialComment,
            'thread_ts' => $threadTs,
        ]));
    }

    public function delete (string $fileId) {
        return $this->sendRequest('POST', $this->prefix . 'delete', $this->preparePayload([
            'file' => $fileId,
        ]));
    }
    
    public function getUploadURLExternal (string $filename, int $length, ?string $altTxt = null, ?string $snippetType = null) {
        return $this->sendRequest('GET', $this->prefix . 'getUploadURLExternal', $this->preparePayload([
            'filename' => $filename,
            'length' => $length,
            'alt_txt' => $altTxt,
            'snippet_type' => $snippetType,
        ]));
    }

    public function info (string $fileId, ?int $count = null, ?string $cursor = null, ?int $limit = null, ?int $page = null) {
        return $this->sendRequest('GET', $this->prefix . 'info', $this->preparePayload([
            'file' => $fileId,
            'count' => $count,
            'cursor' => $cursor,
            'limit' => $limit,
            'page' => $page,
        ]));
    }

    public function list (
        ?string $channel = null,
        ?int $count = null,
        ?int $page = null,
        ?bool $showFilesHiddenByLimit = null,
        ?string $teamId = null,
        ?string $tsFrom = null,
        ?string $tsTo = null,
        ?string $types = null,
        ?string $user = null
    ) {
        $response = $this->sendRequest('GET', $this->prefix . 'list', $this->preparePayload([
            'channel' => $channel,
            'count' => $count,
            'page' => $page,
            'show_files_hidden_by_limit' => $showFilesHiddenByLimit,
            'team_id' => $teamId,
            'ts_from' => $tsFrom,
            'ts_to' => $tsTo,
            'types' => $types,
            'user' => $user,
        ]));
        
        return $response->files;
    }
    
    public function revokePublicURL (string $fileId) {
        return $this->sendRequest('POST', $this->prefix . 'revokePublicURL', $this->preparePayload([
            'file' => $fileId,
        ]));
    }
    
    public function sharePublicURL (string $fileId) {
        return $this->sendRequest('POST', $this->prefix . 'sharedPublicURL', $this->preparePayload([
            'file' => $fileId,
        ]));
    }
    
    public function upload (
        ?string $channels = null,
        ?string $content = null,
        $file = null,
        ?string $filename = null,
        ?string $filetype = null,
        ?string $initialComment = null,
        ?string $threadTs = null,
        ?string $title = null
    ) {
        $response = $this->sendRequest('POST', $this->prefix . 'upload', $this->preparePayload([
            'channels' => $channels,
            'content' => $content,
            'file' => $file,
            'filename' => $filename,
            'filetype' => $filetype,
            'initial_comment' => $initialComment,
            'thread_ts' => $threadTs,
            'title' => $title,
        ]), [
            'Content-Type: multipart/form-data'
        ]);
        
        return $response->file;
    }
    
    public function addRemote (
        string $externalId,
        string $externalUrl,
        string $title,
        ?string $filetype = null,
        $indexableFileContents = null,  // A text file (txt, pdf, doc, etc.) containing textual search terms that are used to improve discovery of the remote file.
        $previewImage = null  // Preview of the document via multipart/form-data.
    ) {
        $response = $this->sendRequest('GET', $this->prefix . 'remote.add', $this->preparePayload([
            'external_id' => $externalId,
            'external_url' => $externalUrl,
            'title' => $title,
            'filetype' => $filetype,
            'indexable_file_contents' => $indexableFileContents,
            'preview_image' => $previewImage,
        ]), [
            'Content-Type: multipart/form-data'
        ]);
        
        return $response->file;
    }
    
    public function remoteInfo (?string $externalId = null, ?string $file = null) {
        if (is_null($externalId) && is_null($file)) {
            throw new \Exception("Either external id or file must be provided!");
        }
        
        return $this->sendRequest('GET', $this->prefix . 'remote.info', $this->preparePayload([
            'external_id' => $externalId,
            'file' => $file,
        ]));
    }
    
    public function remoteList (?string $channel = null, ?string $cursor = null, ?int $limit = null, ?string $tsFrom = null, ?string $tsTo = null) {
        return $this->sendRequest('GET', $this->prefix . 'remote.list', $this->preparePayload([
            'channel' => $channel,
            'cursor' => $cursor,
            'limit' => $limit,
            'ts_from' => $tsFrom,
            'ts_to' => $tsTo,
        ]));
    }
    
    public function removeRemoteFile (?string $externalId = null, ?string $file = null) {
        return $this->sendRequest('GET', $this->prefix . 'remote.remove', $this->preparePayload([
            'external_id' => $externalId,
            'file' => $file,
        ]));
    }

    public function shareRemote (string $channels, ?string $externalId = null, ?string $file = null) {
        return $this->sendRequest('GET', $this->prefix . 'remote.share', $this->preparePayload([
            'channels' => $channels,
            'external_id' => $externalId,
            'file' => $file,
        ]));
    }

    public function updateRemote (
        string $token,
        ?string $externalId = null,
        ?string $externalUrl = null,
        ?string $file = null,
        ?string $filetype = null,
        $indexableFileContents = null,
        $previewImage = null,
        ?string $title = null
    ) {
        return $this->sendRequest('GET', $this->prefix . 'remote.update', $this->preparePayload([
            'token' => $token,
            'external_id' => $externalId,
            'external_url' => $externalUrl,
            'file' => $file,
            'filetype' => $filetype,
            'indexable_file_contents' => $indexableFileContents,
            'preview_image' => $previewImage,
            'title' => $title
        ]), [
            'Content-Type: multipart/form-data'
        ]);
    }
    
}
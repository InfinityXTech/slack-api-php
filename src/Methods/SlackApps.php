<?php

namespace SlackApi\Methods;

use SlackApi\Core\SlackMethod;

class SlackApps extends SlackMethod {
    protected $prefix = '/apps.';

    public function listActivities(
        string $appId,
        ?string $componentId = null,
        ?string $componentType = null,
        ?string $cursor = null,
        ?int $limit = null,
        ?string $logEventType = null,
        ?int $maxDateCreated = null,
        ?int $minDateCreated = null,
        ?string $minLogLevel = null,
        ?string $sortDirection = null,
        ?string $source = null,
        ?string $teamId = null,
        ?string $traceId = null
    ) {
        return $this->sendRequest('GET', $this->prefix . 'activities.list', $this->preparePayload([
            'app_id' => $appId,
            'component_id' => $componentId,
            'component_type' => $componentType,
            'cursor' => $cursor,
            'limit' => $limit,
            'log_event_type' => $logEventType,
            'max_date_created' => $maxDateCreated,
            'min_date_created' => $minDateCreated,
            'min_log_level' => $minLogLevel,
            'sort_direction' => $sortDirection,
            'source' => $source,
            'team_id' => $teamId,
            'trace_id' => $traceId
        ]));
    }
    
    public function deleteExternalAuth(
        ?string $appId = null,
        ?string $externalTokenId = null,
        ?string $providerKey = null
    ) {
        return $this->sendRequest('POST', $this->prefix . 'auth.external.delete', $this->preparePayload([
            'app_id' => $appId,
            'external_token_id' => $externalTokenId,
            'provider_key' => $providerKey
        ]));
    }

    public function getExternalAuth(
        string $externalTokenId,
        ?bool $forceRefresh = null
    ) {
        return $this->sendRequest('POST', 'auth.external.get', $this->preparePayload([
            'external_token_id' => $externalTokenId,
            'force_refresh' => $forceRefresh
        ]));
    }
    
    public function openConnection() {
        return $this->sendRequest('POST', 'connections.open');
    }
    
    public function deleteDatastore(string $datastore, string $id, ?string $appId = null) {
        return $this->sendRequest('POST', 'datastore.delete', $this->preparePayload([
            'datastore' => $datastore,
            'id' => $id,
            'app_id' => $appId
        ]));
    }
    
    public function getDatastore(string $datastore, string $id, ?string $appId = null) {
        return $this->sendRequest('POST', 'datastore.get', $this->preparePayload([
            'datastore' => $datastore,
            'id' => $id,
            'app_id' => $appId
        ]));
    }
    
    public function putDatastore(string $datastore, array $item, ?string $appId = null) {
        return $this->sendRequest('POST', 'datastore.put', $this->preparePayload([
            'datastore' => $datastore,
            'item' => $item,
            'app_id' => $appId
        ]));
    }

    public function queryDatastore(
        string $datastore,
        ?string $appId = null,
        ?string $cursor = null,
        ?string $expression = null,
        ?array $expressionAttributes = null,
        ?array $expressionValues = null,
        ?int $limit = null
    ) {
        return $this->sendRequest('POST', 'datastore.query', $this->preparePayload([
            'datastore' => $datastore,
            'app_id' => $appId,
            'cursor' => $cursor,
            'expression' => $expression,
            'expression_attributes' => $expressionAttributes,
            'expression_values' => $expressionValues,
            'limit' => $limit
        ]));
    }
    
    public function updateDatastore(string $datastore, array $item, ?string $appId = null) {
        return $this->sendRequest('POST', 'datastore.update', $this->preparePayload([
            'datastore' => $datastore,
            'item' => $item,
            'app_id' => $appId
        ]));
    }

    public function listEventAuthorizations(string $eventContext, ?string $cursor = null, ?int $limit = null) {
        $response = $this->sendRequest('POST', 'event.authorizations.list', $this->preparePayload([
            'event_context' => $eventContext,
            'cursor' => $cursor,
            'limit' => $limit
        ]));

        return $response->authorizations;
    }
    
    public function createManifest(array $manifest) {
        return $this->sendRequest('POST', 'manifest.create', $this->preparePayload([
            'manifest' => $manifest
        ]));
    }
    
    public function deleteManifest(string $appId) {
        return $this->sendRequest('POST', 'manifest.delete', $this->preparePayload([
            'app_id' => $appId
        ]));
    }

    public function exportManifest(string $appId) {
        return $this->sendRequest('POST', 'manifest.export', $this->preparePayload([
            'app_id' => $appId
        ]));
    }
    
    public function updateManifest(string $appId, array $manifest) {
        return $this->sendRequest('POST', 'manifest.update', $this->preparePayload([
            'app_id' => $appId,
            'manifest' => $manifest
        ]));
    }

    public function validateManifest(array $manifest, ?string $appId = null) {
        return $this->sendRequest('POST', 'manifest.validate', $this->preparePayload([
            'manifest' => $manifest,
            'app_id' => $appId
        ]));
    }

    public function uninstallApp(string $clientId, string $clientSecret) {
        return $this->sendRequest('POST', 'app.uninstall', $this->preparePayload([
            'client_id' => $clientId,
            'client_secret' => $clientSecret
        ]));
    }
}

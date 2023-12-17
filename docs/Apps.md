# Slack Apps API Methods ([Go Back](../README.md))

This PHP class provides methods to interact with the Slack Apps API. Below are instructions on how to use each method.

## Method: listActivities

```php
listActivities(
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
)
```

Retrieve a list of activities for an app.

## Method: deleteExternalAuth

```php
deleteExternalAuth(
    ?string $appId = null,
    ?string $externalTokenId = null,
    ?string $providerKey = null
)
```

Delete external authentication records for an app.

## Method: getExternalAuth

```php
getExternalAuth(
    string $externalTokenId,
    ?bool $forceRefresh = null
)
```

Retrieve external authentication data for an app.

## Method: openConnection

```php
openConnection()
```

Open a connection for an app.

## Method: deleteDatastore

```php
deleteDatastore(
    string $datastore,
    string $id,
    ?string $appId = null
)
```

Delete data from a datastore for an app.

## Method: getDatastore

```php
getDatastore(
    string $datastore,
    string $id,
    ?string $appId = null
)
```

Retrieve data from a datastore for an app.

## Method: putDatastore

```php
putDatastore(
    string $datastore,
    array $item,
    ?string $appId = null
)
```

Put data into a datastore for an app.

## Method: queryDatastore

```php
queryDatastore(
    string $datastore,
    ?string $appId = null,
    ?string $cursor = null,
    ?string $expression = null,
    ?array $expressionAttributes = null,
    ?array $expressionValues = null,
    ?int $limit = null
)
```

Query data from a datastore for an app.

## Method: updateDatastore

```php
updateDatastore(
    string $datastore,
    array $item,
    ?string $appId = null
)
```

Update data in a datastore for an app.

## Method: listEventAuthorizations

```php
listEventAuthorizations(
    string $eventContext,
    ?string $cursor = null,
    ?int $limit = null
)
```

List event authorizations for an app.

## Method: createManifest

```php
createManifest(array $manifest)
```

Create a manifest for an app.

## Method: deleteManifest

```php
deleteManifest(string $appId)
```

Delete a manifest for an app.

## Method: exportManifest

```php
exportManifest(string $appId)
```

Export a manifest for an app.

## Method: updateManifest

```php
updateManifest(
    string $appId,
    array $manifest
)
```

Update a manifest for an app.

## Method: validateManifest

```php
validateManifest(
    array $manifest,
    ?string $appId = null
)
```

Validate a manifest for an app.

## Method: uninstallApp

```php
uninstallApp(
    string $clientId,
    string $clientSecret
)
```

Uninstall an app using its client ID and client secret.

<?php
require_once '.\vendor\autoload.php';

use MicrosoftAzure\Storage\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\ServiceException;

$accountName = '<name of storage account>';
$accountKey = '<storage account access key>';
$connectionString = '<storage account connection string>';

$containerName = '<name of blob container>';

$blobClient = BlobRestProxy::createBlobService($connectionString);

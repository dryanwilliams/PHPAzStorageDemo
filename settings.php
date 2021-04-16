<?php
require_once '.\vendor\autoload.php';

use MicrosoftAzure\Storage\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\ServiceException;

$accountName = 'nmcappsvcdemo';
$accountKey = 'MTmJAa2trRJZ76+fV/XZbJUcBMNqiC34hOrxAaHMRDqYYWLRUk6+lF14NULEyQsIUZ08WG+F4IDofU/k+5Jd7w==';
$connectionString = 'DefaultEndpointsProtocol=https;AccountName=nmcappsvcdemo;AccountKey=MTmJAa2trRJZ76+fV/XZbJUcBMNqiC34hOrxAaHMRDqYYWLRUk6+lF14NULEyQsIUZ08WG+F4IDofU/k+5Jd7w==;EndpointSuffix=core.windows.net';

$containerName = 'upload';

$blobClient = BlobRestProxy::createBlobService($connectionString);
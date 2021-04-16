<?php
session_start();

require_once '.\vendor\autoload.php';
use MicrosoftAzure\Storage\Blob\Models\Block;
use MicrosoftAzure\Storage\Blob\Models\CommitBlobBlocksOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\GetBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\ListContainersOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;
use MicrosoftAzure\Storage\Common\ServiceException;
include 'settings.php';

$message = '';

if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name by getting current time and hashing it
    $newFileName = md5(time()) . $fileName . '.' . $fileExtension;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
        try
    {
        // open file 

        $content = fopen($_FILES['uploadedFile'], "rb");

        // Upload blob
        $blobClient->createBlockBlob($containerName, $newFileName, $content);
    }
    catch (ServiceException $e) 
    {
        $code = $e->getCode();
        http_response_code($code);
        $error_message = $e->getMessage();
        $message = 'An error occurred while uploading: HTTP Response ' . $error_message;
    }
        $message ='File upload was successful.';

    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There the following error occurred during the upload: ' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
header("Location: index.php");
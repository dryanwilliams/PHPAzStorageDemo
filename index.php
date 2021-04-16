<?php
session_start();
// require_once 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Demo - PHP File Upload to Azure Storage</title>
</head>
<body>
  <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
  ?>
  <form method="POST" action="upload.php" enctype="multipart/form-data">
    <div>
      <span>Upload a File:</span>
      <input type="file" name="uploadedFile" />
    </div>

    <input type="submit" name="uploadBtn" value="Upload" />
  </form>
</body>
</html>
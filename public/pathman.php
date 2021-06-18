<?php include "templates/header.php"; ?>

<h2>Path Manipulation</h2>

<form method="post">
    <input type="text" name="filePath" id="filePath">
    <input type="submit" name="submit" value="Submit">
</form>

<h4>Files List: </h4>
<?php
if (isset($_POST['submit'])) {
    try 
    {
        $path = $_POST['filePath'];
        $files = scandir($path);
        foreach ($files as $file) {
            
            $fullPath=$path.'\\'.$file;
            
            if (is_file($fullPath)) 
            {
                echo '<p>' . basename($file) . '<a href="pathman.php?file=' . urlencode($fullPath) . '">Download</a></p>';
            }
        }

    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_REQUEST["file"])) {
    $filepath = urldecode($_REQUEST["file"]);
    //$filepath = urldecode($_REQUEST["file"]). $file;

    echo $filepath;

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));

        readfile($filepath);
        exit;
    }
}
?>

<h2>File Inclusion</h2>
<form method="post" action="pathman.php">
    <input type="text" style="width: 700px" value="C:\inetpub\wwwroot\Sample" name="lfi" />
    <input type="submit" name="submitlfi" />
</form>

<a href="index.php">Back to home</a>

<br />

<?php
if (isset($_POST['submitlfi'])) {
       $inp =$_POST['lfi'];
            
       include $inp;
}
?>

<?php require "templates/footer.php"; ?>

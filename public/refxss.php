<?php require "templates/header.php"; ?>

<?php
header("X-XSS-Protection: 0");
if (isset($_GET['name'])) {
     $input = $_GET['name'];
     echo "Welcome ".$input." !";
}
if (isset($_POST['submit'])) {
     $input = $_POST['name'];
     echo "Welcome ".$input." !";
}
?>

<br />
<form method="post" action="refxss.php">
    <input name="name" id="name" />
    <input type="submit" name="submit" value="Post" />
</form>
<br />
<form method="get" action="refxss.php">
    <input name="name" id="name" />
    <input type="submit" name="submit" value="Get" />
</form>
    
 <a href="index.php">Back to home</a>
<?php require "templates/footer.php"; ?>

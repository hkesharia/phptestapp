<?php require "templates/header.php"; ?>

<?php

if (isset($_GET['name'])) {
     $input = $_GET['name'];
     header("X-XSS-Protection: 0");   
     header("Test: TetsHeaderValueKumar:Ennna\r\n");
     header("X-Name: ".$input);   
     echo "Header Added Successfully!!";
}
if (isset($_POST['submit'])) {
     $input = $_POST['name'];
     header("X-XSS-Protection: 0");
     header("X-Name: ".$input);
     echo "Header Added Successfully!!";
}
?>

<br />
<form method="post" action="crlf.php">
    <input name="name" style="width: 700px" value="Bob%0d%0a%0d%0a<script>alert(document.domain)</script>" id="name" />
    <input type="submit" name="submit" value="Post" />
</form>
<br />
<form method="get" action="crlf.php">
    <input name="name" style="width: 700px"  value="Bob%0d%0a%0d%0a<script>alert(document.domain)</script>" id="name" />
    <input type="submit" name="submit" value="Get" />
</form>
    
 <a href="index.php">Back to home</a>
<?php require "templates/footer.php"; ?>

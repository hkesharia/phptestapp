
<?php require "templates/header.php"; ?>

<form method="post" action="rfi.php">
    <input name="name" value="https://www.php.net" id="name" />
    <input type="submit" name="include" value="Include" />
    <input type="submit" name="includeonce" value="Include Once" />
    <input type="submit" name="require" value="Require" />
    <input type="submit" name="requireonce" value="Require Once" />
</form>

   
<a href="http://10.15.18.137:3001">Back to home</a>
<?php require "templates/footer.php"; ?>

<h1>Result:</h1>

 <?php
    if (isset($_POST['include'])) {
         $input = $_POST['name'];
         if(include $input)
         echo 'Included Successfull';
    }
    
    if (isset($_POST['includeonce'])) {
         $input = $_POST['name'];
          
        if(include_once $input)
         include_once $input;
    }
    
    if (isset($_POST['require'])) {
         $input = $_POST['name'];
         require $input;
    }
    
    if (isset($_POST['requireonce'])) {
         $input = $_POST['name'];
         require $input;
    }
 ?>

   
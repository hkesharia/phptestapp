<?php
$descriptorspec = array(
   0 => array("pipe", "r"),
);
$process = proc_open(
        'C:\\windows\\system32\\cmd.exe /c ipconfig',
        $descriptorspec,
        $pipes
);

$output = '';
 //
  //  $buffer = fgets($pipes[0], 4096); 
  //  $output.= $buffer. "\n"; 
//} 

echo $output;
stream_get_contents($pipes[0]);

fclose($pipes[0]);
$exit_status = proc_close($process);

$success = ($exit_status === 0);

?>
<?php
require_once __DIR__ . '/codes.php';

$raspberrypi = new RaspberryPi;


$var_temp = "";
$var_state = "";

$var_temp = $raspberrypi->get_temperature();

if (substr($var_temp,0,1) != '{') {// contains 'MessageError') {
 
 $v_cooler_state = system("gpio read 1");
 
 echo $v_color_state.'state'; 

 if ($v_cooler_state == "1")
    
$var_state = "Cooling is ON";
 
 else 
    
$var_state = "Cooling is OFF";

  
$response[] = ['Temperature' => $var_temp, 'FanState' => $var_state];
  $data = '"Data"';
  $json = '{'.$data.':'.json_encode($response).'}';
  echo $json;
} else {
  echo $var_temp;
}

?>

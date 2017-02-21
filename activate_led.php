<?php 

define("ON", 1);
define("OFF", 0);

$v_state = "";

if (isset($_GET['State'])) {
   $v_state = $_GET['State'];
} else {
   echo '{"MessageError":"Error @ Data not found from the client"}';
}

switch ($v_state) {
   case ON:
      exec("gpio mode 1 OUT");
      exec("gpio write 1 1");
      $response[] = ['Result' => "Cooling ON"];
      $data = '"Data"';
      $json = '{'.$data.':'.json_encode($response).'}';
      echo $json;
      break;
   case OFF:
      exec("gpio write 1 0");
      exec("gpio mode 1 IN");
      $response[] = ['Result' => "Cooling OFF"];
      $data = '"Data"';
      $json = '{'.$data.':'.json_encode($response).'}';
      echo $json;
      break;
}


?>

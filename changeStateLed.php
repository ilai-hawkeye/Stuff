<?php
//file that get the state and the color from java
define("BLUE_LED","Blue");
define("YELLOW_LED","Yellow");
define("RED_LED","Red");
define("GREEN_LED","Green");

define("ON","ON");
define("OFF","OFF");

$v_color = "";
$v_state = "";

if (isset($_GET['Color']) && isset($_GET['State'])) {
   $v_color = $_GET['Color'];
   $v_state = $_GET['State'];
}

//We have to create a map for leds and pins
//Identify led by color and state and return the position - number led

$pin = "";
$led = "";
switch ($v_color) {
case RED_LED:
        echo 'into red branch';
	$pin = "0";
        if ($v_state == ON) {
                $led = "gpio mode ".$pin." OUT";
                exec($led);
                $led = "gpio write ".$pin." ";
                $led = $led."1";
                exec($led);
                $response[] = ['Color' => RED_LED, 'State' => "ON"];
                $data = '"Data"';
                $json = '{'.$data.':'.json_encode($response).'}';
                echo $json;
        } else if ($v_state == OFF) {
                $led = "gpio write ".$pin." ";
                $led = $led."0";
                exec($led);
                $led = "gpio mode ".$pin." OUT";
                exec($led);
                $response[] = ['Color' => RED_LED, 'State' => "OFF"];
                $data = '"Data"';
                $json = '{'.$data.':'.json_encode($response).'}';
                echo $json;
        }
        break;
case YELLOW_LED:
	 echo 'into yellow branch';
        $pin = "3";
        if ($v_state == ON) {
                $led = "gpio mode ".$pin." OUT";
                exec($led);
                $led = "gpio write ".$pin." ";
                $led = $led."1";
                exec($led);
                $response[] = ['Color' => YELLOW_LED, 'State' => "ON"];
                $data = '"Data"';
                $json = '{'.$data.':'.json_encode($response).'}';
                echo $json;
        } else if ($v_state == OFF) {
                $led = "gpio write ".$pin." ";
                $led = $led."0";
                exec($led);
                $led = "gpio mode ".$pin." OUT";
                exec($led);
                $response[] = ['Color' => YELLOW_LED, 'State' => "OFF"];
                $data = '"Data"';
                $json = '{'.$data.':'.json_encode($response).'}';
                echo $json;
        }
        break;
case GREEN_LED:
	 echo 'into green branch';
        $pin = "4";
        if ($v_state == ON) {
                $led = "gpio mode ".$pin." OUT";
                exec($led);
                $led = "gpio write ".$pin." ";
                $led = $led."1";
                exec($led);
                $response[] = ['Color' => GREEN_LED, 'State' => "ON"];
                $data = '"Data"';
                $json = '{'.$data.':'.json_encode($response).'}';
                echo $json;
        } else if ($v_state == OFF) {
                $led = "gpio write ".$pin." ";
                $led = $led."0";
                exec($led);
                $led = "gpio mode ".$pin." OUT";
                exec($led);
                $response[] = ['Color' => GREEN_LED, 'State' => "OFF"];
                $data = '"Data"';
                $json = '{'.$data.':'.json_encode($response).'}';
                echo $json;
        }
        break;
case BLUE_LED:
	 echo 'into blue branch';
        $pin = "5";
        if ($v_state == ON) {
                $led = "gpio mode ".$pin." OUT";
                exec($led);
                $led = "gpio write ".$pin." ";
                $led = $led."1";
                exec($led);
                $response[] = ['Color' => BLUE_LED, 'State' => "ON"];
                $data = '"Data"';
                $json = '{'.$data.':'.json_encode($response).'}';
                echo $json;
        } else if ($v_state == OFF) {
                $led = "gpio write ".$pin." ";
                $led = $led."0";
                exec($led);
                $led = "gpio mode ".$pin." OUT";
                exec($led);
                $response[] = ['Color' => BLUE_LED, 'State' => "OFF"];
                $data = '"Data"';
                $json = '{'.$data.':'.json_encode($response).'}';
                echo $json;
        }
        break;

}
?>


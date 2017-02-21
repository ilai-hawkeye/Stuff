<?php
class RaspberryPi {
    function get_temperature() {
	$code_get_temp = "/opt/vc/bin/vcgencmd measure_temp";
	$history_file  = "history_temperature.txt";
	$var_return = "";
	$current_temp = exec($code_get_temp);
        $current_temp = substr($current_temp,5,-2);
        $filename = $history_file;
	$var_return = $current_temp;
        // Let's make sure the file exists and is writable first.
//        if (is_writable($filename)) {

        	// In our example we're opening $filename in append mode.
        	// The file pointer is at the bottom of the file hence
        	// that's where $somecontent will go when we fwrite() it.
//        	if (!$handle = fopen($filename, 'a')) {
//                	 $var_return = '{"MessageError":"Error @ Cannot open the ($filename) file"}';
//        	}

        	// Write $somecontent to our opened file.
//	       	if (fwrite($handle, "\n".$current_temp) === FALSE) {
//                	$var_return =  '{"MessageError":"Error @ Cannot write to ($filename) file"}';
//        	} else {
//			$var_return = $current_temp;
//		}
//
//        	fclose($handle);

//       	} else {
//                $var_return =  '{"MessageError":"Error @ The file ($filename) isn't writable"}';
//        }

	return $var_return;
    }
}
?>

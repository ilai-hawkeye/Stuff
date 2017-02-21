<?php //authentification file data 
require_once __DIR__ . '/database_config.php';
//connecting to DB
$con = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
 if (mysqli_connect_errno($con)) {
   echo '{"MessageError":"Error @ connecting database"}';
}
$v_application = "";
$v_language = "";
$v_view = "";
if (isset($_GET['Application']) && isset($_GET['Language']) && isset($_GET['View'])) {
   $v_application = $_GET['Application'];
   $v_language = $_GET['Language'];
   $v_view = $_GET['View'];
}
$sql = "SELECT idTranslator FROM Translator WHERE Application = '$v_application' AND Language = '$v_language' AND View = '$v_view'"; 
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result)) {
    $id = $row["idTranslator"];
    mysqli_close($con);
    $second_con = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $second_sql = "SELECT * FROM Translations WHERE idTranslator = '$id'";
    $second_result = mysqli_query($second_con, $second_sql);
    if (mysqli_num_rows($second_result) > 0) {
       while($second_row = mysqli_fetch_array($second_result)) {
         $username = $second_row["username"];
         $password = $second_row["password"];
         $title = $second_row["title"];
	 $wait = $second_row["wait"];
         $login = $second_row["login"];
	 $userNotValid = $second_row["UserNotValid"];
	 $userOrPassNotValid = $second_row["UserOrPassNotValid"];
	 $browserSupport = $second_row["BrowserSupport"];
	 $help = $second_row["Help"];
	 $resetPassword = $second_row["ResetPassword"];
	 $home = $second_row["Home"];
	 $board = $second_row["Board"];
         $response[] = ['lvusername' => $username, 'lvpassword' => $password, 'lvtitle' => $title, 'lvwait' => $wait, 'lvlogin' => $login, 'lvusernotvalid' => $userNotValid, 'lvuserorpasswordnotvalid' => $userOrPassNotValid, 'lvbrowsersupport' => $browserSupport, 'lvhelp' => $help, 'lvresetpassword' => $resetPassword, 'lvhome' => $home, 'lvboard' => $board];
         $data = '"Data"';
         $json = '{'.$data.':'.json_encode($response).'}';
         echo $json;
      }
    } else {
      echo '{"MessageError":"Error @ result sql translations"}';
    }
  }
} else {
  echo '{"MessageError":"Error @ result sql translator"}';
}
mysqli_close($second_con); //mysqli_close($con); ?>

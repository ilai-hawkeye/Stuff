  <?php

//authentification file data
require_once __DIR__ . '/database_config.php';

//connecting to DB
$con = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno($con)) {
   echo '{"MessageError":"Error @ connecting database"}';
}

$v_username = "";
$v_password    = "";

if (isset($_GET['Username']) && isset($_GET['Password'])) {
   $v_username = $_GET['Username'];
   $v_password = $_GET['Password'];
}

$sql = "SELECT idUser, Username, Password, Firstname, Lastname, Fullname, Email, CompanyName, Address, City, Postcode FROM User WHERE Username = '$v_username' AND Password = '$v_password'";

$result = mysqli_query($con, $sql);
$v_autentication = "";
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result)) { 
    $id = $row["idUser"];
    $username = $row["Username"];
    $password = $row["Password"];
    $firstname = $row["Firstname"];
    $lastname = $row["Lastname"];
    $fullname = $row["Fullname"];
    $email = $row["Email"];
    $companyName = $row["CompanyName"];
    $country = $row["Country"];
    $address = $row["Address"];
    $number = $row["Number"];
    $apartment = $row["Apartment"];
    $city = $row["City"];
    $postcode = $row["Postcode"];
    if ($id != null) {
		 $v_autentication = "OK";
		 $data = '"Data"';
                 $json = json_encode( array("Authentication" => $v_autentication, "Username" => $username, "Password" => $password, "Firstname" => $firstname, "Lastname" => $lastname, "Fullname" => $fullname, "Email" => $email, "CompanyName" => $companyName, "Country" => $country, "Address" => $address, "Number" => $number, "Apartment" => $apartment, "City" => $city, "Postcode" => $postcode));
                 echo '{'.$data.':['.$json.']}';  
    } else {
	  $v_autentication = "FALSE_ID_NULL";
      $response[] = ['Authentication' => $v_autentication];
	  $data = '"Data"';
	  $json = '{'.$data.':'.json_encode($response).'}';
	  echo $json;
    }
  }
} else {
  $v_autentication = "FALSE_LAST";
  $response[] = ['Authentication' => $v_autentication];
  $data = '"Data"';
  $json = '{'.$data.':'.json_encode($response).'}';
  echo $json;
}
mysqli_close($con);
?>


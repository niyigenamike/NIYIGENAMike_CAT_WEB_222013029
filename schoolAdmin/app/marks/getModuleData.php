<?php 	

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "schooladministrationsystem";
$conn = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($conn->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  //echo "Successfully connected";
}
$sql = "SELECT module_id , module_name FROM modules";
$result = $conn->query($sql);

$data = $result->fetch_all();

$conn->close();

echo json_encode($data);
?>
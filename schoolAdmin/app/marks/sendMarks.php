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
 // print_r($valid);
if($_POST['studentName']) {	

	for($x = 0; $x < count($_POST['studentName']); $x++) {			
        $rate = $_POST['studentName'][$x];
        $CAT = $_POST['rate'][$x];
        $EXAM = $_POST['quantity'][$x];
        $studentName = $_POST['studentName'][$x];
    
        // Insert each set into the database
        $sql = "INSERT INTO marks (lecture_id,moduleName,CAT,EXAM,studentId) 
                VALUES ('1','$rate','$CAT','$EXAM','$studentName')";
    
		
    if ($conn->query($sql) === true) {
        $valid['success'] = true;
        $valid['messages'][] = "Successfully Added";
      } else {
        // If insertion fails
        $valid['success'] = false;
        $valid['messages'][] = "Error: " . $connect->error;
      }

    } // /for quantity

    echo json_encode($valid);
	
	$conn->close();

 
} 
?>
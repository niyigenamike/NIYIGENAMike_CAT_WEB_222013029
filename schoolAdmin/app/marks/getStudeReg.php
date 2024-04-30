<?php
// getStudentRegNumber.php

// Include your database connection file
 
// DB credentials.
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
 

// Check if student ID is set in the request
if (isset($_POST['studentId'])) {
    $studentId = $_POST['studentId'];

    // Prepare and execute SQL query to fetch registration number
    $sql = "SELECT regnumber FROM student WHERE id = $studentId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the registration number
        $row = $result->fetch_assoc();
        $regNumber = $row['regnumber'];

        // Return the registration number as JSON response
        echo json_encode(['status' => 'success', 'regNumber' => $regNumber]);
        exit;
    } else {
        // No data found for the given student ID
        echo json_encode(['status' => 'error']);
        exit;
    }
} else {
    // Student ID is not set in the request
    echo json_encode(['status' => 'error']);
    exit;
}
?>

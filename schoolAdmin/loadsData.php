<?php 

/* this single page page will be rsued by all tables to loads and display data from the database*/
require_once('../config.php');
if(isset($_GET['id'])){
         // Fetch student data from database
        $id = $_GET['id'];
        $sql = "SELECT * FROM student WHERE id = $id";
        $result = $conn->query($sql);
         
        // Check if there are rows returned
        if ($result->num_rows > 0) {
            // Initialize an array to hold student data
            $students = array();
        
            // Loop through each row in the result set
            while ($row = $result->fetch_assoc()) {
                // Append each row to the $students array
                $students[] = $row;
            }
        
            // Encode the $students array as JSON
            $json_students = json_encode($students);
        } else {
            $json_students = '[]'; // If no rows are returned, set an empty JSON array
        }
        
}else{
    if(isset($_GET['table'])){
$table = $_GET['table'];

// Fetch student data from database
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Initialize an array to hold student data
    $datas = array();

    // Loop through each row in the result set
    while ($row = $result->fetch_assoc()) {
        // Append each row to the $students array
        $datas[] = $row;
    }

    // Encode the $students array as JSON
    $json_datas = json_encode($datas);
} else {
    $json_datas = '[]'; // If no rows are returned, set an empty JSON array
}
    }else{
        $table = $_GET['page'];

        // Fetch student data from database
        $sql = "SELECT * FROM $table";
        $result = $conn->query($sql);
        
        // Check if there are rows returned
        if ($result->num_rows > 0) {
            // Initialize an array to hold student data
            $datas = array();
        
            // Loop through each row in the result set
            while ($row = $result->fetch_assoc()) {
                // Append each row to the $students array
                $datas[] = $row;
            }
        
            // Encode the $students array as JSON
            $json_datas = json_encode($datas);
        } else {
            $json_datas = '[]'; // If no rows are returned, set an empty JSON array
        }      
    }
}
?>
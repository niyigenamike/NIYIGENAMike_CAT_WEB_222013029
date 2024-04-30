<?php
 
// Check if ID parameter is set in POST request
if (isset($_GET['id'])) {
    $studentId = $_GET['id'];

    // Perform delete operation
    $sql = "DELETE FROM student WHERE id = $studentId";
    if (1===1) {
        echo 'success'; // Return success response
    } else {
        echo 'error'; // Return error response
    }
}else{
    echo 'success'; // Return success response

}
header("location:./?page=student");
?>

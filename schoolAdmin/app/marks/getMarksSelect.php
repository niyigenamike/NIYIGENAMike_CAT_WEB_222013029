<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "schooladministrationsystem";
//$store_url = "http://localhost/phpinventory/";
// db connection
$conn = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($conn->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  //echo "Successfully connected";
}
// Check if studentId is set and not empty

// Check if studentId is set and not empty
if (isset($_POST['studentId'])) {
    $studentId = $_POST['studentId'];
    
    // Retrieve marks data based on studentId
    $sql = "SELECT * FROM marks WHERE studentId = $studentId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output marks data in a table format
        echo '<table>';
        echo '<tr><th>Mark ID</th><th>Lecture Name</th><th>Date</th><th>Module Name</th><th>CAT</th><th>EXAM</th><th>Student ID</th></tr>';
        while ($row = $result->fetch_assoc()) {
            // Retrieve lecture name based on lecture_id
            $lectureId = $row['lecture_id'];
            $lectureSql = "SELECT fullname FROM lectures WHERE id = $lectureId";
            $lectureResult = $conn->query($lectureSql);
            $lectureName = ($lectureResult->num_rows > 0) ? $lectureResult->fetch_assoc()['fullname'] : '';

            // Retrieve module name based on moduleName
            $moduleId = $row['moduleName'];
            $moduleSql = "SELECT module_name FROM modules WHERE module_id = $moduleId";
            $moduleResult = $conn->query($moduleSql);
            $moduleName = ($moduleResult->num_rows > 0) ? $moduleResult->fetch_assoc()['module_name'] : '';

            // Output marks data
            echo '<tr>';
            echo '<td>' . $row['mark_id'] . '</td>';
            echo '<td>' . $lectureName . '</td>';
            echo '<td>' . $row['date_'] . '</td>';
            echo '<td>' . $moduleName . '</td>';
            echo '<td>' . $row['CAT'] . '</td>';
            echo '<td>' . $row['EXAM'] . '</td>';
            echo '<td>' . $row['studentId'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No marks found for the selected student so far.';
    }
} else {
    echo 'Invalid request.';
}
?>

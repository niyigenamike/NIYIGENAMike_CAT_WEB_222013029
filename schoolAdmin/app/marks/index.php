<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Marks</title>
<!-- Add your CSS links here -->
</head>
<body>
<main>
    <div class="head-title">
        <div class="left">
            <h1>Marks</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Manage Marks</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div> 
        <a href="http://localhost/php-mts/app/?page=add_marks&table=marks" class="btn-download">
            <i class='bx bxs-cloud-download'></i>
            <span class="text">Add New Marks</span>
        </a>
    </div>

    <div class="table-data">
        <div class="order">
            <div style="background-color: white; padding: 20px;">
                <label for="studentSelect">Select Student:</label>
                <select id="studentSelect" name="studentSelect">
                    <option value="">--Select--</option>
                    <?php 
                    require_once('../config.php');
                    $sql = "SELECT * FROM student";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_array()) {
                        echo "<option value='".$row['id']."'>".$row['fullname']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div id="marksContainer" style="background-color: white; padding: 20px; margin-top: 20px;">
                <!-- Marks data will be displayed here -->
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#studentSelect').change(function() {
        var studentId = $(this).val();
        alert(studentId);
        if (studentId) {
            $.ajax({
                url: '../app/marks/getMarksSelect.php',
                type: 'POST',
                data: { studentId: studentId },
                success: function(response) {
                    $('#marksContainer').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Request failed. Error: ' + error);
                }
            });
        }
    });
});
</script>

<!-- Add your other JavaScript scripts here if needed -->
</body>
</html>

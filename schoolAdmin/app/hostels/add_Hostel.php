<style>
 

.form-container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 100%; /* Increased width for the form */
}

.form-row {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

label {
    width: 150px; /* Fixed width for labels */
    margin-right: 20px;
    text-align: right;
}

input,
select {
    flex: 1;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
    outline: none;
    margin-right: 100px;
}

.submit-button {
    background-color: #007bff;
    color: #ffffff;
 
}

.reset-button {
    background-color: #dc3545;
    color: #ffffff;
}

    </style>
    <?php
require_once('../config.php');
$tableName =$_GET['table'];

require_once("../loadsData.php");

?>
    <main>
        <?php error_reporting(0); $id = $_GET['id']; ?>
    <div class="head-title">
        <div class="left">
            <?php if(isset($_GET['id'])){ ?>
            <h1>Edit hostel</h1>
            <?php }else{ ?>
            <h1>Add New Hostel</h1>

                <?php } ?>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Manage hostel</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="./">Home</a>
                </li>
            </ul>
        </div>
        
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Student</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <div class="form-container">
        <form id="registration-form" class="<?php echo $tableName; ?>">
        <div class="form-row">
                <label for="fullname">Id:</label>
                <input type="text" id="id" name="id" value="<?php echo $id; ?>" placeholder="Auto generated" disabled>
                </div><div class="form-row">
                <label for="fullname">Hostel Name:</label>
                <input type="text" id="hostel_name" name="hostel_name" required>
            </div>
            
            <div class="form-row">
                <label for="age">Hostel rooms:</label>
                <input type="number" id="hostel_rooms" name="hostel_rooms" required>
            </div>
            <div class="form-row">
                <label for="type">Hostel Type:</label>
                <input type="text" id="hostel_gender" name="hostel_gender"  required>
            </div>
             
 
            <div class="form-row">
                <button type="submit" class="submit-button">Submit</button>
                <button type="button" class="reset-button" onclick="resetForm()">Reset Form</button>
            </div>
        </form>
    </div>
        </div>
    </div>
</main>
<?php //include_once('includes/footer.php'); ?>

<script src="plugins/js/jquery-3.6.0.min.js" type="text/javascript"></script>
<?php include_once('includes/footer.php') ?>
<script>
              var students = <?php echo $json_students; ?>;
            students.forEach(function(student) {
                populateFormWithStudentData(student);
            })
            function populateFormWithStudentData(student) {
        $('#hostel_name').val(student.hostel_name);
        $('#hostel_rooms').val(student.hostel_rooms);
        $('#hostel_gender').val(student.hostel_gender);
    }
</script>
<script src="plugins/addData.js" type="text/javascript"></script>

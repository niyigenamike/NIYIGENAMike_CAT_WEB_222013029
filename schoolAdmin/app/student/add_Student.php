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
            <h1>Edit Student</h1>
            <?php }else{ ?>
            <h1>Add New Student</h1>

                <?php } ?>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Manage students</a>
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
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            
            <div class="form-row">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
            </div>
            <div class="form-row">
                <label for="age">Image:</label>
                <input type="file" id="user_image" name="user_image" accept="image/*" required>
            </div>
            <div class="form-row">
                <label for="regnumber">Registration Number:</label>
                <input type="text" id="regnumber" name="regnumber" pattern="[0-9]+" required>
            </div>
            <div class="form-row">
                <label for="department">Department:</label>
                <input type="text" id="department" name="department" required>
            </div>
            <div class="form-row">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-row">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-row">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-row">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
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
        $('#fullname').val(student.fullname);
        $('#age').val(student.age);
        $('#regnumber').val(student.regnumber);
        $('#department').val(student.department);
        $('#address').val(student.address);
        $('#email').val(student.email);
        $('#password').val(student.password);
        $('#gender').val(student.gender);
    }
</script>
<script src="plugins/addData.js" type="text/javascript"></script>

<?php
require_once("../loadsData.php");

?>
<style>
    .student-image {
    width: 50px; /* Adjust as needed */
    height: 50px; /* Adjust as needed */
    border-radius: 50%; /* Makes the image circular */
    object-fit: cover; /* Ensures the image covers the circular container */
    border: 1px solid #ccc; /* Optional: Add border for better visibility */
}

</style>
<main>
    <div class="head-title">
        <div class="left">
            <h1>Students</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Manage students</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div> 
        <a href="../app/?page=add_Student&table=student" class="btn-download">
            <i class='bx bxs-cloud-download'></i>
            <span class="text">Add New student</span>
        </a>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>All students</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table id="studentTable" style="border: 1px;">
                <thead>
                    <tr>
                    <th>Image</th>

                        <th>Name</th>
                        <th>Email</th>
                        <th>Registration Number</th>
                        <th>Address</th>
                        <th>Hostel Status</th>
                        <th>Date Joined</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
            <!-- Use JavaScript to dynamically populate this tbody -->
                </tbody>

            </table>
        </div>
    </div>
</main>
<?php //include_once('includes/footer.php'); ?>

<script src="plugins/js/jquery-3.6.0.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {
    // Parse the JSON data into a JavaScript array of objects
    var datas = <?php echo $json_datas; ?>;

    // Function to populate the table with student data
    function populateStudentTable() {
        var tbody = $('#studentTable tbody');

        // Clear existing table rows
        tbody.empty();

        // Loop through each student object and append a new row to the table
        datas.forEach(function(data) {
            var image = '<img src="../classes/' + data.user_image + '" alt="Student Image" class="student-image">';

            var row = '<tr>' +
                '<td>' + image + '</td>' +

                '<td>' + data.fullname + '</td>' +
                '<td>' + data.email + '</td>' +
                '<td>' + data.regnumber + '</td>' +
                '<td>' + data.address + '</td>' +
                '<td>' + data.hostel_status + '</td>' +
                '<td>' + data.date_joined + '</td>' +
                '<td>' + data.status + '</td>' +
                '<td><a href="?page=add_Student&id=' + data.id + '&table=<?php echo $table;?>">Edit</a></td>' +
                '<td><a href="deleteStudent.php?id='+data.id+'" id="'+data.id+'" class="deleteStudent" data-id="' + data.id + '">Delete</a></td>' +
                '</tr>';

            // Append the row to the table body
            tbody.append(row);
        });
        $('.student-image').on('click', function() {
        var fullSrc = $(this).data('fullsrc');

    });
 
        // Attach click event handler for delete links
        $('.deleteStudent').on('click', function(e) {

                 e.preventDefault()
            var   id=$(this).attr('id');
           var confirmDelete = confirm('Are you sure you want to delete this student?');
           if (confirmDelete) {

                $.ajax({
                    url:'http://localhost/schoolAdmin/classes/Users.php?f=delete_user&id=' + id + '&table=student',
                    data: { id: 5 },
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
                    dataType: 'json',
                    error:err=>{ 
                        console.log(err);
                      alert(err);
                     },
                    success:function(resp){
                        if(resp.status == 'success'){
                            alert("Stydent was deleted");

                            location.href= './?page=student';
                        }else if(!!resp.msg){
                            alert("failded To delete");

                         }else{
                            alert("failded to delete");

                         }
 
                    }
                })
           }else{
            console.log('Deletion cancelled by user.');

           }
        })


        //..........
    }

    // Call the function to initially populate the table
    populateStudentTable();
});
</script>


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
            <h1>Employees</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Manage Employees</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div> 
        <a href="http://localhost/php-mts/app/?page=add_Employee&table=employees" class="btn-download">
            <i class='bx bxs-cloud-download'></i>
            <span class="text">Add New Employee</span>
        </a>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>All employee</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table id="studentTable" style="border: 1px;">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Action</th>
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
            var image = '<img src="http://localhost/php-mts/classes/' + data.user_image + '" alt="Student Image" class="student-image">';

            var row = '<tr>' +
                '<td>' + image + '</td>' +
                '<td>' + data.full_name + '</td>' +
                '<td>' + data.age + '</td>' +
                '<td>' + data.department + '</td>' +
                '<td>' + data.salary + '</td>' +
                '<td>' + data.address + '</td>' +
                '<td>' + data.gender + '</td>' +
                '<td><a href="?page=add_Student&id=' + data.id + '&table=<?php echo $table;?>">Edit</a></td>' +
                '<td><a href="delete.php?id='+data.id+'" id="'+data.id+'" class="deleteStudent" data-id="' + data.id + '">Delete</a></td>' +
                '</tr>';

            // Append the row to the table body
            tbody.append(row);
        });
        $('.student-image').on('click', function() {
        var fullSrc = $(this).data('fullsrc');

        // Open a modal or overlay to display the full-size image
        openImageModal(fullSrc);
    });
    function openImageModal(imageSrc) {
    // Example: Display image in a modal
    var modalContent = '<img src="' + imageSrc + '" alt="Full-size Image" class="full-size-image">';
    $('#imageModal .modal-body').html(modalContent);
    $('#imageModal').modal('show');
}

        // Attach click event handler for delete links
        $('.deleteStudent').on('click', function(e) {

                 e.preventDefault()
              /*  $('.pop-alert').remove()
                var _this = $(this)
                var el = $('<div>')
                el.addClass("pop-alert alert alert-danger text-light mb-3 rounded-0 px-1 py-2")
                el.hide()*/
             //   start_loader()
           var   id=$(this).attr('id');
           var confirmDelete = confirm('Are you sure you want to delete this student?');
           if (confirmDelete) {

                $.ajax({
                    url:'http://localhost/php-mts/classes/Users.php?f=delete_user&id=' + id + '&table=employees',
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

                            location.href= './?page=employees';
                        }else if(!!resp.msg){
                            alert("failded To delete");

                   /*         el.text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $('html, body').scrollTop(_this.offset().top - '150')*/
                        }else{
                            alert("failded to delete");

                        /*    el.text("An error occured while saving data")
                            _this.prepend(el)
                            el.show('slow')
                            $('html, body').scrollTop(_this.offset().top - '150')*/
                        }
              //          end_loader()
                //        console

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


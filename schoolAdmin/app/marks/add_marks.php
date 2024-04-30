<style>
/* Container style */
form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

/* Style for form inputs */
.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Style for form labels */
.control-label {
    font-weight: bold;
}

/* Style for buttons */
.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Style for primary button */
.btn-primary {
    background-color: #007bff;
    color: #fff;
}

/* Style for danger button */
.btn-danger {
    background-color: #dc3545;
    color: #fff;
}

/* Style for table */
.table {
    width: 100%;
    border-collapse: collapse;
}

/* Style for table headers */
.table th {
    text-align: left;
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

/* Style for table rows */
.table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

/* Style for buttons in table */
.table .btn {
    padding: 5px 10px;
}


</style>
<form class="form-horizontal" method="POST" action="marks/addMarks.php" id="addDataInDb" enctype="multipart/form-data">
 
                                        
 <div class="form-group">
     <div class="row">

       <label class="col-sm-2 control-label">Marks Id</label>
        <div class="col-sm-4">
        <?php 
require_once('../config.php');



         $sql = "select count(*) as cnt from marks";
         $row = $conn->query($sql)->fetch_assoc();
         
         $new=sprintf('%05d',intval($row['cnt'])+1);

         ?>
         <input type="text" class="form-control" placeholder="Marks Id" autocomplete="off"disabled="true" value="<?php echo $new; ?>" required/>
        </div>


         <label class="col-sm-2 control-label"> Date</label>
         <div class="col-sm-4">
          <input type="date" class="form-control" id="orderDate" name="orderDate" autocomplete="off" value="<?php echo date('Y-m-d'); ?>" />
        </div>
     </div>
 </div>
<div class="form-group">
     <div class="row">
         <label class="col-sm-2 control-label">Student Name</label>
         <div class="col-sm-4">
            <select class="form-control select2" id="studentName" name="studentName">
<option value="">~~SELECT~~</option>
<?php 
$sql = "SELECT * FROM student ";
$result = $conn->query($sql);

while($row = $result->fetch_array()) {
echo "<option value='".$row['id']."'>".$row['fullname']."</option>";
} // while

?>
</select>
</div>

         <label class="col-sm-2 control-label">Student reg No.</label>
         <div class="col-sm-4">
 <input type="text" class="form-control" id="mob_no" name="clientContact" disabled="true"    required style="color:black;" >
         </div>
     

     </div>

 </div>
                

<table class="table" id="productTable">
<thead>
<tr>              
<th style="width:40%;">Module</th>
<th style="width:20%;">CAT</th>
<th style="width:15%;">Exam</th>              
<th style="width:25%;">Total</th>             
<th style="width:10%;">StudentId</th>
</tr>
</thead>
<tbody>
<?php
$arrayNumber = 0;
for($x = 1; $x < 2; $x++) { ?>
<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">                
<td style="margin-left:20px;">
<div class="form-group">

<select class="form-control select2" name="studentName[]" id="studentName<?php echo $x; ?>" onchange="getProductData((<?php echo $x; ?>))" >
<option value="">~~SELECT~~</option>
<?php
$productSql = "SELECT * FROM modules";
$productData = $conn->query($productSql);

while($row = $productData->fetch_array()) {                     
echo "<option value='".$row['module_id']."' id='changeName".$row['module_id']."'>".$row['module_name']."</option>";
} // /while 

?>
</select>
</div>
</td>
<td style="padding-left:20px;">                 
<input type="text" name="rate[]" id="rate<?php echo $x; ?>"onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off"  class="form-control" />                  
<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>"onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" />                  
</td>

<td style="padding-left:20px;">
<div class="form-group">
<input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
</div>
</td>
<td >                 
<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" />                  
<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />                  
</td>
<td >                 
<input type="text" name="studeId[]" id="studeId"  autocomplete="off" class="form-control" disabled="true" />                  
<input type="hidden" name="studeId[]" id="studeId" autocomplete="off" class="form-control" />                  
</td>
<td >

 

</div>
</td>

<td >

</div>
</td>


</tr>
<?php
$arrayNumber++;
} // /for
?>
</tbody>          
</table>

 

 
 



 
<div class="form-group submitButtonFooter">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success btn-flat m-b-30 m-t-30"><i class="glyphicon glyphicon-ok-sign"></i> Sdddubmit</button>

<button type="reset" class="btn btn-danger btn-flat m-b-30 m-t-30" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
</div>
</div>

</form>
<script src="plugins/js/jquery-3.6.0.min.js" type="text/javascript"></script>

<script>
    function getTotal(row = null) {
     if (row) {
        var total = Number($("#rate" + row).val()) + Number($("#quantity" + row).val());
        total = total.toFixed(2);
        $("#total" + row).val(total);
        $("#totalValue" + row).val(total);

        subAmount();
    } else {
        alert('no row !! please refresh the page');
    }
}
$(document).ready(function() {
    $('#addDataInDb').submit(function(e){
       alert("ReadyToSubmit....");
        $.ajax({
            url:'../app/marks/addMarks.php',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST', 
            type: 'POST',
            dataType: 'json',
            error:err=>{ 
                console.log(err);
             //   el.text("An error occured while saving data")
             alert(err);
             },
            success:function(resp){
                if(resp.status == 'success'){
                    alert("done well");


                  }else if(!!resp.msg){
                    alert("failded sent");

                 }else{
                    alert("fail");

                 }
 
            }
        })
    })
 


// Function to calculate total for the row
 



 
    $("#studentName").change(function(){
        var studentId = $(this).val();
         alert(studentId);
        // AJAX request to fetch student's registration number
        $.ajax({
            url: '../app/marks/getStudeReg.php', // Adjust the URL according to your file structure
            method: 'POST',
            data: { studentId: studentId },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    // Auto-complete the registration number field with the value received
                    $("#mob_no").val(response.regNumber);
                    $("#studeId").val(response.id);
                } else {
                    
                    // Handle error or no data case
                    $("#mob_no").val('');
                    alert('No registration number found for the selected student.');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('An error occurred while fetching the registration number.');
            }
        });

    });
    function getTotal(row = null) {
        alert("changes");
  if(row) {
    var total = Number($("#rate"+row).val()) + Number($("#quantity"+row).val());
    total = total.toFixed(2);
    $("#total"+row).val(total);
    $("#totalValue"+row).val(total);
    
    subAmount();

  } else {
    alert('no row !! please refresh the page');
  }
}

 


 // /add row
});

</script>
 
<?php  
  ?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
 
 <style>
    
   
    footer{
        position:fixed;
        bottom:0;
    }
    footer *{
        color: var(--bs-primary) !important;
    }
</style>
<body class="index-page bg-gray-200">
     
     
    <div class="content w-100">
    <div class="row justify-content-center mx-0">
        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
            <div class="card card-body shadow-blur mx-3 mx-md-4 rounded-0">
                 
                <div class="alert alert-success ?> rounded-0 text-light py-1 px-4 mx-3">
                    <div class="d-flex w-100 align-items-center">
                        
                        <div class="col-2 text-end">
                            <button class="btn m-0 text-sm" type="button" onclick="$(this).closest('.alert').remove()"><i class="material-icons mb-0">close</i></button>
                        </div>
                    </div> 
                </div>
                
                <div class="container">
                    <h4 class="fw-bolder text-center">Create an Account</h4>
                    <hr>
                    <br>
                    <form action="" id="registration-form">
                             <label >First Name</label>
                            <input type="text" name="fullname" required="required">
                             <label >Middle Name</label>
                            <input type="text" name="age" >
                             <label>Last Name</label>
                            <input type="text" name="regnumber">
                             <label>Username</label>
                            <span class="input-group-text"><i class="material-icons" aria-hidden="true">person_outline</i></span>
                            <input type="text" name="department"  required="required">
                             <label for="password" class="form-label">Password</label>
                            <span class="input-group-text"><i class="material-icons" aria-hidden="true">key</i></span>
                            <input type="password" name="password" id="w" class="form-control form-control-lg" required="required">
                     <br>
                             <a href="#" class="text-primary">Already have an Account? Login Here</a>
                              <button class="btn btn-primary bg-gradient rounded-0 mb-0">Create Account2</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="plugins/js/jquery-3.6.0.min.js" type="text/javascript"></script>
<?php include_once('includes/footer.php') ?>

     <script>
        $(function(){
            $('#registration-form').submit(function(e){
                alert("mm");
                $.ajax({ 
                    url:'../classes/Users.php?f=register_user',
                    data: new FormData($(this)[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST', 
                    type: 'POST',
                    dataType: 'json',
                    error:err=>{
                        console.error(err)
                        alert(err);
                     },
                    success:function(resp){
                        if(resp.status == 'success'){
                           // location.href= './';
                           alert("good");

                        }else if(!!resp.msg){
                            alert("good1");

                         }else{
                            alert("err");

                         }
 
                    }
                })
            })
        })
    </script>
</body>

</html>

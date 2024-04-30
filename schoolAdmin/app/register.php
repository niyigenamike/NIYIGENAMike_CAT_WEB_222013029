<!--
=========================================================
* Material Kit 2 - v3.0.2
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit 
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!--
=========================================================
* PDF Generator using TCPDF 
=========================================================

* Coded by oretnom23@gmail.com
 =========================================================
-->
<?php  
require_once('../config.php');
 ?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
 
<?php include_once('includes/header.php') ?>
<style>
    html, body{
        height:100%;
        width:100%;
    }
    body{
        height:unset;
        min-height:100%;
         background-size:cover;
        background-position:center center;
        background-repeat:no-repeat;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        backdrop-filter:brightness(.8);
        overflow-y:auto !important;
        padding-bottom: 5em;
    }
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
                        <div class="form-group mb-3 input-group input-group-dynamic">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" name="firstname" id="firstname" autofocus class="form-control form-control-lg" required="required">
                        </div>
                        <div class="form-group mb-3 input-group input-group-dynamic">
                            <label for="middlename" class="form-label">Middle Name</label>
                            <input type="text" name="middlename" id="middlename" class="form-control form-control-lg">
                        </div>
                        <div class="form-group mb-3 input-group input-group-dynamic">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control form-control-lg">
                        </div>
                        <div class="form-group mb-3 input-group input-group-dynamic">
                            <label for="username" class="form-label">Username</label>
                            <span class="input-group-text"><i class="material-icons" aria-hidden="true">person_outline</i></span>
                            <input type="text" name="username" id="username" class="form-control form-control-lg" required="required">
                        </div>
                        <div class="form-group mb-3 input-group input-group-dynamic">
                            <label for="password" class="form-label">Password</label>
                            <span class="input-group-text"><i class="material-icons" aria-hidden="true">key</i></span>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" required="required">
                        </div>
                    <br>
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-6">
                            <a href="<?= base_url.'app/login.php' ?>" class="text-primary">Already have an Account? Login Here</a>
                        </div>
                        <div class="col-sm-6 text-end">
                            <button class="btn btn-primary bg-gradient rounded-0 mb-0">Create Account2</button>
                        </div>
                    </div>
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
            /*    e.preventDefault()
                $('.pop-alert').remove()
                var _this = $(this)
                var el = $('<div>')
                el.addClass("pop-alert alert alert-danger text-light mb-3 rounded-0 px-1 py-2")
                el.hide()
                start_loader()*/
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
                      /*  el.text("An error occured while saving data")
                        _this.prepend(el)
                        el.show('slow')
                        $('html, body').scrollTop(_this.offset().top - '150')
                        end_loader()*/
                    },
                    success:function(resp){
                        if(resp.status == 'success'){
                            location.href= './';
                        }else if(!!resp.msg){
                       /*     el.text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $('html, body').scrollTop(_this.offset().top - '150')*/
                        }else{
                        /*    el.text("An error occured while saving data")
                            _this.prepend(el)
                            el.show('slow')
                            $('html, body').scrollTop(_this.offset().top - '150')*/
                        }
                    //    end_loader()
                    //    console

                    }
                })
            })
        })
    </script>
</body>

</html>

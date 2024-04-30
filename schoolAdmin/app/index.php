<?php require_once('../config.php');

if(!isset($_SESSION['id']))
{	
     header("Location: login.php");
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
 	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>AdminHub</title>
</head>
<body>
<?php 
   
?>
<?php 
 $page = isset($_GET['page']) ? $_GET['page'] : 'home';
$page_name = explode("/",$page)[count(explode("/",$page)) -1];
?>
	<!-- SIDEBAR -->
<?php include_once("pagesSections/sideBar.php"); ?>
	<!-- SIDEBAR -->
	<?php include_once('includes/header.php') ?>

	<script>
        $(function(){                
			start_loader();
        })
    </script>


	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<?php include_once("pagesSections/header.php"); ?>

		<!-- NAVBAR -->

		<!-- MAIN -->
        <?php
		 
        if(is_file($page.'.php')){
            include $page.'.php';
        }else{
            if(is_dir($page) && is_file($page.'/index.php')){
                include $page.'/index.php';
            }else if(!is_dir($page) && !is_file($page.'.php')){
               if($page=='add_Student'){
				include 'student/'.$page.'.php';
			   }else if($page == 'add_Lecture'){
                include 'lectures/'.$page.'.php';
			   }else if($page=='add_Hostel'){
				include 'hostels/'.$page.'.php';
			   }else if($page=='add_Employee'){
				include 'employees/'.$page.'.php';
			   }else if($page=='add_marks'){
                include 'marks/'.$page.'.php';
			   }
			   else {
				echo '<h4 class="text-center fw-bolder">Page Not Found</h4>';

			   }
			}
			else{
                echo '<h4 class="text-center fw-bolder">Page Not Found</h4>';
            }
        }
        ?>
		<!-- MAIN -->
	</section>
        <?php //include_once('includes/footer.php') ?>

	<!-- CONTENT -->
	

	<script src="script2.js"></script>
  </body>
</html>
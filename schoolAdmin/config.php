<?php
ob_start();
ini_set('date.timezone','Asia/Manila');
date_default_timezone_set('Asia/Manila');
session_start();
 
require_once('initialize.php');
require_once('classes/DBConnection.php');
require_once('classes/SystemSettings.php');
$db = new DBConnection;
$conn = $db->conn;
 
function redirect($url=''){
  }
function validate_image($file){
    $ex_file = explode("?",$file)[0];
	if(!empty($ex_file)){
			// exit;
		if(is_file(base_app.$ex_file)){
			return base_url.$file;
		}else{
			return base_url.'uploads/defaults/no-image-available.png';
		}
	}else{
		return base_url.'uploads/defaults/no-image-available.png';
	}
}
 
ob_end_flush();
?>
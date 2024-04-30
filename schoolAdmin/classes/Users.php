<?php
require_once('../config.php');
Class Users extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	public function save_users() {
		if (empty($_POST['password'])) {
			unset($_POST['password']);
		} else {
			$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		}
		$table=$_GET['table'];
		extract($_POST);
		$id = $id ?? '';
		$data = [];
		
		// Handle file upload
		if (!empty($_FILES['user_image']['name'])) {
			$image_name = $_FILES['user_image']['name'];
			$image_tmp = $_FILES['user_image']['tmp_name'];
			$image_path = 'images/' . $image_name; // Adjust folder path as needed
		
			// Move uploaded image to destination folder
			move_uploaded_file($image_tmp, $image_path);
		
			// Add image path to data array
			$data[] = "user_image = '{$image_path}'";
		}
		
		foreach ($_POST as $k => $v) {
			if (!in_array($k, ['id', 'user_image']) && !is_array($v)) {
				$v = $this->conn->real_escape_string($v);
				$data[] = "{$k} = '{$v}'";
			}
		}
		
		$dataString = implode(", ", $data);
	
		if (!isset($_GET['id'])) {
			$sql = "INSERT INTO $table SET {$dataString}";
		} else {
			$sql = "UPDATE $table SET {$dataString} WHERE id = {$id}";
		}
		
		$save = $this->conn->query($sql);
		
		$resp = [];
		if ($save) {
			$uid = empty($id) ? $this->conn->insert_id : $id;
			$this->settings->set_flashdata('success', 'Account has been ' . (empty($id) ? 'created' : 'updated') . ' successfully.');
			$resp['status'] = 'success';
		} else {
			$resp['status'] = 'failed';
			$resp['msg'] = 'Saving account failed.';
			$resp['error'] = $this->conn->error;
		}
		
		return json_encode($resp);
	}
	
	

	public function addStudent(){
		if(empty($_POST['password']))
			unset($_POST['password']);
		else
			$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		extract($_POST);
		$id = $id ?? '';
		$oid = $id;
		$data = '';
		$chk = $this->conn->query("SELECT * FROM `student` where regnumber ='{$regnumber}' ".($id>0? " and id!= '{$id}' " : ""))->num_rows;
		if($chk > 0){
			return 3;
			exit;
		}
		foreach($_POST as $k => $v){
			if(!in_array($k,['id']) && !is_array($_POST[$k])){
				if(!empty($data)) $data .=" , ";
				$v = $this->conn->real_escape_string($v);
				$data .= " {$k} = '{$v}' ";
			}
		}
		
		if(empty($id)){
			$sql = "INSERT INTO regnumber set {$data}";
		}else{
			$sql = "UPDATE regnumber set $data where id = {$id}";
		}
		$save = $this->conn->query($sql);
		if($save){
			$uid = empty($id) ? $this->conn->insert_id : $id;
			if(empty($id))
				$this->settings->set_flashdata('success','Your Account has been created successfully.');
			else
				$this->settings->set_flashdata('success','Your Account has been updated successfully.');
			$resp['status'] = 'success';
			if($this->settings->userdata('id') == $uid){
				foreach($_POST as $k => $v){
					if(!in_array($k,['id']) && !is_array($_POST[$k])){
						$this->settings->set_userdata($k,$v);
					}
				}
			}
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = 'Saving account failed.';
			$resp['error'] = $this->conn->error;
		}
		
		return  json_encode($resp);
		}
	public function delete_users(){
		//extract($_POST);
		$id=$_GET['id'];
		$table=$_GET['table'];
		$qry = $this->conn->query("DELETE FROM $table where id = $id");
		if($qry){
		//	$this->settings->set_flashdata('success','User Details successfully deleted.');
		//	$avatar = explode("?", $avatar)[0];
			 
			$resp['status'] = 'success';
		}else{
			$resp['status'] = 'failed';
		}
		return json_encode($resp);
	}
}

$users = new users();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
switch ($action) {
	 
	case 'register_user':
		echo $users->save_users();
	break;
	case 'saveStudent':
		echo $users->addStudent();
	break;
	case 'deleteUser':
		echo $users->delete_users();
	break;
	default:
		// echo $sysset->index();
		break;
}
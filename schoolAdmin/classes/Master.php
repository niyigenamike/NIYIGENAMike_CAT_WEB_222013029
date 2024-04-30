<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
			exit;
		}
	}
 
    public function get_student() {
        $sql = "SELECT * FROM schooladmin";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'stud_fullName' => $row['stud_fullName'],
                    'stud_email' => $row['stud_email'],
                    'stud_regNumber' => $row['stud_regNumber'],
                    'stud_address' => $row['stud_address'],
                    'stud_hostelStatus' => $row['stud_hostelStatus'],
                    'created_at' => date("F d, Y", strtotime($row['created_at'])),
                    'status' => ($row['stud_password'] ? 'active' : 'inactive')
                );
            }
            $response = array(
                'status' => 'success',
                'data' => $data
            );
        } else {
            $response = array(
                'status' => 'failed',
                'message' => 'No students found'
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}



 
 
	function saveStudent() {
        // Retrieve form data
        $fullname = $_POST['fullname'] ?? '';
        $age = $_POST['age'] ?? '';
        $regnumber = $_POST['regnumber'] ?? '';
        $department = $_POST['department'] ?? '';
        $address = $_POST['address'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $gender = $_POST['gender'] ?? '';

        // Validate required fields
        if (empty($fullname) || empty($age) || empty($regnumber) || empty($department) || empty($address) || empty($email) || empty($password) || empty($gender)) {
            $response = [
                'status' => 'failed',
                'msg' => 'Please fill in all required fields.'
            ];
            return json_encode($response);
        }

        // Example: Password hashing (for real-world usage)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $sql = "INSERT INTO student (fullname, age, regnumber, department, address, email, password, gender)
                VALUES ('$fullname', '$age', '$regnumber', '$department', '$address', '$email', '$hashedPassword', '$gender')";

        if ($this->conn->query($sql)) {
            $response = [
                'status' => 'success',
                'msg' => 'Student added successfully.'
            ];
        } else {
            $response = [
                'status' => 'failed',
                'msg' => 'Failed to save student data.',
                'error' => $this->conn->error
            ];
        }

        return json_encode($response);
    }



$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	 
	 
	 
	case 'getStudent':
		echo $Master->get_student();
	break;
	 
	
	case 'saveStudent':
		echo $Master->saveStudent();
	break;
	default:
		// echo $sysset->index();
		break;
}
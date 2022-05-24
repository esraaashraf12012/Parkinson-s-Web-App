<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'project';

$conn = mysqli_connect($server,$user,$pass,$db) or die ("unable to connect");

session_start();
if(isset($_POST['d_submit'])){
	
	if (!empty($_POST['first_name']) || !empty($_POST['last_name']) || !empty($_POST['email']) || !empty($_POST['phone_number']) || !empty($_POST['passward']) || !empty($_POST['clinic_address']) || !empty($_POST['city'])){
		

		$name = $_POST['first_name'];
		$name .= ' ';
		$name .= $_POST['last_name'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];
		$passward = $_POST['passward'];
		$clinic_address = $_POST['clinic_address'];
		$city= $_POST['city'];
	
		$query = "insert into user(USER_TYPE,EMAIL,NAME,PASSWORD,CLINIC_ADDRESS,CITY,PHONE_NUMBER)
		VALUES('DOCTOR','$email','$name','$passward','$clinic_address','$city','$phone_number')";
		
		$run = mysqli_query($conn, $query) or die (mysqli_error($conn));
		
		if($run){
			$_SESSION['ID']='rs';
			header("Location: login.php");
		}
		else{
			$_SESSION['ID']='rf';
			header("Location: login.php");
		}
	}
}

if(isset($_POST['p_submit'])){
	
	if (!empty($_POST['first_name']) || !empty($_POST['last_name']) || !empty($_POST['email']) || !empty($_POST['phone_number']) || !empty($_POST['passward']) || !empty($_POST['birthdate']) || !empty($_POST['gender']) || !empty($_POST['doctor_name'])){
		

		$name = $_POST['first_name'];
		$name .= ' ';
		$name .= $_POST['last_name'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];
		$passward = $_POST['passward'];
		$birthdate = $_POST['birthdate'];
		$gender = $_POST['gender'];
		$doctor_name= $_POST['doctor_name'];
		
		$age = floor((time()- strtotime($birthdate))/31556926);
		
		$query1 = "SELECT * FROM user WHERE NAME='$doctor_name' AND USER_TYPE='DOCTOR'";
		
		$run1 = mysqli_query($conn, $query1) or die (mysqli_error($conn));
		
		if(mysqli_num_rows($run1)== 1){
			$row = mysqli_fetch_assoc($run1);
			$doctor_id =$row['ID'];
		}
		else {
			echo("error=incorrect doctor name");
		}
	 
		$query2 = "insert into user(USER_TYPE,EMAIL,NAME,PASSWORD,BIRTHDAY,GENDER,PHONE_NUMBER,DOCTOR_ID,AGE)
		VALUES('PATIENT','$email','$name','$passward','$birthdate','$gender','$phone_number','$doctor_id','$age')";
		
		$run2 = mysqli_query($conn, $query2) or die (mysqli_error($conn));
		
		if($run2){
			$_SESSION['ID']='rs';
			header("Location: login.php");
			
		}
		else{
			$_SESSION['ID']='rf';
			header("Location: login.php");
		}
	}
}

if(isset($_POST['login'])){
	
	if (!empty($_POST['email']) || !empty($_POST['passward']) ){ 
		
		function validate($data) {
			$data =trim($data);
			$data =stripslashes($data);
			$data =htmlspecialchars($data);
			return $data;
		}
			
	
		$email =validate( $_POST['email']);
		$passward = validate($_POST['passward']);
		
	
		$query = "SELECT * FROM user WHERE EMAIL='$email' AND PASSWORD='$passward'";
		
		$run = mysqli_query($conn, $query) or die (mysqli_error($conn));
		
		if(mysqli_num_rows($run)== 1){
			$row = mysqli_fetch_assoc($run);
			if($row['EMAIL']== $email && $row['PASSWORD']==$passward){
			echo "login successful";
			
			$_SESSION['EMAIL']=$row['EMAIL'];
			$_SESSION['name']=$row['name'];
			$_SESSION['ID']=$row['ID'];
			
			header("Location: DoctorHome.php");
			}
		}
		else{
			$_SESSION['ID']='lf';
			header("Location: login.php");
			
			
		}
	}
}

?>
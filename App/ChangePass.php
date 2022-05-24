<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'project';
$conn = mysqli_connect($server,$user,$pass,$db) or die ("unable to connect");

session_start();

if(isset($_SESSION['EMAIL']) && isset($_SESSION['ID'])){
	$ID =$_SESSION['ID'];
	
	$query1 = "SELECT * FROM user WHERE ID='$ID'";
		
	$run1 = mysqli_query($conn, $query1) or die (mysqli_error($conn));
		
    $row = mysqli_fetch_assoc($run1);
	$type=$row['USER_TYPE'];
	if(isset($_POST['update'])){
	
      
		$oldpass = $_POST['old_pass'];
		$newpass= $_POST['new_pass'];
		$renewpass= $_POST['re_new_pass'];
	     
		 if($row['PASSWORD']==$oldpass){
			if($newpass==$renewpass){
		$query = "update user
		set PASSWORD=$newpass
		where ID=$ID";
		
		$run = mysqli_query($conn, $query) or die (mysqli_error($conn));
		if($run){
			echo("pass changed");
			//header("Location: home1.php");
		}
		 }
		 else {
			 echo("confirm new passward");
		 }
		 }
		 else {
		 echo("wrong pass");
		 }
	
	}
}



?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Change Password</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <style>
    body {
background-image:repeating-linear-gradient(135deg, #000000 10%, #2f00ff 100%) ;
background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;
font-family: "Open Sans", sans-serif;
color: #000000;
}
#box{
width: 50%;
padding: 20px;
background: #ffffff;
border-radius: 10px;
margin-top:50px;
}

    
</style>
</head>


<body>

<div class="container">
        <nav class="navbar">
            <ul class="navbar-list">
			<?php if($type=='DOCTOR'){?>
                <li class="navbar-item"><a href="DoctorHome.php" class="navbar-link">Home</a></li>
				<li class="navbar-item"><a href="DoctorSetting.php" class="navbar-link">Settings</a></li>
			<?php }?>
			
			<?php if($type=='PATIENT'){?>
                <li class="navbar-item"><a href="PatientHome.php" class="navbar-link">Home</a></li>
				<li class="navbar-item"><a href="PatientSetting.php" class="navbar-link">Settings</a></li>
			<?php }?>
                <li class="navbar-item"><a href="ChangePass.php" class="navbar-link">Change password</a></li>
                <li class="navbar-item"><a href="login.php" class="navbar-link">Logout</a></li>
            </ul>
        </nav>
    </div>
	
  <div class="container mt" id="box">
  <form class="box" action="ChangePass.php" method="post">
        <label for="Passward" class="form-label">Current Passward:</label>
        <div class="mb-4 input-group">
          <span class="input-group-text">
            <i class="bi bi-person-fill text-secondary"></i>
          </span>
          <input type="password" id="password" class="form-control" placeholder="write your password" required name="old_pass"/>
        </div>
        <label for="Passward" class="form-label">New Passward:</label>
        <div class="mb-4 input-group">
          <span class="input-group-text">
            <i class="bi bi-person-fill text-secondary"></i>
          </span>
          <input type="password" id="password" class="form-control" placeholder="write your password" required name="new_pass"/>
        </div>
        <label for="Passward" class="form-label">Re-type new Passward:</label>
        <div class="mb-4 input-group">
          <span class="input-group-text">
            <i class="bi bi-person-fill text-secondary"></i>
          </span>
          <input type="password" id="password" class="form-control" placeholder="write your password" required name="re_new_pass"/>
        </div>

      
        <div>
            <button type="submit" class="btn btn-primary mb-3" name="update">Update Data</button>
        </div>
    </form>
  </div>
</body>
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
			$_SESSION['success'] ="passward changed";
			
		}
		 }
		 else {
			 $_SESSION['error'] = "confirm new passward";
		 }
		 }
		 else {
		 $_SESSION['error'] = "wrong old passward";
		 }
	
	}
}



?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Change Password</title>
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <style>
    body {
 background-image: linear-gradient(90deg, #a8dad7 10%, #42b1ab 100%);
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

#nav {
 background-image: linear-gradient(90deg, #285f64 10%, #347f85 100%);
            font-family: "Open Sans", sans-serif;
            

        }
</style>
</head>


<body>

  <nav class="navbar navbar-expand-lg navbar-dark " id="nav">
        <a class="navbar-brand" href="#">
    <img src="logo1.png" width="200" height="60" class="d-inline-block align-top" alt="">
             </a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <?php if ($type=='DOCTOR'){ ?>
            <a class="nav-link"  href="DoctorHome.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="DoctorSetting.php">Settings</a>
        </li>
        <?php }?>
             <?php if ($type=='PATIENT'){ ?>
            <a class="nav-link"  href="PatientHome.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="PatientSetting.php">Settings</a>
        </li>
        <?php }?>
        <li class="nav-item">
            <a class="nav-link" href="ChangePass.php">Change password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="welcome.php">Logout</a>
        </li>
        
        
    </ul>
</div>
</div>
</nav>
	  <!-- Success Alert -->
      <?php if(isset($_SESSION['success'])) {
             $success = $_SESSION['success'];
	         unset($_SESSION['success']);
       ?>
             <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
                 <i class="bi-check-circle-fill"></i>
                 <strong class="mx-2">Success!</strong> <?php echo $success?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>
	   <?php } ?>
	 
	
 <!-- Error Alert -->
      <?php if(isset($_SESSION['error'])) {
             $error = $_SESSION['error'];
	         unset($_SESSION['error']);
       ?>
            <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
                 <i class="bi-exclamation-octagon-fill"></i>
                 <strong class="mx-2">Error!</strong><?php echo $error?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>	
      <?php } ?>
	  
	  
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
            <button type="submit" class="btn btn-outline-secondary" name="update">Update Data</button>
        </div>
    </form>
  </div>
</body>
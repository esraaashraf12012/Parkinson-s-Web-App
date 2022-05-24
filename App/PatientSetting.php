<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'project';
$conn = mysqli_connect($server,$user,$pass,$db) or die ("unable to connect");

$query1 = "SELECT name FROM user WHERE USER_TYPE='DOCTOR'";
		
$run1 = mysqli_query($conn, $query1) or die (mysqli_error($conn));

$doctorNames = mysqli_fetch_all($run1, MYSQLI_ASSOC);
session_start();

if(isset($_SESSION['EMAIL']) && isset($_SESSION['ID'])){
	$ID =$_SESSION['ID'];
	
	$query1 = "SELECT * FROM user WHERE ID='$ID'";
		
	$run1 = mysqli_query($conn, $query1) or die (mysqli_error($conn));
		
    $row = mysqli_fetch_assoc($run1);
	$type=$row['USER_TYPE'];
	if(isset($_POST['update'])){
	if (!empty($_POST['name'])){
      
		$name = $_POST['name'];
		$query = "update user
		set Name='$name'
		where ID=$ID";
		$run = mysqli_query($conn, $query) or die (mysqli_error($conn));
		if($run){
			echo("Name changed successfully");
			
		}
	}
	if (!empty($_POST['birthdate'])){
       
		$birthdate= $_POST['birthdate'];
		$age = floor((time()- strtotime($birthdate))/31556926);
		$query = "update user
		set BIRTHDAY='$birthdate',AGE='$age'
		where ID=$ID";
		$run = mysqli_query($conn, $query) or die (mysqli_error($conn));
		if($run){
			echo("Birthdate changed successfully");
			
		}
	}	
	if (!empty($_POST['doctor_name'])){
		$doctor_name= $_POST['doctor_name'];
        $query2 = "SELECT * FROM user WHERE NAME='$doctor_name' AND USER_TYPE='DOCTOR'";
		
		$run2 = mysqli_query($conn, $query2) or die (mysqli_error($conn));
		
		if(mysqli_num_rows($run2)== 1){
			$row2 = mysqli_fetch_assoc($run2);
			$doctor_id =$row2['ID'];
		}
		$query = "update user
		set DOCTOR_ID='$doctor_id'
		where ID=$ID";
		$run = mysqli_query($conn, $query) or die (mysqli_error($conn));
		if($run){
			echo("Doctor changed successfully");
			
		}
	}	
		
		if (!empty($_POST['phone'])){
      
		$phone= $_POST['phone'];
		$query = "update user
		set PHONE_NUMBER='$phone'
		where ID=$ID";
		$run = mysqli_query($conn, $query) or die (mysqli_error($conn));
		if($run){
			echo("Phone Number changed successfully");
			
		}
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
			
                <li class="navbar-item"><a href="PatientHome.php" class="navbar-link">Home</a></li>
				<li class="navbar-item"><a href="PatientSetting.php" class="navbar-link">Settings</a></li>
			
                <li class="navbar-item"><a href="ChangePass.php" class="navbar-link">Change password</a></li>
                <li class="navbar-item"><a href="login.php" class="navbar-link">Logout</a></li>
            </ul>
        </nav>
    </div>
	
  <div class="container mt" id="box">
  <form class="box" action="PatientSetting.php" method="post">
		
		
		
        <label for="name" class="form-label">Name:</label>
        <div class="mb-4 input-group">
          <span class="input-group-text">
            <i class="bi bi-person-fill text-secondary"></i>
          </span>
          <input type="text" id="name" class="form-control" placeholder="write your name"  name="name"/>
        </div>


        <label for="birthdate" class="form-label">birthdate:</label>
        <div class="mb-4 input-group">
          <span class="input-group-text">
            <i class="bi bi-person-fill text-secondary"></i>
          </span>
            <input type="date" id="birthdate" class="form-control" placeholder="write your birthdate" name="birthdate"/> 
        </div>


       
		<div class="col-md-4">
            <label for="doctor name" class="form-label">Choose your doctor name:</label>
                <select class="form-select" aria-label="Default select example" name="doctor_name">
                    <option selected disabled>Open this select menu</option>
						<?php foreach($doctorNames as $doctorName) { ?>
                        <option value="<?php echo $doctorName['name']; ?>"><?php echo $doctorName['name']; ?></option>
                         <?php } ?>
                 </select>
         </div>
		                                 


        <label for="number" class="form-label">Phone Number:</label>
        <div class="mb-4 input-group">
          <span class="input-group-text">
            <i class="bi bi-person-fill text-secondary"></i>
          </span>
          <input type="text" id="number" class="form-control" placeholder="Write your phone number"  name="phone"/>
        </div>


       

      
        <div>
            <button type="submit" class="btn btn-primary mb-3" name="update">Update Data</button>
        </div>
    </form>
  </div>
</body>
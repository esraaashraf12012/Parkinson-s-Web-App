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
		
	if(mysqli_num_rows($run1)== 1){
		$row = mysqli_fetch_assoc($run1);
		$type=$row['USER_TYPE'];
		if($type=='DOCTOR'){
			$query2 = "SELECT NAME,PHONE_NUMBER,AGE,GENDER,ID FROM user WHERE DOCTOR_ID='$ID'";
		
			$run2 = mysqli_query($conn, $query2) or die (mysqli_error($conn));
		
			$patients = mysqli_fetch_all($run2,MYSQLI_ASSOC);
		    
		}
		if($type=='PATIENT'){
			$_SESSION['patient']=$row;
			header("Location: PatientHome.php");
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Home Page</title>
  <link rel="stylesheet" href="style.css">
</head>


<body>

 <div class="container">
        <nav class="navbar">
            <ul class="navbar-list">
			
                <li class="navbar-item"><a href="DoctorHome.php" class="navbar-link">Home</a></li>
				<li class="navbar-item"><a href="DoctorSetting.php" class="navbar-link">Settings</a></li>
			
			
			
                <li class="navbar-item"><a href="ChangePass.php" class="navbar-link">Change password</a></li>
                <li class="navbar-item"><a href="login.php" class="navbar-link">Logout</a></li>
            </ul>
        </nav>
    </div>



    <div class="main-section">
        <div class="main-text">
            <h1 class="name">Hello, <?php echo htmlspecialchars($row['NAME']);?></h1>
            <p class="job">your information</p>
        </div>
    </div>
    
    <div class="cards">
        <div class="card1">
            <div class="card-content center">
            <div>
                <h4><?php echo htmlspecialchars('Name:'.$row['NAME']);?></h4>
				<h4><?php echo htmlspecialchars('Clinic Address:'.$row['CLINIC_ADDRESS'].','.$row['CITY']);?></h4>
				<h4><?php echo htmlspecialchars('Number:'.$row['PHONE_NUMBER']);?></h4>
			</div>	
            </div>
		
        </div>
    </div>



<div class="main-section">
        <div class="main-text">
            <p class="job">your patients' information</p>
        </div>
    </div>




<?php foreach($patients as $patient){ ?>
    <div class="cards">
        <div class="card1">
            <div class="card-content center">
            <div>
                <h4><?php echo htmlspecialchars('Name:'.$patient['NAME']);?></h4>
				<h4><?php echo htmlspecialchars('Gender:'.$patient['GENDER']);?></h4>
				<h4><?php echo htmlspecialchars('Age:'.$patient['AGE']);?></h4>
				<h4><?php echo htmlspecialchars('Number:'.$patient['PHONE_NUMBER']);?></h4>
				<?php $_SESSION['patient']=$patient;?>
                <a href="table.php" class="card-link">information</a>
			</div>	
            </div>
		
        </div>
    </div>
<?php }?>


    
</body>
</html>
<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'project';
$conn = mysqli_connect($server,$user,$pass,$db) or die ("unable to connect");

session_start();

if(isset($_SESSION['patient'])){
	$patient =$_SESSION['patient'];
	$ID=$patient['ID'];
	
	$query1 = "SELECT * FROM patient_reading WHERE Patient_ID='$ID'";
		
	$run1 = mysqli_query($conn, $query1) or die (mysqli_error($conn));
		
		
	$readings = mysqli_fetch_all($run1,MYSQLI_ASSOC);
			
		    
	
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Patient Information</title>
  <link rel="stylesheet" href="style.css">

  <style>
      table, th, td, tr {
          border: 3px solid black;
          font-size: 50px;
      }
  </style>
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


  
    <div class="cards">
        <div class="card1">
            <div class="card-content center">
            <div>
                <h4><?php echo htmlspecialchars('Name:'.$patient['NAME']);?></h4>
				<h4><?php echo htmlspecialchars('Gender:'.$patient['GENDER']);?></h4>
				<h4><?php echo htmlspecialchars('Age:'.$patient['AGE']);?></h4>
				<h4><?php echo htmlspecialchars('Number:'.$patient['PHONE_NUMBER']);?></h4>
			</div>	
            </div>
		
        </div>
    </div>


    
    <table style='font-family:"Courier New";text-align:center;font-size:20%'>
        <tr>
            <th>X</th>
            <th>Y</th>
            <th>Z</th>
            <th>AX</th>
            <th>AY</th>
            <th>AZ</th>
        </tr>
      <?php foreach($readings as $reading){ ?>
            <tr>
           <th><?php echo htmlspecialchars($reading['X']);?></th>
		   <th><?php echo htmlspecialchars($reading['Y']);?></th>
		   <th><?php echo htmlspecialchars($reading['Z']);?></th>
		   <th><?php echo htmlspecialchars($reading['AX']);?></th>
		   <th><?php echo htmlspecialchars($reading['AY']);?></th>
		   <th><?php echo htmlspecialchars($reading['AZ']);?></th>
            </tr>

			
<?php }?>
       
        

    </table></font>




</body>
    
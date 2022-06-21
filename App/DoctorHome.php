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
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title> home</title>
    <style>
         body {
            background-image: linear-gradient(90deg, #a8dad7 10%, #42b1ab 100%);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: "Open Sans", sans-serif;
            color: #000000;
           

        }
        #nav {
            background-image: linear-gradient(90deg, #285f64 10%, #347f85 100%);
        
            
            font-family: "Open Sans", sans-serif;
     }
     .container{
        padding-left: 10%;
        padding-top: 150px;
        color: rgb(8, 0, 255);

     }
     .card{
        width:95%;
        height: 200px; 
        transform: scale(1.2);
        border-radius: 20px;
        box-shadow: #191918;
        color: #000000;
    
        
     }
     .card-link{
    text-decoration: none;
    color:#285f64;
    display: block;
     
     }
        
    </style>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top  "  id="nav">
        <a class="navbar-brand" href="#">
    <img src="logo1.png" width="200" height="60" class="d-inline-block align-top" alt="">
             </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    
                    <a class="nav-link"  href="DoctorHome.php">Home</a>
                </li>
                <li class="nav-item">
                    
                    <a class="nav-link" href="DoctorSetting.php">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ChangePass.php">Change password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="welcome.php">Logout</a>
                </li>
            </ul>
                </nav>

<!-- Card section -->
<div  class="container" >
<?php foreach($patients as $patient ){ ?>
<div class="card"  >
    <div class="row g-0">
      <div class="col-md-4">
        <img src="icon2.png" class="img-fluid rounded-start" style="width: 80%; height: 200px;" alt="patient1">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo htmlspecialchars('Name: '.$patient['NAME']);?></h5>
          <p class="card-text"><?php echo htmlspecialchars('Gender: '.$patient['GENDER']);?> </p>
		  <p class="card-text"><?php echo htmlspecialchars('Age: '.$patient['AGE']);?> </p>
		  <p class="card-text"><?php echo htmlspecialchars('Number: '.$patient['PHONE_NUMBER']);?> </p>
		  
          <a href="patient.php?id=<?php echo $patient['ID'] ?>" class="card-link">More information</a>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>
  <?php }?>
</div>

 
 
    </body>
    
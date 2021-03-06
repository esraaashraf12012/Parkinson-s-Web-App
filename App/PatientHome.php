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
$dataPoints = array();
foreach($readings as $row ){
	$dataPoints[]=$dataPoints[]=array("y" => $row['X'], "label" => $row['Time']);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Patient home page</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


  <style>
       body {
 background-image: linear-gradient(90deg, #a8dad7 10%, #42b1ab 100%);
background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;
font-family: "Open Sans", sans-serif;
color: #000000;


}
    
        .card{
        width:95%;
        height: 200px; 
        transform: scale(1.2);
        border-radius: 20px;
        box-shadow: #191918;
        color: #000000;
		

		}
#nav {
background-image: linear-gradient(90deg, #285f64 10%, #347f85 100%);
            font-family: "Open Sans", sans-serif;
            

        }
      table, th, td, tr {
          border: 3px solid black;
          font-size: 50px;
      }
  </style>
  <script>

window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "change in x position"
	},
	axisY: {
		title: "x axis position"
		
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
 
}
</script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark " id="nav">
<a class="navbar-brand" href="#">
    <img src="logo1.png" width="200" height="60" class="d-inline-block align-top" alt="">
             </a>
        <ul class="navbar-nav">
            <li class="nav-item">

                <a class="nav-link" href="PatientHome.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="PatientSetting.php">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ChangePass.php">Change password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="welcome.php">Logout</a>
            </li>


        </ul>

    </nav>



   


  
  <br><br>
<div  class="container" >

<div class="card"  >
    <div class="row g-0">
      <div class="col-md-4">
     
        <div class="card-body">
          <h5 class="card-title"><?php echo htmlspecialchars('Name: '.$patient['NAME']);?></h5>
          <p class="card-text"><?php echo htmlspecialchars('Gender: '.$patient['GENDER']);?> </p>
		  <p class="card-text"><?php echo htmlspecialchars('Age: '.$patient['AGE']);?> </p>
		  <p class="card-text"><?php echo htmlspecialchars('Number: '.$patient['PHONE_NUMBER']);?> </p>
		  
         
        </div>
      </div>
    </div>
  </div>
  <br><br>
  
</div>


  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 <br>
    <div class="text-center">
	<a href="PatientHome.php" ><button type="button" class="btn btn-light">Refresh Data</button></a>
   </div>
	  
	  
   






</body>
    
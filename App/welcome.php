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

if(isset($_SESSION['ID'])){
$ID=$_SESSION['ID'];}

//var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Welcome Page</title>
</head>
<body>


    <section>
        <header>
            <a href=""><img src="logoo.png"  class="logo"></a>
        </header>
        <div class="content">
            <div class="text">
			   <br><br><br><br><br><br>
                <h1 style="color:white;font-size:55px;" >FollowUp</h1>
				<h4 style="color:white;">Parkinson's Diesase</h4>
				<br><br>
                <p style="color:white;" >-We aim to make your life easier- </p>
                <a href="login.php" ><button type="button" class="btn btn-outline-light">Sign in or Sign up now</button></a>
            </div>
        </div>

        <div class="frame">
            <img src="images1.jpg"  class="imgglove">
        </div>
    </section>
    
    

</body>
</html>
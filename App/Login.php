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



<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>REGISTER</title>
    
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
  
  
  background: #ffffff;
  border-radius: 10px;
 margin-top:50px;
 
 
  
  
  
}
    </style>
</head>


<body>
    <div class="container mt" id="box">
        <!-- <h3 class="mb-3">PARKINSON'S DISEASE</h3> -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#login">
                    LOGIN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#doctor">
                    Doctor registration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#patient">
                   Patient registration</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="login">
                <div class="row border g-0 rounded shadow-sm">
                    <div class="col p-4">
                        
                       <!-- login section -->
                       <form action="insert.php" method="post">
                        <!-- email -->
                        <label for="email" class="form-label">Email address:</label>
                        <div class="input-group mb-4">
                          <span class="input-group-text">
                            <i class="bi bi-envelope-fill text-secondary"></i>
                          </span>
                          <input type="email" id="email" class="form-control" placeholder="write your email" required name="email" />
                        </div>
                        <!-- Passward -->
                        <label for="Passward" class="form-label">Passward:</label>
                        <div class="mb-4 input-group">
                          <span class="input-group-text">
                            <i class="bi bi-person-fill text-secondary"></i>
                          </span>
                          <input type="password" id="password" class="form-control" placeholder="write your password" required name="passward"/>
                        </div>
                        <!-- </button> -->
						    <h4><?php if($ID=='lf'){
								echo "login failed :incorrect email or passward)";
								$ID='t';
								}
			                    ?>
							</h4>
                        <div>
                            <button type="submit" class="btn btn-primary mb-3" name="login">LOGIN</button>
                        </div>
                       
                      </form>
                    </div>
                   
                </div>
            </div>
            <!-- doctor REGISTER section  -->
            <div class="tab-pane" id="doctor">
                <div class="row border g-0 rounded shadow-sm">
                    <div class="col p-4">
                       
                        <form class="row g-3" action="insert.php" method="post">
                            <div class="col-md-6 ">
                                <!-- First  NAME -->
                                <label for="first name" class="form-label">First name:</label>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" required name="first_name">
                              </div>
                              <!-- last  NAME -->
                              <div class="col-md-6">
                                <label for="Last name" class="form-label">Last name:</label>
                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="last_name" >
                              </div>
                              <!-- Email -->
                              
                               
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email address:</label>
                                    <input type="email" id="email" class="form-control" placeholder="write your email" required name="email"/>
                                </div> 
                                <!-- phone number -->
                                <div class="col-md-6">
                                    <label for="number" class="form-label">Phone number:</label>
                                    <input type="text" id="number" class="form-control" placeholder="write your phone number" required name="phone_number"/>
                                </div> 
                                
                                <!-- password -->
                               
                                
                                    <div class="col-md-6">
                                        <label for="Password" class="form-label">Password:</label>
                                        <input type="password" id="password" class="form-control" placeholder="write strong password" required name="passward"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirm Passward" class="form-label"> Confirm Passward:</label>
                                        <input type="password" id="password" class="form-control" placeholder="confirm password " required name="confirm_passward"/>
                                    </div>
                                   
                                
                                    <!-- address -->
                                    <div class="col-md-6">
                                        
                                        <label for="Clinic Address" class="form-label">Clinic Address:</label>
                                        <input type="text" class="form-control" id="inputAddress" required name="clinic_address" />
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <label for="City" class="form-label">City:</label>
                                        <input type="text" class="form-control" id="inputAddress"required  name="city"/>
                                    </div>
                                    <!-- </button> -->
                        <div>
                            <button type="submit" class="btn btn-primary mb-3" name="d_submit">REGISTER</button>
                        </div>

                       </form>
                    </div>
                   
                </div>
            </div>
            <!-- patient REGISTER section -->
            <div class="tab-pane" id="patient">
                <div class="row border g-0 rounded shadow-sm">
                    <div class="col p-4">
                        
                        <form class="row g-3" action="insert.php" method="post">
                            <div class="col-md-6 ">
                                <!-- First  NAME -->
                                <label for="first name" class="form-label">First name:</label>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" required name="first_name"> 
                              </div>
                              <!-- last  NAME -->
                              <div class="col-md-6">
                                <label for="Last name" class="form-label">Last name:</label>
                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="last_name">
                              </div>
                              <!-- Email -->
                              
                                
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email address:</label>
                                    <input type="email" id="email" class="form-control" placeholder="write your email" required name="email" />
                                </div> 
                                <!-- phone number -->
                                <div class="col-md-6">
                                    <label for="number" class="form-label">Phone number:</label>
                                    <input type="text" id="number" class="form-control" placeholder="write your phone number" required name="phone_number"/>
                                </div> 
                                
                                <!-- password -->
                               
                                
                                    <div class="col-md-6">
                                        <label for="Password" class="form-label">Password:</label>
                                        <input type="password" id="password" class="form-control" placeholder="write strong password" required name="passward"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirm Passward" class="form-label"> Confirm Passward:</label>
                                        <input type="password" id="password" class="form-control" placeholder="confirm password " required name="confirm_passward"/>
                                    </div> 
                                    <!-- birthdate -->
                                    <div class="col-md-6">
                                        <label for="birthdate" class="form-label">birthdate:</label>
                                         <input type="date" id="birthdate" class="form-control" required name="birthdate"> 
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doctor name" class="form-label">Choose your doctor name:</label>
                                        <select class="form-select" aria-label="Default select example" name="doctor_name">
                                            <option selected disabled>Open this select menu</option>
											<?php foreach($doctorNames as $doctorName) { ?>
                                            <option value="<?php echo $doctorName['name']; ?>"><?php echo $doctorName['name']; ?></option>
                                            <?php } ?>
                                          </select>
                                    </div>

                                    <!-- gender -->
                                    <div>
                                        <label for="gender" class="form-label">gender:</label><br>
                                    <input type="radio" name="gender" value="male" name="gender"> Male<br>
                                    <input type="radio" name="gender" value="female" name="gender"> Female
                                    
                                    </div>
                                    <!-- </button> -->
                        <div>
                            <button type="submit" class="btn btn-primary mb-3" name="p_submit">REGISTER</button>
                        </div>                                                                    
                      </form>
                    </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>
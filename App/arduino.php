<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'project';

if (isset($_GET['api'])) {
    $apiToken = $_GET['api'];
    if ($apiToken == "123456") {
        $patientID = 11;
        $conn = mysqli_connect($server, $user, $pass, $db) or die ("unable to connect");
        $query = "INSERT INTO patient_reading (X, Y, Z, AX, AY, AZ, Patient_ID) VALUES " .
            "({$_GET['x']},{$_GET['y']},{$_GET['z']},{$_GET['ax']},{$_GET['ay']},{$_GET['az']}, $patientID);";
        echo $query;
        mysqli_query($conn, $query);
    }
}

?>

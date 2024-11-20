<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profile";
$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn){
  echo "Connection succesfull";
} else{
  "Not succesfull".mysqli_connect_error();
}

?>
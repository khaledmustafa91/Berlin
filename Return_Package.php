<?php
include("config/database_connection.php");
session_start();
$sql = "SELECT * from package";
  
$result = mysqli_query($conn/*database Connection*/ ,$sql /* query will ran on the data base*/); 
$Packages = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);


// user add package to his profile 
if(isset($_GET['id'])){
    if(session_status() == PHP_SESSION_ACTIVE ){
      
      $profile_id = mysqli_real_escape_string($conn,$_SESSION['id']);
      $package_id = mysqli_real_escape_string($conn,$_GET['id']);

      $sql = "INSERT INTO profile_package(profile_id,package_id) VALUES('$profile_id','$package_id')";
      if(mysqli_query($conn,$sql)){
        
      }
      else{
        echo "query error : " . mysqli_error($conn);
      }
    }else
    {
        $message ="Log in first !";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
?>

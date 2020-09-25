<?php
// Connect with database SQL 

$conn = mysqli_connect('localhost','Khaled','123','booking');

// check connection
if(!$conn){
    echo "Connection Error" . mysqli_connect_error();
}
?>
<?php

if (isset($_POST['submit'])) {

$sname = $_POST['sname'];
$gender = $_POST['gender'];
$bookingTime = $_POST['bookingTime'];
$selectdate = $_POST['selectDate'];
$instructors = $_POST['instructors'];

// connection eka hadanawa db ekata
$connection = mysqli_connect ("localhost","root","","slearn");

if($connection){
    echo " <h1> connection success </h1>";
}
else{
    die("Not success");
}



$query = "INSERT INTO schedule_booking_form (sname,gender,bookingTime,selectDate,instructors) VALUES ('$sname','$gender','$bookingTime','$selectdate','$instructors')";

$result = mysqli_query($connection, $query);

if(!$result){
    die('Query Failed' . mysqli_error($connection));
}

}




?>
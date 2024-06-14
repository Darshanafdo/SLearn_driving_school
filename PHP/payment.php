<?php

if (isset($_POST['submit'])) {

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$Address = $_POST['Address'];
$City = $_POST['City'];
$State = $_POST['State'];
$zip_code = $_POST['zip_code'];
$name_of_card = $_POST['name_of_card'];
$cread_card_number = $_POST['cread_card_number'];
$Exp_Month = $_POST['Exp_Month'];
$ExpYear = $_POST['ExpYear'];
$CVV = $_POST['CVV'];


// connection eka hadanawa db ekata
$connection = mysqli_connect ("localhost","root","","slearn");

if($connection){
    echo " <h1> connection success </h1>";
}
else{
    die("Not success");
}

$query = "INSERT INTO payment (full_name,email,Address,City,State,zip_code,name_of_card,cread_card_number,Exp_Month,ExpYear,CVV) VALUES ('$full_name','$email','$Address','$City','$State','$zip_code','$name_of_card','$cread_card_number','$Exp_Month','$ExpYear','$CVV')";

$result = mysqli_query($connection, $query);

if(!$result){
    die('Query Failed' . mysqli_error($connection));
}

}

?>
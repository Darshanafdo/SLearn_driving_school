<?php

if (isset($_POST['Register'])) {

    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    // connection eka hadanawa db ekata
    $connection = mysqli_connect("localhost", "root", "", "slearn");

    if ($connection) {
        echo " <h1> connection success </h1>";
    } else {
        die("Not success");
    }

    $query = "INSERT INTO login (User_Name,Email,Password) VALUES ('$uname','$email','$password')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }
}

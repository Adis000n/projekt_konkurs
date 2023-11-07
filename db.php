<?php
$con = mysqli_connect("46.242.239.199:3380","37911724_konkurs","kH71xFVYZ");
mysqli_select_db($con,"37911724_konkurs");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php 
session_start();
$con = mysqli_connect("localhost","root","","konkurs");


if(isset($_POST['Usun'])) 
{
    $id = $_SESSION['id'];


    $query = "DELETE FROM  user  where id='$id' ";
    $query_run = mysqli_query($con, $query);


    if($query_run){

        $_SESSION['status'] = "Usunieto twoje konto";
        header("Location:login.php");
    } else  {
        
        $_SESSION['status'] = "Blad w usuwaniu konta";
        header("Location:myaccount.php");
    }

}
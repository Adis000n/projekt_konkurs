<?php 
session_start();
$con = mysqli_connect("localhost","root","","konkurs");

if(isset($_POST['zapisz'])) {
    $id = $_SESSION['id'];
    $nazwa = $_POST['nowa_nazwa'];
    $email = $_POST['nowy_email'];

    if (!empty($nazwa) && !empty($email)) {
        $query = "UPDATE user SET username='$nazwa', email='$email' WHERE id='$id' ";
    } elseif (!empty($nazwa)) {
        $query = "UPDATE user SET username='$nazwa' WHERE id='$id' ";
    } elseif (!empty($email)) {
        $query = "UPDATE user SET email='$email' WHERE id='$id' ";
    } 

    if(isset($query) && !empty($query)) {
        $query_run = mysqli_query($con, $query);

        if($query_run) 
        {
            $_SESSION['status'] = "Pomyślnie zaaktualizowano dane! Zaraz zostaniesz wylogowany";
            header("Location:myaccount.php");
        } else 
        {
            $_SESSION['status'] = "Niepowodzenie";
            header("Location:myaccount.php");
        }
    } else {
        $_SESSION['status'] = "Nie dokonano żadnych zmian";
        header("Location:myaccount.php");
    }
}

?>


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

  
































































?>
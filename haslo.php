<?php 
session_start();
$con = mysqli_connect("localhost","root","","konkurs");
if(isset($_POST['zapisz1'])) {
    $id = $_SESSION['id'];
    $obecne_haslo = $_POST['obecne_haslo'];
    $nowe_haslo = $_POST['nowe_haslo'];
    $nowe_haslo2 = $_POST['nowe_haslo2'];
    $sql = "SELECT `password` from  user where id = '$id' ";
    $result = mysqli_query($con,$sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];
        
        if (password_verify($obecne_haslo, $stored_password)) {
            if ($nowe_haslo == $nowe_haslo2) {
                $password_hash = password_hash($nowe_haslo, PASSWORD_DEFAULT);
                $query = "UPDATE user SET password='$password_hash' WHERE id='$id' ";
            } else {
                $_SESSION['status'] = "Hasło nowe nie zgadza się";
                header("Location:myaccount.php");
                exit();
            }
        } else {
            $_SESSION['status'] = "Obecne hasło nie zgadza się";
            header("Location:myaccount.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "Niepowodzenie z niewiadomych przyczyn";
        header("Location:myaccount.php");
        exit();
    }

    if(isset($query) && !empty($query)) {
        $query_run = mysqli_query($con, $query);
        if($query_run) {
            $_SESSION['status'] = "Pomyślnie zaaktualizowano hasło!";
            header("Location:myaccount.php");
            exit();
        } else {
            $_SESSION['status'] = "Błąd podczas aktualizowania hasła: " . mysqli_error($con);
            header("Location:myaccount.php");
            exit();
        }
    }
}
?>




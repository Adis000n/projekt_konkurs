<?php 
session_start();
$con = mysqli_connect("localhost","root","","konkurs");
if(isset($_POST['zapisz1'])) {
    $id = $_SESSION['id'];
    $dobrehaslo = $_SESSION['password'];
    $obecne_haslo = $_POST['obecne_haslo'];
    $nowe_haslo = $_POST['nowe_haslo'];
    $nowe_haslo2 = $_POST['nowe_haslo2'];

    if (!empty($obecne_haslo) && !empty($nowe_haslo) && !empty($nowe_haslo2)) {
        if ($obecne_haslo == $dobrehaslo) {
            if ($nowe_haslo == $nowe_haslo2) {
                $query = "UPDATE user SET password='$nowe_haslo2' WHERE id='$id' ";
            } else {
                $_SESSION['status'] = "Hasło nowe nie zgadza się";
                header("Location:myaccount.php");
            }
        } else {
            $_SESSION['status'] = "Obecne hasło nie zgadza się";
            header("Location:myaccount.php");
        }
    } else {
        $_SESSION['status'] = "Niepowodzenie z niewiadomych przyczyn";
        header("Location:myaccount.php");
    }

    if(isset($query) && !empty($query)) {
        $query_run = mysqli_query($con, $query);
        if($query_run) {
            $_SESSION['status'] = "Pomyślnie zaaktualizowano hasło!";
            header("Location:myaccount.php");
        } 
    }
}
?>



<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Dodaj link do biblioteki SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
 </head>
 <body>
</body>
</html>
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
           ?>
            <script>
            Swal.fire({
                title:  "Pomyślnie zaaktualizowano dane i zaraz zostaniesz wylogowany",
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Rozumiem',
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire(
                    location.href = "logout.php"
                  )
                  
                }
              })
                  
                  </script>
                  <?php
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
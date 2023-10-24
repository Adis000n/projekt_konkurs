!!! potem do zrobienia - musi byc ten plik bo po zalogowaniu wlasnie do niego odsyła 
<?php 
 session_start();
 if(!isset($_SESSION['logged in']))
 {
    header('Location: login.php');
    exit();
 }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
 </head>
 <body>
    <?php 
        echo $_SESSION['user'];
    ?>
    <form>
    <?php echo '<a class="dropdowntext" href="logout.php">Logout</a>'; ?> 
    </form>
 </body>
 </html>

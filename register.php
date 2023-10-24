!!!!!!!!! formularz rejestracji - ui do wgrania
<?php
 session_start();
 if(isset($_POST['email']))
 {
  $everything_okay = true;
  $username = $_POST['username'];
  if((strlen($username)<3) || (strlen($username)>20))
  {
    $everything_okay=false;
    $_SESSION['error_username'] ="Nazwa użytkownika musi mieć od 3 do 20 znaków";
  }
  if(ctype_alnum($username)==false)
  {
    $everything_okay=false;
    $_SESSION['error_username']="Nazwa użytkownika może składać się wyłącznie z liter i cyfr!";
  }
  $email = $_POST['email'];
  $emailS = filter_var($email,FILTER_SANITIZE_EMAIL);
  if((filter_var($emailS,FILTER_VALIDATE_EMAIL)==false)||($emailS!=$email))
  {
    $everything_okay=false;
    $_SESSION['error_email']="Proszę wpisać poprawny adres e-mail!";
  }
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  if((strlen($password)<8)||(strlen($password)>20))
  {
    $everything_okay=false;
    $_SESSION['error_password']="Hasło musi mieć od 8 do 20 znaków!";
  }
  if($password!=$confirm_password)
  {
    $everything_okay=false;
    $_SESSION['error_password']="Podane hasła nie są takie same!";
  }
  $password_hash = password_hash($password,PASSWORD_DEFAULT);
  if(!isset($_POST['rules']))
  {
    $everything_okay=false;
    $_SESSION['error_rules']="Zaakceptuj regulamin!";
  }
  require_once"connect.php";
  mysqli_report(MYSQLI_REPORT_STRICT);
  try
  {
    $connect = new mysqli($host,$db_user,$db_password,$db_name);
    if($connect->connect_errno!=0)
    {
      throw new Exception(mysqli_connect_errno());
    }
    else
    {
      $result = $connect->query("SELECT id FROM user WHERE email='$email'");
      
      
      if(!$result) throw new Exception($connect->error);
      $how_many_emails = $result->num_rows;
      
      
      
      
      if($how_many_emails>0)
     
      {
        $everything_okay=false;
        $_SESSION['error_email']="Z tym adresem e-mail jest już powiązane konto!";
      }
      
      $result = $connect->query("SELECT id FROM user WHERE username='$username'");
      
      
      if(!$result) throw new Exception($connect->error);
      $how_many_usernames = $result->num_rows;
      
      
      if($how_many_usernames>0)
      
      
      {
        $everything_okay=false;
        $_SESSION['error_username']="Istnieje już użytkownik o tej nazwie!";
      }
      
      
      if($everything_okay==true) 
      
      
      {
        if($connect->query("INSERT INTO user VALUES (NULL,'$username','$password_hash','$email')"))
        {
          $_SESSION['successfull_registration']=true;
          header('Location:login.php');
        }
        else
        {
          throw new Exception($connect->error);
        }
      }
      $connect->close();
    }
  }
  catch(Exception $error)
  {
    echo '<span style="color:red;">Błąd serwera! Za niedogodności przepraszamy i prosimy o rejestrację w innym terminie.</span>';
  }
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register Site</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }
    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .container h2 {
      text-align: center;
    }
    .container label, .container input[type="text"], .container input[type="password"], .container button {
      display: block;
      width: 100%;
      margin-bottom: 10px;
    }
    .container label {
      font-weight: bold;
    }
    .container input[type="text"], .container input[type="password"] {
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }
    .container button {
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      cursor: pointer;
      font-weight: bold;
    }
    .container button:hover {
      background-color: #45a049;
    }
    .error
    {
      color: red;
      margin-top: 10px; 
      margin bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Register</h2>
    <form method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter Username">
      
      <?php
        if(isset($_SESSION['error_username']))
        {
          echo'<div class="error">'.$_SESSION['error_username'].'</div>';
          unset($_SESSION['error_username']);
        }
      ?>

      <label for="email">Email:</label>
      <input type="text" id="email" name="email" placeholder="Enter Email">
      
      <?php
        if(isset($_SESSION['error_email']))
        {
          echo'<div class="error">'.$_SESSION['error_email'].'</div>';
          unset($_SESSION['error_email']);
        }
      ?>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter Password">

      <?php
        if(isset($_SESSION['error_password']))
        {
          echo'<div class="error">'.$_SESSION['error_password'].'</div>';
          unset($_SESSION['error_password']);
        }
      ?>

      <label for="confirm password">Confirm Password</label>
      <input type="password" id="confirm password" name="confirm password" placeholder="Confirm Password">

      <label>
        <input type="checkbox" name="rules"/> Akceptuję zasady i warunki
      </label>
      
      <?php
        if(isset($_SESSION['error_rules']))
        {
          echo'<div class="error">'.$_SESSION['error_rules'].'</div>';
          unset($_SESSION['error_rules']);
        }
      ?>
      
      <button type="submit">Zarejestruj się teraz</button>
    </form>
  </div>
</body>
</html>

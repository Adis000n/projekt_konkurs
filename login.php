!!!!!!! login z naszej poprzedniej strony - ui do wgrania 
<?php
 session_start();
 if((isset($_SESSION['logged in'])) && ($_SESSION['logged in']==true))
 {
  header('Location: myaccount.php');
  exit();
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Site</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 4px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    .form-group button {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 4px;
      border: none;
      background-color: #4caf50;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form action="loginonsite.php" method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter Username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Log in"/>
      </div>
      <div class="form-group">
        <a href="register.php">Register</a>
      </div>
    </form>
    <?php
     if(isset($_SESSION['error']))
     echo $_SESSION['error'];
    ?>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona głowna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Kalam&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
    <p1 id="tekst">DO</p1>
    <p1 id="tekst">IT</p1>
    <p1 id="tekst2">NOW!</p1>
    <hr class="new5">
    <h1>O nas:</h1>
    <h2>(cos tu trzebo napisać ale nie mam pomysłu )</h2>
    <hr class="new5">
    <form action="login.php">  
    <button  type="submit" method="post">Zaloguj się</button>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap');

    hr.new5 {
  border: 7px solid #ffffff;
  border-radius: 5px;
  width:80%;
  opacity: 0.8;
}
h1{
    font-family: 'Pacifico', cursive;
    font-size: 4rem;
}
h2{
    font-family: 'Kalam', cursive;
    font-size: 3rem;
    width: 80%;
    text-align: center;
}

    #tekst{
        transition: 0.3s;
    color: white;
    text-shadow: 1px 1px 0 #b9bcbd, 1px 2px 0 #b9bcbd, 1px 3px 0 #b9bcbd, 1px 4px 0 #b9bcbd,
    1px 5px 0 #b9bcbd, 1px 6px 0 #b9bcbd, 1px 7px 0 #b9bcbd, 1px 8px 0 #b9bcbd,
    5px 13px 15px black;
    }
    #tekst:hover{
        text-shadow: 1px -1px 0 #b9bcbd, 1px -2px 0 #b9bcbd, 1px -3px 0 #b9bcbd,
    1px -4px 0 #b9bcbd, 1px -5px 0 #b9bcbd, 1px -6px 0 #b9bcbd, 1px -7px 0 #b9bcbd,
    1px -8px 0 #b9bcbd, 5px -13px 15px black, 5px -13px 25px #808080;
    }
    #tekst2{
        transition: 0.3s;
    color: #0091f2;
    text-shadow: 1px 1px 0 #0070ba, 1px 2px 0 #0070ba, 1px 3px 0 #0070ba, 1px 4px 0 #0070ba,
    1px 5px 0 #0070ba, 1px 6px 0 #0070ba, 1px 7px 0 #0070ba, 1px 8px 0 #0070ba,
    5px 13px 15px black;
    }
    #tekst2:hover{
        text-shadow: 1px -1px 0 #0070ba, 1px -2px 0 #0070ba, 1px -3px 0 #0070ba,
    1px -4px 0 #0070ba, 1px -5px 0 #0070ba, 1px -6px 0 #0070ba, 1px -7px 0 #0070ba,
    1px -8px 0 #0070ba, 5px -13px 15px black, 5px -13px 25px #808080;
    }
    
    /* Presentational styles */
    body {
    display: flex;
    color: white;
    flex-direction: column;
    font-family: 'Raleway', sans-serif;
    font-size: 10rem;
    font-weight: 800;
    min-height: 100vh;
    place-items: center;
    background: linear-gradient(120deg, rgba(0, 185, 255, 1) 0%, rgba(44, 232, 255, 1) 48%, rgba(130, 251, 255, 1) 100%);
    background-size: cover;
    background-attachment: fixed;
}


button{
  padding: 25px 30px;
  background-color: #b8f8ff;
  color: #0091f2;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  letter-spacing: 4px;
  overflow: hidden;
  transition: 0.8s;
  cursor: pointer;
  font-size: 3rem;
  margin-bottom: 40%;
}

button:hover{
    background: #0091f2;
    color: #b8f8ff;
    box-shadow: 0 0 5px #0091f2,
                0 0 25px #0091f2,
                0 0 50px #0091f2,
                0 0 200px #0091f2;
     -webkit-box-reflect:below 1px linear-gradient(transparent, #0009);
}
</style>
</html>


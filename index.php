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
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
</head>
<body>
    <p1 id="tekst">DO</p1>
    <p1 id="tekst">IT</p1>
    <p>NOW!</p>
    <form action="login.php">  
    <button  type="submit" method="post">Zaloguj się</button>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap');

    #tekst{
    color: white;
    text-shadow: 8px 2px 10px rgba(0, 212, 255, 1);
    }
    p {
    color: #63e5ff;
    position: relative;
    text-decoration: none;
    text-shadow: 8px 2px 8px rgba(0, 174, 255, 1);
    }

    p::before {
    background: #00c9f2;
    content: "";
    inset: 0;
    position: absolute;
    transform: scaleX(0);
    transform-origin: right;
    transition: transform 0.8s ease-in-out;
    z-index: -1;
    color:#adf7ff;
    }

    p:hover::before {
    transform: scaleX(1);
    transform-origin: left;
    }

    /* Presentational styles */
    body {
    display: flex;
    flex-direction: column;
    font-family: system-ui, sans;
    font-size: 8rem;
    font-weight: 800;
    height: 100vh;
    place-items: center;
    background: #adf7ff;
    }

button{
  padding: 25px 30px;
  background-color: #adf7ff;
  color: #00c9f2;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  letter-spacing: 4px;
  overflow: hidden;
  transition: 0.8s;
  cursor: pointer;
  font-size: 3rem;
}

button:hover{
    background: #00c9f2;
    color: #adf7ff;
    box-shadow: 0 0 5px #00c9f2,
                0 0 25px #00c9f2,
                0 0 50px #00c9f2,
                0 0 200px #00c9f2;
     -webkit-box-reflect:below 1px linear-gradient(transparent, #0006);
}
</style>
</html>


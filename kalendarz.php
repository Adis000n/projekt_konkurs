<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link type="text/css" rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Kalendarz</title>
</head>
<body>
    <div class="menu">
        <button class="menu_btn" onclick="goToDodawanie()"></button>
        <button class="newViewBtn">widok1</button>
        <button class="newViewBtn">widok2</button>
        <button class="newViewBtn">widok3</button>
        <button class="menu_btn"></button>
        

    </div>
    
</body>
<script>
        function goToDodawanie(){
        location.href = "dodawanie.php";
    }
</script>
</html>
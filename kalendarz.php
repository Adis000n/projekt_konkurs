<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">       
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Kalendarz</title>
</head>
<body>
   <div class="web"> 
   <button onclick="topFunction()" id="goUpBtn" title="Go to top">Do Góry!</button>
    <div class="menu">
        <button class="menu_btn" onclick="goToDodawanie()"></button>
        <button class="newViewBtn">widok1</button>
        <button class="newViewBtn">widok2</button>
        <button class="newViewBtn">widok3</button>
        <button class="menu_btn"></button>       

    </div>
    <div class="calendar">
        <!-- first element-->
        <div class="container">
            <div class="informations"> test 123</div>
            <div class="informations"> test 123</div>
            <div class="informations"> test 123</div>
            <div class="informations"> test 123</div>
            <div class="informations"> test 123</div>
            <div class="informations"> test 123</div>
            <div class="informations"> test 123</div>
            <div class="informations"> test 123</div>
            <!-- Maksymalna ilość zadań możliwych do zapisania 8! -->
        </div>
        <!-- next element 2-->
        <div class="container">


        </div>
        <!-- next element 3-->
        <div class="container">


        </div>
        <!-- next element 4-->
        <div class="container">


        </div>
        <!-- next element 5-->
        <div class="container">


        </div>
        <!-- next element 6-->
        <div class="container">


        </div>
        <!-- next element 7-->
        <div class="container">


        </div>
    </div>  
    
</body>
<script>
        function goToDodawanie(){
        location.href = "dodawanie.php";
    }
    
    // przycisk do góry!
 let timer;
let mybutton = document.getElementById("goUpBtn");
document.onmousemove = function() {
// document.getElementById('myBtn').style.display = "block";

if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
     mybutton.style.visibility = "visible";
     mybutton.style.opacity = "1";
     // console.log(timer);
     clearTimeout(timer);
     
   } 
   else {
     mybutton.style.visibility = "hidden";   
     mybutton.style.opacity = "0";           
   }

timer = setTimeout(function() {
 console.log("timer")
 mybutton.style.visibility = "hidden";   
 mybutton.style.opacity = "0"; 
}, 2600);
};

 
//  window.onscroll = function() {scrollFunction()};


 function topFunction() {
   document.body.scrollTop = 0;
   document.documentElement.scrollTop = 0;
 }
  </script>

</html>









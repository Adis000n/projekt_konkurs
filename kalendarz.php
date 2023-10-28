<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">       
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Kalendarz</title>
</head>
<?php 
 session_start();
 if(!isset($_SESSION['logged in']))
 {
    header('Location: login.php');
    exit();
 }
 ?>
<body>
   <div class="web"> 
   <button onclick="topFunction()" id="goUpBtn" title="Go to top">Do Góry!</button>
    <div class="menu">
        <button class="menu_btn" onclick="goToDodawanie()">➕ Dodaj&nbsp;</button>
        <button  class="menu_btn">widok1</button>
        <button  class="menu_btn">widok2</button>
        <button  class="menu_btn">widok3</button>       
       
        <button class="menu_btn" type="button">
          <img src="img/awatar.png" width="10% "  height="45%"> 
    <?php 
        echo $_SESSION['user'];
    ?>
        </button>        
                       
        <div class="list_Menu">
          <button class="l_Btn" onclick="document.location='myaccount.php'">⚙️ Ustawienia profilu&nbsp;</button>
          <button class="l_Btn" onclick="alert()">⚠️ Wyloguj się&nbsp;</button>
        </div>
 
    </div>

    </div>
    <div class="calendar">
        
        <div class="container">
              <div class="nameDay">Dzisiaj</div>
              <div class="toDo">
                <div class="toDoW">Do zrobienia</div>             
                <div class="information">Zadanie</div>
                <div class="information">Zad</div>
                <div class="information">kartkowka</div>              
                <div class="information">Nauczyć sie na spr.</div>            
                <div class="information">Nauczyć sie na spr.</div>
              
              </div>  
              <div class="events">
                <div class="eventsW">Wydarzenia</div>             
                <div class="information">Zadanie</div>
                <div class="information">Zadanie</div>
                <div class="information">Zadanie</div>              
                <div class="information">Zadanie</div>            

              
                
              
              </div>
                 
        </div>
        <div class="container">
              <div class="nameDay">Dzisiaj</div>
              <div class="toDo">
                <div class="toDoW">Do zrobienia</div>             
                <div class="information">Zadanie</div>
                <div class="information">Zad</div>
                <div class="information">kartkowka</div>              
                <div class="information">Nauczyć sie na spr.</div>            
                <div class="information">Nauczyć sie na spr.</div>              
              </div>  

              <div class="events">
                <div class="eventsW">Wydarzenia</div>             
                <div class="information">Zadanie</div>
                <div class="information">Zadanie</div>
                <div class="information">Zadanie</div>            
                <div class="information">Zadanie</div> 
              </div>
                 
        </div>
        <?php
 
          // $nameDays = array(" ","Poniedziałek","Wtorek","Środa","Czwartek","Piątek","Sobota","Niedziela"); // od 0 zaczyna sie array!
          // $rawDate = date("Y-m-d H:i:s");
          // $today = date('N', strtotime($rawDate)); 
          // $i = 1;
          
          //   while($i <= 8){
          //     if($i==1){
          //       echo '<div class="container"><div class="nameDay">'."Dzisiaj".'</div></div>';
          //       $i++;
        
          //     }else{
          //        echo '<div class="container"><div class="nameDay">'.$nameDays[$today].'</div></div>';
          //     } 

          //   $today++;
   
          //   if($today >= 8){
          //    $today = 1;
          //   }
    
          //   $i++;
          //   }
 
        ?>
       
        </div>          
    
      </div>  
      <footer>© by Nazwiska</footer>
    
</body>
<script>
    // przycisk do góry! UWAGA ZAWSZE TEN SKRYPT MA BYĆ PIERWSZY INACZEJ NIE DZIAŁA niewiadomo czemu.
    
 let timer;
let mybutton = document.getElementById("goUpBtn");
document.onmousemove = function() {
// document.getElementById('myBtn').style.display = "block";

if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
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


 function topFunction() {
   document.body.scrollTop = 0;
   document.documentElement.scrollTop = 0;
 }
 //funkcja ustawiająca kafelki (na razie nazywajaca jeden pierwszy kafelek)

 function getDayName(date = new Date(), locale = 'en-US') {
  return date.toLocaleDateString(locale, {weekday: 'long'});
  
}
console.log(getDayName()); //wywala nazwe dnia console log
document.getElementById("Today").innerHTML = getDayName();
 

 
 //funkcja od wylogowywania sie

function alert(){
    Swal.fire({
  title: 'Jestes pewien?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Tak',
  cancelButtonText: 'Nie'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      location.href = "logout.php"
    )
    
  }
})
    }
document.getElementById('normalny').addEventListener('click',function(){
    alert('Alert zwykly')
})




        function goToDodawanie(){
        location.href = "dodawanie.php";
    }
   
  
  </script>

</html>









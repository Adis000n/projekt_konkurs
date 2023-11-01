<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">       
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Kalendarz</title>
</head>
<?php 
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"konkurs");
session_start();
if(!isset($_SESSION['logged in']))
{
    header('Location: login.php');
    exit();
}
$id = $_SESSION["id"];
$q_sprawdzian = "SELECT * FROM wydarzenia WHERE user_id = $id AND typ = 'sprawdzian'";
$result_sprawdzian = mysqli_query($con, $q_sprawdzian);
$q_kartkowka = "SELECT * FROM wydarzenia WHERE user_id = $id AND typ = 'kartkowka'";
$result_kartkowka = mysqli_query($con, $q_kartkowka);
$q_zadanie = "SELECT * FROM wydarzenia WHERE user_id = $id AND typ = 'zadanie'";
$result_zadanie = mysqli_query($con, $q_zadanie);
$q_obowiazek = "SELECT * FROM wydarzenia WHERE user_id = $id AND typ = 'obowiazek'";
$result_obowiazek = mysqli_query($con, $q_obowiazek);
?>
<body>
<div class="web"> 
<button onclick="topFunction()" id="goUpBtn" title="Go to top">Do Góry!</button>
    <div class="menu">
        <button class="menu_btn" onclick="goToDodawanie()">➕ Dodaj&nbsp;</button>
        <button  class="menu_btn">widok1</button>
        <button  class="menu_btn" onclick="goto2()">widok2</button>
        <button  class="menu_btn">widok3</button>       
    
        <button class="menu_btn" type="button">
        <img src="img/awatar.png" width="20%" height="auto"> 
    <?php 
        echo $_SESSION['user'];
    ?>
        </button>        
                    
        <div class="list_Menu">
        <button class="l_Btn" onclick="document.location='myaccount.php'">⚙️ Ustawienia profilu&nbsp;</button>
        <button class="l_Btn" onclick="alert()">⚠️ Wyloguj się&nbsp;</button>
        </div>
    </div>
    <div class="calendar">
        <div id="sprawdzian">
        <h1>Sprawdziany:</h1>
        <hr>
        <div id="elementy-sprawdzian">
        <?php
        if ($result_sprawdzian) {
            while ($row = mysqli_fetch_assoc($result_sprawdzian)) {
                echo '<div class="event-box">'; // Create a container for the event
                echo '<h5>Nazwa: ' . $row['nazwa'] . '</h5>';
                echo '<p>Ważność: ' . $row['waznosc'] . '</p>';
                echo '</div>'; // Close the container for the event
            }
        } else {
            // Handle the case when the query fails
            echo "Error: " . mysqli_error($con);
        }
        ?>
        </div>
        </div>
        <div id="kartkowka">
            <h1>Kartkówki:</h1>
            <hr>
            <div id="elementy-kartkowka">
                <?php
                if ($result_kartkowka) {
                    while ($row = mysqli_fetch_assoc($result_kartkowka)) {
                        echo '<div class="event-box">'; // Create a container for the event
                        echo '<h5>Nazwa: ' . $row['nazwa'] . '</h5>';
                        echo '<p>Ważność: ' . $row['waznosc'] . '</p>';
                        echo '</div>'; // Close the container for the event
                    }
                } else {
                    // Handle the case when the query fails
                    echo "Error: " . mysqli_error($con);
                }
                ?>
            </div>
        </div>
        <div id="zadanie">
            <h1>Zadania:</h1>
            <hr>
            <div id="elementy-zadanie">
                <?php
                if ($result_zadanie) {
                    while ($row = mysqli_fetch_assoc($result_zadanie)) {
                        echo '<div class="event-box">'; // Create a container for the event
                        echo '<h5>Nazwa: ' . $row['nazwa'] . '</h5>';
                        echo '<p>Ważność: ' . $row['waznosc'] . '</p>';
                        echo '</div>'; // Close the container for the event
                    }
                } else {
                    // Handle the case when the query fails
                    echo "Error: " . mysqli_error($con);
                }
                ?>
            </div>
        </div>
        <div id="obowiazek">
            <h1>Obowiązki:</h1>
            <hr>
            <div id="elementy-obowiazek">
                <?php
                if ($result_obowiazek) {
                    while ($row = mysqli_fetch_assoc($result_obowiazek)) {
                        echo '<div class="event-box">'; // Create a container for the event
                        echo '<h5>Nazwa: ' . $row['nazwa'] . '</h5>';
                        echo '<p>Ważność: ' . $row['waznosc'] . '</p>';
                        echo '</div>'; // Close the container for the event
                    }
                } else {
                    // Handle the case when the query fails
                    echo "Error: " . mysqli_error($con);
                }
                ?>
            </div>
        </div>
    </div>          
    </div>  
    <footer>© by Nazwiska</footer>
    
</body>
<style>
.event-box{
    background-color: rgba(0, 0, 0, 0.3);
    padding: 0.5%;
    width:100%;
    margin-bottom: 1%;
    border-radius:15px;
}

hr{
    border: 2px solid black;
    border-radius: 10px;
}

#sprawdzian,#kartkowka,#zadanie,#obowiazek{
    padding: 0.5%;
    background-color: rgba(255, 255, 255, 0.6);
    width:90%;
    margin: 1%;
    border-radius:15px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
*{
    margin:0;
    padding:0; 
   
}
body{
    background-image: url(img/cool-background.png);
    background-size: cover;    
    background-position: center;
    background-attachment: fixed;
}
/* -- Górne menu */
.web{
    height: auto;
    width: 100%;
}
.menu{
   
    height: 15vh;
    width: 100%;
    display: flex;
    position: relative;
    flex-direction: row;
    align-items: center;
    justify-content:space-around;    
    background-color: transparent    ; 
}
.menu::before{    /* linia pod elementem*/
    width: 100%;    
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 1px;
    width: 90%;  
    border-bottom: 3px solid black; 
    left: 5%;
    text-align: center;
    
}

.menu_btn{       
    width: 30vh;
    height: 7vh;
    border-radius: 5px;
    border: none;
    transition: .3s;  
    color: black;
    font-size: 2.7vh; 
    background-color: rgba(255, 255, 255, 1);
    box-shadow: 1.2px 4px 3px 0px;  
}
.menu_btn:focus{
    background-color: rgba(211, 211, 211, 0.9);  
    transform: scale(1.2);    
    transition: .3s;    
}


.menu_btn:hover{
    transform: scale(1.2);    
    transition: .3s;   
}
.list_Menu{
    visibility: hidden;    
    display: flex;  

    transform: scale(1.2);
    width: 30vh;
    height: 12vh;
    position: fixed;
    background-color: rgba(211, 211, 211, 0.75);    
    transition: 0.1s;  
    align-items: center;
    justify-content: space-evenly;
    flex-direction: column;
    right: 39.5px;
    top: 13.2vh;
    /* border-radius: 5px; */
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
    border: none;
    z-index: 99;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.5);
   
    
    
    
}

.l_Btn{
    
    display: block;
    height: 4vh;
    width: 25vh;
    border-radius: 5px;
    border: none;
    transition: 0.1s;  
    color: black;
    font-size: 2vh; 
    background-color: rgba(116, 116, 116, 0.3);
    box-shadow: 1.2px 4px 3px 0px;
    
}
.l_Btn:hover{
    background-color: rgba(116, 116, 116, 0.75)
}

 .menu_btn:focus:nth-child(5)+.list_Menu {
    visibility: visible;    
    transition: 0.1s;
}




#goUpBtn{
     
  opacity: 0;
  visibility: hidden;
  position: fixed; 
  bottom: 20px; 
  right: 30px; 
  z-index: 99; 
  border: none; 
  outline: none; 
  background-color: rgb(185, 185, 185);
  color: rgba(255, 255, 255); 
  cursor: pointer; 
  padding: 15px; 
  border-radius: 10px; 
  font-size: 18px;
  transform: scale(1); 
  transition: opacity 1000ms, visibility 1000ms;
 
}
#goUpBtn:hover {
    background-color: grey; 
    color: white;
    transform: scale(1.2);
    transition: 0.3s;
    
  }
  #goUpBtn:focus {
    right: 2px;   
    
  }

/* Kalendarz, kafelki */
.calendar{
    margin-top: 10px;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    margin-left: 10%;
    margin-right: 10%;
    height: auto;
    transition: all ease-in;
    backdrop-filter: blur(1.5px);
    
    width:80%;
    background: rgba(200, 200, 200, 0.6);
    box-sizing: border-box;
    border-radius: 25px;
    padding-bottom: 30px;
    /* padding-bottom: 1vh; */
    }
    /* odwołanie się do rodzica */
    /* .calendar:has(> .container:hover){ 
        
        transition: all 0.4s;
       
    } */
footer{
    text-align: center;    
    position: relative;
    /* margin-top: 30px; */
    height: 3vh;
    width: 100%; 
    margin-top: 10px ; 
    font-size: 14px;
    width: auto;     
    color: black;
    background-color: rgba(255, 255, 255, 0.9);
    background: linear-gradient(to right, transparent, transparent 20%,rgba(255, 255, 255,0.75) 50%, transparent 80%);

    box-sizing: border-box;
}
footer::before{ /* linia pod elementem*/
    /* margin-top: 10px; */
    box-sizing: border-box;
    width: 100%;    
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    height: 1px;
    width: 90%;  
    border-top: 3px solid black; 
    left: 5%;
    text-align: center;    
}

</style>
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

function goto2(){
    location.href = "kalendarz2.php";
}
</script>

</html>

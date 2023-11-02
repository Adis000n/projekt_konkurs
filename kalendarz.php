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
<body onClick="collapseAll()">
   <div class="web"> 
   <button onclick="topFunction()" id="goUpBtn" title="Go to top">Do Góry!</button>
    <div class="menu">
        <button class="menu_btn" onclick="goToDodawanie()">➕ Dodaj&nbsp;</button>
        <button  class="menu_btn">widok1</button>
        <button  class="menu_btn" onclick="goto2()">widok2</button>
        <button  class="menu_btn">widok3</button>       
       
        <button class="menu_btn" type="button">
          <img src="img/awatar.png" width="20% "  height="auto"> 
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
        
    
        
        
        <!-- drugi -->
        <div class="container">
              <div class="nameDay">Dzisiaj</div>
              <div class="toDo">
                <div class="toDoW">Do zrobienia</div >

                <div class="information" id='Info1' onclick=" infomation('Info1'); comment('1')" >Zadanie
                  <div class="comment" id='1'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam maximus quam nec posuere dapibus. Vestibulum id nibh at felis mollis interdum. Morbi ac euismod mi. In eget purus semper, placerat orci sed, consectetur ligula. Phasellus eu leo suscipit, mollis odio efficitur, egestas sapien. Suspendisse lacus nisl, viverra et lacinia nec, interdum eget nunc. Nunc molestie magna libero. Praesent venenatis tortor neque, id egestas ex tincidunt ac. Vivamus eget elit arcu.
                  In ac eros vel ante lacinia sagittis. In sagittis faucibus convallis. Sed nec suscipit velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec feugiat magna lorem, eget ullamcorper enim euismod volutpat. Duis tincidunt sit amet felis sed ullamcorper. Phasellus nec ullamcorper dolor, a laoreet diam. Quisque maximus volutpat turpis, id blandit tellus commodo sit amet. Nulla gravida leo sit amet semper lacinia. Vestibulum rutrum in ante accumsan volutpat. Morbi magna tellus, elementum in elementum non, tincidunt eu elit. Nunc nunc magna, eleifend nec aliquet lobortis, tempus ut lectus. Sed feugiat laoreet imperdiet. Ut tempus sapien sit amet purus maximus, sit amet ultricies libero fermentum. Duis tincidunt in est ac lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras.
                  </div>
               
                </div>

                <div class="information" id=Info2 onclick=" infomation('Info2'); comment('2')">Zadanie2
                  <div class="comment" id='2'>TEST</div>
                </div>   
              
                <div class="information" id=Info3 onclick=" infomation('Info3'); comment('3')">Zadanie3
                  <div class="comment" id='3'>TEST</div>
                </div>
                         
              </div>  

              <div class="events">
                <div class="eventsW">Wydarzenia</div>             
               
              </div>
              
                 
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
 let active =0;
 
 
 let dd; // zmienna przechowywująca danego kafelka;
 let oDd;
 
    // let id = 0;
    
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
//  console.log("timer")
 mybutton.style.visibility = "hidden";   
 mybutton.style.opacity = "0"; 
}, 2600);
};


 function topFunction() {
   document.body.scrollTop = 0;
   document.documentElement.scrollTop = 0;
 }
 
 
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



  function comment(i){
      console.log(i);
      
     if (active==0)
     {
      document.getElementById(i).style.visibility='visible';
      document.getElementById(i).style.opacity='1';
      
     
      // console.log(`info${i}`);
      // console.log('ACITIVE:'); 
      // console.log(active);
      
      
       
       window.event.stopPropagation();
       dd = i;
       active = 1;
    }
    else{
      
      // collapseAll();
             
      // document.getElementById(dd).style.visibility='hidden';
      // document.getElementById(dd).style.opacity='0';  
       
      // active = 0;
      document.getElementById(dd).style.visibility='hidden';
      document.getElementById(dd).style.opacity='0'; 
      document.getElementById(`Info${dd}`).style.maxHeight="3vh";
      
      if(dd != i){
        dd = i;
      }else{
        dd = null;
      }
      
      active = 0;
      // console.log('ELSE');
      // console.log(i);     
      
      commentAfter();
      
      
      
      
      
      
    }
    
     }

     function commentAfter(){
      
      
     if (active==0)
     {
      
      window.event.stopPropagation();
      document.getElementById(dd).style.visibility='visible';
      document.getElementById(dd).style.opacity='1';
   
       active = 1;
    }
    else{
     
      document.getElementById(dd).style.visibility='hidden';
      document.getElementById(dd).style.opacity='0'; 
      document.getElementById(`Info${dd}`).style.maxHeight="3vh";
      
      if(dd != i){
        dd = i;
      }else{
        dd = null;
      }

      active = 0;

      console.log('ELSE2');
      console.log(i);
      
     
        commentAfter();
      
      
      
    }
    
  }
 
    
     function infomation(i){
      document.getElementById(i).style.maxHeight="100vh";
    }
   
   

    function collapseAll(){
      
      if (active == 1){
        
        console.log('Collapse ->')
        console.log(dd)
        document.getElementById(dd).style.visibility='hidden';
      document.getElementById(dd).style.opacity='0';      
      document.getElementById(`Info${dd}`).style.maxHeight="3vh";
      // dd = null;
      active= 0;
    
      
      }
       
    
   }
   
  </script>

</html>









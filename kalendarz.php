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
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"konkurs");
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
        <button  class="menu_btn" onclick="goto1()" style="background-color:rgba(47, 204, 255, 1)">widok1</button>
        <button  class="menu_btn" onclick="goto2()">widok2</button>
        <button  class="menu_btn" onclick="goto3()">widok3</button>       
        
        <button class="menu_btn" type="button">
          <img src="img/awatar.png" width="20% "  height="auto"> 
    <?php 
       $id = $_SESSION['id'];
       $numOfChars = mysqli_query($con,"SELECT LENGTH(`username`) FROM `user` where id = $id;");
       $nameQ = mysqli_query($con,"SELECT `username` FROM `user` WHERE id =$id;");
       while ($row = $numOfChars->fetch_assoc()) {
         $numChars = implode($row);         
       }
       while ($row = $nameQ->fetch_assoc()) {
        $name = implode($row);         
      }

      // do skończenia ilość liter...



        echo $name;
    ?>
        </button>        
                       
        <div class="list_Menu">
          <button class="l_Btn" onclick="document.location='myaccount.php'">⚙️ Ustawienia profilu&nbsp;</button>
          <button class="l_Btn" onclick="alert()">⚠️ Wyloguj się&nbsp;</button>
        </div>
      <?php
       
      ?>
    </div>

    </div>
    <div class="calendar">
        
    
        <?php
          $id = $_SESSION['id'];
          $nameDays = array(" ","Poniedziałek","Wtorek","Środa","Czwartek","Piątek","Sobota","Niedziela"); // od 0 zaczyna sie array!
          $rawDate = date("Y-m-d H:i:s");
          $today = date('N', strtotime($rawDate)); 
          $i = 1;
          $k =1; // przypisuje id 
          $dayToAdd = 0;
          $empty = 0; // 1 coś jest 0 pusto

          
            while($i <= 7){
              if($i==1){  // TU JEST IF ----------------------------------------------------------------------------------------------------------------

                      echo "<div class='container'><div class='nameDay'>Dzisiaj</div>
                                <div class='toDo'>
                                  <div class='toDoW'>Do zrobienia</div>         
                                </div>
                            
                              
                              
                              <div class='events'>
                                <div class='eventsW'>Wydarzenia</div>";
                    
                    $j = 0; // liczni wykonanych informacji/komentarzy (licznik do while)
                    $addDay = 0;
                    $info = mysqli_query($con,"SELECT nazwa from wydarzenia WHERE user_id = $id AND `data` = CURDATE()+$addDay;");                    
                    $comment = mysqli_query($con,"SELECT `komentarz` FROM `wydarzenia` WHERE `user_id` = $id AND `data` = CURDATE()+$addDay;");
                                                            
                    // $counter=mysql_fetch_assoc($infoCounter);                                 
                   
                    while($result = mysqli_fetch_row($info)){ 
                      
                      if(is_null($result)){
                        $infoT[] = 'test';
                        $empty = 0;

                      }else{
                      $infoT[] = implode($result);
                      $empty = 1;

                      }             
                                     
                                        
                    }
                    while($result = mysqli_fetch_row($comment)){ 
                      
                      if(is_null($result)){
                         $commentT[] = 'test';
                         $empty = 0; 
                      }else{
                      $commentT[] = implode($result);
                      $empty = 1;
                      }      
                                        
                    }
                 
                    if($empty == 1){
                      $counter = count($infoT);
                    }else{
                      $counter = 0;
                    }
                     

                    while($counter > $j){
                      
                      echo "<div class='information' id='Info".$k."' onclick=\" infomation('Info".$k."'); comment('".$k."')\">".$infoT[$j]."
                        <div class='comment' id='".$k."'>".$commentT[$j]."</div>
                      </div>";
                      
                      
                      $k++;
                      $j++;
                      
                     }
                
              echo  "</div>
                </div>";

                $i++;
                $addDay = 1;
              
                
        
              }         // w else reszta ------------------------------------------------------------------------------------------------
              else{
                $j = 0;
                $empty =0;
                $infoT = null;
                $commentT =null;
                $counter = null;
                echo "<div class='container'><div class='nameDay'>".$nameDays[$today]."</div>
                    <div class='toDo'>
                      <div class='toDoW'>Do zrobienia</div>         
                    </div>
                
                  
                  
                    <div class='events'>
                      <div class='eventsW'>Wydarzenia</div>";
    
                          
                          $info = mysqli_query($con,"SELECT nazwa from wydarzenia WHERE user_id = $id AND `data` = CURDATE()+$addDay;");                    
                          $comment = mysqli_query($con,"SELECT `komentarz` FROM `wydarzenia` WHERE `user_id` = $id AND `data` = CURDATE()+$addDay;");
                                                                  
                          // $counter=mysql_fetch_assoc($infoCounter);                                 
                        
                          
                          while($result = mysqli_fetch_row($info)){ 
                      
                            if(is_null($result)){
                              $infoT[] = 'test';
                              $empty = 0;
      
                            }else{
                            $infoT[] = implode($result);
                            $empty = 1;
      
                            }             
                                           
                                              
                          }
                          while($result = mysqli_fetch_row($comment)){ 
                            
                            if(is_null($result)){
                               $commentT[] = 'test';
                               $empty = 0; 
                            }else{
                            $commentT[] = implode($result);
                            $empty = 1;
                            }      
                                              
                          }
                       
                          if($empty == 1){
                            $counter = count($infoT);
                          }else{
                            $counter = null;
                          }
                          
                          while($counter > $j){
                            echo "<div class='information' id='Info".$k."' onclick=\" infomation('Info".$k."'); comment('".$k."')\">".$infoT[$j]."
                              <div class='comment' id='".$k."'>".$commentT[$j]."</div>
                            </div>";
                            
                            
                            $k++;
                            $j++;
                           
                           }
                        echo  "</div>
                          </div>";
           
                        $i++;
                        $j = 0;
                        $addDay++;
                
              } 

            $today++;
   
            if($today >= 8){
             $today = 1;
            }
    
            // $i++;
            }
 
        ?>
       
        </div>          
    
      </div>  
      <footer>© by Nazwiska</footer>
      
</body>
<script>
    
    
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
  title: 'Jesteś pewien?',
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
  function goto1(){
    location.href = "kalendarz.php";
  }
  function goto3(){
    location.href = "kalendarz3.php";
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









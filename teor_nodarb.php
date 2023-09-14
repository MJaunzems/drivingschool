<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="logo_1_small.png">
<link rel="stylesheet" href="test_styles.css">
  <title>Teorētiskās nodarbības</title>
</head>
<body>
<?php
  //Errors disabled and logged

error_reporting(0);
ini_set('display_errors', 0);

ini_set("log_errors", 1);
ini_set("error_log", "C:\Apache24\htdocs\Log\php-error.log");
error_log( "Hello, errors!" );
?>
<style>
 @media only screen and (min-width: 600px) {

    body {
        grid-template-rows: auto auto auto 1fr auto;
    }

 }
 input[type=button]{
    font-size: 14px;
    font-weight: bold;
    border-radius: 10px;
    border-style: solid;
    display: inline;
    border-color:#db545a;
    padding:10px;
    width: 120px;
    height: 40px;
    text-align:center;
    float:right;
    margin:10px;
    margin-right:0;
    font-size: 16px;
    font-weight: bold;
    border-radius: 10px;
    font-size: 18px;
    border-style: solid;
    display: inline;
    border-color:#db545a;
    font-size:14px;
    padding:10px;
    height:40px;
    background-color:transparent;
    color:black;
    cursor: pointer;
    }
        input[type=button]:hover {
    background-color: #db545a;
    color: white;

}

</style>

<div class="row">

  <div class="col-9 col-s-2 menu">   
  <img src="logo_1_alternate.png">
  </div>
  <div class="col-7 col-s-2 menu">
  <h1>Teorētiskās nodarbības</h1>
  </div>
      <div class="col-9 col-s-2 menu">
    <div class="logout">
    <a href="/index.php">Iziet</a>
    </div>
    </div>
  </div>

  <div class="row">

     <div class="col-5 col-s-2 menu"></div>

   <div class="col-15 col-s-2 menu">

 <div class="nav">
 <div class="navigation"> <a href="/profils.php">Mans profils</a></div>
 <div class="navigation"> <a class="active" href="/teor_nodarb.php">Teorētiskās nodarbības</a></div>
 <div class="navigation"> <a href="/brauks_nodarb.php">Braukšanas nodarbības</a></div>
 <div class="navigation"> <a href="/apmaksa.php">Pakalpojumu apmaksa</a></div>
</div>
</div>
</div>

<div class="row">     <div class="col-25 col-s-2 menu"></div></div>

<style>

td {
    padding:8px;
    font-size:14px;width:20%;
}

p{
    margin:0;
    padding:0;
    display: inline;
}

th{
    background-color:#db545a;
    color:white;
    padding:10px;

}
table{
    display:none;
}

    button{
    background: none;
    border: none;
    float:right;
    color:#1190d9;
    margin-top:5px;
    cursor: pointer;
    }

    button:hover{
        text-decoration: underline;
    }
</style>

 <script>

function lektors(){
    for(let i=1; i<=13; i++){
        if(document.getElementById('selectid').value == "1"){
            document.getElementById("lektora_vards" + i).innerHTML = "Kristofers Orbitāns";
        }else if(document.getElementById('selectid').value == "2"){
            document.getElementById("lektora_vards" + i).innerHTML = "Jeļena Gulboviča";
        }else if(document.getElementById('selectid').value == "3"){
            document.getElementById("lektora_vards" + i).innerHTML = "Antons Bargais";
        }else if(document.getElementById('selectid').value == "4"){
            document.getElementById("lektora_vards" + i).innerHTML = "Ilmārs Gorbačovs";
        }else if(document.getElementById('selectid').value == "5"){
            document.getElementById("lektora_vards" + i).innerHTML = "Aronija Stiprā";
        }

        if(document.getElementById('selectid').value == "1"){
            document.getElementById("kabinets" + i).innerHTML = "181A";
        }else if(document.getElementById('selectid').value == "2"){
            document.getElementById("kabinets" + i).innerHTML = "181A";
        }else if(document.getElementById('selectid').value == "3"){
            document.getElementById("kabinets" + i).innerHTML = "27B";
        }else if(document.getElementById('selectid').value == "4"){
            document.getElementById("kabinets" + i).innerHTML = "69C";
        }else if(document.getElementById('selectid').value == "5"){
            document.getElementById("kabinets" + i).innerHTML = "1A";
        }
    }
    if(document.getElementById('selectid').value !== "0"){
    const element = document.querySelector('table');
    element.style.display = 'table';
    }
}  
 </script>



<div class="row">
<div class="col-5 col-s-2 menu"></div>
<div class="col-4 col-s-2 menu">
<p>Izvēlies apmācības vietu</p>
<form>
<div class="custom-select">
  <select id="selectid">
    <div class="starting"><option value="0">Izvēlies apmācības vietu:</option></div>
    <option value="1">Rīgas filiāle, Biķernieku iela 106</option>
    <option value="2">Daugavpils filiāle, Sarkanā iela 69</option>
    <option value="3">Liepājas filiāle, Ostas iela 2</option>
    <option value="4">Jelgavas filiāle, Kokapstrādes iela 302c</option>
    <option value="5">Jūrmalas filiāle, Asaru iela 8</option>
  </select>
  </div>
  <div class="register"><input onclick="lektors()" type="button" value="Izvēlēties"></div>
</form>
</div>

<div class="col-11 col-s-2 menu">
<div style="overflow-x:auto;">
<table id="teoretiska" style="background-color:white; width:100%">
  <tr>
    <th>Pirmdiena</th>
    <th>Otrdiena</th>
    <th>Trešdiena</th>
    <th>Ceturtdiena</th>
    <th>Piektdiena</th>
  </tr>
  <tr>
    <td>01/09/2021<br>
Lektors: <p id="lektora_vards1"></p><br>
Valoda: Krievu<br>
Laiks: 10:00-14:00<br>
Kabinets: <p id="kabinets1"></p><br>
<!-- Trigger/Open The Modal -->
<button id="myBtn1">Pieteikties</button></td>


    <td>02/09/2021<br>
Lektors: <p id="lektora_vards2"></p><br>
Valoda: Latviešu<br>
Laiks: 12:15-16:15<br>
Kabinets: <p id="kabinets2"></p><!-- Trigger/Open The Modal -->
<button id="myBtn2">Pieteikties</button></td>


    <td>03/09/2021<br>
Lektors: <p id="lektora_vards3"></p><br>
Valoda: Latviešu<br>
Laiks: 10:00-14:00<br>
Kabinets: <p id="kabinets3"></p><!-- Trigger/Open The Modal -->
<button id="myBtn3">Pieteikties</button></td>


<td></td>
<td>05/09/2021<br>
Lektors: <p id="lektora_vards4"></p><br>
Valoda: Krievu<br>
Laiks: 18:00-22:00<br>
Kabinets: <p id="kabinets4"></p><!-- Trigger/Open The Modal -->
<button id="myBtn4">Pieteikties</button></td>


  </tr>
  <tr>
    <td></td>
    <td>09/09/2021<br>
Lektors: <p id="lektora_vards5"></p><br>
Valoda: Krievu<br>
Laiks: 12:15-16:15<br>
Kabinets: <p id="kabinets5"></p><!-- Trigger/Open The Modal -->
<button id="myBtn5">Pieteikties</button></td>


    <td></td>
        <td>11/09/2021<br>
Lektors: <p id="lektora_vards6"></p><br>
Valoda: Latviešu<br>
Laiks: 18:00-22:00<br>
Kabinets: <p id="kabinets6"></p><!-- Trigger/Open The Modal -->
<button id="myBtn6">Pieteikties</button></td>


    <td>12/09/2021<br>
Lektors: <p id="lektora_vards7"></p><br>
Valoda: Krievu<br>
Laiks: 10:00-14:00<br>
Kabinets: <p id="kabinets7"></p><!-- Trigger/Open The Modal -->
<button id="myBtn7">Pieteikties</button></td>


  </tr>
  <tr>
    <td>16/09/2021<br>
Lektors: <p id="lektora_vards8"></p><br>
Valoda: Krievu<br>
Laiks: 10:00-14:00<br>
Kabinets: <p id="kabinets8"></p><!-- Trigger/Open The Modal -->
<button id="myBtn8">Pieteikties</button></td>


    <td>17/09/2021<br>
Lektors: <p id="lektora_vards9"></p><br>
Valoda: Latviešu<br>
Laiks: 15:00-19:00<br>
Kabinets: <p id="kabinets9"></p><!-- Trigger/Open The Modal -->
<button id="myBtn9">Pieteikties</button></td>
    <td></td>



        <td></td>
    <td>20/09/2021<br>
Lektors: <p id="lektora_vards10"></p><br>
Valoda: Latviešu<br>
Laiks: 10:00-14:00<br>
Kabinets: <p id="kabinets10"></p><!-- Trigger/Open The Modal -->
<button id="myBtn10">Pieteikties</button></td>



  </tr>
  <tr>
    <td>23/09/2021<br>
Lektors: <p id="lektora_vards11"></p><br>
Valoda: Latviešu<br>
Laiks: 8:00-12:00<br>
Kabinets: <p id="kabinets11"></p><!-- Trigger/Open The Modal -->
<button id="myBtn11">Pieteikties</button></td>



    <td>24/09/2021<br>
Lektors: <p id="lektora_vards12"></p><br>
Valoda: Krievu<br>
Laiks: 10:00-14:00<br>
Kabinets: <p id="kabinets12"></p><!-- Trigger/Open The Modal -->
<button id="myBtn12">Pieteikties</button></td>



    <td>25/09/2021<br>
Lektors: <p id="lektora_vards13"></p><br>
Valoda: Krievu<br>
Laiks: 10:00-14:00<br>
Kabinets: <p id="kabinets13"></p><!-- Trigger/Open The Modal -->
<button id="myBtn13">Pieteikties</button></td>
        <td></td>
    <td></td>
  </tr>

</table>
</div>  

</div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <div class="modal-header">
    <h2>Apstiprinājums</h2></div>
    <div class="modal-body">
    <p>Jūsu pieteikums tika nodots administrācijai, apstiprinājums tiks nosūtīts uz jūsu norādīto e-pastu!</p></div>
    <span class="close">Skaidrs</span>
    </div>

</div>

<script>
    for(let i=1; i<=13; i++){
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal

var btn = document.getElementById("myBtn" + i);
  
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  location.reload();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    location.reload();
  }
}
  }
</script>







</body>
  <footer>
<div class="footer">
    <div class="row">
    <div class="col-2 col-s-2 menu">
    </div>
          <div class="col-7 col-s-2 menu">
                <ul style="list-style-type:none;">
                <li style= "font-weight: bold;"> Sazinies ar mums!</li>
                <br>
                <li>💒 Galvenā filiāle Rīgā - Zundes ielā 8</li>
                <li>Darba dienās no 8:30 līdz 18:05</li>
                <li>☎️ Tālrunis: 26666666, 29999999</li>
                <br>
                <li>💒 Daugavpils filiālē - Sarkanā iela 68</li>
                <li>Darba dienās no 10:00 līdz 17:00</li>
                <li>☎️ Tālrunis: 29869254, 25928473</li>
                </ul>
           </div>
          <div class="col-8 col-s-2 menu">
            <div class="soc">
                <ul style="list-style-type:none;">
                <li style= "font-weight: bold;">Pieseko mums!</li>
                <br>
                <li><img id="soc_tikli" src="twitter.png"> Twitter: phoenix.autoskola69</li>
                <li><img id="soc_tikli" src="Instagram.png"> Instagram: phoenix.best.autoskola</li>
                <li><img id="soc_tikli" src="Facebook.png"> Facebook: phoenix.autoskola1</li>
                <li><img id="soc_tikli" src="love.png"> Draugiem: phoenix.autoskola</li>
                <li><img id="soc_tikli" src="pinterest.png"> Pinterest: phoenix.art.autoskola21</li>
                </ul>
            </div>
        </div>
          <div class="col-6 col-s-2 menu">
            <div class="karte">
               🌍 ​ Google maps lokācija<br><br>
                <div id="googleMap" style= 
                "width:100%;height:170px;"
                ></div>
                </div>
                <script>
                function myMap() {
                var mapProp= {
                  center:new google.maps.LatLng(56.9519720353205, 24.079103327444003),
                  zoom:17,
                };
                var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                }
                </script>
                <script src="https://maps.googleapis.com/maps/api/GOOGLE_API_KEY"></script>
                 </div>
            </div>
    </div>
</div>
</footer>
<?php $conn = null; ?>
</html>
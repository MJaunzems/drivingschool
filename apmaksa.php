<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="logo_1_small.png">
<link rel="stylesheet" href="test_styles.css">
  <title>Pakalpojuma apmaksa</title>
</head>
<body>

<?php
  //Errors disabled and logged

error_reporting(0);
ini_set('display_errors', 0);

ini_set("log_errors", 1);
ini_set("error_log", "C:\Apache24\htdocs\Log\php-error.log");
error_log( "Hello, errors!" );



// Connect to a database defined in tnsnames.ora file

$dsn = 'oci:dbname=BAZE';

$username = 'system';
$fh = fopen('password.txt','r');
while ($line = fgets($fh)) {
    $password = $line;
}
$conn = null;
  $conn = new PDO("$dsn; charset=utf8", $username, $password);

  ?>



<script>
var apmaksa = false;
document.cookie = "apmaksa=false";
</script>
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

    .maksat{
        cursor: pointer;

        }
        #apmaksa{
            color:red;
        }

p{
    display: inline;

}


</style>


<div class="row">

  <div class="col-9 col-s-2 menu">   
  <img src="logo_1_alternate.png">
  </div>
  <div class="col-7 col-s-2 menu">
  <h1>Pakalpojumu apmaksa</h1>
  </div>
      <div class="col-9 col-s-2 menu">
    <div class="logout">
    <a href="/index.php">Iziet</a>
    </div>
    </div>
  </div>

  <?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo 'Hello';
}
?>


  <div class="row">

     <div class="col-5 col-s-2 menu"></div>

   <div class="col-15 col-s-2 menu">

  <div class="nav">
 <div class="navigation"> <a href="/profils.php">Mans profils</a></div>
 <div class="navigation"> <a href="/teor_nodarb.php">Teorētiskās nodarbības</a></div>
 <div class="navigation"> <a href="/brauks_nodarb.php">Braukšanas nodarbības</a></div>
 <div class="navigation"> <a class="active" href="/apmaksa.php">Pakalpojumu apmaksa</a></div>
</div>
</div>
</div>
<div class="row"><div class="col-25 col-s-2 menu"></div></div>

<div class="row">
<div class="col-5 col-s-2 menu"></div>
<div class="col-6 col-s-2 menu">Izvēlies maksas pakalpojumu
<form method = "post">
<div class="custom-select">
  <select id="slc">
    <div class="starting"><option id="0" value="0">Izvēlies pakalpojumu:</option></div>
    <option value="1">Teorijas kurss 15.00 €</option>
    <option value="2">Apmācības karte 10.00 €</option>
    <option value="3">Pirmās palīdzības kurss 55.00 €</option>
    <option value="4">Medicīniskā komisija 35.00 €</option>
    <option value="5">Braukšanas nodarbības (45min) 18.00 €</option>
    <option value="6">Teorijas eksāmens (trīs mēģinājumi) 6.00 €</option>
    <option value="7">Braukšanas eksāmens (viens mēģinājums) 34.00 €</option>
  </select>
  </div>
  <span id="apmaksa"></span>
  <div class="register"><input name="apm" id ="apm" onclick="maksat()"  type="button" value="Apmaksāt"></div>
</form>
</div>


<?php   

if($_COOKIE["apmaksa"] == "true" ){
        $STH = $conn -> prepare('UPDATE APMAKSA SET APM_'. $_COOKIE["pakalpojums"] .' = 1 where personas_kods = '. "'" . $_COOKIE["user"] . "'");
        $STH -> execute();
}

?>


<script>
function maksat(){
    if(document.getElementById("0").selected == true){
        document.getElementById("apmaksa").innerHTML = "Izvēlies pakalpojumu!";
    }else if(apmaksa !== true){
        document.getElementById("apmaksa").innerHTML = "Izvēlies apmaksas veidu!";
    }else{
        document.getElementById("apmaksa").innerHTML = "";
        modal.style.display = "block";
        document.cookie = "apmaksa=true";
        var e = document.getElementById("slc");
        var value = e.value;
        document.cookie = "pakalpojums=" + value;
    }
}
</script>


<div class="col-9 col-s-2 menu">
<h2>Izvēlies apmaksas veidu</h2>
<div id = "thumbnails">
<div class="maksat"><img onclick="mark(this.id)" id="swedbank" src="swedbank500.png" height="auto" width="100%"/></div>
<div class="maksat"><img onclick="mark(this.id)" id="paypal" src="paypal500.png" height="auto" width="100%"/></div>
<div class="maksat"><img onclick="mark(this.id)" id="seb" src="SEB500.png" height="auto" width="100%"/></div>
<div class="maksat"><img onclick="mark(this.id)" id="luminor" src="luminor500.png" height="auto" width="100%"/></div>
<div class="maksat"><img onclick="mark(this.id)" id="revolut" src="revolut500.png" height="auto" width="100%"/></div>
<div class="maksat"><img onclick="mark(this.id)" id="citadele" src="citadele500.jpg" height="auto" width="100%"/></div>
</div>
</div>
</div>

<script>
function mark(ID) { //creates border
    apmaksa = true;
    document.getElementById("swedbank").style.border="none";
    document.getElementById("paypal").style.border="none";
    document.getElementById("seb").style.border="none";
    document.getElementById("luminor").style.border="none";
    document.getElementById("revolut").style.border="none";
    document.getElementById("citadele").style.border="none";
    // Then set the one that got clicked.
    document.getElementById(ID).style.border="4px solid #db545a";

}
</script>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <div class="modal-header">
    <h2>Apstiprinājums</h2></div>
    <div class="modal-body">
    <p>Paldies, veiksmīgi veikta apmaksa par izvēlēto pakalpojumu. Apmaksas apstiprinājums tiks nosūtīts uz jūsu norādīto e-pastu!</p></div>
    <span class="close">Skaidrs</span>
    </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

  
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal



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
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="logo_1_small.png">
 <link rel="stylesheet" href="test_styles.css">
 <link href="progress_bar.css" rel="stylesheet" />
</head>
<body>
<div class="row">

  <div class="col-9 col-s-2 menu">   
  <img src="logo_1_alternate.png">
  </div>
  <div class="col-7 col-s-2 menu">
  <h1>Mans profils</h1>
  </div>
  </div>
  <style>
 @media only screen and (min-width: 600px) {

    body {
        grid-template-rows: auto auto auto 1fr auto;
    }
}
    input[type=button]{
    font-size: 16px;
    font-weight: bold;
    border-radius: 10px;
    font-size: 18px;
    border-style: solid;
    display: inline;
    border-color:#db545a;
    font-size:14px;
    padding:10px;
    padding-left:30px;
    padding-right:30px;
    }

    @media screen and (max-width: 600px){
        .progress-bar-wrapper{
            visibility:hidden;
            clear: both;
            float: left;
            margin: 10px auto 5px 20px;
            width: 28%;
            display: none;
        }
    }
    </style>

  <div class="row">

     <div class="col-5 col-s-2 menu"></div>

   <div class="col-15 col-s-2 menu">

  <div class="nav">
 <div class="navigation"> <a class="active" href="http://localhost/profils.php">Mans profils</a></div>
 <div class="navigation"> <a href="http://localhost/teor_nodarb.php">Teorētiskās nodarbības</a></div>
 <div class="navigation"> <a href="http://localhost/brauks_nodarb.php">Braukšanas nodarbības</a></div>
 <div class="navigation"> <a href="http://localhost/apmaksa.php">Pakalpojumu apmaksa</a></div>
</div>
</div>
</div>
 <div class="row">

     <div class="col-25 col-s-2 menu"></div>
     </div>


<div class="row">
<div class="col-5 col-s-2 menu"></div>
<div class="col-4 col-s-2 menu">
<div class="foto"><img style="    border-style: solid; border-color: black;" src="anonymous-user.png" width="100%" height="auto"></div></div>
<div class="col-6 col-s-2 menu">
<div class="info">
<h3>Jānis Bērziņš</h3>
<p>Līguma noslēgšanas datums: 01/01/2022</p>
<p>Līguma beigšanas datums: 01/01/2022</p>
<p>Tel.nr. +371 22222222</p>
<p>E-pasts: janis-berzins@gmail.com</p>
<input type="button" class="button" value="Mainīt paroli">
</div>
</div>
<div class="col-6 col-s-2 menu">
<h3>Pakalpojumu apmaksas progress</h3>
<p><label><input type="checkbox" disabled="disabled" checked="checked" id="checkBox"/>Teorijas kurss 15.00 €</label></p>
<p><label><input type="checkbox" disabled="disabled" checked="checked" id="checkBox"/>Apmācības karte 10.00 €</label></p>
<p><label><input type="checkbox" disabled="disabled"  id="checkBox"/>Pirmās palīdzības kurss 55.00 €</label></p>
<p><label><input type="checkbox" disabled="disabled"  id="checkBox"/>Medicīniskā komisija 35.00 €</label></p>
<p><label><input type="checkbox" disabled="disabled" checked="checked" id="checkBox"/>Braukšanas nodarbības (45min) 18.00 €</label></p>
<p><label><input type="checkbox" disabled="disabled"  id="checkBox"/>Teorijas eksāmens (trīs mēģinājumi) 6.00 €</label></p>
<p><label><input type="checkbox" disabled="disabled"  id="checkBox"/>Braukšanas eksāmens (viens mēģinājums) 34.00 € </label></p>
</div>
</div>

<div class="col-4 col-s-2 menu"></div>
</div>


  <div class="row">
  <div class="col-5 col-s-2 menu"></div>

   <div class="col-15 col-s-2 menu">

   <div class="progress-bar-wrapper"></div>
<script src="progress_bar.js"></script>
<script src="app.js"></script>


   </div>
   <div class="col-5 col-s-2 menu"></div>
   </div>
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
                <li>💒 Galvenā filiāle Rīgā - Zunde ielā 8</li>
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
          <div class="col-8 col-s-2 menu">
            <div class="karte">
               🌍 ​ Google maps lokācija<br><br>
                <div id="googleMap" style= 
                "width:350px;height:170px;"
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
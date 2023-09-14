<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta charset="UTF-8">
 <link rel="icon" href="logo_1_small.png">
 <link rel="stylesheet" href="styles.css">
</head>
<body>

<!--Welcome <?php echo $_POST["pers_kods"]; ?><br>
Your email address is: <?php echo $_POST["parole"]; ?>
-->
<h1>Pakalpojumu apmaksa</h1>

<div class="nav">
<ul style="list-style-type: none">

 <div class="navigation"> <li><a href="http://localhost/profils.php">Mans profils</a></li></div>
 <div class="navigation"> <li><a href="http://localhost/teor_nodarb.php">Teorētiskās nodarbības</a></li></div>
 <div class="navigation"><li><a href="http://localhost/brauks_nodarb.php">Braukšanas nodarbības</a></li></div>
 <div class="navigation"><li><a class="active" href="http://localhost/apmaksa.php">Pakalpojumu apmaksa</a></li></div>
</ul>

</div>


</body>
<footer>

<div class="footer">

<div class="karte">
🌍 ​ Google maps lokācija<br><br>



<div id="googleMap" style= "border-style: solid; border-width: 0px; border-color: white; width:600px;height:200px;"></div>
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









<div class="soc">
<ul style="list-style-type:none;">
<li style= "font-weight: bold;">Pieseko mums!</li>
<br>
<li><img src="twitter.png" width="2%" height="auto"> Twitter: phoenix.autoskola69</li>
<li><img src="Instagram.png" width="2%" height="auto"> Instagram: phoenix.best.autoskola</li>
<li><img src="Facebook.png" width="2%" height="auto"> Facebook: phoenix.autoskola1</li>
<li><img src="love.png" width="2%" height="auto"> Draugiem: phoenix.autoskola</li>
<li><img src="pinterest.png" width="2%" height="auto"> Pinterest: phoenix.art.autoskola21</li>
</ul>
</div>


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
</footer>
</html>
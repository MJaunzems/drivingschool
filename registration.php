<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="logo_1_small.png">
<link rel="stylesheet" href="test_styles.css">
 <title>Reģistrācija</title>
</head>
<body>
<a href="/index.php">
<img src="logo_1_alternate.png"></a>


  <?php

  //Errors disabled and logged

error_reporting(0);
ini_set('display_errors', 0);

ini_set("log_errors", 1);
ini_set("error_log", "C:\Apache24\htdocs\Log\php-error.log");
error_log( "Hello, errors!" );


//DB Import
$dsn = 'oci:dbname=BAZE';

$username = 'system';
$fh = fopen('password.txt','r');
while ($line = fgets($fh)) {
    $password = $line;
}
$conn = null;
  $conn = new PDO("$dsn; charset=utf8", $username, $password);
  ?>

  <style>
  input[type=submit] {

      width:200px;
      float:right;

} .pabeigt{
    padding:5px;
    padding-bottom:25px;
   
}

  </style>

        <?php
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// request method is post
	// now handle the form data

	// declare name and email variables

	if (empty($_POST['vards'])) {
		$nameError = 'Šis lauks ir obligāts!';
	} else {
		//$name = trim(htmlspecialchars($_POST['vards']));
	}

	if (empty($_POST['epasts'])) {
		$emailError = 'Šis lauks ir obligāts!';
	} else {
		//$email = trim(htmlspecialchars($_POST['epasts']));
	}

    if (empty($_POST['uzvards'])) {
		$surnameError = 'Šis lauks ir obligāts!';
	} else {
		//$surname = trim(htmlspecialchars($_POST['uzvards']));
	}

    if (!empty($_POST['pers_kods'])) {
        
            $usersPersKods = $_POST['pers_kods'];
            $STH = $conn -> prepare("SELECT personas_kods from LIETOTAJI where personas_kods  = " . "'" . $usersPersKods . "'" );
            $STH -> execute();
            $result = $STH -> fetchAll();
            foreach( $result as $row ) {
            }
            if($row["PERSONAS_KODS"] != ""){
                $persError = 'Ievadītais personas kods jau pastāv!';
            }
        }

    
    if (empty($_POST['pers_kods'])) {
		$persError = 'Šis lauks ir obligāts!';
	} else {
		//$pers = trim(htmlspecialchars($_POST['pers_kods']));
	}

    if (empty($_POST['parole'])) {
		$passError = 'Šis lauks ir obligāts!';
	}

    if (empty($_POST['phone'])) {
		$phoneError = 'Šis lauks ir obligāts!';
	} else {
		//$phone = trim(htmlspecialchars($_POST['phone']));
	}
    if($_POST['vards'] != '' && $_POST['epasts'] != '' && $_POST['uzvards'] != '' && $_POST['pers_kods'] != $row["PERSONAS_KODS"] && $_POST['pers_kods'] != '' && $_POST['parole'] != '' && $_POST['phone'] != ''){
    
      $hash = password_hash( $_POST["parole"] , PASSWORD_DEFAULT );
      $sql = "INSERT INTO LIETOTAJI (VARDS, UZVARDS, EPASTS, PERSONAS_KODS, PAROLE, NUMURS)
      VALUES ("."'".$_POST['vards']."'".","."'".$_POST['uzvards']."'".","."'".$_POST['epasts']."'".", "."'".$_POST['pers_kods']."'".", '$hash', "."'".$_POST['phone']."'".")";
      $conn->query($sql);

      $sql = "INSERT INTO APMAKSA values ("."'".$_POST['pers_kods']."'". ",0,0,0,0,0,0,0)";
      $conn->query($sql);

      $sql = "INSERT INTO FOTO values ("."'".$_POST['pers_kods']."'". ",0)";
      $conn->query($sql);

      $cookie_name = "user";
      $cookie_value = $_POST['pers_kods'];
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");


      header("Location: /profils.php");
    }
    
      }
      ?>

  <div class="row">
  <div class="col-9 col-s-2 menu"></div>

  <div class="col-7 col-s-9">
    <div class="Main">
      <h1>Reģistrācija</h1>
      <form method="post" id="login" onsubmit="process(event)">

<div class="Vards">
<label>Vārds<span class="error">*</span>
<input type="text" id="vards" name="vards" /></label> 
<span class="error"><?php if (isset($nameError)) echo $nameError ?></span></div>
        
<div class="Uzvards">       
<label>Uzvārds<span class="error">*</span>
<input type="text" id="uzvards" name="uzvards" /></label> 
<span class="error"><?php if (isset($surnameError)) echo $surnameError ?></span></div>

<div class="info">
<label>E-pasts<span class="error">*</span>
<input placeholder="janis.berzins@gmail.com" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,}$" id="epasts" type="email" name="epasts" /></label> 
<span class="error"><?php if (isset($emailError)) echo $emailError ?></span></div>

<div class="info">
<label>Personas kods<span class="error">*</span>
<input type="text"   placeholder="XXXXXX-XXXXX" pattern="[0-9]{6}-[0-9]{5}" id="pers_kods" name="pers_kods" /> 
<span class="error"><?php if (isset($persError)) echo $persError ?></span></div>

<div class="info">   
<label>Parole<span class="error">*</span>
<input pattern=".{8,}" title="Eight or more characters" id="parole" type="password" name="parole" /></label> 
<span class="error"><?php if (isset($passError)) echo $passError ?></span></div>

<div class="info">     
<label>Telefona numurs<span class="error">*</span>
<input id="phone" placeholder="22222222" type="tel" pattern="[0-9]{8}" name="phone"/></label> 
<span class="error"><?php if (isset($phoneError)) echo $phoneError ?></span></div>

<div class="pabeigt">
<input name="button" value="Pabeigt reģistrāciju" type="submit"></input></div>

</form>
</div>
</div>
<div class="col-9 col-s-2 menu">
</div>
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
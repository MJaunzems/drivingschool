<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta charset="UTF-8">
<link rel="stylesheet" href="styles.css" />
 <link rel="icon" href="logo_1_small.png">
   <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
 </head>
<body>
<a href="http://localhost/index.php">
<img src="logo_1.png"></a>
  <?php
$dsn = 'oci:dbname=BAZE';

$username = 'system';
$fh = fopen('password.txt','r');
while ($line = fgets($fh)) {
    $password = $line;
}
$conn = null;
  $conn = new PDO("$dsn; charset=utf8", $username, $password);

  ?>

  <div class="image"><img src="shadow.png" width="800" height="1100"></div>




  <style>

  .image{
    position: absolute;
    padding-left: 671px;
    padding-top:26px;
    display: inline-block;
  }

  .registration{
      padding-left: 40%;
      padding-right: 40%;
      position: relative;
  }

  .vards{
      width:49%;
      display: inline-block;
  }

  .uzvards{
      width:49%;
      display: inline-block;
      float:right;
  }

  input[type=submit]{
      float:right;
      width:300px;
  }


  </style>



<!-- 
<p>
        <label>
          Salutation
          <br />
          <select name="salutation">
            <option>--None--</option>
            <option>Mr.</option>
            <option>Ms.</option>
            <option>Mrs.</option>
            <option>Dr.</option>
            <option>Prof.</option>
          </select>
        </label>
      </p>-->
 
 <!-- 
<p>
        Gender :
        <label><input type="radio" name="gender" value="male" /> Male</label>
        <label><input type="radio" name="gender" value="female" /> Female</label>
      </p>
 
   --> <!-- 
<p>
        <label>Date of Birth:<input type="date" name="birthDate"></label>
      </p>
 -->
 

  <!-- 
<p>
        <label>
          Address :
          <br />
          <textarea name="address" cols="30" rows="3"></textarea>
        </label>
      </p>
 
      -->
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
    if($_POST['vards'] != '' && $_POST['epasts'] != '' && $_POST['uzvards'] != '' && $_POST['pers_kods'] != '' && $_POST['parole'] != '' && $_POST['phone'] != ''){
    
      $hash = password_hash( $_POST["parole"] , PASSWORD_DEFAULT );
      $sql = "INSERT INTO LIETOTAJI (VARDS, UZVARDS, EPASTS, PERSONAS_KODS, PAROLE, NUMURS)
      VALUES ("."'".$_POST['vards']."'".","."'".$_POST['uzvards']."'".","."'".$_POST['epasts']."'".", "."'".$_POST['pers_kods']."'".", '$hash', "."'".$_POST['phone']."'".")";
      $conn->query($sql);
      header("Location: http://localhost/paldies.php");
    }
    
      }
      ?>


      <div class="registration">
      <h1>Reģistrācija</h1>
      <form method="post" id="login" onsubmit="process(event)">

      

<p><div class="Vards">
        <label>Vārds<span class="error">*</span><input type="text" id="vards" name="vards" /></label> <span class="error"><?php if (isset($nameError)) echo $nameError ?></span>
        </div>
        <div class="Uzvards">
        <label>Uzvārds<span class="error">*</span><input type="text" id="uzvards" name="uzvards" /></label> <span class="error"><?php if (isset($surnameError)) echo $surnameError ?></span>
     </div> </p>
      

     

<p>
        <label>E-pasts<span class="error">*</span><input placeholder="janis.berzins@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="epasts" type="email" name="epasts" /></label> <span class="error"><?php if (isset($emailError)) echo $emailError ?></span>
      </p>
 
     <p>
        <label>Personas kods<span class="error">*</span><input type="text"   placeholder="XXXXXX-XXXXX" pattern="[0-9]{6}-[0-9]{5}" id="pers_kods" name="pers_kods" /> <span class="error"><?php if (isset($persError)) echo $persError ?></span>
      </p>

      <p>
        <label>Parole<span class="error">*</span><input pattern=".{8,}" title="Eight or more characters" id="parole" type="password" name="parole" /></label> <span class="error"><?php if (isset($passError)) echo $passError ?></span>
      </p>

      <label>Telefona numurs<span class="error">*</span><input id="phone" type="tel" name="phone" /></label> <span class="error"><?php if (isset($phoneError)) echo $phoneError ?></span>


<p>
        <div class="pabeigt"><input name="button" value="Pabeigt reģistrāciju" type="submit"></input></div>
      </p>
  
     </fieldset>
  </form>


  </div>

</body>
<script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
 </script>
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
</html>
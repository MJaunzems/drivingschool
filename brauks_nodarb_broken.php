<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta charset="UTF-8">
 <link rel="icon" href="logo_1_small.png">
 <link rel="stylesheet" href="styles.css">

<meta http-equiv="Content-Type" 
      content="text/html; charset=utf-8">
</head>
<body>
<!--Welcome <?php echo $_POST["pers_kods"]; ?><br>
Your email address is: <?php echo $_POST["parole"]; ?>
-->
<h1>Braukšanas nodarbības</h1>

<div class="nav">
<ul style="list-style-type: none">

 <div class="navigation"> <li><a href="http://localhost/profils.php">Mans profils</a></li></div>
 <div class="navigation"> <li><a href="http://localhost/teor_nodarb.php">Teorētiskās nodarbības</a></li></div>
 <div class="navigation"><li><a class="active" href="http://localhost/brauks_nodarb.php">Braukšanas nodarbības</a></li></div>
 <div class="navigation"><li><a href="http://localhost/apmaksa.php">Pakalpojumu apmaksa</a></li></div>
</ul>

</div>

<?php


// Connect to a database defined in tnsnames.ora file
$dsn = 'oci:dbname=BAZE';

$username = 'system';
$fh = fopen('password.txt','r');
while ($line = fgets($fh)) {
    $password = $line;
}
$conn = null;
  $conn = new PDO("$dsn; charset=utf8", $username, $password);


  /*

$sql= "SELECT vards FROM INSTRUKTORI";
foreach($conn->query($sql) AS $row) {
 echo $row['VARDS']."<br>";
}
*/
/*
$sql= "SELECT password FROM EMAIL_VALID";
foreach($conn->query($sql) AS $row) {
 echo $row['PASSWORD']."<br>";
}
*/
/*
    $statement = $conn->prepare("SELECT vards FROM INSTRUKTORI");
    $statement->execute(array());
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $vards = $row['VARDS'];
        echo "$vards is here<br>";
    }

    */

    /*

    $sql = 'SELECT vards, uzvards, modelis, numurs, atrumkarba, cena, valoda FROM INSTRUKTORI';        
    $array = array();
    foreach($conn->query($sql) as $row){
        $array[] = $row;
    }

    echo $array[0]['UZVARDS'];
    //print_r($array);


    */

    

    $smt = $conn->prepare('SELECT vards, uzvards, modelis FROM INSTRUKTORI');
    $smt->execute();
    $data = $smt->fetchAll();
    
    


//$sql= " SELECT password FROM email_valid WHERE personas_kods = '210201-10205'";
      //foreach($conn->query($sql) as $row) {
	      //echo $row['PASSWORD']." - ".$row['PERSONAS_KODS']."<br>";
	      //echo $row['PASSWORD']."<br>";
      //}
      function exception_error_handler($severity, $message, $file, $line) {
    if (!(error_reporting() & $severity)) {
        // This error code is not included in error_reporting
        return;
    }
    throw new ErrorException($message, 0, $severity, $file, $line);
}
set_error_handler("exception_error_handler");
?>



<form method = "post">
  <label for="cars">Choose a car:</label>
  <select id="cars" name="cars">
    <?php foreach ($data as $row): ?>
    <option><?=$row["VARDS"].', '.$row["UZVARDS"].', '.$row["MODELIS"]?></option>
<?php endforeach ?>
  </select>
  <input type="submit" value="Submit">
</form>

<?php 

try{
$uzvards = explode(", ",$_POST["cars"]);

$sql = 'SELECT vards, uzvards, modelis, numurs, atrumkarba, cena, valoda FROM INSTRUKTORI where uzvards = '. "'" . $uzvards[1] . "'";
 $array = array();
    foreach($conn->query($sql) as $row){
        $array[] = $row;
    }

    //echo $array[0]['UZVARDS'];
    //print_r($array);
}catch(Exception $e){}

?>

<p>Vārds: <?php try{ echo $array[0]['VARDS'];}catch(exception $e){echo 'Imants';}?> </p>
<p>Uzvārds: <?php try{ echo $array[0]['UZVARDS'];}catch(exception $e){echo 'Zaube';}?> </p>
<p>Valoda: <?php try{ echo $array[0]['VALODA'];}catch(exception $e){echo 'Latviešu';}?> </p>
<p>Automašīna: <?php try{ echo $array[0]['MODELIS'].', '.$array[0]['NUMURS'].', '.$array[0]['ATRUMKARBA'];}catch(exception $e){echo 'Toyota Corolla, XD6969, automāts';}?> </p>
<p>Braukšanas nodarbības cena: <?php try{ echo $array[0]['CENA']."€/45 min.";}catch(exception $e){echo '18€/45 min.';}?> </p>


<!--

<p>
<form method="post">
<select name="list1" id="list1">
?php foreach ($data as $row): ?>
    <option>?=$row["VARDS"].', '.$row["UZVARDS"].', '.$row["MODELIS"]?></option>
?php endforeach ?>
</select>
</form>
</p>

-->


<!--
<p>
        <label>
          Braukšanas instruktors
          <br />
          <select name="instruktors" id="instruktors">
          <option selected = "selected">Choose one</option>
          ?php
            foreach($conn->query($sql) as $row){ ?>
            <option value="?php echo $row['VARDS'].$row['UZVARDS'] ?></option>
            ?php } ?>
            
          </select>
        </label>
      </p>
      -->

      
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
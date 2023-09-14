<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="logo_1_small.png">
<link rel="stylesheet" href="test_styles.css">
  <title>Braukšanas nodarbības</title>
</head>
<body>



<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <div class="modal-header">
    <h2>Apstiprinājums</h2></div>
    <div class="modal-body">
    <p class="paldies">Paldies! Jūs esat veiksmīgi veikuši pieteikumu uz braukšanas nodarbību!</p></div>
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
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


<script>


function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
</script>
<style>
 @media only screen and (min-width: 600px) {

    body {
        grid-template-rows: auto auto auto 1fr auto;
    }
 }

 input[type=submit] {
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

    input[type=submit]:hover {
    background-color: #db545a;
    color: white;

}

 button[type=submit] {
     cursor: pointer;
 }
p.paldies{
    display:inline;
    }

</style>

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


try{
$uzvards = explode(", ",$_POST["cars"]);

$sql = 'SELECT vards, uzvards, modelis, numurs, atrumkarba, cena, valoda, telefons FROM INSTRUKTORI where uzvards = '. "'" . $uzvards[1] . "'";
 $array = array();
    foreach($conn->query($sql) as $row){
        $array[] = $row;
    }

    //echo $array[0]['UZVARDS'];
    //print_r($array);
}catch(Exception $e){}

?>



<div class="row">

  <div class="col-9 col-s-2 menu">   
  <img src="logo_1_alternate.png">
  </div>
  <div class="col-7 col-s-2 menu">
  <h1>Braukšanas nodarbības</h1>
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
 <div class="navigation"> <a href="/teor_nodarb.php">Teorētiskās nodarbības</a></div>
 <div class="navigation"> <a class="active" href="/brauks_nodarb.php">Braukšanas nodarbības</a></div>
 <div class="navigation"> <a href="/apmaksa.php">Pakalpojumu apmaksa</a></div>
</div>
</div>
</div>

<style>
td{
    display:none;
}
</style>

<script>
function cookies(){
var e = document.getElementById("cars");
var text = e.options[e.selectedIndex].text;
const myArray = text.split(", ");
var cookie_name = "Uzvards = " +  myArray[1];
document.cookie = cookie_name;
}
</script>

<div class="row"><div class="col-25 col-s-2 menu"></div></div>

<div class="row">
<div class="col-5 col-s-2 menu"></div>
<div class="col-6 col-s-2 menu">Izvēlies braukšanas instruktoru
<form method = "post">
<div class="custom-select">


  <select onchange="cookies()" id="cars" name="cars">
  <option>Izvēlies braukšanas instruktoru:</option>
    <?php foreach ($data as $row): ?>
    <option><?=$row["VARDS"].', '.$row["UZVARDS"].', '.$row["MODELIS"]?></option>
<?php endforeach ?>
  </select>
  <input type="submit" name="button3" value="Izvēlēties">



  <?php
     if (isset($_POST['button3'])): ?> 


      <style>
    td{
    display:table-cell;
    }
    </style>
    <?php endif ?>



<div class="foto"><img style="margin:20px; margin-left:0; float:left; border-style: solid; border-color: black;" src="anonymous-user.png" width="30%" height="auto"></div></div>
<h3><?php try{ echo $array[0]['VARDS'];}catch(exception $e){echo '';}?> 
<?php try{ echo $array[0]['UZVARDS'];}catch(exception $e){echo '';}?> </h3>
<p>🚖 Automašīna: <?php try{ echo $array[0]['MODELIS'].', '.$array[0]['NUMURS'].', '.$array[0]['ATRUMKARBA'];}catch(exception $e){echo '';}?> </p>
<p>💬 Valoda: <?php try{ echo $array[0]['VALODA'];}catch(exception $e){echo '';}?> </p>
<p>💵 Braukšanas nodarbības cena: <?php try{ echo $array[0]['CENA']."€/45 min.";}catch(exception $e){echo '';}?> </p>
<p>📱 Tel.nr: <?php try{ echo '+371 '.$array[0]['TELEFONS'];}catch(exception $e){echo '';}?> </p>
<p>🗺️ Tikšanās vieta: Imantas McDonalds</p>


<?php 

  //Errors disabled and logged

error_reporting(0);
ini_set('display_errors', 0);

ini_set("log_errors", 1);
ini_set("error_log", "C:\Apache24\htdocs\Log\php-error.log");
error_log( "Hello, errors!" );

?>

</form>
</div>
<div class="col-9 col-s-2 menu">

<h2>Instruktora nodarbību grafiks</h2>
<div style="overflow-x:auto;">
<table class="kalendars" style="background-color:white; width:100%">
  <tr>
    <th></th>
    <th>01/11</th>
    <th>02/11</th>
    <th>03/11</th>
    <th>04/11</th>
    <th>05/11</th>
    <th>06/11</th>
    <th>07/11</th>
    <th>08/11</th>
    <th>09/11</th>
    <th>10/11</th>
    <th>11/11</th>
    <th>12/11</th>
    <th>13/11</th>
    <th>14/11</th>


  </tr>
  <tr>
    <th>8:30-10:00</th>
    <td>
    <?php $STH = $conn -> prepare( "SELECT ONE from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ONE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(2) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties1" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties1'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ONE = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?> 
      
   </td>
   <td>
   <?php $STH = $conn -> prepare( "SELECT TWO from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWO"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(3) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties2" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties2'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWO = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>

     <td>
        <?php $STH = $conn -> prepare( "SELECT THREE from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THREE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(4) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties3" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties3'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THREE = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOUR from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOUR"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(5) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties4" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties4'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOUR = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FIVE from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FIVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(6) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties5" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties5'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FIVE = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SIX from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SIX"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(7) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties6" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties6'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SIX = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SEVEN from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(8) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties7" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties7'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SEVEN = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT EIGHT from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["EIGHT"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(9) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties8" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties8'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET EIGHT = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT NINE from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["NINE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(10) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties9" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties9'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET NINE = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TEN from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(11) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties10" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties10'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TEN = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT ELEVEN from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ELEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(12) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties11" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties11'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ELEVEN = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TWELVE from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWELVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(13) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties12" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties12'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWELVE = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT THIRTEEN from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THIRTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(14) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties13" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties13'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THIRTEEN = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOURTEEN from KALENDARS where ID = 1" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOURTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(2) td:nth-child(15) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties14" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties14'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOURTEEN = ('$datubaze $izvele') where ID = 1");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
  </tr>
  <!--------------------------------------TABLE ROW ---------------------------------->
  <tr>
    <th>10:05-11:35 </th>
    <td>
    <?php $STH = $conn -> prepare( "SELECT ONE from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ONE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(2) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties15" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties15'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ONE = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
   </td>
   <td>
   <?php $STH = $conn -> prepare( "SELECT TWO from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWO"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(3) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties16" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties16'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWO = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>

     <td>
        <?php $STH = $conn -> prepare( "SELECT THREE from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THREE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(4) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties17" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties17'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THREE = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOUR from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOUR"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(5) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties18" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties18'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOUR = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FIVE from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FIVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(6) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties19" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties19'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FIVE = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SIX from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SIX"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(7) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties20" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties20'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SIX = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SEVEN from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(8) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties21" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties21'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SEVEN = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT EIGHT from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["EIGHT"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(9) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties22" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties22'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET EIGHT = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT NINE from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["NINE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(10) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties23" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties23'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET NINE = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TEN from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(11) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties24" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties24'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TEN = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT ELEVEN from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ELEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(12) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties25" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties25'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ELEVEN = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TWELVE from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWELVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(13) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties26" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties26'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWELVE = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT THIRTEEN from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THIRTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(14) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties27" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties27'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THIRTEEN = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOURTEEN from KALENDARS where ID = 2" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOURTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(3) td:nth-child(15) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties28" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties28'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOURTEEN = ('$datubaze $izvele') where ID = 2");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
  </tr>
  <!---------------------------------------------------->
  <tr>
    <th>11:40-13:10</th>
        <td>
    <?php $STH = $conn -> prepare( "SELECT ONE from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ONE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(2) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties29" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties29'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ONE = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
   </td>
   <td>
   <?php $STH = $conn -> prepare( "SELECT TWO from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWO"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(3) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties30" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties30'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWO = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>

     <td>
        <?php $STH = $conn -> prepare( "SELECT THREE from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THREE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(4) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties31" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties31'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THREE = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOUR from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOUR"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(5) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties32" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties32'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOUR = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FIVE from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FIVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(6) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties33" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties33'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FIVE = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SIX from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SIX"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(7) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties34" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties34'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SIX = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SEVEN from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(8) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties35" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties35'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SEVEN = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT EIGHT from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["EIGHT"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(9) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties36" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties36'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET EIGHT = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT NINE from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["NINE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(10) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties37" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties37'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET NINE = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TEN from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(11) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties38" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties38'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TEN = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT ELEVEN from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ELEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(12) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties39" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties39'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ELEVEN = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TWELVE from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWELVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(13) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties40" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties40'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWELVE = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT THIRTEEN from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THIRTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(14) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties41" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties41'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THIRTEEN = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOURTEEN from KALENDARS where ID = 3" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOURTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(4) td:nth-child(15) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties42" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties42'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOURTEEN = ('$datubaze $izvele') where ID = 3");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
  </tr>
  <!---------------------------------------------------------->
  <tr>
    <th>13:15-14:45</th>
        <td>
    <?php $STH = $conn -> prepare( "SELECT ONE from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ONE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(2) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties43" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties43'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ONE = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
   </td>
   <td>
   <?php $STH = $conn -> prepare( "SELECT TWO from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWO"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(3) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties44" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties44'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWO = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>

     <td>
        <?php $STH = $conn -> prepare( "SELECT THREE from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THREE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(4) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties45" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties45'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THREE = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOUR from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOUR"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(5) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties46" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties46'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOUR = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FIVE from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FIVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(6) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties47" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties47'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FIVE = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SIX from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SIX"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(7) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties48" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties48'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SIX = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SEVEN from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(8) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties49" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties49'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SEVEN = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT EIGHT from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["EIGHT"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(9) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties50" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties50'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET EIGHT = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT NINE from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["NINE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(10) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties21" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties51'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET NINE = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TEN from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(11) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties52" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties52'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TEN = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT ELEVEN from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ELEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(12) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties53" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties53'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ELEVEN = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TWELVE from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWELVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(13) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties54" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties54'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWELVE = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT THIRTEEN from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THIRTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(14) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties55" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties55'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THIRTEEN = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOURTEEN from KALENDARS where ID = 4" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOURTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(5) td:nth-child(15) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties56" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties56'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOURTEEN = ('$datubaze $izvele') where ID = 4");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
  </tr>
  <!-------------------------------------------------------------->
  <tr>
    <th>14:50-16:20</th>
        <td>
    <?php $STH = $conn -> prepare( "SELECT ONE from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ONE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(2) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties57" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties57'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ONE = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
   </td>
   <td>
   <?php $STH = $conn -> prepare( "SELECT TWO from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWO"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(3) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties58" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties58'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWO = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>

     <td>
        <?php $STH = $conn -> prepare( "SELECT THREE from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THREE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(4) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties59" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties59'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THREE = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOUR from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOUR"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(5) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties60" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties60'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOUR = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FIVE from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FIVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(6) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties61" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties61'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FIVE = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SIX from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SIX"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(7) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties62" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties62'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SIX = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SEVEN from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(8) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties63" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties63'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SEVEN = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT EIGHT from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["EIGHT"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(9) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties64" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties64'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET EIGHT = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT NINE from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["NINE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(10) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties65" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties65'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET NINE = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TEN from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(11) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties66" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties66'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TEN = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT ELEVEN from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ELEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(12) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties67" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties67'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ELEVEN = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TWELVE from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWELVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(13) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties68" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties68'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWELVE = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT THIRTEEN from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THIRTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(14) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties69" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties69'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THIRTEEN = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOURTEEN from KALENDARS where ID = 5" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOURTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(6) td:nth-child(15) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties70" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties70'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOURTEEN = ('$datubaze $izvele') where ID = 5");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
  </tr>
  <!---------------------------------------------------------------->
  <tr>
    <th>16:25-17:55</th>
    <td>
    <?php $STH = $conn -> prepare( "SELECT ONE from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ONE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(2) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties71" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties71'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ONE = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
   </td>
   <td>
   <?php $STH = $conn -> prepare( "SELECT TWO from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWO"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(3) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties72" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties72'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWO = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>

     <td>
        <?php $STH = $conn -> prepare( "SELECT THREE from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THREE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(4) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties73" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties73'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THREE = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOUR from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOUR"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(5) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties74" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties74'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOUR = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FIVE from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FIVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(6) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties75" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties75'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FIVE = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SIX from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SIX"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(7) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties76" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties76'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SIX = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SEVEN from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(8) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties77" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties77'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SEVEN = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT EIGHT from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["EIGHT"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(9) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties78" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties78'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET EIGHT = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT NINE from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["NINE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(10) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties79" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties79'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET NINE = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TEN from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(11) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties80" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties80'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TEN = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT ELEVEN from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ELEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(12) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties81" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties81'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ELEVEN = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TWELVE from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWELVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(13) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties82" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties82'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWELVE = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT THIRTEEN from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THIRTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(14) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties83" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties83'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THIRTEEN = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOURTEEN from KALENDARS where ID = 6" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOURTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(7) td:nth-child(15) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties84" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties84'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOURTEEN = ('$datubaze $izvele') where ID = 6");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
  </tr>
  <!---------------------------------------->
  <tr>
    <th>18:00-19:30</th>
        <td>
    <?php $STH = $conn -> prepare( "SELECT ONE from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ONE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(2) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties85" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties85'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ONE = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
   </td>
   <td>
   <?php $STH = $conn -> prepare( "SELECT TWO from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWO"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(3) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties86" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties86'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWO = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>

     <td>
        <?php $STH = $conn -> prepare( "SELECT THREE from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THREE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(4) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties87" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties87'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THREE = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOUR from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOUR"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(5) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties88" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties88'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOUR = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FIVE from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FIVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(6) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties89" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties89'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FIVE = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SIX from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SIX"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(7) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties90" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties90'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SIX = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT SEVEN from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["SEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(8) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties91" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties91'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET SEVEN = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT EIGHT from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["EIGHT"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(9) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties92" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties92'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET EIGHT = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT NINE from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["NINE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(10) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties93" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties93'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET NINE = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TEN from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(11) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties94" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties94'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TEN = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT ELEVEN from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["ELEVEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(12) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties95" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties95'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET ELEVEN = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT TWELVE from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["TWELVE"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(13) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties96" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties96'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET TWELVE = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT THIRTEEN from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["THIRTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(14) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties97" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties97'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET THIRTEEN = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
     <td>
     <?php $STH = $conn -> prepare( "SELECT FOURTEEN from KALENDARS where ID = 7" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ){}
    $datubaze = $row["FOURTEEN"];
    $izvele = $_COOKIE['Uzvards'];
    if (stripos($datubaze, $izvele) !== false):
    else:?>
    <style>
   .kalendars tr:nth-child(8) td:nth-child(15) {
   background-color: #66ff33;}
   </style>
   <form method="POST">
   <button name="pieteikties98" id="pieteikties" type="submit" class="link">Piet.</button>
   </form>
   <?php endif ;
   if (isset($_POST['pieteikties98'])) {    
      $STH = $conn -> prepare("UPDATE KALENDARS SET FOURTEEN = ('$datubaze $izvele') where ID = 7");
      $STH -> execute();echo "<script>modal.style.display = \"block\";</script>";} ?>
     </td>
  </tr>
</table>
</div>
</div>
</div>
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
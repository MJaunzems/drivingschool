<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="logo_1_small.png">
 <link rel="stylesheet" href="test_styles.css">
 <link href="progress_bar.css" rel="stylesheet" />
  <title>Mans profils</title>
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


<?php
if ($_COOKIE["nomainit"] == "true"):
?>
<style>
.modal{
    display:block;
}
</style>
<?php 
endif;
?>

<style>

.modal p{
    display: inline;

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

  ?>


<div class="row">

  <div class="col-9 col-s-2 menu">   
  <img src="logo_1_alternate.png">
  </div>
  <div class="col-7 col-s-2 menu">
  <h1>Mans profils</h1>
  </div>
    <div class="col-9 col-s-2 menu">
    <div class="logout">
    <a href="/index.php">Iziet</a>
    </div>
    </div>
  </div>
  <style>
 @media only screen and (min-width: 600px) {

    body {
        grid-template-rows: auto auto auto 1fr auto;
    }
}
    input[type=submit]{
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
    input[type=submit]:hover{
    background-color: #db545a;
    color: white;
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
}

    </style>

  <div class="row">

     <div class="col-5 col-s-2 menu"></div>

   <div class="col-15 col-s-2 menu">

 <div class="nav">
 <div class="navigation"> <a class="active" href="/profils.php">Mans profils</a></div>
 <div class="navigation"> <a href="/teor_nodarb.php">Teorētiskās nodarbības</a></div>
 <div class="navigation"> <a href="/brauks_nodarb.php">Braukšanas nodarbības</a></div>
 <div class="navigation"> <a href="/apmaksa.php">Pakalpojumu apmaksa</a></div>
</div>
</div>
</div>
<div class="row">

    <div class="col-25 col-s-2 menu"></div>
    </div>

    <?php
    $sql = 'SELECT vards, uzvards, epasts, personas_kods, numurs FROM LIETOTAJI where personas_kods = '. "'" . $_COOKIE["user"] . "'";
    $array = array();
    foreach($conn->query($sql) as $row){
    $array[] = $row;
    }
    ?>

    <?php
        if (isset($_POST['done'])){
            $hash = password_hash( $_POST["parole"] , PASSWORD_DEFAULT );
            $sql = 'UPDATE LIETOTAJI set parole = '. "'" . $hash . "'" . ' WHERE personas_kods = '. "'" . $_COOKIE["user"] . "'";
            $conn->query($sql);
            setcookie("nomainit", "true", time() + (86400 * 30), "/");
            echo "<meta http-equiv='refresh' content='0'>";
            }
      ?>

<div class="row">
<div class="col-5 col-s-2 menu"></div>
<div class="col-4 col-s-2 menu">

<?php

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["foto"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database UPDATE APMAKSA SET APM_'. $_COOKIE["pakalpojums"] .' = 1 where personas_kods = '. "'" . $_COOKIE["user"] . "'"
            $insert = $conn->query('UPDATE foto set image = '. "'" . $fileName . "'" . 'where personas_kods = '. "'" . $_COOKIE["user"] . "'");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                header("Refresh:0");
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
?>



<?php

// Get images from the database
    $STH = $conn->prepare('SELECT image FROM foto where personas_kods = '. "'" . $_COOKIE["user"] . "'");
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ) {
        $imageURL = 'uploads/'.$row["IMAGE"];
    }

    if($row["IMAGE"] != 0):

?>



<div class="foto"><img style="  border-style: solid; border-color: black;" <img src="<?php echo $imageURL; ?>" alt="" width="100%" height="auto"></div>

<?php

else:
?>

<div class="foto"><img style="  border-style: solid; border-color: black;" <img src= "anonymous-user.png" alt="Anon" width="100%" height="auto"></div>
<?php

endif;

?>
<div class="upload">
<form method="POST" enctype="multipart/form-data">
  <div class="error"><p><?=$statusMsg?></p></div>
  <input type="file" id="file" name="file" accept="image/*">
  <input name="foto" type="submit">
</form>
</div></div>





<div class="col-6 col-s-2 menu">
<div class="info">
<h3><?= $array[0]['VARDS']." ".$array[0]['UZVARDS']; ?></h3>
<p>💳 Personas kods: <?=$array[0]['PERSONAS_KODS']?></p>
<p>📝 Līguma noslēgšanas datums: 01/01/2022</p>
<p>📄 Līguma beigšanas datums: 01/01/2023</p>
<p>📱 Tel.nr +371 <?=$array[0]['NUMURS']?></p>
<p>📧 E-pasts: <?=$array[0]['EPASTS']?></p>

<?php

   if (isset($_POST['button4'])):?> 


    <form method="post">   
<label style="font-weight: bold;color:red;">Ievadiet jauno paroli
<input pattern=".{8,}" title="Eight or more characters" id="parole_maina" type="password" name="parole" required /></label> 


    <input type="submit" value="Mainīt paroli" name="done" id="done"></form>
         
      
      <style>
      #mainit{
          display:none;
      }
      #done{
          float:right;
      }
      </style>
      
      <?php endif;
        ?>

        <?php
        $sql = 'SELECT APM_1, APM_2, APM_3, APM_4, APM_5, APM_6, APM_7 FROM APMAKSA where personas_kods = '. "'" . $_COOKIE["user"] . "'";
        $arr = array();
        foreach($conn->query($sql) as $row){
        $arr[] = $row;
        }
        ?>



<form method="POST"><input type="submit" style="text-decoration: none;" id="mainit" name="button4" class="button" value="Mainīt paroli"></form>
</div>
</div>
<div class="col-6 col-s-2 menu">
<h3>Pakalpojumu apmaksas progress</h3>
<p><label><input type="checkbox" disabled="disabled"  id="checkBox" <?php echo ($arr[0]['APM_1']==1 ? 'checked' : '');?> >Teorijas kurss 15.00 €</label></p>
<p><label><input type="checkbox" disabled="disabled"  id="checkBox" <?php echo ($arr[0]['APM_2']==1 ? 'checked' : '');?> >Apmācības karte 10.00 €</label></p>
<p><label><input type="checkbox" disabled="disabled"  id="checkBox" <?php echo ($arr[0]['APM_3']==1 ? 'checked' : '');?> >Pirmās palīdzības kurss 55.00 €</label></p>
<p><label><input type="checkbox" disabled="disabled"  id="checkBox" <?php echo ($arr[0]['APM_4']==1 ? 'checked' : '');?> >Medicīniskā komisija 35.00 €</label></p>
<p><label><input type="checkbox" disabled="disabled"  id="checkBox" <?php echo ($arr[0]['APM_5']==1 ? 'checked' : '');?> >Braukšanas nodarbības (45min) 18.00 €</label></p>
<p><label><input type="checkbox" disabled="disabled"  id="checkBox" <?php echo ($arr[0]['APM_6']==1 ? 'checked' : '');?> >Teorijas eksāmens (trīs mēģinājumi) 6.00 €</label></p>
<p><label><input type="checkbox" disabled="disabled"  id="checkBox" <?php echo ($arr[0]['APM_7']==1 ? 'checked' : '');?> >Braukšanas eksāmens (viens mēģinājums) 34.00 € </label></p>
</div>
</div>
</div>


  <div class="row">
  <div class="col-5 col-s-2 menu"></div>

   <div class="col-15 col-s-2 menu">

   <div class="progress-bar-wrapper"></div>
<script src="progress_bar.js"></script>
<script src="app.js"></script>


   </div>
   </div>

   
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <div class="modal-header">
    <h2>Apstiprinājums</h2></div>
    <div class="modal-body">
    <p>Parole veiksmīgi nomainīta!</p></div>
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
  document.cookie = "nomainit=false";
    location.reload();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    document.cookie = "nomainit=false";
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
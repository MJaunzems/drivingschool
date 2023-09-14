<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="logo_1_small.png">
 <link rel="stylesheet" href="test_styles.css">
 <title>Autorizācija</title>
</head>
<body>

  <img src="logo_1_alternate.png">

<div class="row">
  <div class="col-9 col-s-2 menu">

      
  </div>



  <div class="col-7 col-s-9">
<!--<div class="image"><img src="shadow.png"></div>-->
    <div class="main">

    <h1>Autorizācija</h1>
    <form method="post">
    Personas kods<br><input type="text" name="pers_kods">
    <div class="Parole">Parole<br><input type="password"  name="parole"></div>

    <span id="login_failed"></span>

    <div class="Pogas">
    <div class="register"><input type="submit" name="button1" value="Ieiet"</input></div>
    <input type="submit" name="button2" value="Reģistrēties"</>

    </div>

    </form>
    </div>
  </div>



  <div class="col-9 col-s-2 menu">
  </div>
</div>
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


 // set the PDO error mode to exception
  /*try{

  
  //sql to drop table
  $sql = "drop table EMAIL_VALID";
  $conn->query($sql);
  echo "Table email_valid dropped";
  echo "<br>";
  }catch(Exception $ignored){
  }

 // sql to create table
  $sql = "CREATE TABLE email_valid( 
  eid numeric(11)   NOT NULL,
  email varchar2(255) NOT NULL UNIQUE,
  password varchar2(255) NOT NULL,
  activation varchar2(255) NOT NULL UNIQUE,
  personas_kods varchar2(255) NOT NULL UNIQUE,
  PRIMARY KEY (eid)
 )";

  $conn->query($sql);
  echo "Table email_valid created successfully";
  echo "<br>";
  // sql to insert
  
  $hash = password_hash( 'johnskitchen' , PASSWORD_DEFAULT );
  $sql = "INSERT INTO email_valid (eid, email, password, activation, personas_kods)
  VALUES (1,'john@example.com', '$hash', 'doddd', '210201-10205')";
  
  //$return = $conn->query($sql);
  $conn->query($sql);
  echo "New record created successfully";
  echo "<br>";
  
*/
/*
    $statement = $conn->prepare("SELECT email FROM email_valid");
    $statement->execute(array());
    while($row = $statement->fetchAll(PDO::FETCH_ASSOC)){
        $email = $row['EMAIL'];
        echo "$email is here<br>";
    }
    
    */
    /*
    $STH = $conn -> prepare( "SELECT email FROM email_valid" );
    $STH -> execute();
    $result = $STH -> fetchAll();
    foreach( $result as $row ) {
        echo $row["EMAIL"];
}
*//*

    $sql = 'SELECT email FROM email_valid';
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            $data = $row[0] . "\n";
            print $data;
        }

        */

  if(isset($_POST['button1'])){

      if($_POST['pers_kods']!='' && $_POST['parole']!=''){
          /*
          $sql= "SELECT password FROM email_valid where personas_kods = $_POST[pers_kods]";
          foreach($conn->query($sql) as $row) {
	          //echo $row['PASSWORD']." - ".$row['PERSONAS_KODS']."<br>";
	          echo $row['PASSWORD']."<br>";
              //$hash = password_hash( $row['PASSWORD'] , PASSWORD_DEFAULT );
              $hash = $row['PASSWORD'];
          }
          */
          try{
                $usersPersKods = $_POST['pers_kods'];
                $STH = $conn -> prepare( "SELECT parole FROM LIETOTAJI where personas_kods = " . "'" . $usersPersKods . "'" );
                $STH -> execute();
                $result = $STH -> fetchAll();
                foreach( $result as $row ) {
                    $hash = $row['PAROLE'];
                }
                $usersPassword = $_POST['parole'];
                $valid = password_verify ( $usersPassword, $hash );
                if ( $valid ) {
                if ( password_needs_rehash ( $hash, PASSWORD_DEFAULT ) ) {
                     $newHash = password_hash( $usersPassword, PASSWORD_DEFAULT );
                     /* UPDATE the user's row in `log_user` to store $newHash */
                     $sql = 'UPDATE LIETOTAJI SET parole = ' . "'" . $newHash . "'" . ' where personas_kods = ' . "'" . $usersPersKods . "'";
                     $conn->query($sql);
                }
                   /* log the user in, have fun! */

                      $cookie_name = "user";
                      $cookie_value = $usersPersKods;
                      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

                   header("Location: /profils.php", true, 301);
                }
                else {
                   /* tell the would-be user the username/password combo is invalid */
                   ?>
          <script>
          document.getElementById("login_failed").innerHTML = "Nepareizi ievadīts personas kods un/vai parole!";
          </script>

      <?php
                } 
          }
          catch(Exception $e){
              ?>
          <script>
          document.getElementById("login_failed").innerHTML = "Nepieciešams aizpildīt abus laukus!";
          </script>

      <?php
          }
      }else{
          ?>
          <script>
          document.getElementById("login_failed").innerHTML = "Nepieciešams aizpildīt abus laukus!";
          </script>
      <?php
          //echo "Please input info!";
      }
  }
    
  if(isset($_POST['button2'])){

      header("Location: /registration.php");


  }

    $conn = null;
?>



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
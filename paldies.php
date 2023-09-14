<html>
<head>
 <meta charset="UTF-8">
 <link rel="icon" href="logo_1_small.png">
 <link rel="stylesheet" href="styles.css">
</head>
<body>
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

<!--Welcome <?php echo $_POST["pers_kods"]; ?><br>
Your email address is: <?php echo $_POST["parole"]; ?>
-->





</body>
</html>

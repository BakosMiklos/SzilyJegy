<?php
include("kapcs.inc.php");
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználó típus</title>
</head>
<body>
    <?php
    if(!isset($_SESSION['nev']))
    {   
        print("<a href='regisztracioAltalanos.php'>Általános fiók</a><br>");
        print("<a href='regisztracioSzervezo.php'>Szervezői fiók</a>");
    }
    ?>
</body>
</html>
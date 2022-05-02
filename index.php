<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="header/styleHeader.css">
  <link rel="stylesheet" href="footer/footerStyle.css">
  <link rel="stylesheet" href="suti/style.css">
  <link rel="stylesheet" href="scrollbarStyle.css">
  <link rel="stylesheet" href="indexStyle.css">
  <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Főoldal</title>
</head>
<body>

<?php
// Kapcsolódás az adatbátishoz - 'szilyjegy'
require("kapcs.inc.php");

// Fejléc
include("header.php");

// 
if(isset($_POST['rendezvenyeim']))
{
  include("rendezvenyeim.php");
}
else
{
  if($_GET['megye']!="")
  {
    include("megyek.php");
  }
  else
  {
    include("rendezveny.php");
  }
}

// Lábléc / coockie
include("footer.php");
include("suti/suti.html");
?>

<script src="suti/main.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>

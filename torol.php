<?php
include("kapcs.inc.php");

$query = "DELETE FROM `rendezvenyek` WHERE  `rendezvenyek`.`rendezvenyID` = ". $_GET['torol'];
mysqli_query($con,$query) or die ('Hiba az adattörlésnél!');

print("<script>window.location.href = 'index.php';</script>");
?>

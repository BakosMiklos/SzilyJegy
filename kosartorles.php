<?php
include("kapcs.inc.php");

$query = "DELETE FROM `kosar` WHERE  `kosar`.`rendezvenyID` = ". $_GET['id'];
mysqli_query($con,$query) or die ('Hiba az adattörlésnél!');

print("<script>window.location.href = history.back();</script>");
?>

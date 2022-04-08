<?php
// $con = mysqli_connect("localhost","madayweb","madayweb123","vizsga");
$con = mysqli_connect("localhost","root","","szilyjegy");

if (mysqli_connect_errno())
{
    print( "Adatbázis kapcsolódási hiba!  " . mysqli_connect_error());
}
?>
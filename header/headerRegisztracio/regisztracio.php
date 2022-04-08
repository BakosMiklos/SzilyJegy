<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <meta name="viewport" content="width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Regisztráció</title>
</head>
<body>
<?php
error_reporting(0);
include("kapcs.inc.php");
?>
<div id="altalanosReg">
<button id="szervezo" class="btn btn-outline-success gomb">Szervezőként szeretnék regisztrálni</button>
<form method="post">
    <div>
        <input type='text' name='vez_nev' placeholder='Vezetéknév'><br><br>
        <input type='text' name='ker_nev' placeholder='Keresztnév'><br><br>
        <input type='email' name='email_cim' placeholder='Email'><br><br>
        <input type='password' name='jelszo1' placeholder='Jelszó'><br><br>
        <input type='password' name='jelszo2' placeholder='Jelszó mégegyszer'><br><br>
        <input type='text' name='tel_szam' placeholder='Telefonszám'><br><br>
        <input type='text' name='ir_szam' placeholder='Irányítószám'><br><br>
        <input type='text' name='megye' placeholder='Megye'><br><br>
        <input type='text' name='varos' placeholder='Város'><br><br>
        <input type='text' name='cim' placeholder='Cím'><br><br>
    </div>
    <!-- Gomb -->
    <div>
        <input type='submit' name='gombAltalanos' value='Regisztrálás'>
        <!-- Vissza -->
        <a href='javascript://' onclick='history.back();'>Vissza</a>
    </div>
</form>

</div>

<div id="szervezoReg">
<button id="vasarlo" class="btn btn-outline-success gomb">Általános vásárlóként szeretnék regisztrálni</button>
<form method="post">
    <div>
        <input type='text' name='szerv_nev' placeholder='Szervezet neve'><br><br>
        <input type='email' name='email_cim' placeholder='Email'><br><br>
        <input type='password' name='jelszo1' placeholder='Jelszó' ><br><br>
        <input type='password' name='jelszo2' placeholder='Jelszó mégegyszer'><br><br>
        <input type='text' name='tel_szam' placeholder='Telefonszám'><br><br>
        <input type='text' name='mobil_szam' placeholder='Mobilszám'><br><br>
        <input type='text' name='ir_szam' placeholder='Irányítószám'><br><br>
        <input type='text' name='megye' placeholder='Megye'><br><br>
        <input type='text' name='varos' placeholder='Város'><br><br>
        <input type='text' name='cim' placeholder='Cím'><br><br>
    </div>
    <!-- Gomb -->
    <div>
        <input type='submit' name='gombSzervezo' value='Regisztrálás'>
        <!-- Vissza -->
        <a href='javascript://' onclick='history.back();'>Vissza</a>
    </div>
</form>
</div>
<?php
if(isset($_POST['gombAltalanos']))
{
    $vez_nev = $_POST['vez_nev'];
    $ker_nev = $_POST['ker_nev'];
    $email_cim = $_POST['email_cim'];
    $jelszo1 = $_POST['jelszo1'];
    $jelszo2 = $_POST['jelszo2'];
    $secure_pass = md5($jelszo1);
    $tel_szam = $_POST['tel_szam'];
    $ir_szam = $_POST['ir_szam'];
    $megye = $_POST['megye'];
    $varos = $_POST['varos'];
    $cim = $_POST['cim'];

    if(isset($_POST['gombAltalanos'])) {
        if($vez_nev == NULL || $ker_nev == NULL || $email_cim == NULL || $jelszo1 == NULL || $jelszo2 == NULL || 
          $tel_szam == NULL || $ir_szam == NULL || $megye == NULL     || $varos == NULL   || $cim == NULL)
        {
            print("<a href='javascript://' onclick='history.back();'>Üres mező!</a>");
        }
        else
        {
            if($jelszo1 != $jelszo2){
                print("<a href='javascript://' onclick='history.back();'>Nem egyeznek a jelszavak!</a>");
            }
            else
            {
                $sql = "SELECT * FROM vasarlo WHERE email='$email_cim' LIMIT 1";
                $result = mysqli_query($con, $sql);
                $felhasznalo = mysqli_fetch_assoc($result);

                if($felhasznalo){
                    if($felhasznalo['email'] === $email_cim)
                    {
                        print("<a href='javascript://' onclick='history.back();'>Ezzel az email címmel már regisztráltak!</a>");
                    }
                }
                else
                {
                    $con->query("SET NAMES utf8");
                    $query = "INSERT INTO vasarlo (email, jelszo, vezetekNev, keresztNev, telefonSzam, megye, varos, irSzam, cim)
                              VALUES ('$email_cim', '$secure_pass', '$vez_nev', '$ker_nev', '$tel_szam', '$megye', '$varos', '$ir_szam', '$cim')";
                    mysqli_query($con,$query) or die ("<a href='javascript://' onclick='history.back();'>Hiba az adatbevitelnél!</a>");
                    print("Sikeres regisztráció!<br>");
                    print("<script>window.location.href = '../../index.php';</script>");
                }
            } 
        }
    }
}

if(isset($_POST['gombSzervezo']))
{
    $szerv_nev = $_POST['szerv_nev'];
    $email_cim = $_POST['email_cim'];
    $jelszo1 = $_POST['jelszo1'];
    $jelszo2 = $_POST['jelszo2'];
    $secure_pass = md5($jelszo1);
    $tel_szam = $_POST['tel_szam'];
    $mobil_szam = $_POST['mobil_szam'];
    $ir_szam = $_POST['ir_szam'];
    $megye = $_POST['megye'];
    $varos = $_POST['varos'];
    $cim = $_POST['cim'];

    if(isset($_POST['gombSzervezo'])) {
        if($szerv_nev == NULL || $email_cim == NULL || $jelszo1 == NULL || $jelszo2 == NULL || 
          $tel_szam == NULL   || $mobil_szam  == NULL|| $ir_szam == NULL|| $megye == NULL   || 
          $varos == NULL      || $cim == NULL)
        {
            print("<a href='javascript://' onclick='history.back();'>Üres mező!</a>");
        }
        else
        {
            if($jelszo1 != $jelszo2){
                print("<a href='javascript://' onclick='history.back();'>Nem egyeznek a jelszavak!</a>");
            }
            else
            {
                $sql = "SELECT * FROM vasarlo WHERE email='$email_cim' LIMIT 1";
                $result = mysqli_query($con, $sql);
                $felhasznalo = mysqli_fetch_assoc($result);

                if($felhasznalo){
                    if($felhasznalo['email'] === $email_cim)
                    {
                        print("<a href='javascript://' onclick='history.back();'>Ezzel az email címmel már regisztráltak!</a>");
                    }
                }
                else
                {
                    $con->query("SET NAMES utf8");
                    $query = "INSERT INTO szervezok (email, jelszo, szervezetNev, telefonSzam, mobilSzam, megye, varos, irSzam, cim)
                              VALUES ('$email_cim', '$secure_pass', '$szerv_nev', '$tel_szam', '$mobil_szam', '$megye', '$varos', '$ir_szam', '$cim')";
                    mysqli_query($con,$query) or die ("<a href='javascript://' onclick='history.back();'>Hiba az adatbevitelnél!</a>");
                    print("Sikeres regisztráció!<br>");
                    print("<script>window.location.href = '../../index.php';</script>");
                }
            } 
        }
    }
}
?>
<script src="regisztracio_segito.js"></script>
<script src="../../js/bootstrap.js"></script>
</body>
</html>
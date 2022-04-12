<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="regisztracioStyle.css">
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

<!-- Általános űrlap -->
<div id="altalanosReg">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;" id="kartya_bg">
                        <div class="card-body p-5">
                            <h4 class="text-uppercase text-center mb-5">Hozzon létre egy Vásárlói fiókot
                            <button id="szervezo" class="btn btn-outline-success gomb btn-sm">Szervezőként szeretnék regisztrálni</button>
                            </h4>

                            <!-- Általános inputok -->
                            <form method="post">
                                <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                    <input type='text' name='vez_nev' placeholder='Vezetéknév' id="form3Example1cg" class="form-control form-control-sm">&emsp;
                                    <input type='text' name='ker_nev' placeholder='Keresztnév' id="form3Example3cg" class="form-control form-control-sm">
                                </div>
                                <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                    <input type='email cím' name='email_cim' placeholder='Email' id="form3Example1cg" class="form-control form-control-sm">&emsp;
                                    <input type='text' name='cim' placeholder='Cím' id="form3Example3cg" class="form-control form-control-sm">
                                </div>
                                <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                    <input type='password' name='jelszo1' placeholder='Jelszó' id="form3Example3cg" class="form-control form-control-sm">&emsp;
                                    <input type='password' name='jelszo2' placeholder='Jelszó mégegyszer' id="form3Example1cg" class="form-control form-control-sm">
                                </div>
                                <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                    <input type='text' name='tel_szam' placeholder='Telefonszám' id="form3Example3cg" class="form-control form-control-sm">&emsp;
                                    <input type='text' name='ir_szam' placeholder='Irányítószám' id="form3Example1cg" class="form-control form-control-sm">
                                </div>
                                <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                    <input type='text' name='megye' placeholder='Megye' id="form3Example3cg" class="form-control form-control-sm">&emsp;
                                    <input type='text' name='varos' placeholder='Város' id="form3Example1cg" class="form-control form-control-sm">
                                </div>

                                <!-- Általános Szerződési Feltétel -->
                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input
                                        class="form-check-input me-2"
                                        type="checkbox"
                                        value=""
                                        id="form2Example3cg"
                                    />

                                    <label class="form-check-label" for="form2Example3g">
                                        Elfogadom az <a href="#!" class="text-body"><u>Általános Szerződési Feltételeket</u></a>
                                    </label>
                                </div>

                                <!-- Regisztráció gomb -->
                                <div class="d-flex justify-content-center">
                                    <button type='submit' name='gombAltalanos' class="btn btn-success btn-block btn-sm gradient-custom-4 text-body">Regisztráció</button>
                                </div>
                            </form>

                            <!-- Vissza gomb -->
                            <a href='../../index.php' class="btn btn-outline-success gomb btn-sm">Vissza</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Szervező űrlap -->
<div id="szervezoReg">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;" id="kartya_bg">
                        <div class="card-body p-5">
                            <h4 class="text-uppercase text-center mb-5">Hozzon létre egy szervezői fiókot
                            <button id="vasarlo" class="btn btn-outline-success gomb btn-sm">Általános vásárlóként szeretnék regisztrálni</button>
                            </h4>

                            <!-- Általános inputok -->
                            <form method="post">
                                <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                    <input type='text' name='szerv_nev' placeholder='Szervezet neve' id="form3Example1cg" class="form-control form-control-sm">&emsp;
                                    <input type='email' name='email_cim' placeholder='Email' id="form3Example1cg" class="form-control form-control-sm">
                                </div>
                                <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                    <input type='password' name='jelszo1' placeholder='Jelszó' id="form3Example3cg" class="form-control form-control-sm">&emsp;
                                    <input type='password' name='jelszo2' placeholder='Jelszó mégegyszer' id="form3Example1cg" class="form-control form-control-sm">
                                </div>
                                <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                    <input type='text' name='tel_szam' placeholder='Telefonszám' id="form3Example3cg" class="form-control form-control-sm">&emsp;
                                    <input type='text' name='mobil_szam' placeholder='Mobilszám' id="form3Example3cg" class="form-control form-control-sm">
                                </div>
                                <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                    <input type='text' name='ir_szam' placeholder='Irányítószám' id="form3Example1cg" class="form-control form-control-sm">&emsp;
                                    <input type='text' name='megye' placeholder='Megye' id="form3Example3cg" class="form-control form-control-sm">
                                </div>
                                <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                    <input type='text' name='varos' placeholder='Város' id="form3Example1cg" class="form-control form-control-sm">&emsp;
                                    <input type='text' name='cim' placeholder='Cím' id="form3Example3cg" class="form-control form-control-sm">
                                </div>

                                <!-- Általános Szerződési Feltétel -->
                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input
                                        class="form-check-input me-2"
                                        type="checkbox"
                                        value=""
                                        id="form2Example3cg"
                                    />

                                    <label class="form-check-label" for="form2Example3g">
                                        Elfogadom az <a href="#!" class="text-body"><u>Általános Szerződési Feltételeket</u></a>
                                    </label>
                                </div>

                                <!-- Regisztráció gomb -->
                                <div class="d-flex justify-content-center">
                                    <button type='submit' name='gombSzervezo' class="btn btn-success btn-block btn-sm gradient-custom-4 text-body">Regisztráció</button>
                                </div>
                            </form>

                            <!-- Vissza gomb -->
                            <a href='../../index.php' class="btn btn-outline-success gomb btn-sm">Vissza</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
           $tel_szam == NULL|| $ir_szam == NULL || $megye == NULL     || $varos == NULL   || $cim == NULL)
        {
            ?>
            <a href='javascript://' onclick='history.back();'>Üres mező!</a>
            <?php
        }
        else
        {
            if($jelszo1 != $jelszo2){
                ?>
                <a href='javascript://' onclick='history.back();'>Nem egyeznek a jelszavak!</a>
                <?php
            }
            else
            {
                $sql = "SELECT * FROM vasarlo WHERE email='$email_cim' LIMIT 1";
                $result = mysqli_query($con, $sql);
                $felhasznalo = mysqli_fetch_assoc($result);

                if($felhasznalo){
                    if($felhasznalo['email'] === $email_cim)
                    {
                        ?>
                        <a href='javascript://' onclick='history.back();'>Ezzel az email címmel már regisztráltak!</a>
                        <?php
                    }
                }
                else
                {
                    $con->query("SET NAMES utf8");
                    $query = "INSERT INTO vasarlo (email, jelszo, vezetekNev, keresztNev, telefonSzam, megye, varos, irSzam, cim)
                              VALUES ('$email_cim', '$secure_pass', '$vez_nev', '$ker_nev', '$tel_szam', '$megye', '$varos', '$ir_szam', '$cim')";
                    mysqli_query($con,$query) or die ("<a href='javascript://' onclick='history.back();'>Hiba az adatbevitelnél!</a>");
                    ?>
                    Sikeres regisztráció!<br>
                    <script>window.location.href = '../../index.php'</script>
                    <?php
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
           $tel_szam == NULL  || $mobil_szam  == NULL|| $ir_szam == NULL|| $megye == NULL   || 
           $varos == NULL     || $cim == NULL)
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
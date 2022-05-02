<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="header/headerRegisztracio/regisztracioStyle.css">
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

  <style>
        #altalanosReg {
            margin-bottom: 1.8%;
        }
    </style>
</head>
<body>

<?php
// Kapcsolódás az adatbátishoz - 'szilyjegy'
require("kapcs.inc.php");

// Fejléc
include("header.php");
?>
<div id="altalanosReg">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;" id="kartya_bg">
                        <div class="card-body p-5">
                            <h4>Jelszó beállítás</h4>
                            <form method="post">
                                <div class="form-outline mb-4 justify-content-center kartya_szele">
                                    <p>Kérem adja meg az email címét</p>
                                    <input type="email" name="email" placeholder="Email"><br><br>
                                </div>

                                <div class="form-outline mb-4 justify-content-center kartya_szele">
                                    <p>Milyen típusú fiókod használtál eddig?</p>
                                    <select name="tabla">
                                        <option value="vasarlo">Vásárló</option>
                                        <option value="szervezo">Szervező</option>
                                    </select>
                                </div>
                                
                                <div class="form-outline mb-4 justify-content-center kartya_szele">
                                    <input type="submit" name="ujjelszokuld" value="Kérem az új email-t">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
use phpmailer\phpmailer\phpmailer;

if(isset($_POST['ujjelszokuld']))
{
    $email=$_POST['email'];
    $tabla=$_POST['tabla'];
    $secure_pass=md5("Ujjelszo123");

    $con->query("SET NAMES utf8");
    $query = "UPDATE `$tabla` SET `jelszo`='$secure_pass' WHERE email = '$email'";
    mysqli_query($con,$query) or die ('Hiba');

    require_once("phpmailer/phpmailer.php");
    require_once("phpmailer/smtp.php");
    require_once("phpmailer/exception.php");
    $mail = new phpmailer();

    //SMTP Beállítás
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->CharSet = 'UTF-8';
    $mail->Username = "noreplytous20@gmail.com";
    $mail->Password = "Ezegyjelszo123";
    $mail->Port = 465; //587
    $mail->SMTPSecure = "ssl"; //tls

    //Email Beállítás
    $mail->isHTML(true);
    $mail->setFrom($email, "SzilyJegy");
    $mail->addAddress($email);
    $mail->Subject = "Új jelszó";
    $mail->Body = "Jelszavadat sikeresen megváltoztattuk a következőre: Ujjelszo123 \n\n\n Belépés után változtasd meg!! \n\n\n SzilyJegy ";

    // Email küldés ellenörzése
    if(!$mail->Send())
    {
       echo "Hiba a levél küldésekor. Próbálja újra!";
       exit;
    }

    print("<script>window.location.href = 'index.php';</script>");
}

// Lábléc / coockie
include("footer.php");
include("suti/suti.html");
?>

<script src="suti/main.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
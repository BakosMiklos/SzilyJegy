<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--<link rel="stylesheet" href="rendezvenyek/bovebbenStyle.css"> -->
    <link rel="stylesheet" href="header/styleHeader.css">
    <link rel="stylesheet" href="scrollbarStyle.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Fizetés</title>

</head>
<body>
    <?php    
    use phpmailer\phpmailer\phpmailer;
    error_reporting(0);
    require("kapcs.inc.php");
    include("header.php");
    

    if($_GET["fizetes"]=="igen")
    {

        $products = "SELECT vasarloID, rendezvenyID, rendezveny, SUM(mennyiseg) AS 'darab', SUM(ar) AS 'fizetendo' FROM kosar WHERE vasarloID like '$id' GROUP BY rendezveny";
        $products_run = mysqli_query($con, $products);
        $osszeg = 0;
        if(mysqli_num_rows($products_run) > 0)
        {
            foreach($products_run as $proditems) :
                $osszeg = $osszeg + $proditems['fizetendo'];
                $darab = intval($proditems['darab'])*1;
                $rendezvenyID = $proditems['rendezvenyID'];
                $vasarloID = $proditems['vasarloID'];

                $rendezvenyek = "SELECT elerhetoJegyekSzama, eladottJegyekSzama FROM rendezvenyek WHERE rendezvenyID = ".$rendezvenyID;
                $rendezvenyek_run = mysqli_query($con, $products);
                if(mysqli_num_rows($rendezvenyek_run) > 0)
                {
                    foreach($rendezvenyek_run as $rendezvenyitemek) :
                        $elerhetojegyek = $rendezvenyitemek['elerhetoJegyekSzama'];
                        $eladottjegyek = $rendezvenyitemek['eladottJegyekSzama'];

                        $elerhetoJegyekSzama=(intval($elerhetojegyek)*1) - (intval($darab)*1);
                        $eladottJegyekSzama=(intval($eladottjegyek)*1) + (intval($darab)*1);

                        $con->query("SET NAMES utf8");
                        $query = "UPDATE `rendezvenyek` SET `elerhetoJegyekSzama`='$elerhetoJegyekSzama',`eladottJegyekSzama`='$eladottJegyekSzama' WHERE rendezvenyID = ".$rendezvenyID;      
                        mysqli_query($con,$query) or die ('Hiba az adatmódosításnál!');
                    endforeach;
                }

            endforeach;
        }


        $con->query("SET NAMES utf8");
        $query = "DELETE FROM kosar WHERE vasarloID = ".$vasarloID;      
        mysqli_query($con,$query) or die ('Hiba az adattörlésnél!');


        require_once("phpmailer/phpmailer.php");
        require_once("phpmailer/smtp.php");
        require_once("phpmailer/exception.php");
        $mail = new phpmailer();

        $email=$_SESSION['email'];

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
        $mail->Subject = "Sikeres fizetés";
        $mail->Body = "Köszönjük hogy nállunk vásároltál! \n Jó szórakozást a rendezvény(ek)hez!";

        // Email küldés ellenörzése
        if(!$mail->Send())
        {
           echo "Hiba a levél küldésekor. Próbálja újra!";
           exit;
        }
        print("<script>window.location.href = 'fizetes.php';</script>");
    }
    
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1>Sikeres fizetés</h1>

    <?php
    include("footer.php");
    ?>
    
<script src="js/bootstrap.js"></script>
</body>
</html>
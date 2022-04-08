<?php
// error_reporting(0);
if(!isset($_POST['gombSzervezo'])) {
    print("<div id=''>");
        print("<div>");
            print("<form action='regisztracioSzervezo.php' method='post'>");
    
                // Szervezői regisztráció
                print("<div>");
                    print("<label>");
                        print("Szervezői regisztráció");
                    print("</label>");
                print("</div>");
             
                // adatok
                print("<div>");
                    print("<input type='text' name='szerv_nev' placeholder='Szervezet neve'><br><br>");
                    print("<input type='email' name='email_cim' placeholder='Email' cím><br><br>");
                    print("<input type='password' name='jelszo1' placeholder='Jelszó' cím><br><br>");
                    print("<input type='password' name='jelszo2' placeholder='Jelszó mégegyszer' cím><br><br>");
                    print("<input type='text' name='tel_szam' placeholder='Telefonszám'><br><br>");
                    print("<input type='text' name='mobil_szam' placeholder='Mobilszám'><br><br>");
                    print("<input type='text' name='ir_szam' placeholder='Irányítószám'><br><br>");
                    print("<input type='text' name='megye' placeholder='Megye'><br><br>");
                    print("<input type='text' name='varos' placeholder='Város'><br><br>");
                    print("<input type='text' name='cim' placeholder='Cím'><br><br>");
                print("</div>");

                // Gomb
                print("<div>");
                    print("<input type='submit' name='gombSzervezo' value='Regisztrálás'>");

                    // Vissza regisztracioAltalanos.php
                    print("<a href='javascript://' onclick='history.back();'>Vissza</a>");
                print("</div>");

            print("</form>");
        print("</div>");
    print("</div>");
} else {
    // $con = mysqli_connect("localhost","madayweb","madayweb123","vizsga");
    $con = mysqli_connect("localhost","root","","jegyek1");

    if (mysqli_connect_errno())
    {
        print( "Adatbázis kapcsolódási hiba!  " . mysqli_connect_error());
    }

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
                    print("<a href='http://www.madayweb.hu'>Vissza a főolaldra</a>");
                }
            } 
        }
    }
}
?>
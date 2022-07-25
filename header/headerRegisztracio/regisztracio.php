<?php
error_reporting(0);
session_start();
include("kapcs.inc.php");
?>
<form action="regisztracio.php" method="post">
    <div>
        Általános<input type="radio" checked="checked" value="altalanos" name="felh_tipus" id=""><br>
        Szervező<input type="radio" name="felh_tipus" value="szervezo" id="">
        <script>
        $('input[type=radio]').click(function(e) {
            var ertek = $(this).val(); 
            $('.result').html(ertek);
        });
        </script>
    </div>
</form>
<?php
if(!$_POST['felh_tipus']=="altalanos") {
?>
    <form action="regisztracio.php" method="post">
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
<?php
} else {
?>
    <form action="regisztracio.php" method="post">
        <div>
            <input type='text' name='szerv_nev' placeholder='Szervezet neve'><br><br>
            <input type='email' name='email_cim' placeholder='Email'><br><br>
            <input type='password' name='jelszo1' placeholder='Jelszó' ><br><br>
            <input type='password' name='jelszo2' placeholder='Jelszó mégegyszer'><br><br>
            <input type='text' name='tel_szam' placeholder='Telefonszám'><br><br>
            <input type='text' name='mobil_szam' placeholder='Mobilszám'><br><br>
            <input type='text' name='ir_szam' placeholder='Irányítószám'><br><br>
            <h1>asdsadsad</h1>
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
<?php
}
?>

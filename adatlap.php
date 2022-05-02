<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="rendezvenyek/bovebbenStyle.css">
    <link rel="stylesheet" href="header/styleHeader.css">
    <link rel="stylesheet" href="footer/footerStyle.css">
    <link rel="stylesheet" href="scrollbarStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Adatlapom</title>
    
    <!-- Ideiglenes stílus - amíg nincs fájlja -->
    <style>
        #altalanosReg {
            margin-top: 5%;
            margin-bottom: 2%;
        }
    </style>
</head>
<body>
    <?php
    // Kapcsolódás az adatbátishoz - 'szilyjegy'
    require("kapcs.inc.php");

    // Fejléc
    include("header.php");

    // Esetleges "hiba" üzenetek elrejtése
    error_reporting(0);

    $megyek = [
        "Bács-Kiskun",
        "Baranya",
        "Békés",
        "Borsod-Abaúj-Zemplén",
        "Csongrád-Csanád",
        "Fejér",
        "Győr-Moson-Sopron",
        "Hajdú-Bihar",
        "Heves",
        "Jász-Nagykun-Szolnok",
        "Komárom-Esztergom",
        "Nógrád",
        "Pest",
        "Somogy",
        "Szabolcs-Szatmár-Bereg",
        "Tolna",
        "Vas",
        "Veszprém",
        "Zala"
    ];

    // Itt nézzük meg és döntjük el azt hogy 'vásárló' vagy 'szervező' fiókkal vagyunk bejelentkezve
    if($_GET['vasarlo'] > 0)
    {
        // Adatok lekérdezése az adatbátisból
        $szervezoID = mysqli_query($con,"SELECT * FROM vasarlo WHERE vasarloID='".$_GET['vasarlo']."';") or die ("Nem sikerült a lekérdezés!");
        $KivalasztottOldal = $_GET['vasarlo'];

        if($szervezoID->num_rows > 0){
            while($row = $szervezoID->fetch_assoc()){
                $email = $row["email"];
                $vezetekNev = $row["vezetekNev"];
                $keresztNev = $row["keresztNev"];
                $telefonSzam = $row["telefonSzam"];
                $megye = $row["megye"];
                $varos = $row["varos"];
                $irSzam = $row["irSzam"];
                $cim = $row["cim"];
        ?>

        <!-- Adatlap -->
        <div id="altalanosReg">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;" id="kartya_bg">
                                <div class="card-body p-5">

                                    <!-- Cím -->
                                    <h2 class="text-uppercase text-center mb-5">Adatlapom</h2>
                                    
                                    <!-- Táblázat -->
                                    <!-- Email cím -->
                                    <form method="post">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Email cím: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="email" value="<?= $email?>">
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Vezeték név -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Vezeték név: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="vezeteknev" value="<?= $vezetekNev?>">
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Kereszt név -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Kereszt név: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="keresztnev" value="<?= $keresztNev?>">
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Telefon szám -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Telefon szám: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="telefonSzam" value="<?= $telefonSzam?>">
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Telefon szám -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Új jelszó: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="password" name="jelszo1" >
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Megye -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Megye: </h5>&emsp;
                                                            </div>
                                                            <div class="form-outline d-flex justify-content-center">
                                                            <select name='megye'>
                                                            <?php

                                                                for($i=0; $i<count($megyek); $i++)
                                                                {
                                                                    if($megyek[$i] == $megye)
                                                                    {
                                                                        ?>
                                                                        <option value="<?=$megyek[$i]?>" selected><?=$megyek[$i]?></option>
                                                                        <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        ?>
                                                                        <option value="<?=$megyek[$i]?>" ><?=$megyek[$i]?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                            ?>
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                            
                                                            
                                                            
                                                <!-- Irányítószám -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Irányítószám: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="irSzam" value="<?= $irSzam?>">
                                                        </div>
                                                    </td>
                                                </tr>
                                                            
                                                <!-- Város -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Város: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="varos" value="<?= $varos?>">
                                                        </div>
                                                    </td>
                                                </tr>
                                                            
                                                <!-- Cím -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Cím: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="cim" value="<?= $cim?>">
                                                        </div>
                                                    </td>
                                                </tr>
                                            <tbody>
                                        </table>

                                        <div class="form-outline d-flex justify-content-center">
                                            <input type="submit" class="btn btn-outline-success gomb btn-sm" name="adatokmentese" value="Adatok mentése">
                                        </div>
                                    </form><br><br>

                                    <form class="form-outline d-flex justify-content-center" method="post">
                                        <input type="submit" name="torol" class="btn btn-outline-success gomb btn-sm" value="Fiókom törlése">
                                    </form>

                                    <!-- Vissza gomb -->
                                    <a href='index.php' class="btn btn-outline-success gomb btn-sm">Vissza</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }}}
    else if($_GET['szervezo'] > 0) {
        $szervezoID = mysqli_query($con,"SELECT * FROM szervezok WHERE szervezoID='".$_GET['szervezo']."';") or die ("Nem sikerült a lekérdezés!");
        $KivalasztottOldal = $_GET['szervezo'];
        if($szervezoID->num_rows > 0){
            while($row = $szervezoID->fetch_assoc())
            {

                // Változóknak értékadás
                $szervezetNev = $row["szervezetNev"];
                $email = $row["email"];
                $mobilSzam = $row["mobilSzam"];
                $telefonSzam = $row["telefonSzam"];
                $megye = $row["megye"];
                $varos = $row["varos"];
                $irSzam = $row["irSzam"];
                $cim = $row["cim"];
        ?>

        <!--  -->
        <div id="altalanosReg">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;" id="kartya_bg">
                                <div class="card-body p-5">

                                    <!--  -->
                                    <h2 class="text-uppercase text-center mb-5">Adatlapom</h2>
                                    
                                    <!-- Táblázat -->
                                    <!-- Email cím -->
                                    <form method="post">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Email cím: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="email" value="<?= $email?>">
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Szervezet név -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Szervezet név: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="szervezetNev" value="<?= $szervezetNev?>">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Telefon szám -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Mobil szám: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="mobilSzam" value="<?= $mobilSzam?>">
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Telefon szám -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Telefonszám: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="telefonSzam" value="<?= $telefonSzam?>">
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Új jelszó megadási lehetőség -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Új jelszó: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="password" name="jelszo1" >
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Megye -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Megye: </h5>&emsp;
                                                            </div>
                                                            <div class="form-outline d-flex justify-content-center">
                                                            <select name='megye'>
                                                            <?php

                                                                for($i=0; $i<count($megyek); $i++)
                                                                {
                                                                    if($megyek[$i] == $megye)
                                                                    {
                                                                        ?>
                                                                        <option value="<?=$megyek[$i]?>" selected><?=$megyek[$i]?></option>
                                                                        <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        ?>
                                                                        <option value="<?=$megyek[$i]?>" ><?=$megyek[$i]?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                            ?>
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                            
                                                            
                                                            
                                                <!-- Irányítószám -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Irányítószám: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="irSzam" value="<?= $irSzam?>">
                                                        </div>
                                                    </td>
                                                </tr>
                                                            
                                                <!-- Város -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Város: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="varos" value="<?= $varos?>">
                                                        </div>
                                                    </td>
                                                </tr>
                                                            
                                                <!-- Cím -->
                                                <tr>
                                                    <td>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <h5>Cím: </h5>&emsp;
                                                        </div>
                                                        <div class="form-outline d-flex justify-content-center">
                                                            <input type="text" name="cim" value="<?= $cim?>">
                                                        </div>
                                                    </td>
                                                </tr>
                                            <tbody>
                                        </table>

                                        <div class="form-outline d-flex justify-content-center">
                                            <input type="submit" class="btn btn-outline-success gomb btn-sm" name="adatokmentese" value="Adatok mentése">
                                        </div>
                                    </form><br><br>

                                    <form class="form-outline d-flex justify-content-center" method="post">
                                        <input type="submit" name="torol" class="btn btn-outline-success gomb btn-sm" value="Fiókom törlése">
                                    </form>

                                    <!-- Vissza gomb -->
                                    <a href='index.php' class="btn btn-outline-success gomb btn-sm">Vissza</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }}}

    if(isset($_POST['adatokmentese']))
    {
        if($_SESSION['bejelentkezve']=="vasarlo")
        {
            $vezetekNev = $_POST['vezeteknev'];
            $keresztNev = $_POST['keresztnev'];
        }
        else
        {
            $szervezetNev = $_POST['szervezetNev'];
            $mobilSzam = $_POST['mobilSzam'];
        }
        
        $email = $_POST['email'];
        $jelszo1 = $_POST['jelszo1'];
        $secure_pass = md5($jelszo1);
        $telefonSzam = $_POST['telefonSzam'];
        $irSzam = $_POST['irSzam'];
        $megye = $_POST['megye'];
        $varos = $_POST['varos'];
        $cim = $_POST['cim'];

        $con->query("SET NAMES utf8");
        if($jelszo1 != "")
        {
            if($_SESSION['bejelentkezve']=="vasarlo")
            {
                $query = "UPDATE `vasarlo` SET `email`='$email',`jelszo`='$secure_pass',`vezetekNev`='$vezetekNev',`keresztNev`='$keresztNev',`telefonSzam`='$telefonSzam',`megye`='$megye',`varos`='$varos',`irSzam`='$irSzam',`cim`='$cim' WHERE vasarloID = '$KivalasztottOldal'";
            }
            else
            {
                $query = "UPDATE `szervezok` SET `email`='$email',`jelszo`='$secure_pass',`szervezetNev`='$szervezetNev',`mobilSzam`='$mobilSzam',`telefonSzam`='$telefonSzam',`megye`='$megye',`varos`='$varos',`irSzam`='$irSzam',`cim`='$cim' WHERE szervezoID = '$KivalasztottOldal'";
            }
        }
        else
        {
            if($_SESSION['bejelentkezve']=="vasarlo")
            {
                $query = "UPDATE `vasarlo` SET `email`='$email',`vezetekNev`='$vezetekNev',`keresztNev`='$keresztNev',`telefonSzam`='$telefonSzam',`megye`='$megye',`varos`='$varos',`irSzam`='$irSzam',`cim`='$cim' WHERE vasarloID = '$KivalasztottOldal'";
            }
            else
            {
                $query = "UPDATE `szervezok` SET `email`='$email',`szervezetNev`='$szervezetNev',`mobilSzam`='$mobilSzam',`telefonSzam`='$telefonSzam',`megye`='$megye',`varos`='$varos',`irSzam`='$irSzam',`cim`='$cim' WHERE szervezoID = '$KivalasztottOldal'";
            }
        }        
      
        mysqli_query($con,$query) or die ('Hiba az adatbevitelnél!');
        print("<meta http-equiv='refresh' content='0'>");
    }

    if(isset($_POST['torol']))
    {
        $tabla=$_SESSION['bejelentkezve'];
        if($_SESSION['bejelentkezve']=="vasarlo")
        {
            $id="vasarloID";
        }
        else
        {
            $id="szervezoID";
        }
        $query = "DELETE FROM `$tabla` WHERE  `$id` = '$KivalasztottOldal'";
        mysqli_query($con,$query) or die ('Hiba az adattörlésnél!');
        session_destroy();

        print("<script>window.location.href = 'index.php';</script>");
    }

    // Lábléc
    include("footer.php");
    ?>

<script src="js/bootstrap.js"></script>
</body>
</html>
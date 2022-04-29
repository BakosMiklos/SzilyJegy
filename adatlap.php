<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="rendezvenyek/bovebbenStyle.css">
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

    // Itt nézzük meg és döntjük el azt hogy 'vásárló' vagy 'szervező' fiókkal vagyunk bejelentkezve
    if($_GET['vasarlo'] > 0)
    {
        // Adatok lekérdezése az adatbátisból
        $szervezoID = mysqli_query($con,"SELECT * FROM vasarlo WHERE vasarloID='".$_GET['vasarlo']."';") or die ("Nem sikerült a lekérdezés!");
        $KivalasztottOldal = $_GET['vasarlo'];

        // Táblában szereplő elemek
        if($szervezoID->num_rows > 0)
        {
            while($row = $szervezoID->fetch_assoc()
            {

                // Változóknak értékadás
                $email = $row["email"];
                $jelszo = $row["jelszo"];
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
                                    <table>
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Email cím: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $email");?></p>
                                        </div>

                                        <!-- Vezeték név -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Vezeték név: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $vezetekNev");?></p>
                                        </div>

                                        <!-- Kereszt név -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Kereszt név: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $keresztNev");?></p>
                                        </div>

                                        <!-- Telefon szám -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Telefon szám: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $telefonSzam");?></p>
                                        </div>

                                        <!-- Megye -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Megye: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $megye");?></p>
                                        </div>

                                        <!-- Irányítószám -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Irányítószám: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $irSzam");?></p>
                                        </div>

                                        <!-- Város -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Város: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $varos");?></p>
                                        </div>
                                        
                                        <!-- Cím -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Cím: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $cim");?></p>
                                        </div>
                                    </table>

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
                $jelszo = $row["jelszo"];
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
                                    
                                    <!--  -->
                                    <!--  -->
                                    <table>
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Szervezet Neve: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $szervezetNev");?></p>
                                        </div>

                                        <!--  -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Email: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $email");?></p>
                                        </div>

                                        <!--  -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Mobil szám: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $mobilSzam");?></p>
                                        </div>

                                        <!--  -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Telefon szám: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $telefonSzam");?></p>
                                        </div>

                                        <!--  -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Megye: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $megye");?></p>
                                        </div>

                                        <!--  -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Irányítószám: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $irSzam");?></p>
                                        </div>

                                        <!--  -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Város: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $varos");?></p>
                                        </div>

                                        <!--  -->
                                        <div class="form-outline d-flex justify-content-center">
                                            <h5>Cím: </h5>&emsp;
                                            <p class="bovebben-p"><?php print(" $cim");?></p>
                                        </div>
                                    </table>

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

    // Fejléc
    include("footer.php");
    ?>

<script src="js/bootstrap.js"></script>
</body>
</html>

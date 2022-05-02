<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="rendezvenyek/bovebbenStyle.css">
    <link rel="stylesheet" href="header/styleHeader.css">
    <link rel="stylesheet" href="scrollbarStyle.css">
    <link rel="stylesheet" href="footer/footerStyle.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Rendezvény</title>

    <!-- Ideiglenes stílus - amíg nincs fájlja -->
    <style>
        #altalanosReg {
            margin-top: 5%;
            margin-bottom: 2%;
        }

        #bovebben-kep {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php
    // Kapcsolódás az adatbátishoz - 'szilyjegy'
    require("kapcs.inc.php");

    // Fejléc
    include("header.php");

    $rendezvenyID = mysqli_query($con,"SELECT * FROM rendezvenyek WHERE rendezvenyID='".$_GET['rendezveny']."';") or die ("Nem sikerült a lekérdezés!");
    $KivalasztottOldal = $_GET['rendezveny'];

    if($rendezvenyID->num_rows>0)
    {
    while($row = $rendezvenyID->fetch_assoc()){

        // Részvételi mód kezelés
        if ($row["reszveteliMod"] == 0) {
            $reszveteliMod = "Helyszíni";
        }
        else
        {
            $reszveteliMod = "Online";
        }

        $nev = $row["nev"];
        $rendezvenyDatuma = $row["rendezvenyDatuma"];
        $rendezvenyIdeje = $row["rendezvenyIdeje"];
        $helyszin = $row["helyszin"];
        $leiras = $row["leiras"];
        $jegyAr = $row["jegyAr"];
        $kep = $row["kep"];
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
                                    <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                        <img src=<?= $row['kep']; ?>  alt="..." id="bovebben-kep">
                                    </div>

                                    <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                        <h5>Név</h5>&emsp;
                                        <p class="bovebben-p"><?php print(" $nev");?></p>
                                    </div>

                                    <!--  -->
                                    <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                        <h5>Leírás</h5>&emsp;
                                        <p class="bovebben-p"><?php print(" $leiras");?></p>
                                    </div>

                                    <!--  -->
                                    <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                        <h5>Rendezvény Dátuma és Ideje</h5>&emsp;
                                        <p class="bovebben-p">
                                            <?php print(" $rendezvenyDatuma");?> <br>
                                            <?php print(" $rendezvenyIdeje");?>
                                        </p>
                                    </div>

                                    <!--  -->
                                    <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                        <h5>Helyszín</h5>&emsp;
                                        <p class="bovebben-p"><?php print(" $helyszin");?></p>
                                    </div>

                                    <!--  -->
                                    <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                        <h5>Részvételi Mód</h5>&emsp;
                                        <p class="bovebben-p"><?php print(" $reszveteliMod");?> </p>
                                    </div>

                                    <!--  -->
                                    <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                        <h5>Jegy Ár</h5>&emsp;
                                        <p class="bovebben-p"><?php print(" $jegyAr");?>Ft</p>
                                    </div>

                                    <?php
                                    if($_SESSION['bejelentkezve']=="vasarlo")
                                    {
                                        $rendezvenyek = "SELECT elerhetoJegyekSzama FROM rendezvenyek WHERE rendezvenyek.rendezvenyID = ".$KivalasztottOldal;
                                        $rendezvenyek_run = mysqli_query($con, $rendezvenyek);
                                        if(mysqli_num_rows($rendezvenyek_run) > 0)
                                        {
                                            foreach($rendezvenyek_run as $rendezvenyitemek) :
                                                $elerhetojegyek = $rendezvenyitemek['elerhetoJegyekSzama'];
                                            endforeach;
                                        }

                                        if($elerhetojegyek>0)
                                        {
                                            ?>
                                            <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                                                <p class="bovebben-p">Elérhető jegyek száma: <?=$elerhetojegyek?></p>
                                            </div>
                                            
                                            <!-- Kosár gomb -->
                                            <form method="post">
                                                <div class="d-flex justify-content-center">
                                                    <input type="number" name="darabszam" id="darabszam" min="1" max ="<?= $elerhetojegyek?>" value="1">
                                                </div><br>                                  
                                                <div class="d-flex justify-content-center">
                                                    <button type='submit' name='kosarba' class="btn btn-success btn-block btn-sm gradient-custom-4 text-body">Kosárba!</button>
                                                </div>
                                            </form>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                                <div class="d-flex justify-content-center">
                                                    <p class="bovebben-p">Minden jegy elkelt! Néz körül a többi rendezvény között!</p>
                                                </div>
                                            <?php
                                        }
                        
                                    
                                    }
                                    else
                                    {
                                        ?>
                                            <div class="d-flex justify-content-center">
                                                <p class="bovebben-p">Jelentkezz be vásárlóként hogy jegyet vásárolhass!</p>
                                            </div>
                                            
                                        <?php
                                    }
                                    ?>

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
    }}
    if(isset($_POST['kosarba'])){
        $darab=$_POST['darabszam'];
        $ar=$darab*$jegyAr;
        $vasarlo = $_SESSION['vasarloID'];
        $sql = "INSERT INTO kosar (rendezvenyID, rendezveny, vasarloID, mennyiseg, ar) VALUE ('$KivalasztottOldal','$nev','$vasarlo','$darab','$ar');";
        mysqli_query($con,$sql) or die ("Sikertelen adatbeszúrás");
        print("<script>window.location.href = 'index.php';</script>");
    }
    include("footer.php");
    ?>
    
<script src="js/bootstrap.js"></script>
</body>
</html>

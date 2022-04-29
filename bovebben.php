<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="rendezvenyek/bovebbenStyle.css">
    <link rel="stylesheet" href="scrollbarStyle.css">
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

                                    <!-- Kosár gomb -->
                                    <div class="d-flex justify-content-center">
                                        <a href="maintance.html"><button type='submit' name='gomb' class="btn btn-success btn-block btn-sm gradient-custom-4 text-body">Kosárba!</button></a>
                                    </div>

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

    include("footer.php");
    ?>
    
<script src="js/bootstrap.js"></script>
</body>
</html>

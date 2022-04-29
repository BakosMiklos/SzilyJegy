<?php
// Kapcsolódás az adatbátishoz - 'szilyjegy'
include("kapcs.inc.php");

// Esetleges "hiba" üzenetek elrejtése
error_reporting(0);

// Karakterkódolás
$con->query("SET NAMES utf8");

// Adatbázisból való lekérdezés
$products = "SELECT * FROM rendezvenyek";
$products_run = mysqli_query($con, $products);
?>

<!-- Adatok lekérdezése az adatbátisból és kiiratás a főoldara-->
<div class="container">
    <div class="row">

        <!-- Kulcsszó lekezelése -->
        <!-- Ha a keresésünk a fejlécben "semmi", akkor ezzel állítjuk be hogy ne történjen semmi keresés -->
        <!-- Linkből adat kinyerés -->
        <?php
        if($_GET['kulcsszo'] != "")
        {
            // - 
        }
        else
        {
            if(mysqli_num_rows($products_run) > 0)
            {
                foreach($products_run as $proditems) :
                    ?>
                    <div class="col-sm-5 col-md-4 col-lg-4">
                        <div class="card bg-dark" style="margin-top: 3%; margin-bottom: 3%; box-shadow: 10px 5px 5px gray;">
                            <img src=<?= $proditems['kep']; ?> class="card-img-top" alt="...">
                            <div class="card-body" style="color: white;">
                                <h5 class="card-title"><?= $proditems['nev']; ?></h5>
                                <p class="card-text"><?= $proditems['rendezvenyDatuma']; ?>  <?= $proditems['rendezvenyIdeje']?></p>
                                <?php print("<a href='bovebben.php?rendezveny=".$proditems['rendezvenyID']."' class='btn btn-primary'>Bővebben</a>")?>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            }
        }
        ?>
    </div>
</div>

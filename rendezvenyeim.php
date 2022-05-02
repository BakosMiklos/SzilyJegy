<?php
// Kapcsolódás az adatbátishoz - 'szilyjegy'
include("kapcs.inc.php");

$szervezoID = $_SESSION['szervezoID'];

// Karakterkódolás
$con->query("SET NAMES utf8");

// Adatbázisból való lekérdezés
$products = "SELECT * FROM rendezvenyek WHERE szervezoID = '$szervezoID'";
$products_run = mysqli_query($con, $products);

?>

<!-- Adatok lekérdezése az adatbátisból és kiiratás -->
<!-- Rendezvény 'Módosítás' és 'Törlés'-se -->
<div class="container">
    <div class="row">
        <?php
        if(mysqli_num_rows($products_run) > 0)
        {
            foreach($products_run as $proditems) :
                ?>
                <div class="col-sm-5 col-md-4 col-lg-4">
                    <div class="card bg-dark" style="margin-top: 3%; margin-bottom: 3%; box-shadow: 10px 5px 5px gray;">
                        <img src=<?= $proditems['kep']; ?> class="card-img-top" alt="...">
                        <div class="card-body" style="color: white;">
                            <h5 class="card-title"><?= $proditems['nev']; ?></h5>
                            <p class="card-text"><?= $proditems['helyszin']; ?></p>
                            <p class="card-text"><?= $proditems['rendezvenyDatuma']; ?>  <?= $proditems['rendezvenyIdeje']?></p>
                            <a href="modosit.php?modosit=<?= $proditems['rendezvenyID']; ?>" class='btn btn-primary'>Módosítás</a>
                            <a href="torol.php?torol=<?= $proditems['rendezvenyID']; ?>" class='btn btn-primary'>Törlés</a>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        }
        ?>
    </div>
</div>

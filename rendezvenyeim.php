<?php
include("kapcs.inc.php");
$szervezoID = $_SESSION['szervezoID'];
$con->query("SET NAMES utf8");
$products = "SELECT * FROM rendezvenyek WHERE szervezoID = '$szervezoID'";
$products_run = mysqli_query($con, $products);
?>
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
                            <p class="card-text"><?= $proditems['leiras']; ?></p>
                            <a href="maintance.html"><button id="mododsit" class="btn btn-primary">Módosítás</button></a>
                            <a href="maintance.html"><button id="torol" class="btn btn-primary">Törlés</button></a>
                            <!--<button id="torol" class="btn btn-primary" onclick="Torol(<php $proditems['rendezvenyID']?>)">Törlés</button>-->
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        }
        ?>
        <script>
            function Torol(<?php $rendezvenyID; ?>)
            {
                <?php
                    $con->query("SET NAMES utf8");
                    $sql = "DELETE FROM `rendezvenyek` WHERE `rendezvenyek`.`rendezvenyID` = '$rendezvenyID'";
                    if($con->guery($sql)=== TRUE)
                    {
                        print("<script>window.location.href = 'index.php';</script>");
                    }
                    else
                    {
                        print("nem sikerült");
                    }
                ?>
            }
        </script>
    </div>
</div>

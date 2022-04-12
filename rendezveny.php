<?php
include("header/headerRegisztracio/kapcs.inc.php");
$con->query("SET NAMES utf8");
$products = "SELECT * FROM rendezvenyek";
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
                    <div class="card">
                        <img src=<?= $proditems['kep']; ?> class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $proditems['nev']; ?></h5>
                            <p class="card-text"><?= $proditems['leiras']; ?></p>
                            <a href="rendezvenyek/rendezvenyek.php" class="btn btn-primary">Érdekel</a>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        }
?>
    </div>
</div>
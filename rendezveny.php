<?php
$con = mysqli_connect("localhost","root","","szilyjegy");
$products = "SELECT * FROM rendezvenyek";
$products_run = mysqli_query($con, $products);

if(mysqli_num_rows($products_run) > 0)
{
    foreach($products_run as $proditems) :
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <img src=<?= $proditems['kep']; ?> class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $proditems['nev']; ?></h5>
                            <p class="card-text"><?= $proditems['leiras']; ?></p>
                            <a href="rendezvenyek/rendezvenyek.php" class="btn btn-primary">Érdekel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endforeach;
}
?>




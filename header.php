<?php
// Munkamenet indítás
session_start();

// Kapcsolódás az adatbátishoz - 'szilyjegy'
include("kapcs.inc.php");

// Esetleges "hiba" üzenetek elrejtése
error_reporting(0);
?>

<!-- Fejléc -->
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand mb-0 h1" href='index.php'>
                <!-- Oldal cím / logo -->
                SzilyJegy
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse t" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <!-- megye -->
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Megye
                        </a>

                            <!--  -->
                            <ul class="dropdown-menu bg-dark scroll" aria-labelledby="navbarDropdown">
                            <?php
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

                                for($i=0; $i<count($megyek); $i++)
                                {
                                    ?>
                                    <div class="form-outline mb-7 d-flex justify-content-center">
                                        <a href="index.php?megye=<?=$megyek[$i]?>">
                                            <p><?=$megyek[$i]?></p>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>

                    <!-- Online -->
                    <li class="nav-item">
                        <form>
                            <a class="nav-link" href="index.php?megye=Online">online</a>
                        </form>
                    </li>
                </ul>

                <?php
                if($_SESSION['bejelentkezve']=="vasarlo")
                {
                ?>
                    <!-- Kosár -->
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="header/headerLogo/kosarLogo.png" alt="kosar_logo">
                            </a>
                            <ul class="dropdown-menu bg-dark teszt" aria-labelledby="navbarDropdown">
                                <li class="t"><a class="dropdown-item teszt btn btn-outline-success" href="#">Kosár</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <!-- Kosár tartalma -->
                                <table>
                                    <tr>
                                        <td>Kosár tartalma:<br><br></td>
                                    </tr>
                                    <?php
                                    // Karakterkódolás
                                    $con->query("SET NAMES utf8");

                                    // Adatbázisból való lekérdezés
                                    $id=$_SESSION['vasarloID'];
                                    $products = "SELECT rendezvenyID, rendezveny, SUM(mennyiseg) AS 'darab', SUM(ar) AS 'fizetendo' FROM kosar WHERE vasarloID like '$id' GROUP BY rendezvenyID";
                                    $products_run = mysqli_query($con, $products);
                                    $osszeg=0;
                                    if(mysqli_num_rows($products_run) > 0)
                                    {
                                        foreach($products_run as $proditems) :
                                            $osszeg = $osszeg + $proditems['fizetendo'];
                                            ?>
                                            <tr>
                                               <td><?=$proditems['rendezveny']?></td>
                                               <td><?=$proditems['darab']?></td>
                                               <td><?=$proditems['fizetendo']?></td>
                                               <td><a href="kosartorles.php?id=<?=$proditems['rendezvenyID']?>">Törlés</td>
                                            </tr>
                                           <?php                                           
                                        endforeach;
                                    }
                                    ?>
                                    <tr></tr>
                                    <tr>
                                        <td>A fizetendő összeg: </td>
                                        <td><?=$osszeg?></td>
                                    </tr>
                                    <tr>
                                        <td><a href="fizetes.php?fizetes=igen"><input type="submit" name="fizetes" value="Fizetek" class="btn btn-outline-success"></a></td>
                                    </tr>
                                </table>
                            </ul>
                        </li>
                    </ul>
                <?php
                }
                ?>
                
                <!-- Bejelntkezés -->
                <?php
                if(!isset($_POST['gomb'])) {
                    ?>
                    <ul class="navbar-nav mb-2 mb-lg-0" id="helyKoz">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                if($_SESSION['email'] == "")
                                {
                                ?>
                            <img src="header/headerLogo/bejelentkezesLogo.png" alt="bejelentkezes_logo">
                            <?php
                                }
                                else
                                {
                                    if($_SESSION['bejelentkezve']=="vasarlo")
                                    {
                                        ?>
                                        <span color="white"><?php echo $_SESSION['keresztNev']?></span>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <span color="white"><?php echo $_SESSION['szervezetNev']?></span>
                                        <?php
                                    }
                                }
                                ?>
                            </a>

                            <!-- Ellenőrzés hogy be van e jelentkezve -->
                            <ul class="dropdown-menu bg-dark teszt" aria-labelledby="navbarDropdown">
                                <li class="t dropdown-item teszt btn btn-outline-success"><?php echo ($_SESSION['email'] == "") ? "Bejelentkezés" : "Fiók"?></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li><?php
                                if($_SESSION['email'] == "")
                                    {
                                ?>

                                <!-- Felhasználó név -->
                                <form method="post">
                                <table>
                                    <tr>
                                        <td>Email-cím</td>
                                    </tr>
                                    <tr>
                                        <td><input type='text' name='email'></td>
                                    </tr>
                                </table>

                                <!-- Jelszó -->
                                <table>
                                    <tr>
                                        <td>Jelszó</td>
                                    </tr>
                                    <tr>
                                        <td><input type='password' name='jelszo'></td>
                                    </tr>
                                </table>

                                    <!-- Elfelejtettem a jelszavam -->
                                    <a href="maintance.html" id="elf_jelsz">Elfelejtettem a jelszavam<br><br></a>
                                    <input type="submit" value="Bejelentkezés" name="gomb" class="btn btn-outline-success gomb">
                                    <a href="regisztracio.php"><input type="button" value="Regisztrálj itt!" class="btn btn-outline-success"></a>
                                </form>
                                <?php
                                }
                                else
                                {
                                    $products = "SELECT * FROM ".$_SESSION['bejelentkezve']." WHERE email LIKE ".$_SESSION['email'];
                                    $products_run = mysqli_query($con, $products);

                                    if($_SESSION['bejelentkezve']=="szervezok") {
                                        print("<a href='adatlap.php?szervezo=".$_SESSION['szervezoID']."' class='btn btn-outline-success gomb''>Adatlapom</a><br><br>");
                                    }
                                    else {
                                        print("<a href='adatlap.php?vasarlo=".$_SESSION['vasarloID']."' class='btn btn-outline-success gomb''>Adatlapom</a><br><br>");
                                    }

                                    if($_SESSION['bejelentkezve']=="szervezok")
                                    {
                                        ?>
                                        <a href="rendezveny_feltoltes.php"><input type="button" class="btn btn-outline-success gomb" value="Rendezvény feltöltés"></a><br><br>
                                        <form action="index.php" method="post">
                                            <input type="submit" name="rendezvenyeim" class="btn btn-outline-success gomb" value="Rendezvényeim"><br><br>
                                        </form>
                                        <?php
                                    }
                                    ?>
                                    <a href="kijelentkezes.php"><button class="btn btn-outline-success gomb" name="kijelentkezes">Kijelentkezés</button></a>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                <?php
                }
                else
                {
                    $email = $_POST['email'];
                    $jelszo = $_POST['jelszo'];
                    $secure_pass = md5($jelszo);
                    $con->query("SET NAMES utf8");
                    $query = "SELECT * FROM vasarlo WHERE email LIKE '$email' AND jelszo LIKE '$secure_pass'";
                    $results = mysqli_query($con, $query);
                    
                    if(mysqli_num_rows($results) > 0)
                    {
                        $_SESSION['email'] = $email;
                        $row = mysqli_fetch_array($results);
                        $vasarloID = $row['vasarloID'];
                        $vezetekNev = $row['vezetekNev']; 
                        $keresztNev = $row['keresztNev'];
                        $_SESSION['vasarloID']= $vasarloID;
                        $_SESSION['vezetekNev'] = $vezetekNev;
                        $_SESSION['keresztNev'] = $keresztNev;
                        $_SESSION['bejelentkezve']="vasarlo";
                        ?>
                        <script>window.location.href = 'index.php';</script>
                        <?php
                    }
                    else
                    {
                        $con->query("SET NAMES utf8");
                        $query = "SELECT * FROM szervezok WHERE email LIKE '$email' AND jelszo LIKE '$secure_pass'";
                        $results = mysqli_query($con, $query);

                        if(mysqli_num_rows($results) > 0)
                        {
                            $_SESSION['email'] = $email;
                            $row = mysqli_fetch_array($results);
                            $szervezoID=$row['szervezoID'];
                            $szervezetNev = $row['szervezetNev'];
                            $_SESSION['szervezoID']=$szervezoID;
                            $_SESSION['szervezetNev'] = $szervezetNev;
                            $_SESSION['bejelentkezve']="szervezok";
                            ?>
                            <script>window.location.href = 'index.php';</script>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href='index.php' class="btn btn-outline-success">Nem létezik ilyen felhasználó!</a>&emsp;
                            <?php
                        }
                    } 
                }
                ?>

                <!-- Kereső sáv -->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" name="kulcsszo" placeholder="Keresés" aria-label="Search">
                    <button class="btn btn-outline-success" name="keres" type="submit">Keresés</button>
                </form>
            </div>
        </div>
    </nav>
</header>

<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if($_GET['kulcsszo'] != "")
{
    $keywords = isset($_GET['kulcsszo']) ? '%'.$_GET['kulcsszo'].'%' : '';
}
$query = "SELECT kep, nev, rendezvenyDatuma, rendezvenyIdeje, rendezvenyID FROM rendezvenyek where nev like '$keywords' OR helyszin like '$keywords'";
$result = $con->query($query);

?>
<div class="container">
    <div class="row">
        <?php

            while ($row = $result->fetch_assoc())
            {
                foreach($result as $proditems) :
                ?>
                <div class="col-sm-5 col-md-4 col-lg-4">
                    <div class="card bg-dark" style="margin-top: 3%; margin-bottom: 3%; box-shadow: 10px 5px 5px gray;">
                        <img src=<?= $proditems['kep']; ?> class="card-img-top" alt="...">
                        <div class="card-body" style="color: white;">
                            <h5 class="card-title"><?= $proditems['nev']; ?></h5>
                            <p class="card-text"><?= $proditems['rendezvenyDatuma']; ?>  <?= $proditems['rendezvenyIdeje']?></p>
                            <?php print("<a href='bovebben.php?m=".$proditems['rendezvenyID']."' class='btn btn-primary'>Bővebben</a>")?>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
            }
            
        ?>
    </div>
</div>
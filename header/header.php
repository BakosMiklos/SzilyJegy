<?php
session_start();
error_reporting(0);
include("header/headerRegisztracio/kapcs.inc.php");
?>
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

                        <!-- Rendezvények -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                rendezvények
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            </ul>
                        </li>

                        <!-- Helyszínek -->
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            helyszínek
                        </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        </ul>
                    </li>

                    <!-- Online -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">online</a>
                    </li>
                </ul>

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
                                <tr>
                                    <td><a href="http://"><input type="submit" value="Kosár kezelése" class="btn btn-outline-success"></a></td>
                                </tr>
                            </table>
                        </ul>
                    </li>
                </ul>
                
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
                                    if($_SESSION['bejelentkezve']=="altalanos")
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
                            <ul class="dropdown-menu bg-dark teszt" aria-labelledby="navbarDropdown">
                                <li class="t dropdown-item teszt btn btn-outline-success">Bejelentkezés</li>
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
                                <a href="http://" id="elf_jelsz">Elfelejtettem a jelszavam<br><br></a>
                                <input type="submit" value="Bejelentkezés" name="gomb" class="btn btn-outline-success gomb">
                                <a href="header/headerRegisztracio/regisztracio.php"><input type="button" value="Regisztrálj itt!" class="btn btn-outline-success"></a>
                                </form>
                                <?php
                                }
                                else
                                {
                                    if($_SESSION['bejelentkezve']=="szervezo")
                                    {
                                        ?>
                                        <a href="rendezveny_feltoltes.php"><input type="button" class="btn btn-outline-success gomb" value="Rendezvény feltöltés"></a>
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
                        $vezetekNev = $row['vezetekNev']; 
                        $keresztNev = $row['keresztNev'];
                        $_SESSION['vezetekNev'] = $vezetekNev;
                        $_SESSION['keresztNev'] = $keresztNev;
                        $_SESSION['bejelentkezve']="altalanos";
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
                            $szervezetNev = $row['szervezetNev'];                             
                            $_SESSION['szervezetNev'] = $szervezetNev;
                            $_SESSION['bejelentkezve']="szervezo";
                            ?>
                            <script>window.location.href = 'index.php';</script>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href='index.php'>Nem létezik ilyen felhasználó!</a>
                            <?php
                        }
                    }
                    
                }
                
                ?>

                <!-- Kereső sáv -->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Keresés" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Keresés</button>
                </form>
                
            </div>
        </div>
    </nav>
</header>
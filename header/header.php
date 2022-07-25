<?php
session_start();
?>
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand mb-0 h1" href='http://www.madayweb.hu'>
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
                                <li class="t"><a class="dropdown-item" href="#">Rendezvények</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Sziget</a></li>
                                <li><a class="dropdown-item" href="#">Akvárium</a></li>
                                <li><a class="dropdown-item" href="#">Budapest Park</a></li>
                                <li><a class="dropdown-item" href="#">Liget</a></li>
                            </ul>
                        </li>

                        <!-- Helyszínek -->
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            helyszínek
                        </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
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
                            <img src="header/headerLogo/bejelentkezesLogo.png" alt="bejelentkezes_logo">
                            </a>
                            <ul class="dropdown-menu bg-dark teszt" aria-labelledby="navbarDropdown">
                                <li class="t"><a class="dropdown-item teszt btn btn-outline-success" href="#">Bejelentkezés</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <!-- Felhasználó név -->
                                <form action="header.php" method="post"></form>
                                <table>
                                    <tr>
                                        <td>Felhasználó név</td>
                                    </tr>
                                    <tr>
                                        <td><input type='text' name='nev'></td>
                                    </tr>
                                </table>

                                <!-- Jelszó -->
                                <table>
                                    <tr>
                                        <td>asd</td>
                                    </tr>
                                    <tr>
                                        <td><input type='password' name='jelszo'></td>
                                    </tr>
                                </table>
                                <a href="http://" id="elf_jelsz">Elfelejtettem a jelszavam<br><br></a>
                                <input type="submit" value="Bejelentkezés" name="gomb" class="btn btn-outline-success gomb">
                                <a href="header/headerRegisztracio/regisztracio.php"><input type="submit" value="Regisztráció" class="btn btn-outline-success"></a>
                            </ul>
                        </li>
                    </ul>
                <?php
                }
                else
                {
                    $con = mysqli_connect("localhost","root","","szilyjegy");

                    if (mysqli_connect_errno())
                    {
                        print("Adatbázis kapcsolódási hiba!  " . mysqli_connect_error());
                    }

                    $nev = $_POST['nev'];
                    $jelszo = $_POST['jelszo'];

                    $query = "SELECT * FROM vasarlo WHERE vezetekNev='$nev' AND jelszo='$jelszo'";
                    $results = mysqli_query($con, $query);

                    if(mysqli_num_rows($results) > 0)
                    {
                        $_SESSION['nev'] = $nev;
                        ?>
                        <a href='index.php'>Sikeres belépés</a>
                        <?php
                    }
                    else
                    {
                        ?>
                        <a href='Bejelentkezes.php'>Nem létezik ilyen felhasználó!</a>
                        <?php
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

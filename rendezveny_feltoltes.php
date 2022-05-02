<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="rendezvenyek/rendezveny_feltoltesStyle.css">
  <link rel="stylesheet" href="scrollbarStyle.css">
  <link rel="stylesheet" href="header/styleHeader.css">
  <link rel="stylesheet" href="footer/footerStyle.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Rendezvény feltöltés</title>
    
  <!-- Ideiglenes stílus - amíg nincs fájlja -->
  <style>
        #altalanosReg {
            margin-top: 5%;
            margin-bottom: 2%;
        }

        a {
          text-decoration: none;
        }
    </style>
</head>
<body>

<?php
// Munkamenet indítás
session_start();

// Kapcsolódás az adatbátishoz - 'szilyjegy'
require("kapcs.inc.php");

// Esetleges "hiba" üzenetek elrejtése
error_reporting(0);

include("header.php");
?>

<!-- Rendezvény feltöltés váza -->
<div id="altalanosReg">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;" id="kartya_bg">
            <div class="card-body p-5">

              <!-- Cím -->
              <h4 class="text-uppercase text-center mb-5">Rendezvény feltöltés</h4>

                <!-- Űrlap és inputok -->
                <form method='post' enctype='multipart/form-data'>

                  <!-- "Rendezvény neve" és "Rendezvény helyszíne" -->
                  <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                    <input type='text' name='nev' placeholder="Rendezvény neve" id="form3Example1cg" class="form-control form-control-sm">&emsp;
                    <input type='text' name='helyszin' placeholder="Rendezvény helyszíne" id="form3Example1cg" class="form-control form-control-sm">
                  </div>

                  <?php
                    $megyek = [
                        "Online",
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
                    ?>
                    <div class="form-outline mb-4 kartya_szele">
                    Melyik megyében&emsp;
                    <select name='megye'>
                    <?php

                      for($i=0; $i<count($megyek); $i++)
                      {
                          ?>
                            <option value="<?=$megyek[$i]?>" ><?=$megyek[$i]?></option>
                          <?php
                      }
                      ?>
                    </select>
                  </div>
                    

                  <!-- "Rendezvény dátuma" és "Rendezvény ideje" -->
                  <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                    <input type='date' name='datum' placeholder="Rendezvény dátuma" id="form3Example1cg" class="form-control form-control-sm">&emsp;
                    <input type='time' name='ido' placeholder="Rendezvény ideje" id="form3Example1cg" class="form-control form-control-sm">
                  </div>

                  <!-- "Rendezvény típusa" - 'Online', 'Rendes' -->
                  <div class="form-outline mb-4 kartya_szele">
                    Rendezvény típusa&emsp;
                    <select name='reszvetelimod'>
                      <option value='1'>Online</option>
                      <option value='0'>Rendes</option>
                    </select>
                  </div>

                  <!-- "Leírás" -->
                  <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                    Leírás&emsp;
                    <textarea name='leiras' rows='5' cols='50' id="form3Example1cg" class="form-control form-control-sm"></textarea>
                  </div>

                  <!-- Képfájl kiválasztása -->
                  <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                    Kép&emsp;
                    <input type='file' name='kep' id="form3Example1cg" class="form-control form-control-sm">
                  </div>

                  <!-- "Eladható jegyek száma" és "Ár(Ft)" -->
                  <div class="form-outline mb-4 d-flex justify-content-center kartya_szele">
                    <input type='number' name='eladhatojegyekszama' placeholder="Eladható jegyek száma" id="form3Example1cg" class="form-control form-control-sm">&emsp;
                    <input type='number' name='jegyar' placeholder="Ár(Ft)" id="form3Example1cg" class="form-control form-control-sm">
                  </div>

                  <!-- Rögzítés gomb -->
                  <div class="d-flex justify-content-center">
                    <button type='submit' name='gomb' class="btn btn-success btn-block btn-sm gradient-custom-4 text-body">Rögzítés</button>
                  </div>
                </form>

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
if(isset($_POST['gomb']))
{
  // Változóknak értékadás ----------------------------------------------
  $nev = $_POST['nev'];
  $reszvetelimod = $_POST['reszvetelimod'];
  $leiras = $_POST['leiras'];
  $rendezvenydatuma = $_POST['datum'];
  $rendezvenyideje = $_POST['ido'];
  $rendezvenyhelyszin = $_POST['helyszin'];
  $eladhatojegyekszama = $_POST['eladhatojegyekszama'];
  $megye=$_POST['megye'];
  $jegyar = $_POST['jegyar'];
  // --------------------------------------------------------------------
  // Kép elérési útvonal összefűzés
  $target_dir = "kepek/";
  $target_file = $target_dir . basename($_FILES["kep"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  //---------------------------------------------------------------------

  // Ha a Fájl tényleg kép formátum és nem más
  if(isset($_POST["gomb"]))
  {
    $check = getimagesize($_FILES["kep"]["tmp_name"]);

    if($check !== false)
    {
      $uploadOk = 1;
    }
    else
    {
      echo "A fájl nem kép.";
      $uploadOk = 0;
    }
  }

  // Ha a fájl létezik
  if (file_exists($target_file)) {
    echo "A fájl már létezik.";
    $uploadOk = 0;
  }

  // Fájl méret ellenőrzés
  if ($_FILES["kep"]["size"] > 5000000)
  {
    echo "Túl nagy fájl.";
    $uploadOk = 0;
  }

  // Formátum engedélyezés
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
  {
    echo "Csak JPG, JPEG, PNG fájlokat lehet feltölteni.";
    $uploadOk = 0;
  }

  // Ellenőrzés ha az '$uploadOk' értéke '0' egy hiba miatt
  if ($uploadOk == 0) {
    echo "Nem sikerült feltölteni a fájlt.";
  }
  else
  {
    // Ha minden rendben van akkor megpróbálja feltölteni a fájlt
    if (move_uploaded_file($_FILES["kep"]["tmp_name"], $target_file))
    {
      echo htmlspecialchars( basename( $_FILES["kep"]["name"])). " fájl feltöltve.";

      $fileExt = explode('.', $kep);
      $fileActualExt = strtolower(end($fileExt));
      $fileNameNew = uniqid('', true).".".$fileActualExt;
      $fileDestination = 'kepek/'.$fileNameNew;
      $szervezoID = $_SESSION['szervezoID'];

      // A kép fájl, 'kepek' mappába helyezés
      move_uploaded_file($check, $fileDestination);
    }
    else
    {
      echo "Valami baj történt a fájl feltöltése során.";
    }
  }

  // Elérési útvonal
  $kep = "kepek/".$_FILES["kep"]["name"];

  // Karakterkódolás
  $con->query("SET NAMES utf8");

  // Adatbázisba való feltöltés
  $query = "INSERT INTO `rendezvenyek`(`szervezoID`, `nev`, `reszveteliMod`, `megye`, `rendezvenyDatuma`, `rendezvenyIdeje`, `helyszin`, `leiras`, `jegyAr`, `kep`, `elerhetoJegyekSzama`, `eladottJegyekSzama`)
  VALUES  ($szervezoID,'$nev','$reszvetelimod','$rendezvenydatuma', '$rendezvenyideje', '$rendezvenyhelyszin','$leiras', '$jegyar','$kep', '$eladhatojegyekszama', 0)";

  // Sikeres feltöltés
  mysqli_query($con,$query) or die ('Hiba az adatbevitelnél!');
  print("<br>A rendezvény adatai feltöltve!");
}

// Lábléc
include("footer.php");
?>

<script src="js/bootstrap.js"></script>
</body>
</html>

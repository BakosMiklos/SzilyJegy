<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
//error_reporting(0);

?>
    <form method='post' enctype='multipart/form-data'>
    Rendezvény neve: <input type='text' name='nev'><br>
    Rendezvény dátuma: <input type='date' name='datum'><br>
    Rendezvény helyszíne: <input type='text' name='helyszin'><br>
    <label for='reszvetelimod'>Rendezvény típusa: </label> 
    <select name='reszvetelimod'>
    <option value='online'>Online</option>
    <option value='rendes'>Rendes</option>
    </select><br>
    Leírás:<br> <textarea name='leiras' rows='5' cols='50'></textarea><br>
    Kép: <input type='file' name='kep' ><br>
    Eladható jegyek száma: <input type='text' name='eladhatojegyekszama'><br>
    Ár: <input type='text' name='jegyar'><br>
    <br><input type='submit' name='gomb' value='Rögzítés'><br>
    </form>
    <?php



if(isset($_POST['gomb']))
{
    $nev = $_POST['nev'];
    $reszvetelimod = $_POST['reszvetelimod'];
    $leiras = $_POST['leiras'];
    $rendezvenydatuma = $_POST['datum'];
    $rendezvenyhelyszin = $_POST['helyszin'];
    $eladhatojegyekszama = $_POST['eladhatojegyekszama'];
    $jegyar = $_POST['jegyar'];

    
    $target_dir = "kepek/";
    $target_file = $target_dir . basename($_FILES["kep"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["gomb"])) {
      $check = getimagesize($_FILES["kep"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        echo "A fájl nem kép.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "A fájl már létezik.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["kep"]["size"] > 5000000) {
      echo "Túl nagy fájl.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      echo "Csak JPG, JPEG, PNG fájlokat lehet feltölteni.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Nem sikerült feltölteni a fájlt.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["kep"]["tmp_name"], $target_file)) {
        echo htmlspecialchars( basename( $_FILES["kep"]["name"])). " fájl feltöltve.";
      } else {
        echo "Valami baj történt a fájl feltöltése során.";
      }
    } 
        $kep = "kepek/".$_FILES["kep"]["name"];

        $con = mysqli_connect("localhost","root","","szilyjegy");

        if (mysqli_connect_errno())
        {
          print( "Adatbázis kapcsolódási hiba!  " . mysqli_connect_error());
        }
        $query = "INSERT INTO `rendezvenyek`(`szervezoID`, `nev`, `reszveteliMod`, `rendezvenyDatuma`, `helyszin`, `leiras`, `jegyAr`, `kep`, `elerhetoJegyekSzama`, `eladottJegyekSzama`) 
        VALUES  (1,'$nev','$reszvetelimod','$rendezvenydatuma','$rendezvenyhelyszin','$leiras', '$jegyar','$kep', '$eladhatojegyekszama', 0)";
        mysqli_query($con,$query) or die ('Hiba az adatbevitelnél!');
        print("<br>A rendezvény adatai feltöltve!");
}
?>
</body>
</html>
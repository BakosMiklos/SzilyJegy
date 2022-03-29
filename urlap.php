<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adatok</title>
</head>
<body>
    <form action="pdf_create.php" method="post">
        <b>Vevő adatok:</b><br>
        <input type="text" name="nev" placeholder="Teljes név"><br>
        <input type="text" name="cim" placeholder="Cím"><br>
        <input type="text" name="ado" placeholder="Adóigazolási szám"><br>
        Fizetési mód:   <select name="fiz">
                            <option value="Készpénz">Készpénz</option>
                            <option value="Átutalás">Átutalás</option>
                            <option value="Utánvétel">Utánvétels</option>
                        </select><br><br>
        <b>Vásárolt termék adatai:</b><br>

        <input type="text" name="arunev" placeholder="Áru neve"><br>
        <input type="text" name="ar" placeholder="Egységár"><br>
        <input type="text" name="mennyiseg" placeholder="Mennyiség"><br>
        <input type="submit" value="Kész" name="submit">
    </form>
    
</body>
</html>
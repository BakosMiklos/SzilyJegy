<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'vizsgaremek';
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;


try {
    $pdo = new PDO($dsn, $user, $password);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


// $sql = $pdo->query('SELECT SHOW CREATE TABLE termekleiras;');

// while ($rekord = $sql->fetch(PDO::FETCH_ASSOC)) {
//     echo $rekord;
// }


// echo '<pre>';
// $stmt1 = $pdo->query('SHOW TABLES', PDO::FETCH_NUM);
// foreach ($stmt1->fetchAll() as $row) {
//     $stmt2 = $pdo->query("SHOW CREATE TABLE `$row[0]`", PDO::FETCH_ASSOC);
//     $table = $stmt2->fetch();
//     echo "{$table['Create Table']};nn";
// }
// echo '</pre>';

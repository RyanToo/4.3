<?php
$host = 'localhost';
$dbname = 'db_name';
$user = 'name';
$root = ' ';

try {
    $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $user, $root);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Couldn't link: " . $e->getMessage();
}


?>

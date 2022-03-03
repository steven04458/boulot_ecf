<?php
$dsn = '4D:host=localhost;charset=UTF-8';
$user = 'test';
$pass = 'test';

// Connexion et sélection de la base
$db = new PDO($dsn, $user, $pass);

$stmt = $db->prepare('SELECT {FN method() AS VARCHAR } FROM _USER_SCHEMAS LIMIT 1');

$stmt->execute();
print_r($stmt->fetchAll());

unset($stmt);
unset($db);
?>

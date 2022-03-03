<?php
$dsn = '4D:host=localhost;charset=UTF-8';
$user = 'test';
$pass = 'test';

// Connexion au serveur 4D
$db = new PDO($dsn, $user, $pass);

try {
    $db->exec('CREATE TABLE test(id varCHAR(1) NOT NULL, val VARCHAR(10))');
} catch (PDOException $e) {
    die("Erreur 4D : " . $e->getMessage());
}
        
$db->exec("INSERT INTO test VALUES('A', 'B')");
$db->exec("INSERT INTO test VALUES('C', 'D')");
$db->exec("INSERT INTO test VALUES('E', 'F')");

$stmt = $db->prepare('SELECT id, val from test');

$stmt->execute();
print_r($stmt->fetchAll());

unset($stmt);
unset($db);
?>

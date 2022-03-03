<?php
$dsn = '4D:host=localhost;charset=UTF-8';
$user = 'test';
$pass = 'test';
 
// Connexion au serveur 4D
$db = new PDO($dsn, $user, $pass);

$objets = array('[',']','[]','][','[[',']]','[[[',']]]','TBL ]]32[23');

foreach($objets as $id => $objet) {
    $objet = str_replace(']',']]', $objet);
    print "$objet\n";
    
    $db->exec('CREATE TABLE IF NOT EXISTS ['.$objet.'](['.$objet.'] FLOAT)');

    $req = "INSERT INTO [$objet] ([$objet]) VALUES ($id);";
    $db->query($req);

    $q = $db->prepare("SELECT [$objet] FROM [$objet]");
    $q->execute();
    $x[] = $q->fetch(PDO::FETCH_NUM);

    $db->exec('DROP TABLE ['.$objet.'];');
}

?>

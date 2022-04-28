<?php
$link=new PDO("4D:host=192.168.1.42;port=19812;charset=UTF-8", "Super_utilisateur", "malupa7625");
print_r($link);

$sql="select max(Code_Module)  as MaxCM from modules where Code_Module > 5000000 and Code_Module < 9000000";
$q=$link->prepare($sql);
print_r($q);
echo "\r\n+pdo::prepare erreur: ".$link->errorCode()."/".print_r($link->errorInfo(), true)."\r\n";

$rq=$q->execute();
echo "Execute: $rq \r\n";
echo "\r\n+pdo::prepare erreur: ".$link->errorCode()."/".print_r($link->errorInfo(), true)."\r\n";

$r=$q->fetch(PDO::FETCH_ASSOC); 
echo "fetch:  \r\n";
print_r($r);
echo "\r\n+pdo::prepare erreur: ".$link->errorCode()."/".print_r($link->errorInfo(), true)."\r\n";

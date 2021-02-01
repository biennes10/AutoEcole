<?php 
include "cnx.php";
$rqt = $cnx->prepare("INSERT INTO lecon (CodeLecon, Date, Heure, Duree,CodeMoniteur,CodeEleve,Immatriculation,Reglee,CompteurInitial,CompteurFinal)
VALUES (".$_GET["idLecon"].", '".$_GET["date"]."','".$_GET["heure"]."' ,1, ".$_GET["moniteur"].",".$_GET["eleve"].",'".$_GET["vehicule"]."',0,0,0);");
$rqt->execute();





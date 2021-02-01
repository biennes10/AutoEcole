<?php 
include "cnx.php";
$rqt = $cnx->prepare("select moniteur.CodeMoniteur, nom, Prenom from moniteur, licence where moniteur.CodeMoniteur = licence.CodeMoniteur and licence.CodeCategorie = ".$_GET['categorie']." and moniteur.CodeMoniteur not in (SELECT CodeMoniteur from lecon where date = '".$_GET['date']."' and heure = '".$_GET['heure']."')");
$rqt->execute();

foreach($rqt-> fetchAll(PDO::FETCH_ASSOC) as $moniteur)
{
    echo "<option value ='".$moniteur["CodeMoniteur"]."'>";
    echo $moniteur["nom"];
    echo "</option>";
 }

<?php 
include "cnx.php";
$rqt = $cnx->prepare("select vehicule.Immatriculation, modele, marque from vehicule where vehicule.Immatriculation not in (SELECT Immatriculation from lecon where date = '".$_GET['date']."' and heure = '".$_GET['heure']."')");
$rqt->execute();

foreach($rqt-> fetchAll(PDO::FETCH_ASSOC) as $vehicule)
{
    echo "<option value ='".$vehicule["Immatriculation"]."'>";
    echo $vehicule["modele"];
    echo "</option>";
 }

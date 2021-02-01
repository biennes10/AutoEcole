<?php 
include "cnx.php";
$rqt = $cnx->prepare("select eleve.CodeEleve, nom, prenom from eleve where eleve.codeeleve not in (SELECT codeeleve from lecon where date = '".$_GET['date']."' and heure = '".$_GET['heure']."')");
$rqt->execute();

foreach($rqt-> fetchAll(PDO::FETCH_ASSOC) as $eleve)
{
    echo "<option value ='".$eleve["CodeEleve"]."'>";
    echo $eleve["prenom"];
    echo "</option>";
 }

<?php 
    include_once "php/cnx.php";
    $categories = $cnx->prepare("select CodeCategorie, Libelle from categorie");
    $categories->execute();

    $maxId = $cnx->prepare("select MAX(CodeLecon) as max FROM lecon");
    $maxId->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoEcole</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.1.1.js"></script>
</head>
<body>
<div class="grid-container">
  <div class="a">Numero de la lecon</div>
  <div class="b">choix de la date</div>
  <div class="c">choix de l'heure</div>
  <div class="d">choix de la catégorie du permis</div>
  <div class="e"> <?php 
    $max = $maxId->fetch();
    $max = $max["max"];
    $max+=1;
    echo "<input type='text' id='txtCodeLecon'  disabled value='".$max."'>";
  ?></div>
  <div class="f"><input type="date" id="txtDateLecon"></div>
  <div class="g"><input type="time" id ="txtHeureLecon"></div>
  <div class="h"><?php foreach($categories-> fetchAll(PDO::FETCH_ASSOC) as $categorie)
    {
        echo "<div class='rdo'><input type='radio'  name='categories'  value='".$categorie["CodeCategorie"]."'
       >
 <label >".$categorie["Libelle"]."</label></div>";
    } ?></div>
  <div class="rechercher"><button type="button" class="btn btn-success" style="width:100%;" id="btnRechercher">Rechercher</button></div>
  
</div>




<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Moniteurs</th>
      <th scope="col">Vehicules</th>
      <th scope="col">Eleves</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><div id="divMoniteursDispos"><select  id="sltMoniteurs"></select></div></td>
      <td><div id="divVehiculesDispos"><select  id="sltVehicules"></select></div></td>
      <td><div id="divEleves"><select  id="sltEleves"></select></div></td>
    </tr>
  </tbody>
</table>
<button type="button" class="btn btn-success" style="width:100%;" id="btnValider">Valider Vos Choix</button>
</body>
<script src="js/functions.js"></script>
</html>
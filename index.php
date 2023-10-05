<?php $pdo = require_once 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('Components/_head.php'); ?>
  <title>ShopNet</title>
</head>

<body style="background-color: grey;">
  <?php include('nav.php'); ?>
  <div id="confidential">
    Veuillez accepter notre politique de confidentialité.
    <button id="doneConfidential">OK</button>
  </div>
  <div class="container text-start" style="background-color: whitesmoke; border-radius: 20px;">
    <div class="row">
      <div class="col">
        <img src="img/shopnet-cuisine.jpg" class="img-thumbnail" alt="">
      </div>
      <div class="col mx-auto p-2">
        <h3>L'Histoire de ShopNet : Où la Passion pour la Cuisine Rencontrait la Qualité des Casseroles</h3>
        ShopNet est bien plus qu'une simple entreprise de vente en ligne de casseroles. C'est le résultat d'une passion profonde pour la cuisine et d'un engagement absolu envers la qualité.
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="img-thumbnail" style="background-image: url('img/casseroles.jpg'); background-size: contain;  height: 240px;"></div>
      </div>
      <div class="col">
        <div class="img-thumbnail" style="background-image: url('img/personnalisation.webp'); background-size: contain; height: 240px;"></div>
      </div>
      <div class="col">
        <div class="img-thumbnail" style="background-image: url('img/quality.jpg'); background-size: contain; height: 240px;"></div>
      </div>
      <div class="row">
        <div class="col">
          <h5>Notre Engagement envers la Qualité</h5>
          Chez ShopNet, nous avons parcouru le monde à la recherche des meilleurs fabricants de casseroles. Notre sélection est le résultat d'une recherche minutieuse pour trouver des casseroles qui allient qualité de fabrication, durabilité et performance culinaire exceptionnelle. Nous sommes fiers de proposer une gamme de casseroles de toutes tailles, formes et matériaux pour satisfaire les besoins de chaque chef, amateur ou professionnel.


        </div>
        <div class="col">
          <h5>La Personnalisation à Votre Goût</h5>
          Chez ShopNet, nous croyons que chaque casserole doit être à la fois fonctionnelle et esthétiquement plaisante. C'est pourquoi nous offrons à nos clients la possibilité de personnaliser leurs casseroles. Vous pouvez choisir parmi une variété de finitions, de poignées et même télécharger vos propres designs pour créer une casserole qui reflète votre style et votre passion pour la cuisine.


        </div>
        <div class="col">
          <h5>L'Art Culinaire et ShopNet</h5>
          Chez ShopNet, nous croyons que chaque grande aventure culinaire commence par une bonne casserole. C'est pourquoi nous nous efforçons de fournir à nos clients les meilleures casseroles du marché, celles qui les inspireront à créer des plats exceptionnels et à exprimer leur passion pour la cuisine.

          Rejoignez-nous dans cette aventure culinaire et découvrez pourquoi ShopNet est bien plus qu'une boutique en ligne de casseroles. C'est un lieu où la passion pour la cuisine rencontre la qualité des casseroles pour créer des moments inoubliables à table.
        </div>
      </div>
    </div>
</body>

</html>
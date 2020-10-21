<div id="banner" class="fadeInDown">
        <img src="/images/photo_jean.jpg" alt="photo de profil" class="profil-picture img-thumbnail col-12">
        <h2 class="col-12 text-center">Bienvenue sur le site de Jean Forteroche</h2>
        <p class="text-center col-lg-8 col-12 px-1">
          Nous sommes ravis de vous accueillir sur le site officiel de l'acteur et auteur Jean Forteroche.
          Jean a commencé sa carrière d'acteur à l'âge de 18 ans dans le film "Le Professionnel" de Georges Lautner, ce
          qui lui a permis de se lancer dans une grande carrière d'acteur (22 films).
          Après cette grande carrière, il a décidé de se lancer dans l'écriture de romans et plus particulièrement de registre 
          dramatique. Sorti en 2019, "La nature de l'Homme" a eu un succès tel qu'il a décidé d'écrire un nouveau roman : 
          <strong>Billet simple pour l'Alaska</strong>, un roman racontant l'histoire d'un homme parti à la conquête de l'Alaska.
        </p>
        <p class="text-center mt-2 col-lg-8 col-12 px-1">
          Jean a décidé de casser les codes en proposant son roman sous forme de nouvelles paraissant 
          chaque semaine pendant 5 semaines. Cette idée est venue d'une question : Comment faire savourer une belle histoire ?
          Retrouvez les en cliquant sur le bouton ci-dessous :
        </p>
      
      <a href="#news" class="bt">Découvrir</a>
</div>


  <div class="border col-8 col-lg-6"></div>
    <H2 class="col-12 text-center" id="news">Billet simple pour l'alaska</H2>
    <p class="col-12 text-center">J'ai l'honneur de vous présenter les épisodes tant attendus du tout nouveau roman de Jean Forteroche : <br>
      <strong>Billet simple pour l'alaska !</strong> <br>
      Chaque semaine sera publié un épisode et ce pour 5 épisodes !
    </p>
  <?php
  foreach ($listeNews as $news)
  {
  ?>
    <div class="card">
      <div class="card-body  text-center">
        <h2 class="card-title text-uppercase"><?= $news['titre'] ?></h2>
        <p class="card-text"><?= nl2br($news['contenu']) ?></p>
          <div class="bt-card">
            <a href="news-<?= $news['id'] ?>.html" class="bt" role="button">Lire plus</a>
          </div>
      </div>
    </div>
  <?php
  } 
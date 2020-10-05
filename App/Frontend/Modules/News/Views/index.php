<H2 class="col-12 text-center">Les nouveautés de Jean Forteroche</H2>
<?php
foreach ($listeNews as $news)
{
?>
<div class="card text-center" style="width: 18rem;">
  <div class="card-body">
    <h2 class="card-title text-uppercase"><?= $news['titre'] ?></h2>
    <p class="card-text"><?= nl2br($news['contenu']) ?></p>
    <a href="news-<?= $news['id'] ?>.html" class="btn" role="button">Lire plus</a>
  </div>
</div>
<?php
}
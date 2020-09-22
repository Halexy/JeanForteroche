<?php
foreach ($listeNews as $news)
{
?>
<div class= "container liste_news">

    <div class= "row">
      <div class= "col-10 h2_listenews">
        <h2><?= $news['titre'] ?></h2>
      </div>
    </div>

    <div class= "row">
      <div class= "col-10 p_listenews">
        <p><?= nl2br($news['contenu']) ?></p>
        <a href="news-<?= $news['id'] ?>.html" class="btn" role="button">Lire plus</a>
      </div>
    </div>
    
</div>
<?php
}
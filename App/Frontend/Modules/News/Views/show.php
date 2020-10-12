<div class= "container comment">

  <p>Par <em><?= $news['auteur'] ?></em>, le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>
  <h2 style="text-align: center;"><?= $news['titre'] ?></h2>
  <p style="text-align: center;"><?= nl2br($news['contenu']) ?></p>
 
  <?php if ($news['dateAjout'] != $news['dateModif']) { ?>
    <p style="text-align: right;"><small><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
  <?php } ?>

  <div class="espace_commentaire text-center mx-auto">
    <h3 style="text-align: center; padding-top: 25px; ">ESPACE COMMENTAIRES</h3>
 
    <?php
      if (empty($comments))
      {
    ?>
    <p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
    <?php
  }
 
  foreach ($comments as $comment)
  {
  ?>


    <fieldset>
    <div class="commentaires">
      <legend>
        Posté par <strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?>
        <?php if ($user->isAuthenticated()) { ?> -
          <a href="admin/comment-update-<?= $comment['id'] ?>.html" class="btn" role="button">Modifier</a> 
          <a href="admin/comment-delete-<?= $comment['id'] ?>.html" class="btn" role="button">Supprimer</a>
        <?php } 
        else { ?>
          <a href="/comment-report-<?= $comment['id'] ?>.html" class="btn" role="button">Signaler</a> 
          <?php } 

        var_dump($comment['report'])   ?>
          <p>Le commentaire à déja été signalé</p>
          <?php    ?>
        
      </legend>
      <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
      </div>
    </fieldset>
    <?php
    }
    ?>


  <p><a href="commenter-<?= $news['id'] ?>.html" class="btn" role="button">Ajouter un commentaire</a></p>

  </div>
</div>
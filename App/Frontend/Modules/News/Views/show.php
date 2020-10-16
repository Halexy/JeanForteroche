<div class= "container article">

  <p>Par <em><?= $news['auteur'] ?></em>, le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>
  <h2 style="text-align: center;"><?= $news['titre'] ?></h2>
  <p style="text-align: center;"><?= nl2br($news['contenu']) ?></p>
 
  <?php if ($news['dateAjout'] != $news['dateModif']) { ?>
    <p style="text-align: right;"><small><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
  <?php } ?>

  <div class="zone_comment text-center mx-auto" id="zone_comment">
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
    <div class="comment">

      <legend>

        Posté par <strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?><br>
        <?php 
          if ($user->isAuthenticated()) { ?> 
            <a href="admin/comment-update-<?= $comment['id'] ?>.html" class="btn btn-warning" role="button">Modifier</a> 
            <a href="admin/comment-delete-<?= $comment['id'] ?>.html" class="btn btn-danger" role="button">Supprimer</a>
          <?php }

          elseif ($user->isAuthenticated() && $comment['report'] == 1) { ?>
            <div class="alert alert-danger">
              <p style="margin:0;"><i class="fas fa-exclamation-triangle"></i> Commentaire signalé <i class="fas fa-exclamation-triangle"></i></p>
            </div>
          <?php } 

          elseif ($user->isAuthenticated() == false && $comment['report'] == 1) { ?>
            <div class="alert alert-info">
              <p style="margin:0; font-size: 1vw">Le commentaire a déjà signalé et il sera modéré dans les plus brefs délais !</p>
            </div>
          <?php } 
          
          elseif ($user->isAuthenticated() == false && $comment['report'] == 0) { ?>
            <a href="/comment-report-<?= $comment['id'] ?>.html" class="bt" role="button">Signaler</a>
          <?php } ?>



      </legend>

      <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>

      </div>
    </fieldset>
    <?php
    }
    ?>

    <?php if ($user->isAuthenticated() == false) { ?>

      <p><a href="commenter-<?= $news['id'] ?>.html" class="bt" role="button">Ajouter un commentaire</a></p>

    <?php } ?>


  

  </div>
</div>
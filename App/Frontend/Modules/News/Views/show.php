<div class= "container article">

<p><small>Par <em><?= $news['auteur'] ?></em>, le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></small></p>
  <h2 class="text-center"><?= $news['titre'] ?></h2>
  <p class="text-center"><?= ($news['contenu']) ?></p>
 
  <?php if ($news['dateAjout'] != $news['dateModif']) { ?>
    <p class="text-right"><small><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
  <?php } ?>

  <div class="zone_comment text-center mx-auto" id="zone_comment">
    <h3 class="mt-5">ESPACE COMMENTAIRES</h3>

    <?php
      if (empty($comments))
      { ?>
      <p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
      <?php 
      }
      
  foreach ($comments as $comment)
  {
  ?>
    <fieldset>
    <div class="comment">

      <legend class="pb-2">
        <h5 class="pt-2">Posté par <strong><?= htmlspecialchars($comment['auteur']) ?></strong><small> le <?= $comment['date']->format('d/m/Y à H\hi') ?></small></h5>
      
          <?php 
          if ($user->isAuthenticated() && $comment['report'] == 1) { ?>
            <div class="alert alert-danger my-1">
              <p class="m-0"><i class="fas fa-exclamation-triangle"></i><br> Commentaire signalé</p>
            </div>
          <?php } 

          if ($user->isAuthenticated()) { ?> 
            <a href="admin/comment-update-<?= $comment['id'] ?>.html" class="btn-sm btn-warning" role="button">Modifier</a> 
            <a href="admin/comment-delete-<?= $comment['id'] ?>.html" class="btn-sm btn-danger" role="button">Supprimer</a>
          <?php }

          elseif ($user->isAuthenticated() == false && $comment['report'] == 1) { ?>
            <div class="alert alert-info my-1">
            <p class="m-0">Le commentaire a déjà signalé et il sera modéré dans les plus brefs délais !</p>
            </div>
          <?php } 
          
          elseif ($user->isAuthenticated() == false && $comment['report'] == 0) { ?>
            <a href="/comment-report-<?= $comment['id'] ?>.html" class="btn-sm btn-danger" role="button">Signaler</a>
          <?php } ?>
      </legend>      

      <p><?= htmlspecialchars($comment['contenu']) ?></p>

    </div>
    </fieldset>
    <?php
    }

    if ($user->isAuthenticated() == false) { ?>

      <p><a href="commenter-<?= $news['id'] ?>.html" class="bt" role="button">Ajouter un commentaire</a></p>

    <?php } ?>

  </div>
</div>
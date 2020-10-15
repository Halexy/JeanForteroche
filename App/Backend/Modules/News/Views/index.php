<?php
namespace Model;
 
use \Entity\Comment;
?>

<div class="container" id="container_news">

    
    <h2 class="text-center">Il y a actuellement <?= $nombreNews ?> news. En voici la liste :</h2>

    <div class="row">
      <table class="table_news">
        <tr><th>Auteur</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
      <?php
      foreach ($listeNews as $news)
      {
        echo '<tr><td>', $news['auteur'], '</td><td><a href="http://jeanforteroche/news-', $news['id'], '.html">', $news['titre'], '</a></td><td>le ', $news['dateAjout']->format('d/m/Y à H\hi'), '</td><td>', ($news['dateAjout'] == $news['dateModif'] ? '-' : 'le '.$news['dateModif']->format('d/m/Y à H\hi')), '</td><td><a href="news-update-', $news['id'],
         '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="news-delete-', $news['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a>', 
         '<a href="/news-', $news['id'], '.html#zone_comment"><i class="fas fa-exclamation-triangle pl-1" style="color: orange"></i></a>';
                 if ($comment['report'] == 1)
        {
        echo '<a href="/news-', $news['id'], '.html#zone_comment"><i class="fas fa-exclamation-triangle pl-1" style="color: orange"></i></a></td></tr>', "\n";
        };
      } 



      
      ?>
      </table>
    </div>
</div>
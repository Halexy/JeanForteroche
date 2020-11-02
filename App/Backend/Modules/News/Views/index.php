<div class="container" id="container_news">

    <h2 class="text-center">Il y a actuellement <?= $nombreNews ?> billets. En voici la liste :</h2>

    <div class="row">
      <table class="table_news">
        <tr><th>Auteur</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
      <?php
      ;
      foreach ($listeNews as $news)
      {

        echo '
        <tr>
          <td>', $news['auteur'], '</td><td><a href="/news-', $news['id'], '.html">', $news['titre'], '</a></td>
          <td>le ', $news['dateAjout']->format('d/m/Y à H\hi'), '</td>
          <td>', ($news['dateAjout'] == $news['dateModif'] ? '-' : 'le '.$news['dateModif']->format('d/m/Y à H\hi')), '</td>
          <td>
              <a href="/admin/news-update-', $news['id'], '.html"><i class="fas fa-edit text-info"></i></a> 
              <a href="/admin/news-delete-', $news['id'], '.html"><i class="fas fa-trash-alt text-danger"></i></a>'; 
                 
       if (in_array($news['id'], $commentReport))
        {
          echo '<a href="/news-', $news['id'], '.html#zone_comment"><i class="fas fa-exclamation-triangle pl-1 text-warning"></i></a></td></tr>', "\n";
          
        };
      
      } 
      
      ?>
      </table>
    </div>
</div>
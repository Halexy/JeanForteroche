<!DOCTYPE html>
<html>
  <header>
    <title>
      <?= isset($title) ? $title : 'Jean Forteroche' ?>
    </title>
 
        <!-- Required meta tags -->
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/187a31dc66.js" crossorigin="anonymous"></script>

    <!-- tinyMCE 5 -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="stylesheet" href="/css/Envision.css">
  </header>
 
  <body>
    <div id="wrap">
    
      <header>
        <nav class="navbar navbar-expand-md sticky-top navbar-light" style="background-color: rgba(35, 89, 82, 0.8);">
          
          <a class="navbar-brand" href="http://jeanforteroche/">
            <img src="/images/logo.PNG" width="60" height="60" class="d-inline-block" alt="logo">
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">

              <li class="nav-item active">
                <a class="nav-link" href="http://jeanforteroche/">Acceuil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Disabled</a>
              </li>
            </ul>

            <?php if ($user->isAuthenticated()) { ?>
              <div class="pull-right">
              <a class="btn" href="/admin/" role="button">Admin</a>
              <a class="btn" href="/admin/news-insert.html" role="button">Ajouter une news</a>
              <a class="btn btn-danger " href="/admin/logout" role="button">Déconnexion</a>
              </div>
            <?php } ?>

            <?php if ($user->isAuthenticated() == false) { ?>
              <div class="pull-right">
              <a class="btn" href="/admin/connexion" role="button">Connexion</a>
              </div>
            <?php } ?>

          </div>

        </nav>
      </header>
    </div>


      <!--
        
      <div class="container-fluid">
        <div class="row">

            

        <div class="banner col-2">
          <img src="/images/ecrivain.png">
        </div>

        <div class="text-banner col-5 mx-auto align-self-center"  data-aos="" data-aos-duration="1500">
          <h1>Jean Forteroche</h1>
          <h2>Acteur et écrivain</h2>
            <p>
            C\'est avec joie que je vous accueil aujourd\'hui sur mon site internet, 
            Celui-ci reprend  mes différentes nouveautés et actualités, vous avez la possibilité de vous créer un compte 
            très simplement pour intéragir avec mes post.
            </p>
        </div>

        <div class="banner col-2">
          <img src="/images/cinema.png">
        </div>
        
      

        </div>
      </div>
              -->

<!-- content-wrap -->
  <div id="content-wrap" class="container-fluid">


    <section id="main">
      <div class="row">
        <?php if ($user->hasFlash()) echo '<p class="hasflash">', $user->getFlash(), '</p>'; ?>

        <?= $content ?>
      </div>
    </section>

  </div>





<!-- Pied de page --> 
<!-- Footer -->
  <footer class= "page-footer pt-4 mt-5 sticky-bottom">

<!-- Footer Text -->

<h5 class="text-uppercase font-weight-bold">Contact</h5>
    <!-- Grid row -->



      <div class="row mt-5">

      
        <p class="col-12 col-sm-6 col-md-3 lead">
        <i class="fas fa-home mb-3 lead"></i></br>
          52, rue de Penthièvre, 92800 PUTEAUX
        </p>

        <p class="col-12 col-sm-6 col-md-3 lead">
        <i class="fas fa-envelope mb-3 lead"></i></br>
          contact@jeanforteroche.com
        </p>

        <p class="col-12 col-sm-6 col-md-3 lead">
        <i class="fas fa-phone mb-3 lead"></i></br>
          01.28.04.43.39 
        </p>

        <p class="col-12 col-sm-6 col-md-3 lead">
        <i class="fas fa-print mb-3 lead"></i></br>
          06.87.25.16.55
        </p>

      </div>

<!-- Footer Text -->
<!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="http://www.alexyhajjar.fr/"> AlexyHajjar</a>
  </div>

</footer>

<!-- Script tinyMCE -->
<?php if ($user->isAuthenticated()) { ?>
  <script>
    tinymce.init({
      selector: 'textarea',
      height: 500,
      menubar: 'insert',
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount',
        'image'
      ],
      toolbar: 'undo redo | formatselect | ' +
      'bold italic backcolor | alignleft aligncenter ' +
      'alignright alignjustify | bullist numlist outdent indent | ' +
      'removeformat | help' +
      'image',
      image_list: [
        {title: 'My image 1', value: 'https://www.example.com/my1.gif'},
        {title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}
      ],
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
  </script>
  <?php } ?>

    <!-- Boostrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script type="text/javascript" src="main.js"></script>
    
  </body>
</html>
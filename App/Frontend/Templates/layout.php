<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>
      <?= isset($title) ? $title : 'Jean Forteroche' ?>
    </title>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Projet 4 openclassroom / Création d'un blog pour un écrivain">
    <meta name="keywords" content="Projet, Openclassroom, HTML, SCSS, PHP">
    <meta name="author" content="Alexy Hajjar">
   
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/187a31dc66.js" crossorigin="anonymous"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <!-- tinyMCE 5 -->
    <script src="https://cdn.tiny.cloud/1/5m2oyqax9487r7v3ga1m2tpsa3x1zwdx92jsbw1zwtrukd8s/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="stylesheet" href="/css/style.css">
  </head>
 
  <body>
    <div id="wrap">

<!-- Navbar Bootstrap-->  
    <nav class="navbar navbar-expand-lg navbar-light bg-black">
      <a class="navbar-brand" href="/">
        <img src="/images/logo.png" width="60" height="60" class="d-inline-block" alt="logo" >
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse  text-center" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#news">Billet simple pour l'alaska</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#footer">Contact</a>
          </li>
          <li class="nav-item">
            <?php if ($user->isAuthenticated() == false) { ?>
              <a class="nav-link" href="/admin/connexion" role="button">Connexion</a>
            <?php } ?>
          </li>
        </ul>

        <?php if ($user->isAuthenticated()) { ?>
          <div class="pull-right">
            <a class="bt" href="/admin/" role="button">Admin</a>
            <a class="bt" href="/admin/news-insert.html" role="button">Ajouter un billet</a>
            <a class="bt btn-danger " href="/admin/logout" role="button">Déconnexion</a>
          </div>
        <?php } ?>
      </div>

    </nav>
  </div>

<!-- Content-wrap -->
  <div id="content-wrap">
    <section id="main">

      <div class="row">

        <?php if ($user->hasFlash()) echo ' 
          <div class="alert alert-info alert-dismissible mx-auto text-center fadeInDown">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>', $user->getFlash(), '</p>
          </div>'; 
        ?>

        <?= $content ?>

      </div>

    </section>
  </div>


<!-- Footer -->
<footer class="page-footer stylish-color-dark pt-4 mt-5" id="footer">

  <div class="container text-center text-md-left">
    <div class="row">

      <div class="col-lg-4 col-10 mx-auto">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4 lead">Contacter Jean Forteroche</h5>
        <p class="lead">Pour contacter Jean forteroche, plusieurs moyens s'offrent à vous et vous pouvez les retrouver sur votre droite.
        Nous vous invitons également à visiter ses réseaux sociaux !
        </p>
      </div>

      <div class="col-lg-3 mx-auto">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4 lead">Adresse postale</h5>

        <ul class="list-unstyled">
          <li>
            <p class="lead">
              <em class="fas fa-home mb-3 lead"></em><br>
              52, rue de Penthièvre, 92800 PUTEAUX
            </p>
          </li>
        </ul>

      </div>

      <div class="col-lg-3 mx-auto">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4 lead">E-mail</h5>

        <ul class="list-unstyled">
          <li>
            <p class="lead">
              <em class="fas fa-envelope mb-3 lead"></em><br>
              contact@jeanforteroche.com
            </p>
          </li>
        </ul>

      </div>
      
      <div class="col-lg-2 mx-auto">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4 lead">Téléphone</h5>

        <ul class="list-unstyled">
          <li>
            <p class="lead">
              <em class="fas fa-phone mb-3 lead"></em><br>
              01.28.04.43.39 
            </p>
          </li>
        </ul>

      </div>

    </div>
  </div>

  <!-- Social buttons -->
  <div class="social-button text-center mb-5 mt-3">
    <a href="https://www.facebook.com/"><em class="fa fa-facebook"></em><span></span></a>
    <a href="https://twitter.com/"><em class="fa fa-twitter"></em><span></span></a>
    <a href="https://www.google.com/"><em class="fa fa-google"></em><span></span></a>
    <a href="https://www.youtube.com/"><em class="fa fa-youtube"></em><span></span></a>
  </div>

  <!-- Admin connection -->
  <?php if ($user->isAuthenticated() == false) { ?>
    <div class="text-center py-2">
      <h5 class="mb-1">Espace administrateur</h5>
      <a href="/admin/connexion" class="bt">Se connecter</a>
    </div>
  <?php } ?>

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
    <p>© 2020 Copyright:<a href="https://alexyhajjar.fr/"> alexyhajjar.fr</a></p>
    <p>Site fictif pour projet Openclassroom</p>
  </div>
  
</footer>


<!-- SCRIPT -->

  <!-- Boostrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <!-- tinyMCE -->
  <?php if ($user->isAuthenticated()) { ?>

  <script>
    tinymce.init({
    selector: 'textarea',
    plugins: 'image code',
    toolbar: 'undo redo | link image | code',
    // enable title field in the Image dialog
    image_title: true,
    // enable automatic uploads of images represented by blob or data URIs
    automatic_uploads: true,

    file_picker_types: 'image',
    // and here's our custom image picker 
    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');

      input.onchange = function () {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = function () {
          // register the blob in TinyMCEs image blob registry.
          var id = 'blobid' + (new Date()).getTime();
          var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          var base64 = reader.result.split(',')[1];
          var blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);

          // call the callback and populate the Title field with the file name 
          cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
      };

      input.click();
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
  });
  </script>
<?php } ?>

  <script>
    // Prevent Bootstrap dialog from blocking focusin
      $(document).on('focusin', function(e) {
        if ($(e.target).closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
          e.stopImmediatePropagation();
        }
      });
  </script>

  </body>
</html>
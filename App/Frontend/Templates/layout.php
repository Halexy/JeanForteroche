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
      <div id="content-wrap">
        <section id="main">
          <?php if ($user->hasFlash()) echo '<p class="hasflash">', $user->getFlash(), '</p>'; ?>
 
          <?= $content ?>
        </section>
      </div>
 
          <!-- Et voici notre pied de page utilisé sur toutes les pages du site -->
<!-- Footer -->
<footer>

  <!-- Footer Text -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0">

        <!-- Content -->
        <h5 class="text-uppercase font-weight-bold">Jean Forteroche</h5>
        <p style="padding: 0 60px;">
          Jean Forteroche est un auteur / écrivain mettant en avant ses différentes oeuvres sur son site internet.
          Acteur depuis son adolescence, il est devenu plus tard célèbre pour avoir joué dans certains films.
          Il est également connu pour avoir publié plusieurs ouvrages célèbres sur l'histoire de France, 
          aujourd'hui il souhaiterait vous faire partarger ses dernières nouveautés.
        </p>

      </div>
 

      <!-- Grid column -->
      <div class="col-md-6 mb-md-0 mb-3">

        <!-- Content -->
        <h5 class="text-uppercase font-weight-bold">Contact</h5>
        <hr>
        <p>
          <i class="fas fa-home mr-3"></i> 52, rue de Penthièvre, 92800 PUTEAUX</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> contact@jeanforteroche.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> 01.28.04.43.39 </p>
        <p>
          <i class="fas fa-print mr-3"></i> 06.87.25.16.55 </p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Text -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="http://www.alexyhajjar.fr/"> AlexyHajjar</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
  </div>



    <!-- Boostrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script type="text/javascript" src="main.js"></script>
    
  </body>
</html>
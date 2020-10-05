<div class="wrapper fadeInDown">
  <div class="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="/images/add-news-icon.PNG" class="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <h2>Ajouter une news</h2>
      <form action="" method="post">
        <p>
          <?= $form ?>

          <form name="fo" method="post" action="" enctype="multipart/form-data">
                    <input type="file" name="image" /></br>
                    <input type="submit" name="valider" value="charger"/>
          </form>
      
          <input type="submit" value="Ajouter" />
        </p>
      </form>

  </div>
</div>
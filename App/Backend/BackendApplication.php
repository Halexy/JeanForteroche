<?php
namespace App\Backend;
 
use \OCFram\Application;
 
class BackendApplication extends Application
{
  public function __construct()
  {
    parent::__construct();
 
    $this->name = 'Backend';
  }
 
  public function run()
  {
    if ($this->user->isAuthenticated())
    {
      // Obtention du contrôleur grâce à la méthode parente
      $controller = $this->getController();
    }
    else
    {
      // Instanciation du contrôleur du module de connexion.
      $controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'index');
    }
 
    // Execution du controleur
    $controller->execute();
 
    // Assignation de la page créée par le contrôleur et envoie.
    $this->httpResponse->setPage($controller->page());
    $this->httpResponse->send();
  }
}
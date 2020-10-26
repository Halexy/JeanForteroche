<?php
namespace App\Frontend;
 
use \OCFram\Application;
 
class FrontendApplication extends Application
{
  // Appeler le constructeur parent et spécifier le nom de l'app
  public function __construct()
  {
    parent::__construct();
 
    $this->name = 'Frontend';
  }
 
  // Obtention du contrôleur, execution. Assignation page creee par le contrôleur et envoi de la reponse.
  public function run()
  {
    $controller = $this->getController();
    $controller->execute();
 
    $this->httpResponse->setPage($controller->page());
    $this->httpResponse->send();
  }
}
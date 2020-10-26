<?php
namespace OCFram;
 
// Ajouter header et cookies, assigner page et envoyer reponse, redirection / 404

class HTTPResponse extends ApplicationComponent
{
  protected $page;
 
  public function addHeader($header)
  {
    header($header);
  }
 
  public function redirect($location)
  {
    header('Location: '.$location);
    exit;
  }
 
  public function redirect404()
  {
    // Créer instance de la classe Page
    $this->page = new Page($this->app);
    $this->page->setContentFile(__DIR__.'/../../Errors/404.html');
 
    $this->addHeader('HTTP/1.0 404 Not Found');
 
    $this->send();
  }
 
  public function send()
  {
    exit($this->page->getGeneratedPage());
  }
 
  public function setPage(Page $page)
  {
    $this->page = $page;
  }
 
  // Changement par rapport à la fonction setcookie() : le dernier argument est par défaut à true pour sécuriser
  public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
  {
    setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
  }
}
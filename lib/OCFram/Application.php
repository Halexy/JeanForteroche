<?php
namespace OCFram;
 
// Instancier classes HTTP et accesseurs

abstract class Application
{
  protected $httpRequest;
  protected $httpResponse;
  protected $name;
  protected $user;
  protected $config;
 
  public function __construct()
  {
    $this->httpRequest = new HTTPRequest($this);
    $this->httpResponse = new HTTPResponse($this);
    $this->user = new User($this);
    $this->config = new Config($this);
 
    // spécifier nom en initialisant attribut
    $this->name = '';
  }
 
  public function getController()
  {
    $router = new Router;
 
    $xml = new \DOMDocument;
    $xml->load(__DIR__.'/../../App/'.$this->name.'/Config/routes.xml');
 
    $routes = $xml->getElementsByTagName('route');
 
    // Parcourt les routes du fichier XML.
    foreach ($routes as $route)
    {
      $vars = [];
 
      // Si des variables sont présentes dans l'URL.
      if ($route->hasAttribute('vars'))
      {
        $vars = explode(',', $route->getAttribute('vars'));
      }
 
      // Ajouter la route au routeur.
      $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
    }
 
    try
    {
      // Récupèration de la route correspondante à l'URL.
      $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
    }
    catch (\RuntimeException $e)
    {
      if ($e->getCode() == Router::NO_ROUTE)
      {
        $this->httpResponse->redirect404();
      }
    }
 
    // Ajouter les variables de l'URL au tableau $_GET.
    $_GET = array_merge($_GET, $matchedRoute->vars());
 
    // Instancier le contrôleur.
    $controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
    return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
  }
 
  abstract public function run();
 
  public function httpRequest()
  {
    return $this->httpRequest;
  }
 
  public function httpResponse()
  {
    return $this->httpResponse;
  }
 
  public function name()
  {
    return $this->name;
  }
 
  public function config()
  {
    return $this->config;
  }
 
  public function user()
  {
    return $this->user;
  }
}
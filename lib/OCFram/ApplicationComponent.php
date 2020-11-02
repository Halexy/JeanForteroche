<?php
namespace OCFram;

// Stocker l'instance de l'application exécutée pendant la construction de l'objet
 
abstract class ApplicationComponent
{
  protected $app;
 
  public function __construct(Application $app)
  {
    $this->app = $app;
  }
 
  public function app()
  {
    return $this->app;
  }
}
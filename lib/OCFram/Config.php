<?php
namespace OCFram;

// Recuperer un parametre et sa valeur
 
class Config extends ApplicationComponent
{
  protected $vars = [];

 // Retourner le paramètre précédemment enregistré.
  public function get($var)
  {
    if (!$this->vars)
    {
      // Premier appel à la méthode alors
      $xml = new \DOMDocument;
      $xml->load(__DIR__.'/../../App/'.$this->app->name().'/Config/app.xml');
 
      $elements = $xml->getElementsByTagName('define');
 
      foreach ($elements as $element)
      {
        $this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
      }
    }
 
    if (isset($this->vars[$var]))
    {
      return $this->vars[$var];
    }
 
    return null;
  }
}
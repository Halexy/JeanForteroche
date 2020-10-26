<?php
namespace OCFram;

// Ajouter variable à la page, assigner une vue et générer layout
 
class Page extends ApplicationComponent
{
  protected $contentFile;
  protected $vars = [];
 
  public function addVar($var, $value)
  {
    if (!is_string($var) || is_numeric($var) || empty($var))
    {
      throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractères non nulle');
    }
 
    $this->vars[$var] = $value;
  }
 
  // Inclure les pages pour générer leur contenu, et stocker ce contenu dans une variable
  public function getGeneratedPage()
  {
    if (!file_exists($this->contentFile))
    {
      throw new \RuntimeException('La vue spécifiée n\'existe pas');
    }
 
    $user = $this->app->user();

    // transformation du tableau stocké dans l'attribut $vars en variables 
    extract($this->vars);
 
    ob_start();
      require $this->contentFile;
    $content = ob_get_clean();
 
    ob_start();
      require __DIR__.'/../../App/'.$this->app->name().'/Templates/layout.php';
    return ob_get_clean();
  }
 
  public function setContentFile($contentFile)
  {
    if (!is_string($contentFile) || empty($contentFile))
    {
      throw new \InvalidArgumentException('La vue spécifiée est invalide');
    }
 
    $this->contentFile = $contentFile;
  }
}
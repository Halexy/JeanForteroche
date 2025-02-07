<?php
namespace OCFram;

// Assigner attribut, obtenir sa valeur, authentifier utilisateur et le savoir.
 
session_start();
 
class User
{
  public function getAttribute($attr)
  {
    return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
  }
 
  public function getFlash()
  {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
 
    return $flash;
  }
 
  public function hasFlash()
  {
    return isset($_SESSION['flash']);
  }
 
  public function isAuthenticated()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
  }
 
  public function setAttribute($attr, $value)
  {
    $_SESSION[$attr] = $value;
  }
 
  // Assigner un message à l'utilisateur que l'on affichera sur la page. Si l'utilisateur a un tel message, 
  public function setAuthenticated($authenticated = true)
  {
    if (!is_bool($authenticated))
    {
      throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAuthenticated() doit être un boolean');
    }
 
    $_SESSION['auth'] = $authenticated;
  }

 // Récupérer ce message.
  public function setFlash($value)
  {
    $_SESSION['flash'] = $value;
  }
}
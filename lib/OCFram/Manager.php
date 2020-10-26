<?php
namespace OCFram;

// Lire toutes les méthodes que le manager doit implémenter
 
abstract class Manager
{
  protected $dao;
 
  public function __construct($dao)
  {
    $this->dao = $dao;
  }
}
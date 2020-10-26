<?php
namespace OCFram;
 
// Hydrator qui implémentera hydrate() et les classes Entity et Field l'utiliseront
trait Hydrator
{
  public function hydrate($data)
  {
    foreach ($data as $key => $value)
    {
      $method = 'set'.ucfirst($key);
 
      if (is_callable([$this, $method]))
      {
        $this->$method($value);
      }
    }
  }
}
<?php
namespace OCFram;
 
class TextField extends Field
{
  protected $cols;
  protected $rows;

 // Construire champs de texte
  public function buildWidget()
  {
    $widget = '';
 
    if (!empty($this->errorMessage))
    {
      $widget .= '<p class="alert alert-danger fade in">'. $this->errorMessage. '</p> <br />';
    }

 
    $widget .= '<label class="label">'.$this->label.'</label><textarea name="'.$this->name.'" class="textarea"';
 
    if (!empty($this->cols))
    {
      $widget .= ' cols="'.$this->cols.'"';
    }
 
    if (!empty($this->rows))
    {
      $widget .= ' rows="'.$this->rows.'"';
    }
 
    $widget .= '>';
 
    if (!empty($this->value))
    {
      $widget .= htmlspecialchars($this->value);
    }
 
    return $widget.'</textarea>';
  }
 
  public function setCols($cols)
  {
    $cols = (int) $cols;
 
    if ($cols > 0)
    {
      $this->cols = $cols;
    }
  }
 
  public function setRows($rows)
  {
    $rows = (int) $rows;
 
    if ($rows > 0)
    {
      $this->rows = $rows;
    }
  }
}
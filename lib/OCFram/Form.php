<?php
namespace OCFram;
 
class Form
{
  protected $entity;
  protected $fields = [];

 // Récupérer entité et invoquer setter correspondant
  public function __construct(Entity $entity)
  {
    $this->setEntity($entity);
  }
 
  // Ajouter champ à la liste
  public function add(Field $field)
  {
    $attr = $field->name(); // Recupérer le nom du champ.
    $field->setValue($this->entity->$attr()); // Assigner la valeur correspondante au champ.
 
    $this->fields[] = $field; // Ajouter le champ passé en argument à la liste des champs.
    return $this;
  }
 
  // Générer le formulaire
  public function createView()
  {
    $view = '';
 
    // On génère un par un les champs du formulaire.
    foreach ($this->fields as $field)
    {
      $view .= $field->buildWidget().'<br />';
    }
 
    return $view;
  }
 
  public function isValid()
  {
    $valid = true;
 
    // On vérifie que tous les champs sont valides.
    foreach ($this->fields as $field)
    {
      if (!$field->isValid())
      {
        $valid = false;
      }
    }
 
    return $valid;
  }
 
  public function entity()
  {
    return $this->entity;
  }
 
  public function setEntity(Entity $entity)
  {
    $this->entity = $entity;
  }
}
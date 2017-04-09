<?php
require_once("shape.php");
class Circle extends Shape
{
  private $radius;
  protected $name = "Circle";

  public function __construct($name,$radius)
  {
    $this->name = $name;
    $this->radius = $radius;
  }
  public function getradius()
  {
    return ($this->radius);
  }
  public function setradius($rad)
  {
    return ($this->radius = $rad);
  }
  public function getname()
  {
    return ($this->name);
  }
  public function setname($nme)
  {
    return ($this->name = $nme);
  }
  public function CalculateArea(){
    return ($this->getradius() * 3.14) **2;
  }
  public function Resize($percentage)
  {
      if ($percentage != 0) {
          $this->setradius($this->getradius() * $percentage);
          return ($this->CalculateArea());
      } else {
      }
  }
}
?>
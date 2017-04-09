<?php
require_once("shape.php");
class Triangle extends Shape
{
    private $base;
    private $height;


    public function __construct($name, $base, $height)
    {
        parent::__construct("Triangle");
        $this->base = $base;;
        $this->height = $height;
    }

    public function getbase()
    {
        return ($this->base);
    }

    public function setbase($bas)
    {
        return ($this->base = $bas);
    }

    public function getheight()
    {
        return ($this->height);
    }

    public function setheight($hght)
    {
        return ($this->radius = $hght);
    }


    public function getname()
    {
        return ($this->name);
    }

    public function setname($nme)
    {
        return ($this->name = $nme);
    }


    public function CalculateArea()
    {
        return ( $this->getheight() * $this->getbase() ) / 2;
    }

    public function Resize($percentage){
        if($percentage != 0){
           $this->setheight($this->getheight() * $percentage);
            return ($this->CalculateArea() * $percentage);
        }
        else{

        }
    }

}
?>
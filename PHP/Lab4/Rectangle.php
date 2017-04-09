<?php
require_once("shape.php");
class Rectangle extends Shape
{
    private $length;
    private $width;

    public function __construct($name, $length, $width)
    {
       $this->name = "Rectangle";
        $this->length = $length;
        $this->width = $width;

    }

    public function getlength()
    {
        return ($this->length);
    }

    public function setradius($len)
    {
        return ($this->radius = $len);
    }

    public function getwidth()
    {
        return ($this->width);
    }

    public function setwidth($wid)
    {
        return ($this->radius = $wid);
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
        return $this->getlength() * $this->getwidth();
    }

}
?>
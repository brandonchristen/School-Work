<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
abstract class Shape
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public abstract function CalculateArea();

    public function getName()
    {
        return ($this->name);
    }
}

?>
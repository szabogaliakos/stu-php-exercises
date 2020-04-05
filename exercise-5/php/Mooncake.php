<?php

class Mooncake{
    private $name;
    private $price;
    private $description;
    private $imagePath;

    public function __construct($name, $price, $description, $imagePath)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->imagePath = $imagePath;
    }

    public function __toString()
    {
        $str = "<p><b>Name:</b> ".$this->name."</p>";
        $str .= "<p><b>Price:</b> ".$this->price." VND</p>";
        $str .= "<p><b>Description:</b></p><p>".$this->description."</p>";
        $str .= "<img src=\"img/".$this->imagePath.".PNG\">";
        return $str;
    }
}
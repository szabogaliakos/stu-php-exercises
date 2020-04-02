<?php

class Calculator{
    private $a;
    private $b;
    private $operator;

    public function __construct($a, $b, $operator)
    {
        if (is_numeric($a) && is_numeric($b)&& is_string($operator) && strlen($operator) == 1) {
            $this->a = $a;
            $this->b = $b;
            $this->operator = $operator;
        }
        else{
            throw new InvalidParametersException("Invalid parameters.");
        }
    }

    public function calculate(){
        switch ($this->operator){
            case "+":
                return $this->a + $this->b;
            case "-":
                return $this->a - $this->b;
            case "*":
                return $this->a * $this->b;
            case "/":
                return $this->a / $this->b;
            default:
                throw new Exception("Invalid operator.");
        }
    }

    public function __toString()
    {
        return $this->a.$this->operator.$this->b."=";
    }
}

class InvalidParametersException extends Exception{
    protected $message = "Invalid parameters.";
}
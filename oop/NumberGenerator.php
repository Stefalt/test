<?php

class NumberGenerator
{
    /**
     * @var int
     */
    public $number1;

    /**
     * @var int
     */
    public $number2;

    public function generate()
    {
        $this->number1 = rand(3, 15);
        $this->number2 = rand(1, 9);
    }
}
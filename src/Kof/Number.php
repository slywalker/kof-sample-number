<?php
namespace Kof;

class Number
{

    public $number = null;

    public function __construct($number = null)
    {
        if (!is_null($number)) {
            $this->set($number);
        }
        return $this;
    }

    public function set($number)
    {
        if (is_numeric($number)) {
            $this->number = $number;
        } else {
            throw new \InvalidArgumentException();
        }
        return $this;
    }

    public function get()
    {
        if (!is_numeric($this->number)) {
            throw new \UnexpectedValueException();
        }
        return $this->number;
    }

    public function isEven($number = null)
    {
        if (!is_null($number)) {
            $this->set($number);
        }
        $number = $this->get();
        return (($number % 2) === 0);
    }

    public function isOdd($number = null)
    {
        return !$this->isEven($number);
    }

}
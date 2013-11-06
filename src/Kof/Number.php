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

    public function isPrime($number = null)
    {
        if (!is_null($number)) {
            $this->set($number);
        }
        $number = $this->get();
        if ($this->isEven($number)) {
            return false;
        }
        return ($number === $this->_lookupLargestPrimeNumber($number));
    }

    protected function _lookupLargestPrimeNumber($limit)
    {
        $primeNumbers = [2];
        for ($number = 3; $number <= $limit; $number++) {
            foreach ($primeNumbers as $primeNumber) {
                if (($number % $primeNumber) === 0) {
                    break;
                }

                if (sqrt($number) < $primeNumber) {
                    $primeNumbers[] = $number;
                    break;
                }
            }
        }
        return end($primeNumbers);
    }

}
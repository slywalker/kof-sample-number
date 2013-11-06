<?php
namespace Kof\Test;

use Kof\Number;

class NumberTest extends \PHPUnit_Framework_TestCase
{

    public function testInstance()
    {
        $this->assertInstanceOf('Kof\Number', new Number());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetException()
    {
        $Number = new Number();
        $Number->set('a');
    }

    /**
     * @expectedException UnexpectedValueException
     */
    public function testGetException()
    {
        $Number = new Number();
        $Number->get();
    }

    public function testIsEven()
    {
        $Number = new Number(2);
        $this->assertTrue($Number->isEven());
        $this->assertFalse($Number->isEven(3));
    }

    public function testIsOdd()
    {
        $Number = new Number(3);
        $this->assertTrue($Number->isOdd());
        $this->assertFalse($Number->isOdd(4));
    }

    public function testIsPrime()
    {
        $Number = new Number(3);
        $this->assertTrue($Number->isPrime());
        $this->assertTrue($Number->isPrime(97));
        $this->assertFalse($Number->isPrime(99));
    }

}
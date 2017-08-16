<?php

namespace violuke\Barcodes\Tests;

use violuke\Barcodes\BarcodeValidator;

// Nasty work around for testing over multiple PHPUnit versions
if (!class_exists('PHPUnit_Framework_TestCase')) {
    class PHPUnit_Framework_TestCase extends \PHPUnit\Framework\TestCase {}
}

class BarcodeValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testInit()
    {
        $validator = new BarcodeValidator('12345123');
        $this->assertInstanceOf('\violuke\Barcodes\BarcodeValidator', $validator);
    }

    public function testInvalid()
    {
        $validator = new BarcodeValidator('string123');
        $this->assertFalse($validator->isValid());
    }

    public function testInvalidLooksLikeBarcode()
    {
        $validator = new BarcodeValidator('5060411950138');
        $this->assertFalse($validator->isValid());
    }

    public function testValid()
    {
        $validator = new BarcodeValidator('001303050100');
        $this->assertFalse($validator->isValid());
    }

    public function testEanRestricted()
    {
        $validator = new BarcodeValidator('2100000030019');
        $this->assertTrue($validator->isValid());
        $this->assertSame(BarcodeValidator::TYPE_EAN_RESTRICTED, $validator->getType());
    }

    public function testUpcCouponCode()
    {
        $validator = new BarcodeValidator('570691542245');
        $this->assertTrue($validator->isValid());
        $this->assertSame(BarcodeValidator::TYPE_UPC_COUPON_CODE, $validator->getType());
    }

    public function testEan()
    {
        $validator = new BarcodeValidator('8838108476586');
        $this->assertTrue($validator->isValid());
        $this->assertSame(BarcodeValidator::TYPE_EAN, $validator->getType());
    }

    public function testEan2()
    {
        $validator = new BarcodeValidator('5060411950139');
        $this->assertTrue($validator->isValid());
        $this->assertSame(BarcodeValidator::TYPE_EAN, $validator->getType());
    }

    public function testEan3()
    {
        $validator = new BarcodeValidator('0700867967774');
        $this->assertTrue($validator->isValid());
        $this->assertSame(BarcodeValidator::TYPE_EAN, $validator->getType());
    }

    public function testUpc()
    {
        $validator = new BarcodeValidator('700867967774');
        $this->assertTrue($validator->isValid());
        $this->assertSame(BarcodeValidator::TYPE_UPC, $validator->getType());
    }
}
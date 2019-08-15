<?php
/**
 * Date             :   11-08-2019
 * Created By       :   WMSK Abeysinghe
 * Description      :   Get text relevant to given number
 */

 declare(strict_types=1);

 use PHPUnit\Framework\TestCase;

 use SriAnt\Utils\NumberGeneralizeModel;

 final class NumberTest extends TestCase
 {
     private $number_model;

     protected function setUp(): void
     {
         $this->number_model = new NumberGeneralizeModel();
     }

     protected function tearDown(): void
     {
         $this->number_model = null;
     }

     public function testNumber(): void
     {
         $this->assertInstanceOf(NumberGeneralizeModel::class, $this->number_model);
     }

     public function testIsNotEmpty(): void
     {
         $this->assertFalse($this->number_model->isNotEmpty(null));
         $this->assertFalse($this->number_model->isNotEmpty("  "));
         $this->assertTrue($this->number_model->isNotEmpty(1));
         $this->assertTrue($this->number_model->isNotEmpty("1"));
         $this->assertTrue($this->number_model->isNotEmpty(" 1"));
         $this->assertTrue($this->number_model->isNotEmpty("1. 0"));
     }

     public function testClearNumber(): void
     {
         $this->assertEquals("1", $this->number_model->clearNumber(1));
         $this->assertEquals("1", $this->number_model->clearNumber("1"));
         $this->assertEquals("1", $this->number_model->clearNumber(" 1"));
         $this->assertEquals("1.0", $this->number_model->clearNumber("1. 0"));
     }

     public function testIsValidPatten(): void
     {
         $this->assertTrue($this->number_model->isValidPattern(1));
         $this->assertTrue($this->number_model->isValidPattern("1"));
         $this->assertTrue($this->number_model->isValidPattern("1"));
         $this->assertTrue($this->number_model->isValidPattern("1.0"));
         $this->assertTrue($this->number_model->isValidPattern("10000.0"));
         $this->assertTrue($this->number_model->isValidPattern("1.0"));
     }

     public function testConvertToFloat(): void
     {
         $this->assertEquals(0.0, $this->number_model->convertToFloat("0"));
         $this->assertEquals(1.0, $this->number_model->convertToFloat("1"));
         $this->assertEquals(1.0, $this->number_model->convertToFloat("01"));
         $this->assertEquals(1.0, $this->number_model->convertToFloat("1.0"));
         $this->assertEquals(10000.0, $this->number_model->convertToFloat("10000.0"));
         $this->assertEquals(1.01, $this->number_model->convertToFloat("1.01"));
     }

     public function testNumberFormat(): void
     {
         $this->assertEquals("0.00", $this->number_model->formatNumber("0"));
         $this->assertEquals("1.00", $this->number_model->formatNumber("1"));
         $this->assertEquals("100,000.00", $this->number_model->formatNumber("100000"));
         $this->assertEquals("1.00", $this->number_model->formatNumber("1.0"));
         $this->assertEquals("10,000.00", $this->number_model->formatNumber("10000.0"));
         $this->assertEquals("1.01", $this->number_model->formatNumber("1.01"));
     }

     public function testGeneralizeNumber()
     {
         $this->assertEquals("0.00", $this->number_model->generalizeNumber("0"));
         $this->assertEquals("1.00", $this->number_model->generalizeNumber("1"));
         $this->assertEquals("100,000.00", $this->number_model->generalizeNumber("100000"));
         $this->assertEquals("1.00", $this->number_model->generalizeNumber("1.0"));
         $this->assertEquals("10,000.00", $this->number_model->generalizeNumber("10000.0"));
         $this->assertEquals("1.01", $this->number_model->generalizeNumber("1.01"));
         // $this->expectException(InvalidArgumentException::class);
         // $this->number_model->generalizeNumber(null);
         // $this->expectException(InvalidArgumentException::class);
         // $this->number_model->generalizeNumber("");
         $this->assertEquals("1.00", $this->number_model->generalizeNumber(1));
         $this->assertEquals("1.20", $this->number_model->generalizeNumber(1.2));
         // $this->expectException(InvalidArgumentException::class);
         // $this->number_model->generalizeNumber(-100);
         $this->assertEquals("1,000.22", $this->number_model->generalizeNumber(1000.22));
         $this->assertEquals("100,000.02", $this->number_model->generalizeNumber(100000.02));
         $this->assertEquals("100,080,000.00", $this->number_model->generalizeNumber("100080,000"));
         $this->assertEquals("9,999,999.90", $this->number_model->generalizeNumber("9999999.9"));
         $this->assertEquals("9,999,999.99", $this->number_model->generalizeNumber(9999999.99));
     }
 }

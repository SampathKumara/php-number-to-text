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

     public function testIsNotEmptyForNull(): void
     {
         $this->expectException(InvalidArgumentException::class);
         $this->number_model->isNotEmpty(null);
     }

     public function testIsNotEmptyForEmpty(): void
     {
         $this->expectException(InvalidArgumentException::class);
         $this->number_model->isNotEmpty("  ");
     }

     public function testIsNotEmpty(): void
     {
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

     // public function testVeriry(){
     //   $number_model = new NumberModel();
     //   $this->assertFalse($number_model->validateNumber(null));
     //   $this->assertTrue($number_model->validateNumber(1));
     //   $this->assertTrue($number_model->validateNumber(1.2));
     //   $this->assertFalse($number_model->validateNumber(-100.22));
     //   $this->assertTrue($number_model->validateNumber("100.55"));
     //   $this->assertTrue($number_model->validateNumber(9999999.999999));
     //   $this->assertFalse($number_model->validateNumber("-3"));
     //   $this->assertFalse($number_model->validateNumber("a"));
     //   $this->assertFalse($number_model->validateNumber("-_"));
     //   $this->assertTrue($number_model->validateNumber(".22"));
     //   $this->assertFalse($number_model->validateNumber(".2rx3"));
     // }

     // public function testNumberFormat(){
     //   $this->assertFalse($this->number_model->validateNumber(1));
     // }
 }

<?php
/**
 * Date             :   11-08-2019
 * Created By       :   WMSK Abeysinghe
 * Description      :   Get text relevant to given number
 */

 declare(strict_types=1);

 use PHPUnit\Framework\TestCase;

 use SriAnt\Utils\NumberGeneralizeModel;
 use SriAnt\Utils\NumberToTextModel;

 final class NumberToTextTest extends TestCase
 {
     private $ntt_model;

     protected function setUp(): void
     {
         $this->ntt = new NumberToTextModel();
     }

     protected function tearDown(): void
     {
         $this->ntt = null;
     }

     public function testNumber(): void
     {
         $this->assertInstanceOf(NumberToTextModel::class, $this->ntt);
     }

     public function testBreakdown()
     {
         $this->assertEquals(array('0','00'), $this->ntt->breakdownNumber("0"));
         // $this->assertEquals("1.00", $this->number_model->generalizeNumber("1"));
         // $this->assertEquals("100,000.00", $this->number_model->generalizeNumber("100000"));
         // $this->assertEquals("1.00", $this->number_model->generalizeNumber("1.0"));
         // $this->assertEquals("10,000.00", $this->number_model->generalizeNumber("10000.0"));
         // $this->assertEquals("1.01", $this->number_model->generalizeNumber("1.01"));
         // // $this->expectException(InvalidArgumentException::class);
         // // $this->number_model->generalizeNumber(null);
         // // $this->expectException(InvalidArgumentException::class);
         // // $this->number_model->generalizeNumber("");
         // $this->assertEquals("1.00", $this->number_model->generalizeNumber(1));
         // $this->assertEquals("1.20", $this->number_model->generalizeNumber(1.2));
         // // $this->expectException(InvalidArgumentException::class);
         // // $this->number_model->generalizeNumber(-100);
         // $this->assertEquals("1,000.22", $this->number_model->generalizeNumber(1000.22));
         // $this->assertEquals("100,000.02", $this->number_model->generalizeNumber(100000.02));
         // $this->assertEquals("100,080,000.00", $this->number_model->generalizeNumber("100080,000"));
         // $this->assertEquals("9,999,999.90", $this->number_model->generalizeNumber("9999999.9"));
         // $this->assertEquals("9,999,999.99", $this->number_model->generalizeNumber(9999999.99));
     }
 }

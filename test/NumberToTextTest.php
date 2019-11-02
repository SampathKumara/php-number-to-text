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
         $this->assertEquals(array('1','00'), $this->ntt->breakdownNumber("1"));
         $this->assertEquals(array('100', '000','00'), $this->ntt->breakdownNumber("100000"));
         $this->assertEquals(array('1','00'), $this->ntt->breakdownNumber("1.00"));
         $this->assertEquals(array('10', '000','00'), $this->ntt->breakdownNumber("10000.0"));
         $this->assertEquals(array('1','01'), $this->ntt->breakdownNumber("1.01"));
         $this->assertEquals(array('1', '20'), $this->ntt->breakdownNumber(1.2));
         $this->assertEquals(array("1","000","22"), $this->ntt->breakdownNumber(1000.22));
         $this->assertEquals(array("100","000", "02"), $this->ntt->breakdownNumber(100000.02));
         $this->assertEquals(array("100","080","000","00"), $this->ntt->breakdownNumber("100080,000"));
         $this->assertEquals(array("9","999","999", "90"), $this->ntt->breakdownNumber("9999999.9"));
         $this->assertEquals(array("9","999","999","99"), $this->ntt->breakdownNumber(9999999.99));

         // $this->expectException(InvalidArgumentException::class);
         // $this->ntt->breakdownNumber(null);

         // $this->expectException(InvalidArgumentException::class);
         // $this->ntt->breakdownNumber("");

         $this->expectException(InvalidArgumentException::class);
         $this->ntt->breakdownNumber(-100);

     }

     public function testGetLangData()
     {
       $res = $this->ntt->getLangData(null);
        $this->assertEquals(0 , count($res));
        $this->assertEquals(4, count($this->ntt->getLangData(SINHALA)));
     }
 }

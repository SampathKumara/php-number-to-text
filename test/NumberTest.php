<?php
/**
 * Date             :   11-08-2019
 * Created By       :   WMSK Abeysinghe
 * Description      :   Get text relevant to given number
 */

 declare(strict_types=1);

 use PHPUnit\Framework\TestCase;


 use SriAnt\Utils\NumberModel;

 final class NumberTest extends TestCase
 {

     public function testNumber(): void
     {
       $number_model = new NumberModel();
       $this->assertInstanceOf(NumberModel::class, $number_model);
     }

     public function testVeriry(){
       $number_model = new NumberModel();
       $this->assertFalse($number_model->validateNumber(null));
       $this->assertFalse($number_model->validateNumber(""));
       $this->assertTrue($number_model->validateNumber(1));
       $this->assertTrue($number_model->validateNumber(1.2));
       $this->assertTrue($number_model->validateNumber(100.22));
       $this->assertTrue($number_model->validateNumber(9999999.999999));
     }


 }

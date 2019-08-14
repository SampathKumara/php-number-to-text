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


 }

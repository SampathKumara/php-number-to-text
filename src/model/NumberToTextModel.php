<?php
namespace SriAnt\Utils;

/**
 * Date             :   23-08-2019
 * Company          :   SriAnt
 * Created by       :   WMSK Abeysinghe
 * Description      :   Contains functions for basic conversion
 */

class NumberToTextModel
{
    private $numberGenModel;
    private $language;

    public function __construct()
    {
        $this->numberGenModel = new NumberGeneralizeModel();
        $this->language = ENGLISH;
    }

    public function setLanguage($labguage){
      $this->language = $labguage;
    }

    public function breakdownNumber($number)
    {
        $breakdown = array();
        $formattedNumber = $this->numberGenModel->generalizeNumber($number);
        $parts = explode('.', $formattedNumber);
        $breakdown = explode(',', $parts[0]);
        array_push($breakdown, $parts[1]);
        return $breakdown;
    }

    public function getLangData($language)
    {
        $res = array();
        if ($language == SINHALA) {
            $res = $this->si_array;
        } elseif ($language == ENGLISH) {
            $res = $this->en_array;
        }
        return $res;
    }

    public function translateUptoTwenty($number)
    {
      if($number >= 0 && $number <= 20){
        $number = abs($number);
        $lang_array = $this->getLangData($this->language);
        return $lang_array[0][$number];
      }else{
        throw new \InvalidArgumentException("Number is out of range");
      }
    }

    public function translateUptoHundred($number)
    {
      if($number >= 0 && $number <= 100){
        $number = abs($number);
        $lastDigit = $number % 10;
        $divisor = $this->numberGenModel->getDivisor($number, 10);
        $lang_array = $this->getLangData($this->language);
        if($number > 20){
          return $lang_array[0][$divisor*10] . ' ' . $this->translateUptoTwenty($lastDigit);
        }else{
          return $this->translateUptoTwenty($number);
        }
      }else{
        throw new \InvalidArgumentException("Number is out of range");
      }
    }


    private $en_array = array(
                            array(
                                0 => 'zero',
                                1 => 'one',
                                2 => 'two',
                                3 => 'three',
                                4 => 'four',
                                5 => 'five',
                                6 => 'six',
                                7 => 'seven',
                                8 => 'eight',
                                9 => 'nine',
                                10 => 'ten',
                                11 => 'eleven',
                                12 => 'twelve',
                                13 => 'thirteen',
                                14 => 'fouteen',
                                15 => 'fifteen',
                                16 => 'sixteen',
                                17 => 'seventeen',
                                18 => 'eighteen',
                                19 => 'nineteen',
                                20 => 'twenty',
                                30 => 'thirty',
                                40 => 'fourty',
                                50 => 'fifty',
                                60 => 'sixty',
                                70 => 'seventy',
                                80 => 'eighty',
                                90 => 'ninety'
                            ),
                            array(
                                100 => 'hundred',
                                1000 => 'thousand',
                                100000 => 'hundred thousand',
                                1000000 => 'million',
                                10000000 => 'billion',
                                100000000 => 'trillion'
                            ),
                            array(
                                'cents'
                            ),
                            array(
                                'Rupees'
                            )
                        );
    private $si_array = array(
                          array(
                              0 => array('බිංදුව'),
                              1 => array('එක', 'එක්'),
                              2 => array('දෙක', 'දෙ'),
                              3 => array('තුන', 'තුන්'),
                              4 => array('හතර', 'හාර'),
                              5 => array('පහ', 'පන්'),
                              6 => array('හය', 'හය'),
                              7 => array('හත', 'හත්'),
                              8 => array('අට', 'අට'),
                              9 => array('නවය', 'නව'),
                              10 => array('දහය', 'දහ'),
                              11 => array('එකොලහ', 'එකොලොස්'),
                              12 => array('දොලහ', 'දොලොස්'),
                              13 => array('දහ තුන', 'දහ තුන්'),
                              14 => array('දහ හතර', 'දහ හතර'),
                              15 => array('පහලොව', 'පහලොස්'),
                              16 => array('දහසය', 'දහසය'),
                              17 => array('දහ හත', 'දහ හත්'),
                              18 => array('දහ අට', 'දහ අට'),
                              19 => array('දහ නවය', 'දහ නව'),
                              20 => array('විස්ස', 'විසි'),
                              30 => array('තිහ', 'තිස්'),
                              40 => array('හතලිහ', 'හතලිස්'),
                              50 => array('පනහ', 'පනස්'),
                              60 => array('හැට', 'හැට'),
                              70 => array('හැත්තෑව', 'හැත්තෑ'),
                              80 => array('අසූව', 'අසූ'),
                              90 => array('අනූව', 'අනූ')
                          ),
                          array(
                              100 => array('සිය', 'සීය'),
                              1000 => array('දහස්', 'දහස'),
                              100000 => array('ලක්ෂ', 'ලක්ෂය'),
                              1000000 => array('මිලියන', 'මිලියනය'),
                              10000000 => array('බිලියන', 'බිලියනය'),
                              100000000 => array('ට්‍රිලියන', 'ට්‍රිලියනය')
                          ),
                          array(
                              'ශත'
                          ),
                          array(
                              'රුපියල්'
                          )
                    );
}

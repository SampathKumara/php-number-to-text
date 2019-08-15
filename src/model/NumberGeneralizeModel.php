<?php
namespace SriAnt\Utils;

/**
 * Date             :   12-08-2019
 * Company          :   SriAnt
 * Created by       :   WMSK Abeysinghe
 * Description      :   Contains essential functions for validate and convert number to readable format.
 */

class NumberGeneralizeModel
{
    public function isNotEmpty($number)
    {
        if (! is_null($number)) {
            $number = trim($number);
            if (strlen($number) > 0) {
                return true;
            }
        }
        throw new \InvalidArgumentException("Number Cannot be null");
    }

    public function clearNumber($number)
    {
        return str_replace(array(',',' '), '', trim($number));
    }

    public function isValidPattern($number)
    {
        preg_match("/^\d{1,8}\.?\d{0,2}$/", $number, $matches);
        if (count($matches) == 1 && $matches[0] == $number) {
            return true;
        }
        return false;
    }

    public function convertToFloat($number)
    {
        return floatval($number);
    }

    public function formatNumber($number)
    {
        return number_format($number, 2, ".", ",");
    }

    public function generalizeNumber($number)
    {
        if ($this->isNotEmpty($number)) {
            $number = $this->clearNumber($number);
            if ($this->isValidPattern($number)) {
                $number = $this->convertToFloat($number);
                if ($number >= 0) {
                }
            }
        }
        return false;
    }
}

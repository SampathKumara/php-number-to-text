<?php
namespace SriAnt\Utils;

/**
 * Date             :   12-08-2019
 * Company          :   SriAnt
 * Developer        :   WMSK Abeysinghe
 * Description      :   Contains essential functions for validate and convert number to readable format.
 */

class NumberModel
{
    public function validateNumber($number)
    {
        if ($number != null) {
            $number = trim($number);
            if (strlen($number) > 0) {
                return is_numeric($number);
            }
        }
        return false;
    }
}

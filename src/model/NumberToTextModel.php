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

    public function __construct()
    {
        $this->numberGenModel = new NumberGeneralizeModel();
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
}

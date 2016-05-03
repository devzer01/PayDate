<?php

class SalaryDate {

    private $year = null;

    private $month = null;

    private $weekEnd = ['Sat', 'Sun'];

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function getSalaryDate()
    {
        $lastDayOfMonth = date("t", strtotime($this->getYearMonthPrefix() . "15"));
        $preferredSalaryDate = $this->getYearMonthPrefix() . $lastDayOfMonth;
        $dayOfWeek = date("D", strtotime($preferredSalaryDate));
        if (!in_array($dayOfWeek, $this->weekEnd)) return $this->formatDate($preferredSalaryDate);

        $delta = array_flip($this->weekEnd)[$dayOfWeek];
        $preferredSalaryDate = $this->getYearMonthPrefix() . ($lastDayOfMonth - $delta - 1);

        return $this->formatDate($preferredSalaryDate);
    }

    public function getBonusDate()
    {
        $preferredBonusDate = $this->getYearMonthPrefix() . "15";
        $dayOfWeek = date("D", strtotime($preferredBonusDate));
        if (!in_array($dayOfWeek, $this->weekEnd)) return $this->formatDate($preferredBonusDate);

        $delta = array_flip(array_reverse($this->weekEnd))[$dayOfWeek];
        $preferredBonusDate = $this->getYearMonthPrefix() . (15 + 2 + ($delta + 1));

        return $this->formatDate($preferredBonusDate);
    }

    private function formatDate($dateStr)
    {
        return date("Y-m-d", strtotime($dateStr));
    }

    private function getYearMonthPrefix()
    {
        return $this->year . "-" . $this->month . "-";
    }
}
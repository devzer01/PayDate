<?php

require_once './src/SalaryDate.php';
/**
 * Created by PhpStorm.
 * User: nayana
 * Date: 4/28/16
 * Time: 8:41 PM
 */
class SalaryDateTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider providerTestData
     */
    public function testGetSalaryDate($year, $month, $salary, $bonus)
    {
        $salaryDate = new SalaryDate($year, $month);
        $this->assertEquals($salary, $salaryDate->getSalaryDate());
        $this->assertEquals($bonus, $salaryDate->getBonusDate());
    }

    public function providerTestData()
    {
        return [
            [2016, 1, "2016-01-29", "2016-01-15"],
            [2016, 2, "2016-02-29", "2016-02-15"],
            [2016, 3, "2016-03-31", "2016-03-15"],
            [2016, 4, "2016-04-29", "2016-04-15"],
            [2016, 5, "2016-05-31", "2016-05-18"],
            [2016, 6, "2016-06-30", "2016-06-15"],
            [2016, 7, "2016-07-29", "2016-07-15"],
            [2016, 8, "2016-08-31", "2016-08-15"],
            [2016, 9, "2016-09-30", "2016-09-15"],
            [2016, 10, "2016-10-31", "2016-10-19"],
            [2016, 11, "2016-11-30", "2016-11-15"],
            [2016, 12, "2016-12-30", "2016-12-15"],
            [2011, 1, "2011-01-31", "2011-01-19"] //edge case test
        ];
    }
}

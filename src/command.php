<?php

require_once "SalaryDate.php";

if (!isset($argv[1])) {
    printf("You must provie a filename to write results\n");
    exit;
}
$fileName = $argv[1];

$fp = fopen($fileName, "w");

for ($i=1; $i <= 12; $i++) {

    $year = date("Y", strtotime("+$i month"));
    $month = date("m", strtotime("+$i month"));
    $monthName = date("F", strtotime("+$i month"));

    $sd = new SalaryDate($year, $month);
    $salary = $sd->getSalaryDate();
    $bonus = $sd->getBonusDate();

    fputcsv($fp, [$monthName, $salary, $bonus]);
}

fclose($fp);
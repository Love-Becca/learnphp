<?php

declare(strict_types = 1);

// Your Code
$csvData = [];
function getCsvData ($csv){
    global $csvData;
    $csvfile = fopen($csv, 'r');
    
    if ($csvfile) {
        while(($data = fgetcsv($csvfile))!== false){
            $csvData[] = $data;
        }
    }
    
}
function getAllFiles (){   
    $directory = "../transaction_files";
    $files = glob($directory.'/*');
    // var_dump($files);
    foreach ($files as $file) {
        if (substr($file, -3) === 'csv'){
            getCsvData($file);
        }
    }
}

getAllFiles();

$amount=0;
$expense=0;

function getIncomeData($saved){
    global $amount;
    global $expense;
    foreach ( $saved as $data) {
        if (substr($data[3], 0, 1) === '-') {
            $removeString = (float) str_replace(['$', ','], '', $data[3]);
            $expense += $removeString;
        }else{
            $removeString2 = (float) str_replace(['$', ','], '', $data[3]);
            $amount += $removeString2;
        }
    }
}

getIncomeData($csvData);

function getNet($a,$b){
    return $a + $b;
}

$netTotal = getNet($expense, $amount);

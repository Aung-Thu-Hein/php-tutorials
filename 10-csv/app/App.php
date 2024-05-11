<?php

function getTransactionFiles(string $dirPath): array 
{
    $files = [];

    foreach (scandir($dirPath) as $file) {
        if(is_dir($file)) continue;

        $files[] = $dirPath . $file;
    }

    return $files;
}

function getTransaction(string $fileName, ?callable $transactionHandler = null): array 
{
    if(!file_exists($fileName)) {
        trigger_error('File "' . $fileName . '" does not exist.', E_USER_ERROR);
    }

    $transactions = [];
    
    $file = fopen($fileName, 'r');
    fgetcsv($file);

    while(($transaction = fgetcsv($file)) !== false) {
        if($transactionHandler !== null) {
            $transaction = $transactionHandler($transaction);
        }
        $transactions[] = $transaction;
    }

    return $transactions; 
}

function extractTransaction(array $transaction): array
{
    [$date, $checkNumber, $description, $amount] = $transaction;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date' => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => $amount
    ];
}

function calculateTotals(array $transactions): array
{
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if($transaction['amount'] >= 0) {
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }
    
    return $totals;
}

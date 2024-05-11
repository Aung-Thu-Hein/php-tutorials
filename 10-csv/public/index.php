<?php

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', "$root/app/");
define('FILES_PATH', "$root/transaction_files/");
define('VIEWS_PATH', "$root/views/");

require APP_PATH . "App.php";
require APP_PATH . 'helpers.php';

$files = getTransactionFiles(FILES_PATH);

$transactions = [];
foreach($files as $file) {
    $transactions = array_merge($transactions, getTransaction($file, 'extractTransaction'));
}

$totals = calculateTotals($transactions);

require VIEWS_PATH . 'transactions.php';

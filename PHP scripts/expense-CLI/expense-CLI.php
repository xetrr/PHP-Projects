#!/bin/usr/env PHP
<?php

include 'helper-functions.php';

$usage_line = "usage : php expense.php [add,update,delete,list] [options]\n";

if ($argc < 2) {
    echo $usage_line;
    exit();
}

$status = $argv[1];
$curr_data = loadData($file);
$date = date("Y-m-d");



switch ($status) {
    case 'add':
        if ($argc < 4) {
            echo $usage_line;
            exit();
        }
        $description =  $argv[2];
        $amount =  (float)$argv[3];

        if ($amount < 0 || !is_numeric($amount)) {
            echo "please enter a valid amount of money (numbers only)";
        }
        $expense = [
            'id'            => getNextId($curr_data),
            'description'   => $description,
            'amount'        => $amount,
            'created_at'    => $date           
        ];
        $curr_data[] = $expense;
        saveData($file, $curr_data);
        echo "expense added successfully \n";
        break;
    case 'delete':
        if ($argc < 3) {
            echo $usage_line;
            exit();
        }
        $id = (int)$argv[1];

        $found = false;

        foreach ($curr_data as $index => $expense) {
            if ((int)$expense->id == (int)$id) {
                unset($data[$index]);
                $filterd = array_values($curr_data);
                saveData($file, $filterd);
                echo "expense deleted";
                $found =  true;
                break;
            }
        }
        if ($found == false) {
            echo "there is no expense with the provided ID";
        }
        break;
    case 'list':
        if (empty($curr_data)) {
            echo "there is no data to preview";
            exit();
        } else {
            printData($curr_data);
        }

        break;
    case 'summery':
        $total  = array_sum(array_column($curr_data, 'amount'));
        echo "total expenses: $total \n";
        break;
    default:
        echo "please enter a valid command";
        exit();
        break;
}
?>
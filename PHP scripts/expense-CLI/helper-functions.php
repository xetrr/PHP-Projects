<?php

$file = "./data.json";

function loadData($file)
{
    if (!file_exists($file)) {
        file_put_contents($file, json_encode([], JSON_PRETTY_PRINT));
    }
    $json = file_get_contents($file);
    return json_decode($json, true) ?? [];
}

function saveData($file, $data)
{
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

function getNextId($data)
{
    $ids = array_column($data, 'id');
    return empty($ids) ? 1 : max($ids) + 1;
}

function printData($data)
{
    echo "+------+-------------------------------------------+-----------------------+-----------------------+\n";
    echo "| ID   | Description                               | amount                | created at            |\n";
    echo "+------+-------------------------------------------+-----------------------+-----------------------+\n";
    foreach ($data as $v) {
        printf("| %-4d | %-41s | %-21s | %-21s |\n", $v['id'], $v['description'], $v['amount'], $v['created_at']);
    }

    echo "+------+-------------------------------------------+-----------------------+-----------------------+\n";
}

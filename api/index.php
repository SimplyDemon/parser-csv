<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Inc\Classes\ParserCsv.php';

use Inc\Classes\ParserCsv;

$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod !== 'POST') {
    $message = 'Not correct request method.';
}

$success = false;
if (!empty($_FILES['csv']['tmp_name'] ?? null)) {
    try {
        $parserCsv = new ParserCsv($_FILES['csv'], $_POST['separator'] ?? '');
        $csv = $parserCsv->getParsedData();
        $message = json_encode($csv, JSON_UNESCAPED_UNICODE);
        $success = true;
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
} else {
    $message = 'No file was found.';
}

echo json_encode([
    'success' => $success,
    'message' => $message,
], JSON_UNESCAPED_UNICODE);

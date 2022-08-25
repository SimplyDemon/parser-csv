<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Inc/Classes/ParserCsv.php';

use Inc\Classes\ParserCsv;

if (!empty($_FILES['csv']['tmp_name'] ?? null)) {
    try {
        $parserCsv = new ParserCsv($_FILES['csv'], $_POST['separator'] ?? '');
        $csv = $parserCsv->getParsedData();
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/global/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/pages/parser/main-content.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/global/footer.php';

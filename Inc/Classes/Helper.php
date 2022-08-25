<?php

namespace Inc\Classes;

use CURLFile;

class Helper
{
    public function sendTestCurlToApi(): bool|string
    {
        $file = $_SERVER['DOCUMENT_ROOT'] . '/test.csv';
        $csvFile = new CurlFile($file, 'text/csv');
        $post = [
            'csv' => $csvFile,
            'separator' => ',',
        ];

        $curl = curl_init("{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/api/");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}

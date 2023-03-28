<?php
function getTables()
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api-kyp.onrender.com/api/tables");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_error($ch)) {
        echo 'Error: ' . curl_error($ch);
        exit;
    }
    curl_close($ch);
    return json_decode($response, true);
}

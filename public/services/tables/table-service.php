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

function deleteTable($id, $page)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api-kyp.onrender.com/api/tables/delete/" . $id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_error($ch)) {
        echo 'Error: ' . curl_error($ch);
        exit;
    }
    curl_close($ch);
    echo "<script>window.location.href='?page=$page'</script>";
    return json_decode($response, true);
}

function addTable($id, $page)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api-kyp.onrender.com/api/tables/add/" . $id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_error($ch)) {
        echo 'Error: ' . curl_error($ch);
        exit;
    }
    curl_close($ch);
    echo "<script>window.location.href='?page=$page'</script>";
    return json_decode($response, true);
}

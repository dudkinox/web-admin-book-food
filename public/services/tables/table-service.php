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

function updateTable($number, $page)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api-kyp.onrender.com/api/tables',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "table": "' . $number . '"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo "<script>window.location.href='?page=$page'</script>";
    return json_decode($response, true);
}

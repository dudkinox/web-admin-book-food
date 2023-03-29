<?php
function getMenu()
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api-kyp.onrender.com/api/menus");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_error($ch)) {
        echo 'Error: ' . curl_error($ch);
        exit;
    }
    curl_close($ch);
    return json_decode($response, true);
}

function deleteMenu($id, $page)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api-kyp.onrender.com/api/menus/delete/" . $id);
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

function addMenu($calories, $image, $name, $price, $page)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api-kyp.onrender.com/api/menus',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "calories": ' . $calories . ',
            "image": "' . $image . '",
            "name": "' . $name . '",
            "price": ' . $price . ',
            "quantity": 0
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo "<script>window.location.href='?page=$page'</script>";
    return $response;
}

function findMenu($id)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api-kyp.onrender.com/api/menus/find/$id");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_error($ch)) {
        echo 'Error: ' . curl_error($ch);
        exit;
    }
    curl_close($ch);
    return json_decode($response, true);
}

function editMenu($id, $calories, $image, $name, $price, $page)
{
    echo "<script>window.location.href='?page=$page'</script>";
}

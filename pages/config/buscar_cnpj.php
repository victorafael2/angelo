<?php
$cnpj = $_POST['cnpj'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.receitaws.com.br/v1/cnpj/" . $cnpj);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec($ch);

if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo $result;
}

curl_close($ch);
?>

<?php
error_reporting(0);

$cidade = "Sem informações";
$rua = "Sem informações";
$bairro = "Sem informações";
$estado = "Sem informações";
$ddd = "Sem informações";
$complemento = "Sem informações";


$cep = $_GET['cep'];
if (!empty($cep)) {
    $api = 'https://viacep.com.br/ws/' . $cep . '/json/';
    $ch = curl_init($api);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $data = json_decode($response);
    $cidade = ($data->localidade);
    $rua = ($data->logradouro);
    $estado = ($data->uf);
    $ddd = ($data->ddd);
    $complemento = ($data->complemento);

    echo("Cidade: ". $cidade. '<br>');
    echo("Rua: ". $rua. '<br>');
    echo("Bairro: ". $bairro. '<br>');
    echo("Estado: ". $estado. '<br>');
    echo("Cidade: ". $cidade. '<br>');
    echo("DDD: ". $ddd. '<br>');
    echo("Complemento: ". $complemento. '<br>');
}

    





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste - CEP</title>
</head>

<body>
    <form>
        <input placeholder="00000-000" type="text" name="cep" id="cep">
        <button type="submit">Pesquisar</button>
    </form>
</body>

</html>
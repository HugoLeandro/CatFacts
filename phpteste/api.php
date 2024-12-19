<?php
// URL da API
$api_url = "https://catfact.ninja/fact";

// Inicia cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// Opcional: define um User-Agent
curl_setopt($ch, CURLOPT_USERAGENT, 'MyCatFactApp/1.0');

$response = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if ($response === false) {
    echo "Erro: não foi possível realizar a requisição. Detalhes: " . $error;
    exit;
}

$data = json_decode($response, true);

// Verificação simples do resultado
if (isset($data['fact'])) {
    echo $data['fact'];
} else {
    echo "Erro ao buscar a API.";
}

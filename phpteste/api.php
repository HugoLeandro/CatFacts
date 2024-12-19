<?php
// URL da API
$api_url = "https://catfact.ninja/fact";

try {
    // Faz a requisição à API
    $response = file_get_contents($api_url);
    $data = json_decode($response, true);

    // Retorna o fato
    if (isset($data['fact'])) {
        echo $data['fact'];
    } else {
        echo "Erro ao buscar a API.";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

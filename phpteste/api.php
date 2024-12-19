<?php
// URL da API externa
$api_url = "https://catfact.ninja/fact";

try {
    // Faz a requisição à API externa
    $response = file_get_contents($api_url);

    // Decodifica a resposta
    $data = json_decode($response, true);

    // Verifica se a API retornou um fato
    if (isset($data['fact'])) {
        echo $data['fact'];
    } else {
        echo "Erro: Não foi possível obter um fato.";
    }
} catch (Exception $e) {
    echo "Erro ao se conectar à API: " . $e->getMessage();
}
?>

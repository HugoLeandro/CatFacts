<?php
$api_url = "https://catfact.ninja/fact";

try {
    // Inicializando a sessão cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Executando a requisição
    $response = curl_exec($ch);

    // Verificando se ocorreu algum erro na requisição cURL
    if ($response === false) {
        throw new Exception('Erro cURL: ' . curl_error($ch));
    }

    // Fechando a sessão cURL
    curl_close($ch);

    // Tentando decodificar a resposta JSON
    $data = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Erro ao decodificar JSON: ' . json_last_error_msg());
    }

    // Exibindo o fato retornado pela API
    if (isset($data['fact'])) {
        echo "<p>Fato sobre gatos: " . htmlspecialchars($data['fact']) . "</p>";
    } else {
        echo "<p>Não foi possível obter um fato sobre gatos.</p>";
    }

} catch (Exception $e) {
    // Exibindo erros, caso ocorram
    echo "<p>Erro: " . $e->getMessage() . "</p>";
}
?>

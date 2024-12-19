<?php
$api_url = "https://catfact.ninja/fact";

try {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if ($response === false) {
        throw new Exception('Erro cURL: ' . curl_error($ch));
    }

    curl_close($ch);

    // Exibir a resposta para debug
    echo "<pre>Resposta da API:\n";
    echo htmlspecialchars($response);
    echo "</pre>";
} catch (Exception $e) {
    echo "Erro ao se conectar à API: " . $e->getMessage();
}
?>

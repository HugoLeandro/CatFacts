<?php
$api_url = "https://catfact.ninja/fact";

try {
    $response = file_get_contents($api_url);
    echo "<pre>Resposta da API:\n";
    echo htmlspecialchars($response);
    echo "</pre>";
} catch (Exception $e) {
    echo "Erro ao se conectar à API: " . $e->getMessage();
}
?>

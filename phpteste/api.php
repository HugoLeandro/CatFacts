<?php
$api_url = "https://catfact.ninja/fact";

try {
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    if (isset($data['fact'])) {
        echo $data['fact'];
    } else {
        echo "Erro: Não foi possível obter um fato.";
    }
} catch (Exception $e) {
    echo "Erro ao se conectar à API: " . $e->getMessage();
}
?>

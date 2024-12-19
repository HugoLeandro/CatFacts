<?php
// index.php

// Este arquivo exibe o HTML da página principal.
// Ele não precisa conter lógica PHP (a não ser o que for necessário no layout), 
// pois a lógica de obtenção de dados está separada no api.php.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
    <title>Cat Facts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f5;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #444;
            margin-bottom: 20px;
        }

        #fact-display {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        #refresh-button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        #refresh-button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const factDisplay = document.getElementById("fact-display");
            const refreshButton = document.getElementById("refresh-button");

            // Função para buscar fatos da API via PHP
            const fetchFact = async () => {
                factDisplay.textContent = "Loading a curious cat fact...";
                try {
                    const response = await fetch("api.php");
                    const fact = await response.text();
                    factDisplay.textContent = fact;
                } catch (error) {
                    factDisplay.textContent = "Error fetching fact. Please try again.";
                    console.error(error);
                }
            };

            // Ao carregar, já busca um fato.
            fetchFact();

            // Ao clicar no botão, busca um novo fato
            refreshButton.addEventListener("click", fetchFact);
        });
    </script>
</head>
<body>
    <h1>Cat Facts 🐱</h1>
    <div id="fact-display">Click the button below to see a fun cat fact!</div>
    <button id="refresh-button">Refresh</button>
</body>
</html>

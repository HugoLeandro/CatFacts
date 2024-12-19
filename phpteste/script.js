document.addEventListener("DOMContentLoaded", () => {
    const factDisplay = document.getElementById("fact-display");
    const refreshButton = document.getElementById("refresh-button");

    // Função para buscar fatos da API via PHP
    const fetchFact = async () => {
        factDisplay.textContent = "Loading a curious fact...";
        try {
            const response = await fetch("api.php");
            const fact = await response.text();
            factDisplay.textContent = fact;
        } catch (error) {
            factDisplay.textContent = "Error fetching fact. Try again.";
            console.error(error);
        }
    };

    // Adiciona o evento de clique no botão
    refreshButton.addEventListener("click", fetchFact);
});

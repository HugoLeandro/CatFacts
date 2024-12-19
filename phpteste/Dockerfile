# Usar uma imagem oficial do PHP com suporte ao servidor embutido
FROM php:8.1-cli

# Definir o diretório de trabalho no container
WORKDIR /app

# Copiar todos os arquivos do projeto para o container
COPY . .

# Expor a porta necessária para o servidor
EXPOSE 8000

# Comando para rodar o servidor PHP
CMD ["php", "-S", "0.0.0.0:8000", "-t", "."]

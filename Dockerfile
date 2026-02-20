FROM php:8.2-apache

# Instala PDO + driver PostgreSQL (obrigatório para seu conn.php funcionar)
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Copia todos os arquivos do projeto para dentro do container
COPY . /var/www/html/

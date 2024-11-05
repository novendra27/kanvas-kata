# Menggunakan image PHP versi 8.1.10 dengan Apache
FROM php:8.1.10-apache

# Mengaktifkan modul rewrite Apache
RUN a2enmod rewrite

# Install ekstensi PHP untuk MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy seluruh file aplikasi ke folder /var/www/html
COPY . /var/www/html

# Set permission pada folder public
WORKDIR /var/www/html/public
RUN chmod -R 755 .

# Mengatur Apache DocumentRoot ke folder public
RUN sed -i -e 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf




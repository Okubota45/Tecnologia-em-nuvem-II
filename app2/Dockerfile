FROM php:8.2-apache

# Define a variável de ambiente para a porta
ENV PORT=8080

# Habilita o módulo de reescrita do Apache
RUN a2enmod rewrite

# Copia os arquivos do repositório para o diretório do Apache
COPY . /var/www/html/

# Corrige as permissões e o proprietário dos arquivos copiados
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Altera as configurações do Apache para usar a porta personalizada
RUN sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf && \
    sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# Configura o diretório /var/www/html no arquivo de configuração do Apache
RUN echo '<Directory /var/www/html>' >> /etc/apache2/apache2.conf && \
    echo '  Options Indexes FollowSymLinks' >> /etc/apache2/apache2.conf && \
    echo '  AllowOverride All' >> /etc/apache2/apache2.conf && \
    echo '  Require all granted' >> /etc/apache2/apache2.conf && \
    echo '</Directory>' >> /etc/apache2/apache2.conf

# Expõe a porta configurada para o Apache
EXPOSE ${PORT}

# Comando para iniciar o Apache em primeiro plano
CMD ["apache2-foreground"]

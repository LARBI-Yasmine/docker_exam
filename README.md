# docker_exam


# Utilisation d'une image PHP avec Apache
FROM php:7.4-apache

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-install \
    intl \
    pdo_mysql \
    zip

# Activer les modules Apache nécessaires
RUN a2enmod rewrite

# Configuration de PHP pour Symfony
RUN echo "date.timezone = UTC" > /usr/local/etc/php/conf.d/symfony.ini

# Copier les fichiers de l'application Symfony dans le conteneur
COPY . /var/www/html

# Installation des dépendances de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installation des dépendances de l'application Symfony
RUN cd /var/www/html && \
    composer install --no-scripts --no-autoloader

# Chargement de l'autoloader Symfony
RUN cd /var/www/html && \
    composer dump-autoload --optimize

# Fixer les permissions sur les répertoires de cache et de logs Symfony
RUN chown -R www-data:www-data /var/www/html/var

# Exposer le port 80 pour accéder à l'application
EXPOSE 80

# Commande de démarrage pour Apache
CMD ["apache2-foreground"]

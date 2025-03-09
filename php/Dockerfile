# Étape 1 : Récupérer l'image PHP avec FPM
FROM php:8.2-fpm

# Définir le répertoire de travail
WORKDIR /var/www/html

# Installation des extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copier tous les fichiers du projet dans le conteneur
COPY . /var/www/html

# Donner les bons droits aux fichiers
RUN chown -R www-data:www-data /var/www/html
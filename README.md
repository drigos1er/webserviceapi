

Cette application est une plateforme fournissant un via une API .

Installation de mon application
1) Télécharger le projet sur : https://github.com/drigos1er/webserviceapi.git
Le projet developpé sous symfony respecte l'architecture d'unn projet Symfony 4 selon l’organisation ci-dessous :

2) Un dossier public contenant les fichiers images, CSS, JavaScript….

3) Un dossier src contenant les codes du projet à savoir les différents Controller, les Modèles, les formulaires

4) Un dossier Templates contenant les Vues de notre application.

5) Un dossier vendor contenant les différentes bibliothèques externes (twig…) utilisés dans notre projet.

6) Un .env contenant les paramètres de connexion à la base de données

7) Installer PHP 7.3, MySQL et le serveur Apache sur votre machine et exécuter ces différents services

Créer la base de donnée apiwebservice_db à partir du fichier de création de la base de donnée(apiwebservice_db.sql) situé à la racine du dossier.

Ouvrir le fichier .env dans la section DATABASE_URL entrer les configuration d’accès à votre base de données.

Vous pouvez accéder au blog en à partir de l’adresse : [l’adresse de votre serveur ou localhost]/[webserviceapi]
8) Lancer l'installation et la mise à jour des composants grâce à composer
9) Lancer le serveur PHP integré : php -S 127.0.0.1:8000 -t public
10) Installer et et excuter l'application "postman" pour effectuer les tests

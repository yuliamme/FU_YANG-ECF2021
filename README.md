# Pré-requis

Pour pouvoir lancer le site, vous aurez besoin de:

-   PHP cli >= 7.3
-   un serveur MySQL
-   [composer](https://getcomposer.org/download/)
-   toutes les [extensions PHP](https://laravel.com/docs/8.x/deployment#server-requirements) nécessaires au bon fonctionnement de Laravel

# Installation

## Installation des dépendances

Pour installer les dépendances du projet, vous devrez utiliser composer :

```
composer install
```

## Création de la base de données

Pour faire tourner le projet, vous devrez créer une nouvelle base de données sur
votre serveur MySQL (avec PhpMyAdmin ou bien en ligne de commande).

## Configuration de la base de données

Une fois les dépendances installées, vous devrez copier le fichier
`.env.example` en `/env`

```
cp .env.example .env
```

Vous devrez ensuite modifier les informations de connexion à la base de données
contenues dans ce fichier, en fonction du nom que vous aurez donné à votre base
de donnée, et de votre environnement (port, username, mot de passe)

```
DB_PORT=???
DB_DATABASE=???
DB_USERNAME=???
DB_PASSWORD=???
```

### Migrations

Une fois vos informations de connexion renseignées, vous devrez créer toutes les
tables du projet. Pour faciliter cette tâche, Laravel utilise un système de
[migrations](https://laravel.com/docs/8.x/migrations) qui automatisent ce
processus.

Pour lancer les migrations, exécutez la commande suivante :

```
php artisan migrate
```

### Seeds

Pour pré-remplir la BDD avec des données prédéfinies, le projet utilise les
[seeds](https://laravel.com/docs/8.x/seeding) de Laravel. Pour exécuter les
"seeds", lancez la commande suivante :

```
php artisan db:seed
```

## Génération de la clé de chiffrement

Vous pouvez maintenant lancer le serveur de développement en ligne de commande

```
php artisan serve
```

Lorsque vos accéderez au site, vous verrez une erreur Laravel, avec un bouton
qui vous suggère de créer une clé. Cliquez sur ce bouton pour générer la clé,
puis relancer votre serveur de développement.

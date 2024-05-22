# Arcadia

Arcadia est un zoo situé en France près de la forêt de Brocéliande, en bretagne depuis 1960.

Ceci est la documentation permettant aux développeur de lancer le mode développement.

## Installation

### Prérequis

Afin de pouvoir lancer l'application, il sera nécessaire d'avoir une base de données avec mysql de configuré et lancé sur son PC.

### Configuration

-   Créer un fichier ".env" en se basant sur le fichier ".env.example"
-   Configurer les différentes variables pour mysql (voir .env.example)

### Lancement

```bash
# Reset la base de donnée, lance les migrations et lance les seeders
php artisan migrate:fresh --seed

## Dans un premier terminal
npm run dev

## Dans un deuxième terminal
# Lance un serveur php sur localhost:8000
php artisan serve
```

## Liens utiles

-   [Fichier création base de donnée](/docs/Create_tables.sql)
-   [Fichier insertion des données en base de donnée](/docs/Insert_data.sql)
-   [Manuel d'utilisation](/docs/Manuel_dutilisation.pdf)
-   [Documentation technique](/docs/Documentation_technique.pdf)
-   [Charte graphique](/docs/Charte_graphique__maquettes.pdf)

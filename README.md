# Arcadia

Arcadia est un zoo situé en France près de la forêt de Brocéliande, en bretagne depuis 1960.

Ceci est la documentation permettant aux développeur de lancer le mode développement.

## Installation

### Prérequis

Afin de pouvoir lancer l'application, il sera nécessaire d'avoir une base de données avec mysql de configuré et lancé sur son PC.

### Configuration

-   Créer un fichier ".env" en se basant sur le fichier ".env.example"
-   Ajouter la variable qui permet l'envoie des email `BREVO_API_KEY=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`
-   Ajouter la variable qui permet la sauvegarde des visites sur les animaux avec mongodb `DB_URI=mongodb+srv://daneyallison69:QW1UPQm9zkvgAW75@arcadia-metrics.wcwejom.mongodb.net/?retryWrites=true&w=majority&appName=arcadia-metrics`
-   Configurer les différentes variables pour mysql
-   `DB_CONNECTION=mysql`
-   `DB_HOST=127.0.0.1`
-   `DB_PORT=3306`
-   `DB_DATABASE=arcadia`
-   `DB_USERNAME=root`
-   `DB_PASSWORD=`

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

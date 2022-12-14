# Artrip Pixel - Musée virtuel.
## Membres du groupe :

### Front-end / Design  
- Lola GOMEZ
- Kilian LHERMITTE
- Florian DELVINCOURT
- Ingrid CHAMPAIN

### Back-end
- Lucas BRODA
- Clement MAHIEUX
- Ryan KADRI

## Le site web

Pour lancer avec succès une première version du site web, il faut exécuter les
commandes suivantes sur votre machine de développement :

```shell
# A partir de la racine de votre projet

# installation des dépenances
composer install 

# installation des outils pour la construction du front
npm install && npm run build

# liaison avec le SGBD et la base de données utilisée
cp .env.example .env

#########################################################
#
# Ici il faut modifier en particulier les variables suivantes
#
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=marathon_22
# DB_USERNAME=root
# DB_PASSWORD=
#
#
#########################################################

# Génération de la clé initiale

php artisan key:generate

# génération des tables dans votre base de données

php artisan migrate

# ou pour ré-initialiser

php artisan migrate:fresh

# Initialisation des données de départ

cp -r resources/images storage/app/public

# Création du lien physique en storage/app/public et public/storage

php artisan storage:link

# Ajout de données aléatoire dans les tables de la base de données

php artisan db:seed

# Lancement de l'application web pour le développement

php artisan serve
```

Si toutes les commandes précédentes ont été exécutées, votre application doit être accessible à
l'adresse [http://localhost:8000](http://localhost:8000)
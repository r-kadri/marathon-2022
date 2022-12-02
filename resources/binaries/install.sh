#!/usr/bin/env sh

echo "#begin install"
cd ~/www
if [ ! -d ./vendor ] ; then
  composer install
fi
if [ ! -d ./node_modules ] ; then
  npm install && npm run build
fi
sudo fixRights $LOGNAME
cp .env.example .env
php artisan key:generate
echo "#end install"

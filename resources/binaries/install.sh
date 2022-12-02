#!/usr/bin/env sh

echo "#begin install"
cd ~/www
if [ ! -d ./vendor ]
  composer install
fi
if [ ! -d ./node_modules ]
  npm install && npm run build
fi
fixRights
echo "#end install"

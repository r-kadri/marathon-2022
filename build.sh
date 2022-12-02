#!/usr/bin/env sh

#eval `ssh-agent -s`
#echo "$PRIVATE_KEY" | tr -d '\r' | ssh-add -

echo "ssh $NAME@172.31.146.106 test -d  /srv/comptes/marathon22/$NAME/www/vendor ;  echo $?"
echo $?

echo "ssh $NAME@172.31.146.106 test -d  /srv/comptes/marathon22/$NAME/www ; echo $?"
echo $?

#composer install
#npm install && npm run build
#rsync -rtv . $NOM@hemery-virtual-machine:/var/www/html/robert

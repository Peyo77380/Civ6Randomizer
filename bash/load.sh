#!/usr/bin/env bash
source variables.sh

git ftp push &&
sshpass -p $PSWD ssh $USER:@$SERVER "cd ${SERVER_PATH} && php7.2 bin/console cache:clear && exit"

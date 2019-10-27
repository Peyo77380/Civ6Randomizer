#!/usr/bin/env bash
source variables.sh

function productionAction {
    git ftp push && sshpass -p $PSWD ssh $USER:@$SERVER "cd ${SERVER_PATH} && ${1} && exit"
}

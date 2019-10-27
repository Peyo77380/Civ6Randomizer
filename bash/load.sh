#!/usr/bin/env bash
source goToBegetCommand.sh

COMMANDLOAD="php7.2 bin/console cache:clear"
productionAction $COMMANDLOAD

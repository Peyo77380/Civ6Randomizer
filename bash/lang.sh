#!/usr/bin/env bash
#Update ru and en lang packages
php ../bin/console translation:update --dump-messages --force ru
php ../bin/console translation:update --dump-messages --force en

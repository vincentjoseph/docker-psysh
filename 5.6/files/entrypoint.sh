#!/bin/bash

set -e

# download php manual for psysh doc command
wget -q http://psysh.org/manual/$PHP_MANUAL_LANGUAGE/php_manual.sqlite -O $HOME/.local/share/psysh/php_manual.sqlite

php psysh ${*}

#!/bin/bash

set -e

if [[ ${1:0:1} = "-" ]]; then
    set -- psysh "$@"
fi

if [[ "$1" == "psysh" ]]; then
    set -- "$@" --config=/config.php
fi

if [[ ! -d "/data/$PHP_MANUAL_LANGUAGE" ]]; then
    echo "\"$PHP_MANUAL_LANGUAGE\" language is not yet supported. Setting \"en\" default language."
    export PHP_MANUAL_LANGUAGE=en
fi

exec "$@"

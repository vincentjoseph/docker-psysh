#!/bin/bash

set -e

if [[ ${1:0:1} = "-" ]]; then
    set -- psysh "$@"
fi

if [[ "$1" == "psysh" ]]; then
    set -- "$@" --config=/config.php
fi

if [[ ! -d "/data/$PSYSH_MANUAL_LANGUAGE" ]]; then
    echo "\"$PSYSH_MANUAL_LANGUAGE\" language is not yet supported. Setting \"en\" as language."
    export PSYSH_MANUAL_LANGUAGE=en
fi

exec "$@"

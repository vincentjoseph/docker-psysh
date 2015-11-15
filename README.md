# Docker PsySH

Docker image for [PsySH](http://psysh.org) php REPL.

## Requirements

Build psysh with wanted php version (availables : `5.4`|`5.5`|`5.6`|`7.0`|`latest`)
```
bash build.sh 5.4 5.5 5.6 7.0 latest
```

## Environment variables

- `PHP_MANUAL_LANGUAGE` (available: `fr`|`en`, default: `en`)
- `PSYSH_HISTORY_SIZE`: maximum number of entries the history can contain - 0 is unlimited size - (default: `0`)
- `PSYSH_USE_PCNTL` (available: `true`|`false`, default: `true`)
- `PSYSH_USE_READLINE` (available: `true`|`false`, default: `true`)
- `PSYSH_REQUIRE_SEMICOLONS` (available: `true`|`false`, default: `false`)
- `PSYSH_WARN_ON_MULTIPLE_CONFIGS` (available: `true`|`false`, default: `false`)


## Simple Usage

```
docker run --rm -it psy/psysh <option>
```

## Install alias :

Create file : `/usr/local/bin/psysh` :

```
#!/usr/bin/env bash

PHP_MANUAL_LANGUAGE="fr"

# Enable container shared PsySH history
HISTORY_FILE="$HOME/.psysh_history"
touch $HISTORY_FILE

function contains {
    for a in $1; do
        if [[ "$2" = "$a" ]];then
            return 0
        fi
    done

    return 1
}

if contains "5.4 5.5 5.6 7.0 latest" "$1"; then
    TAG="$1"
    shift
else
    TAG="latest"
fi

docker run --rm -it -e PHP_MANUAL_LANGUAGE=$PHP_MANUAL_LANGUAGE -u $USER -v /etc/passwd:/etc/passwd:ro -v $HISTORY_FILE:/config/psysh_history psy/psysh:$TAG ${*}

```

add perms :

```
chmod +x /usr/local/bin/psysh
```

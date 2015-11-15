# Docker PsySH

Docker image for [PsySH](http://psysh.org) php REPL.

## Requirements

Build psysh with wanted php version (availables : `5.4`|`5.5`|`5.6`|`7.0`|`latest`)
```
bash build.sh 5.4 5.5 5.6 7.0 latest
```

## Environment variables

- `PSYSH_MANUAL_LANGUAGE` (available: `fr`|`en`, default: `en`)
- `PSYSH_HISTORY_SIZE`: maximum number of entries the history can contain - 0 is unlimited size - (default: `0`)
- `PSYSH_USE_PCNTL` (available: `true`|`false`, default: `true`)
- `PSYSH_USE_READLINE` (available: `true`|`false`, default: `true`)
- `PSYSH_REQUIRE_SEMICOLONS` (available: `true`|`false`, default: `false`)
- `PSYSH_WARN_ON_MULTIPLE_CONFIGS` (available: `true`|`false`, default: `false`)


## Simple Usage

```
docker run --rm -it psy/psysh:<version> <option>
```

## Install alias :

Create file : `/usr/local/bin/psysh` :

```
#!/usr/bin/env bash

PSYSH_MANUAL_LANGUAGE="fr"
PHP_VERSION="latest"

# Enable container shared PsySH history
HISTORY_FILE="$HOME/.psysh_history"
touch $HISTORY_FILE

# Choose used php version as first argument
if [[ ${1:0:1} != "-" ]]; then
    TAG="$1"
    shift
else
    TAG=$PHP_VERSION
fi

docker run --rm -it -e PSYSH_MANUAL_LANGUAGE=$PSYSH_MANUAL_LANGUAGE -u $USER -v /etc/passwd:/etc/passwd:ro -v $HISTORY_FILE:/config/psysh_history psy/psysh:$TAG ${*}

```

add perms :

```
chmod +x /usr/local/bin/psysh
```

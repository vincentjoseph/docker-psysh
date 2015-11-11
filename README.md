# Docker PsySH

Docker image for [PsySH](http://psysh.org) php REPL.

## Requirements

```
docker build -t aw/psysh .
```

## Environment variables

- `PHP_MANUAL_LANGUAGE` (default: `en`)


## Simple Usage

```
docker run --rm -it aw/psysh <option>
```

## Enjoy PsySH history feature

Create a named (ex: `aw_psysh`) container based on `aw/psysh` image :
```
docker create -ti --name psysh aw/psysh
```
Start the same container :
```
docker start aw_psysh
```
Execute the container each time you want to use PsySH :
```
docker exec -ti psysh php psysh <option>
```

## Install alias :

Create file : `/usr/local/bin/psysh` :

```
#!/usr/bin/env bash

PHP_MANUAL_LANGUAGE=fr
DEFAULT_VERSION=5.6

function containerExists {
    for container in $(docker ps -a | awk '{print $NF}')
    do
        if [[ "$1" = "$container" ]]; then
            return 0
        fi
    done

    return 1
}

function isContainerRunning {
    for container in $(docker ps | awk '{print $NF}')
    do
        if [[ "$1" = "$container" ]]; then
            return 0
        fi
    done

    return 1
}

if [[ "$#" -eq "0" || "${1:0:1}" = "-" ]]; then
    PHP_VERSION=$DEFAULT_VERSION
else
    PHP_VERSION=$1
    shift
fi
CONTAINER_NAME="$(basename $0)-$(echo $PHP_VERSION | tr '.' '_')"

# because we want to keep history between each instance.
if ! containerExists $CONTAINER_NAME; then
    docker create -e PHP_MANUAL_LANGUAGE=$PHP_MANUAL_LANGUAGE -ti --name $CONTAINER_NAME aw/psysh:$PHP_VERSION 1> /dev/null || exit 1
fi

if ! isContainerRunning $CONTAINER_NAME; then
    docker start $CONTAINER_NAME 1> /dev/null || exit 1
fi

docker exec -ti $CONTAINER_NAME php psysh ${*}

```

add perms :

```
chmod +x /usr/local/bin/psysh
```

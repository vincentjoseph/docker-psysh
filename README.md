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
docker create -ti --name aw_psysh aw/psysh
```
Start the same container :
```
docker start aw_psysh
```
Execute the container each time you want to use PsySH :
```
docker exec -ti aw_psysh php psysh <option>
```

## Install alias :

Create file : `/usr/local/bin/psysh` :

```
#!/usr/bin/env bash

CONTAINER_NAME=aw_psysh
PHP_MANUAL_LANGUAGE=fr

function isContainerNotExists {
    for container in $(docker ps -a | awk '{print $NF}')
    do
        if [[ "$1" = "$container" ]]; then
            return 1
        fi
    done

    return 0
}

function isContainerNotRunning {
    for container in $(docker ps | awk '{print $NF}')
    do
        if [[ "$1" = "$container" ]]; then
            return 1
        fi
    done

    return 0
}

# because we want to keep history between each instance.
if isContainerNotExists $CONTAINER_NAME; then
    docker create -e PHP_MANUAL_LANGUAGE=$PHP_MANUAL_LANGUAGE -ti --name $CONTAINER_NAME aw/psysh 1> /dev/null
fi

if isContainerNotRunning $CONTAINER_NAME; then
    docker start $CONTAINER_NAME 1> /dev/null
fi

docker exec -ti $CONTAINER_NAME php psysh ${*}

```

add perms :

```
chmod +x /usr/local/bin/psysh
```

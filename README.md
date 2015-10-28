# Docker Psysh (PHP REPL)

## Build

```
docker build -t aw/psysh .
```

## Simple Usage

```
docker run --rm -it aw/psysh <option>
```

## Install alias :

Create file : `/usr/local/bin/psysh` :

```
#!/usr/bin/env bash

command -v docker >/dev/null 2>&1 || { echo >&2 "Command docker is required.  Aborting."; exit 1; }

CONTAINER_NAME=aw_psysh

# because we always want the same container to keep psysh history.
docker start -i $CONTAINER_NAME 2> /dev/null
if [ "$?" != "0" ]; then
    docker run -it --name $CONTAINER_NAME aw/psysh
fi
```

add perms :

```
chmod +x /usr/local/bin/psysh
```

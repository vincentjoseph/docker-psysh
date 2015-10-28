# Docker PsySH (PHP REPL)

## Requirements

```
docker build -t aw/psysh .
```

## Simple Usage

```
docker run --rm -it aw/psysh <option>
```

## Enjoy PsySH history feature
Create a named (ex: `aw_psysh`) container based on `aw/psysh` image :
```
docker create -ti --name aw_psysh aw/psysh
```
Start the same container each time you are using PsySH :
```
docker start -i aw_psysh <option>
```

## Install alias :

Create file : `/usr/local/bin/psysh` :

```
#!/usr/bin/env bash

CONTAINER_NAME=aw_psysh

# because we always want the same container to keep psysh history.
docker start -i $CONTAINER_NAME ${*} 2> /dev/null
if [ "$?" != "0" ]; then
    docker run -it --name $CONTAINER_NAME aw/psysh ${*}
fi
```

add perms :

```
chmod +x /usr/local/bin/psysh
```

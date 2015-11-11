#!/bin/sh

docker build -t aw/psysh:5.4 5.4
docker build -t aw/psysh:5.5 5.5
docker build -t aw/psysh:5.6 5.6
docker build -t aw/psysh 5.6

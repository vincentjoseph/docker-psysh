#!/usr/bin/env bash

set -e

function contains {
    for a in $1; do
        if [[ "$2" = $a ]];then
            return 0
        fi
    done

    return 1
}

availables="5.4 5.5 5.6 7.0 latest"
if [ "$1" = "all" ]; then
    set -- "$availables"
fi

for version in $@; do
    if ! contains "$availables" "$version"; then
        echo >&2 "$version not supported. Ignored."
        continue
    fi

    set -x
    mkdir $version
    cp -r conf $version/
    cp docker-entrypoint.sh $version/
    echo "# generated by $(basename $0)" > "$version/Dockerfile"
    sed "s/%%VERSION%%/$version/g" Dockerfile.template >> "$version/Dockerfile"

    docker build -t psy/psysh:$version $version

    rm -fr $version
done

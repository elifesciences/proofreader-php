#!/bin/bash
set -e

if [ "$#" -ne 1 ]; then
    echo "Usage: run-docker.sh SUBFOLDER"
    echo "Example: run-docker.sh src/"
    exit 1
fi

subfolder=$1
docker run -it -v `pwd`:/project proofreader_dev bin/proofreader /project/$1

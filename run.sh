#!/usr/bin/env bash
set -e
# switch to this working directory for simplicity
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

$DIR/vendor/bin/phpmd $* text $DIR/ruleset.xml.dist
$DIR/vendor/bin/phpcpd $*

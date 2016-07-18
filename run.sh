#!/usr/bin/env bash
set -e

dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
code=$1

echo "PHP-CS-Fixer consistency check with local project"
$dir/bin/php-cs-fixer-consistency-check $dir/.php_cs.dist ./.php_cs

echo "PHP-CS-Fixer"
$dir/vendor/bin/php-cs-fixer -vv fix $code --dry-run --config-file $dir/.php_cs.dist

echo "PHPMD"
$dir/vendor/bin/phpmd $code text $dir/ruleset.xml.dist | grep -v "Unexpected token: "

echo "PHPCPD"
$dir/vendor/bin/phpcpd $code


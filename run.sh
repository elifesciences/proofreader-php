#!/usr/bin/env bash
set -e

dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
code=$1

function first_that_exists()
{
    list=$1
    for file in $list
    do
        if [ -e "${dir}/${file}" ]
        then
            echo "${dir}/${file}"
            exit 0
        fi
    done 
    exit 1
}
php_cs=$(first_that_exists ".php_cs .php_cs.dist")
ruleset_xml=$(first_that_exists "ruleset.xml ruleset.xml.dist")

echo "PHP-CS-Fixer consistency check with local project"
$dir/bin/php-cs-fixer-consistency-check $php_cs .php_cs

echo "PHP-CS-Fixer"
$dir/vendor/bin/php-cs-fixer -vv fix $code --dry-run --config-file $dir/.php_cs.dist

echo "PHPMD"
$dir/vendor/bin/phpmd $code text $ruleset_xml | grep -v "Unexpected token: "

echo "PHPCPD"
$dir/vendor/bin/phpcpd $code


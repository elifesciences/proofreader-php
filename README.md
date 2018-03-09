
It uses:
- [PHP Coding Standard Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) to check conformance of PHP code to stylistic coding standards..
- [PHP Copy/Paste Detector](https://github.com/sebastianbergmann/phpcpd) to check there is no clear duplication between different PHP files.

## Usage

```
$ composer install
# from some project
# /path/to/proofreader-php/bin/proofreader $folder
```

## Configuration

By default, this configuration file is used:

- `.php_cs`

by PHP CS Fixer.

## Sample output

```bash
$ ~/code/proofreader-php/bin/proofreader src/
PHP-CS-Fixer consistency check with local project
PHP-CS-Fixer
Loaded config from "/home/giorgio/code/proofreader-php/.php_cs"
.........................
Legend: ?-unknown, I-invalid file syntax, file ignored, .-no changes, F-fixed, E-error
Checked all files in 1.792 seconds, 6.000 MB memory used

PHPCPD
phpcpd 2.0.4 by Sebastian Bergmann.

0.00% duplicated lines out of 725 total lines of code.

Time: 43 ms, Memory: 4.00MB
```

## Containerization

Execute `proofreader` against its sample folder (not that useful):

```
docker run elifesciences/proofreader-php bin/proofreader sample/
```

Execute `proofreader` on the `src` folder of your own project:

```
docker run -v $(pwd):/code elifesciences/proofreader-php bin/proofreader /code/src
```

Execute `php-cs-fixer` on the `src` folder of your own project (experimental):

```
touch .php_cs.cache
docker run -v $(pwd):/code -v $(pwd)/.php_cs.cache:/srv/proofreader-php/.php_cs.cache -u $(id -u) elifesciences/proofreader-php vendor/bin/php-cs-fixer fix /code/src
```

Import `proofreader` in another project's image:

```
FROM elifesciences/proofreader-php:latest AS proofreader
...
USER elife
COPY --from=proofreader --chown=elife:elife /srv/proofreader-php /srv/proofreader-php
RUN ln -s /srv/proofreader-php/bin/proofreader /srv/bin/proofreader
```

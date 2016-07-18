`proofreader-php` is a tool for enforcing opinionated coding standards and conventions through static analysis of the code.

It uses:
- [PHP Coding Standard Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) to check conformance of PHP code to stylistic coding standards..
- [PHP Mess Detector](https://phpmd.org) to parse PHP source code and check it conforms to the configured rules. Custom PHPMD rules are provided.
- [PHP Copy/Paste Detector](https://github.com/sebastianbergmann/phpcpd) to check there is no clear duplication between different PHP files.

## Usage

```
$ composer install
$ ./run.sh /path/to/some/src/folder
```

The path passed in must be absolute.

## Configuration

By default, these configuration files are used:

- `.php_cs.dist`
- `ruleset.xml.dist`

by PHP CS Fixer and PHPMD respectively.

To override them you can create these files:

- `.php_cs`
- `ruleset.xml`

## Sample output

```bash
$ proofreader-php/run.sh src/
PHP-CS-Fixer consistency check with local project
PHP-CS-Fixer
Loaded config from "/home/giorgio/code/proofreader-php/.php_cs.dist"
.........................
Legend: ?-unknown, I-invalid file syntax, file ignored, .-no changes, F-fixed, E-error
Checked all files in 1.792 seconds, 6.000 MB memory used
PHPMD

PHPCPD
phpcpd 2.0.4 by Sebastian Bergmann.

0.00% duplicated lines out of 725 total lines of code.

Time: 43 ms, Memory: 4.00MB
```


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

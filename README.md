`proofreader-php` is a tool for enforcing opinionated coding standards and conventions through static analysis of the code.

It uses [PHP Mess Detector](https://phpmd.org) to parse PHP source code and check it conforms to the configured rules. Custom PHPMD rules are provided.

## Usage

```
$ composer install
$ ./run.sh /path/to/some/src/folder
```

The path passed in must be absolute.

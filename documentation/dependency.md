## Installation as dependency

```bash
composer require php-pp/code-sniffer ^0.0
```

## Usage

### Scan files

```bash
vendor/bin/phpcs \
    --standard=vendor/php-pp/code-sniffer/src/PhpPp/ruleset.xml \
    --report=PhpPp\\CodeSniffer\\Reports\\PhpPp \
    src/
```

Some phpcs parameters:
 * `-s`: show sniffer name
 * `--report-csv=foo.csv`: write report results in CSV
 * `--ignore=/vendor,/var`: ignore some directories or files
 * `-e`: show enabled coding standards
 * `--boostrap=/foo/file.php`: boostrap file to configure phpcs or init your code for example
 * `--warning-severity=0`: do not show warnings
 * `-p`: show progression

### Scan files need to be commited

```bash
git status --porcelain | grep -E '^[^D\?]{2} .*\.php$' | awk '{print $2}' | xargs -n1 vendor/bin/phpcs --standard=vendor/php-pp/code-sniffer/src/PhpPp/ruleset.xml --report=PhpPp\\CodeSniffer\\Reports\\PhpPp
```

### Include this ruleset in your ruleset.xml

```xml
<?xml version="1.0"?>
<ruleset>
    <rule ref="vendor/php-pp/code-sniffer/src/PhpPp/ruleset.xml"/>
</ruleset>
```

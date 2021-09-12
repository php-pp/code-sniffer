# Configure sniffs

Some sniffs could be configured by static methods,
like `PhpPp\CodeSniffer\PhpPp\Sniffs\Metrics\NestingLevelSniff`
or the report `PhpPp\CodeSniffer\Reports\PhpPp`.

# Create a bootstrap file

You can add a bootstrap file to phpcs to configure sniffs:

```php
# phpcs_boostrap.php

// If you use the Docker image,
// file path must not be the same between Docker and your local file system.
// You can change a part of the path to files who have errors, to make file:// works in bash.
PhpPp\CodeSniffer\Reports\PhpPp::addReplaceInPath('/app', __DIR__);

// Add methods who could have a nesting level greater than 5.
PhpPp\CodeSniffer\PhpPp\Sniffs\Metrics\NestingLevelSniff::addAllowedNestingLevelMethods('foo.php', 'barMethod');

// Allow some deprecated function
PhpPp\CodeSniffer\PhpPp\Sniffs\Php\DeprecatedFunctionsSniff::addAllowDeprecatedFunction('deprecated_function');

// Force use groups to be at 3rd level, instead of 1st or 2nd.
// Example : Symfony\Component\Form\{...}
PhpPp\CodeSniffer\PhpPp\Sniffs\Uses\GroupUsesSniff::addThirdLevelPrefix('Symfony\Component');
// If you want to configure it for a Symfony project, you can use addSymfonyPrefixes()
PhpPp\CodeSniffer\PhpPp\Sniffs\Uses\GroupUsesSniff::addSymfonyPrefixes();
```

# Add your bootstrap file to phpcs

## phpcs installed as dependency

```bash
vendor/bin/phpcs --bootstrap=phpcs_boostrap.php (...)
```

## phpcs called with Docker image

```bash
docker run -e PHPCS_BOOTSTRAP=phpcs_boostrap.php (...)
```

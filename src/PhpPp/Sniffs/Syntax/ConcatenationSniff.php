<?php

declare(strict_types=1);

namespace PhpPp\CodeSniffer\PhpPp\Sniffs\Syntax;

use PHP_CodeSniffer\{
    Files\File,
    Sniffs\Sniff
};

/** Concatenation character "." should be surrounded by spaces */
class ConcatenationSniff implements Sniff
{
    /** @return int[] */
    public function register(): array
    {
        return [T_STRING_CONCAT];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        if (
            $phpcsFile->getTokens()[$stackPtr - 1]['type'] !== 'T_WHITESPACE'
            || $phpcsFile->getTokens()[$stackPtr + 1]['type'] !== 'T_WHITESPACE'
        ) {
            $phpcsFile->addError(
                'Concatenation character "." should be surrounded by spaces',
                $stackPtr,
                'SurroundedBySpaces'
            );
        }
    }
}

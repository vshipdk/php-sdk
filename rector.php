<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Identical\FlipTypeControlToUseExclusiveTypeRector;
use Rector\CodeQuality\Rector\If_\ExplicitBoolCompareRector;
use Rector\Config\RectorConfig;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withoutParallel()
    ->withImportNames(importShortClasses: false, removeUnusedImports: true)
    ->withPhpVersion(phpVersion: PhpVersion::PHP_82)
    ->withPaths([__DIR__ . '/src'])
    ->withRules([
        DeclareStrictTypesRector::class,
    ])
    ->withPreparedSets(deadCode: true, codeQuality: true, typeDeclarations: true, earlyReturn: true)
    ->withPhpSets(php85: true)
    ->withSkip(
        [
            FlipTypeControlToUseExclusiveTypeRector::class,
            DisallowedEmptyRuleFixerRector::class,
            ExplicitBoolCompareRector::class,
        ],
    )->withFluentCallNewLine();

<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\ClassMethod\OptionalParametersAfterRequiredRector;
use Rector\CodeQuality\Rector\Identical\FlipTypeControlToUseExclusiveTypeRector;
use Rector\CodeQuality\Rector\If_\ExplicitBoolCompareRector;
use Rector\Config\RectorConfig;
use Rector\Php74\Rector\Assign\NullCoalescingOperatorRector;
use Rector\Php80\Rector\Class_\StringableForToStringRector;
use Rector\Php80\Rector\ClassMethod\FinalPrivateToPrivateVisibilityRector;
use Rector\Php80\Rector\ClassMethod\SetStateToStaticRector;
use Rector\Php84\Rector\Param\ExplicitNullableParamTypeRector;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withoutParallel()
    ->withImportNames(importShortClasses: false, removeUnusedImports: true)
    ->withPhpVersion(phpVersion: PhpVersion::PHP_81)
    ->withPaths([__DIR__ . '/src'])
    ->withRules([
        ExplicitNullableParamTypeRector::class,
        FinalPrivateToPrivateVisibilityRector::class,
        OptionalParametersAfterRequiredRector::class,
        SetStateToStaticRector::class,
        StringableForToStringRector::class,
        NullCoalescingOperatorRector::class,
        DeclareStrictTypesRector::class,
    ])
    ->withPreparedSets(deadCode: true, codeQuality: true, typeDeclarations: true, earlyReturn: true)
    ->withPhpSets(php84: true)
    ->withSkip(
        [
            FlipTypeControlToUseExclusiveTypeRector::class,
            DisallowedEmptyRuleFixerRector::class,
            ExplicitBoolCompareRector::class,
        ],
    )->withFluentCallNewLine();

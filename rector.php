<?php

declare(strict_types = 1);

use Rector\Config\RectorConfig;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\Nette\Set\NetteSetList;
use Rector\Php55\Rector\String_\StringClassNameToClassConstantRector;
use Rector\Symfony\Set\SensiolabsSetList;
use Rector\Symfony\Set\SymfonySetList;

return function (RectorConfig $rectorConfig): void {
    $rectorConfig->importNames();
    $rectorConfig->importShortClasses();
//    $rectorConfig->sets([
//        DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES,
//        SymfonySetList::ANNOTATIONS_TO_ATTRIBUTES,
//        NetteSetList::ANNOTATIONS_TO_ATTRIBUTES,
//        SensiolabsSetList::FRAMEWORK_EXTRA_61,
//    ]);
    $rectorConfig->rule(StringClassNameToClassConstantRector::class);
};

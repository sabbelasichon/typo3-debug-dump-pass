<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
	->withPaths([
		__DIR__ . '/Classes',
		__DIR__ . '/Configuration',
	])

	// add a single rule
	->withRules([
		NoUnusedImportsFixer::class,
	])
	->withSets([
		\Symplify\EasyCodingStandard\ValueObject\Set\SetList::PSR_12,
		\Symplify\EasyCodingStandard\ValueObject\Set\SetList::ARRAY,
	]);


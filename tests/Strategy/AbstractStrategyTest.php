<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl\Test\Strategy;

use Ngmy\MediaThumbnailUrl\MediaUrlNormalizer;
use Ngmy\MediaThumbnailUrl\MediaUrlParser;
use Ngmy\MediaThumbnailUrl\Strategy\StrategyInterface;
use Ngmy\MediaThumbnailUrl\UrlNormalizer;
use PHPUnit\Framework\TestCase;

abstract class AbstractStrategyTest extends TestCase
{
    /**
     * @dataProvider dataProvider_generate
     *
     * @param mixed[] $constructorArguments
     */
    public function testGenerate(array $constructorArguments, string $mediaUrl, string $expected): void
    {
        $parsedStrategyTestFullyQualifiedClassName = explode('\\', get_called_class());
        $strategyTestClassName = end($parsedStrategyTestFullyQualifiedClassName);
        $strategyClassName = substr($strategyTestClassName, 0, -4);
        $strategyFullyQualifiedClassName = '\\Ngmy\\MediaThumbnailUrl\\Strategy\\'.$strategyClassName;

        /** @var StrategyInterface */
        $strategy = new $strategyFullyQualifiedClassName(...$constructorArguments);

        $actual = $strategy->generate($mediaUrl, new MediaUrlParser(new MediaUrlNormalizer(new UrlNormalizer())));

        $this->assertSame($expected, $actual);
    }
}

<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl\Test\GenerateStrategy;

use Ngmy\MediaThumbnailUrl\UrlNormalizer;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @covers \Ngmy\MediaThumbnailUrl\UrlNormalizer
 */
class UrlNormalizerTest extends TestCase
{
    /**
     * @return iterable<mixed[]>
     */
    public function dataProvider_normalize(): iterable
    {
        yield 'add trailing slash' => [
            'https://example.com',
            'https://example.com/',
        ];

        yield 'convert http to https' => [
            'http://example.com/',
            'https://example.com/',
        ];

        yield 'add https' => [
            '//example.com/',
            'https://example.com/',
        ];

        yield 'sort query' => [
            'https://example.com/?foo=bar&baz=toto&foo=toto',
            'https://example.com/?foo=bar&foo=toto&baz=toto',
        ];

        yield 'remove empty query pairs' => [
            'https://example.com/?foo=bar&baz=&=toto',
            'https://example.com/?foo=bar',
        ];

        yield 'url encode php data transport layer' => [
            'https://example.com/?foo[]=bar&foo[]=toto',
            'https://example.com/?foo%5B%5D=bar&foo%5B%5D=toto',
        ];
    }

    /**
     * @dataProvider dataProvider_normalize
     */
    public function testNormalize(string $mediaUrl, string $expected): void
    {
        $actual = (new UrlNormalizer())->normalize($mediaUrl);

        $this->assertSame($expected, $actual);
    }
}

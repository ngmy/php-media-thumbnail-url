<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl\Test\GenerateStrategy;

use Ngmy\MediaThumbnailUrl\MediaUrlNormalizer;
use Ngmy\MediaThumbnailUrl\UrlNormalizer;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @covers \Ngmy\MediaThumbnailUrl\MediaUrlNormalizer
 */
class MediaUrlNormalizerTest extends TestCase
{
    /**
     * @return iterable<mixed[]>
     */
    public function dataProvider_normalize(): iterable
    {
        yield 'www.instagram.com -> no-op' => [
            'https://www.instagram.com/p/CkRFMwSjajp/',
            'https://www.instagram.com/p/CkRFMwSjajp/',
        ];

        yield 'instagram.com -> www.instagram.com' => [
            'https://instagram.com/p/CkRFMwSjajp/',
            'https://www.instagram.com/p/CkRFMwSjajp/',
        ];

        yield 'www.instagr.am -> www.instagram.com' => [
            'https://www.instagr.am/p/CkRFMwSjajp/',
            'https://www.instagram.com/p/CkRFMwSjajp/',
        ];

        yield 'instagr.am -> www.instagram.com' => [
            'https://instagr.am/p/CkRFMwSjajp/',
            'https://www.instagram.com/p/CkRFMwSjajp/',
        ];

        yield 'www.youtube.com -> no-op' => [
            'https://www.youtube.com/watch/?v=EEixTRM5gUk',
            'https://www.youtube.com/watch/?v=EEixTRM5gUk',
        ];

        yield 'youtube.com -> www.youtube.com' => [
            'https://youtube.com/watch/?v=EEixTRM5gUk',
            'https://www.youtube.com/watch/?v=EEixTRM5gUk',
        ];

        yield 'youtu.be with video id in query -> www.youtube.com' => [
            'https://youtu.be/watch/?v=EEixTRM5gUk',
            'https://www.youtube.com/watch/?v=EEixTRM5gUk',
        ];

        yield 'youtu.be with video id in path -> www.youtube.com' => [
            'https://youtu.be/EEixTRM5gUk/',
            'https://www.youtube.com/watch/?v=EEixTRM5gUk',
        ];
    }

    /**
     * @dataProvider dataProvider_normalize
     */
    public function testNormalize(string $mediaUrl, string $expected): void
    {
        $actual = (new MediaUrlNormalizer(new UrlNormalizer()))->normalize($mediaUrl);

        $this->assertSame($expected, $actual);
    }
}

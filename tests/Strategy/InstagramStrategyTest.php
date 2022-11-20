<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl\Test\Strategy;

use Ngmy\MediaThumbnailUrl\Strategy\InstagramStrategyParameter\InstagramThumbnailSize;

/**
 * @internal
 *
 * @covers \Ngmy\MediaThumbnailUrl\Strategy\InstagramStrategy
 */
class InstagramStrategyTest extends AbstractStrategyTest
{
    /**
     * @return iterable<mixed[]>
     */
    public function dataProvider_generate(): iterable
    {
        yield 'thumbnail size post thumbnail' => [
            [
                InstagramThumbnailSize::Thumbnail,
            ],
            'https://www.instagram.com/p/CkRFMwSjajp/',
            '//www.instagram.com/p/CkRFMwSjajp/media?size=t',
        ];

        yield 'medium size post thumbnail' => [
            [
                InstagramThumbnailSize::Medium,
            ],
            'https://www.instagram.com/p/CkRFMwSjajp/',
            '//www.instagram.com/p/CkRFMwSjajp/media?size=m',
        ];

        yield 'large size post thumbnail' => [
            [
                InstagramThumbnailSize::Large,
            ],
            'https://www.instagram.com/p/CkRFMwSjajp/',
            '//www.instagram.com/p/CkRFMwSjajp/media?size=l',
        ];

        yield 'thumbnail size reel thumbnail' => [
            [
                InstagramThumbnailSize::Thumbnail,
            ],
            'https://www.instagram.com/reel/CkRFMwSjajp/',
            '//www.instagram.com/p/CkRFMwSjajp/media?size=t',
        ];

        yield 'medium size reel thumbnail' => [
            [
                InstagramThumbnailSize::Medium,
            ],
            'https://www.instagram.com/reel/CkRFMwSjajp/',
            '//www.instagram.com/p/CkRFMwSjajp/media?size=m',
        ];

        yield 'large size reel thumbnail' => [
            [
                InstagramThumbnailSize::Large,
            ],
            'https://www.instagram.com/reel/CkRFMwSjajp/',
            '//www.instagram.com/p/CkRFMwSjajp/media?size=l',
        ];
    }
}

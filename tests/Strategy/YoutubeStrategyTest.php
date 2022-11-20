<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl\Test\Strategy;

use Ngmy\MediaThumbnailUrl\Strategy\YoutubeStrategyParameter\YoutubeThumbnailFormat;
use Ngmy\MediaThumbnailUrl\Strategy\YoutubeStrategyParameter\YoutubeThumbnailSize;

/**
 * @internal
 *
 * @covers \Ngmy\MediaThumbnailUrl\Strategy\YoutubeStrategy
 */
class YoutubeStrategyTest extends AbstractStrategyTest
{
    /**
     * @return iterable<mixed[]>
     */
    public function dataProvider_generate(): iterable
    {
        yield 'default.jpg' => [
            [
                YoutubeThumbnailSize::NormalQualityDefault,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/default.jpg',
        ];

        yield '1.jpg' => [
            [
                YoutubeThumbnailSize::NormalQualityStart,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/1.jpg',
        ];

        yield '2.jpg' => [
            [
                YoutubeThumbnailSize::NormalQualityMiddle,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/2.jpg',
        ];

        yield '3.jpg' => [
            [
                YoutubeThumbnailSize::NormalQualityEnd,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/3.jpg',
        ];

        yield 'mqdefault.jpg' => [
            [
                YoutubeThumbnailSize::MediumQualityDefault,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/mqdefault.jpg',
        ];

        yield 'mq1.jpg' => [
            [
                YoutubeThumbnailSize::MediumQualityStart,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/mq1.jpg',
        ];

        yield 'mq2.jpg' => [
            [
                YoutubeThumbnailSize::MediumQualityMiddle,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/mq2.jpg',
        ];

        yield 'mq3.jpg' => [
            [
                YoutubeThumbnailSize::MediumQualityEnd,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/mq3.jpg',
        ];

        yield 'hqdefault.jpg' => [
            [
                YoutubeThumbnailSize::HighQualityDefault,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/hqdefault.jpg',
        ];

        yield 'hq1.jpg' => [
            [
                YoutubeThumbnailSize::HighQualityStart,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/hq1.jpg',
        ];

        yield 'hq2.jpg' => [
            [
                YoutubeThumbnailSize::HighQualityMiddle,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/hq2.jpg',
        ];

        yield 'hq3.jpg' => [
            [
                YoutubeThumbnailSize::HighQualityEnd,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/hq3.jpg',
        ];

        yield 'sddefault.jpg' => [
            [
                YoutubeThumbnailSize::StandardDefinitionDefault,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/sddefault.jpg',
        ];

        yield 'sd1.jpg' => [
            [
                YoutubeThumbnailSize::StandardDefinitionStart,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/sd1.jpg',
        ];

        yield 'sd2.jpg' => [
            [
                YoutubeThumbnailSize::StandardDefinitionMiddle,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/sd2.jpg',
        ];

        yield 'sd3.jpg' => [
            [
                YoutubeThumbnailSize::StandardDefinitionEnd,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/sd3.jpg',
        ];

        yield 'maxresdefault.jpg' => [
            [
                YoutubeThumbnailSize::MaximumResolutionDefault,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/maxresdefault.jpg',
        ];

        yield 'maxres1.jpg' => [
            [
                YoutubeThumbnailSize::MaximumResolutionStart,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/maxres1.jpg',
        ];

        yield 'maxres2.jpg' => [
            [
                YoutubeThumbnailSize::MaximumResolutionMiddle,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/maxres2.jpg',
        ];

        yield 'maxres3.jpg' => [
            [
                YoutubeThumbnailSize::MaximumResolutionEnd,
                YoutubeThumbnailFormat::Jpeg,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/maxres3.jpg',
        ];

        yield 'default.webp' => [
            [
                YoutubeThumbnailSize::NormalQualityDefault,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/default.webp',
        ];

        yield '1.webp' => [
            [
                YoutubeThumbnailSize::NormalQualityStart,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/1.webp',
        ];

        yield '2.webp' => [
            [
                YoutubeThumbnailSize::NormalQualityMiddle,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/2.webp',
        ];

        yield '3.webp' => [
            [
                YoutubeThumbnailSize::NormalQualityEnd,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/3.webp',
        ];

        yield 'mqdefault.webp' => [
            [
                YoutubeThumbnailSize::MediumQualityDefault,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/mqdefault.webp',
        ];

        yield 'mq1.webp' => [
            [
                YoutubeThumbnailSize::MediumQualityStart,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/mq1.webp',
        ];

        yield 'mq2.webp' => [
            [
                YoutubeThumbnailSize::MediumQualityMiddle,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/mq2.webp',
        ];

        yield 'mq3.webp' => [
            [
                YoutubeThumbnailSize::MediumQualityEnd,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/mq3.webp',
        ];

        yield 'hqdefault.webp' => [
            [
                YoutubeThumbnailSize::HighQualityDefault,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/hqdefault.webp',
        ];

        yield 'hq1.webp' => [
            [
                YoutubeThumbnailSize::HighQualityStart,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/hq1.webp',
        ];

        yield 'hq2.webp' => [
            [
                YoutubeThumbnailSize::HighQualityMiddle,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/hq2.webp',
        ];

        yield 'hq3.webp' => [
            [
                YoutubeThumbnailSize::HighQualityEnd,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/hq3.webp',
        ];

        yield 'sddefault.webp' => [
            [
                YoutubeThumbnailSize::StandardDefinitionDefault,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/sddefault.webp',
        ];

        yield 'sd1.webp' => [
            [
                YoutubeThumbnailSize::StandardDefinitionStart,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/sd1.webp',
        ];

        yield 'sd2.webp' => [
            [
                YoutubeThumbnailSize::StandardDefinitionMiddle,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/sd2.webp',
        ];

        yield 'sd3.webp' => [
            [
                YoutubeThumbnailSize::StandardDefinitionEnd,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/sd3.webp',
        ];

        yield 'maxresdefault.webp' => [
            [
                YoutubeThumbnailSize::MaximumResolutionDefault,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/maxresdefault.webp',
        ];

        yield 'maxres1.webp' => [
            [
                YoutubeThumbnailSize::MaximumResolutionStart,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/maxres1.webp',
        ];

        yield 'maxres2.webp' => [
            [
                YoutubeThumbnailSize::MaximumResolutionMiddle,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/maxres2.webp',
        ];

        yield 'maxres3.webp' => [
            [
                YoutubeThumbnailSize::MaximumResolutionEnd,
                YoutubeThumbnailFormat::Webp,
            ],
            'https://www.youtube.com/watch?v=EEixTRM5gUk',
            '//img.youtube.com/vi/EEixTRM5gUk/maxres3.webp',
        ];
    }
}

<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl\Strategy\YoutubeStrategyParameter;

/**
 * @see https://bojanvidanovic.com/blog/an-alternative-way-of-embedding-youtube-videos-without-impacting-web-perf/
 */
enum YoutubeThumbnailSize: string
{
    case NormalQualityDefault = 'default';

    case NormalQualityStart = '1';

    case NormalQualityMiddle = '2';

    case NormalQualityEnd = '3';

    case MediumQualityDefault = 'mqdefault';

    case MediumQualityStart = 'mq1';

    case MediumQualityMiddle = 'mq2';

    case MediumQualityEnd = 'mq3';

    case PlayerBackground = '0';

    case HighQualityDefault = 'hqdefault';

    case HighQualityStart = 'hq1';

    case HighQualityMiddle = 'hq2';

    case HighQualityEnd = 'hq3';

    case StandardDefinitionDefault = 'sddefault';

    case StandardDefinitionStart = 'sd1';

    case StandardDefinitionMiddle = 'sd2';

    case StandardDefinitionEnd = 'sd3';

    case HighQuality720 = 'hq720';

    case MaximumResolutionDefault = 'maxresdefault';

    case MaximumResolutionStart = 'maxres1';

    case MaximumResolutionMiddle = 'maxres2';

    case MaximumResolutionEnd = 'maxres3';
}

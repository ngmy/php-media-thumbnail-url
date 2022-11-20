<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl\Strategy\InstagramStrategyParameter;

/**
 * @see https://staku.designbits.jp/get-instagram-thumbnail-url/
 */
enum InstagramThumbnailSize: string
{
    case Thumbnail = 't';

    case Medium = 'm';

    case Large = 'l';
}

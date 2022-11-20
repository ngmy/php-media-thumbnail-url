<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl\Strategy;

use Ngmy\MediaThumbnailUrl\Exception\InvalidMediaUrlException;
use Ngmy\MediaThumbnailUrl\MediaUrlParser;
use Ngmy\MediaThumbnailUrl\Strategy\YoutubeStrategyParameter\YoutubeThumbnailFormat;
use Ngmy\MediaThumbnailUrl\Strategy\YoutubeStrategyParameter\YoutubeThumbnailSize;

class YoutubeStrategy implements StrategyInterface
{
    public function __construct(
        private readonly YoutubeThumbnailSize $thumbnailSize,
        private readonly YoutubeThumbnailFormat $thumbnailFormat,
    ) {
    }

    public function generate(string $mediaUrl, MediaUrlParser $mediaUrlParser): string
    {
        $parsedMediaUrl = $mediaUrlParser->parse($mediaUrl);

        if ('www.youtube.com' !== $parsedMediaUrl['host']) {
            throw new InvalidMediaUrlException($mediaUrl);
        }

        if ('/watch/' !== $parsedMediaUrl['path']) {
            throw new InvalidMediaUrlException($mediaUrl);
        }

        if (!isset($parsedMediaUrl['query'])) {
            throw new InvalidMediaUrlException($mediaUrl);
        }

        parse_str($parsedMediaUrl['query'], $parsedQuery);

        if (!isset($parsedQuery['v']) || !is_string($parsedQuery['v'])) {
            throw new InvalidMediaUrlException($mediaUrl);
        }

        $mediaId = $parsedQuery['v'];

        return "//img.youtube.com/vi/{$mediaId}/{$this->thumbnailSize->value}.{$this->thumbnailFormat->value}";
    }
}

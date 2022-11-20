<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl\Strategy;

use Ngmy\MediaThumbnailUrl\Exception\InvalidMediaUrlException;
use Ngmy\MediaThumbnailUrl\MediaUrlParser;
use Ngmy\MediaThumbnailUrl\Strategy\InstagramStrategyParameter\InstagramThumbnailSize;

class InstagramStrategy implements StrategyInterface
{
    public function __construct(private readonly InstagramThumbnailSize $thumbnailSize)
    {
    }

    public function generate(string $mediaUrl, MediaUrlParser $mediaUrlParser): string
    {
        $parsedMediaUrl = $mediaUrlParser->parse($mediaUrl);

        if ('www.instagram.com' !== $parsedMediaUrl['host']) {
            throw new InvalidMediaUrlException($mediaUrl);
        }

        if (!str_starts_with($parsedMediaUrl['path'], '/p/') && !str_starts_with($parsedMediaUrl['path'], '/reel/')) {
            throw new InvalidMediaUrlException($mediaUrl);
        }

        $parsedPath = explode('/', trim($parsedMediaUrl['path'], '/'));

        if (!isset($parsedPath[1])) {
            throw new InvalidMediaUrlException($mediaUrl);
        }

        $mediaId = $parsedPath[1];

        return "//www.instagram.com/p/{$mediaId}/media?size={$this->thumbnailSize->value}";
    }
}

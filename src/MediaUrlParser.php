<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl;

class MediaUrlParser
{
    public function __construct(private readonly MediaUrlNormalizer $normalizer)
    {
    }

    /**
     * @return array{scheme?: 'https', host: 'www.instagram.com'|'www.youtube.com', path: non-empty-string, query?: non-empty-string}
     */
    public function parse(string $mediaUrl): array
    {
        $normalizedMediaUrl = $this->normalizer->normalize($mediaUrl);

        /** @var array{scheme?: 'https', host: 'www.instagram.com'|'www.youtube.com', path: non-empty-string, query?: non-empty-string} */
        $parsedMediaUrl = parse_url($normalizedMediaUrl);

        return $parsedMediaUrl;
    }
}

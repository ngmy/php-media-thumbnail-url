<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl;

use League\Uri\Components\Host;
use League\Uri\Components\Path;
use League\Uri\Components\Query;
use League\Uri\Http;
use Ngmy\MediaThumbnailUrl\Exception\InvalidMediaUrlException;

class MediaUrlNormalizer
{
    public function __construct(private readonly UrlNormalizer $normalizer)
    {
    }

    public function normalize(string $mediaUrl): string
    {
        $normalizedMediaUrl = $this->normalizer->normalize($mediaUrl);

        $uri = Http::createFromString($normalizedMediaUrl);
        $host = $uri->getHost();

        switch ($host) {
            case 'www.instagram.com': // no-op
                break;

            case 'instagram.com':
            case 'www.instagr.am':
            case 'instagr.am': // -> www.instagram.com
                $uri = $uri->withScheme('https')->withHost(Host::createFromString('www.instagram.com')->__toString());

                break;

            case 'www.youtube.com': // no-op
                break;

            case 'youtube.com': // -> www.youtube.com
                $uri = $uri->withScheme('https')->withHost(Host::createFromString('www.youtube.com')->__toString());

                break;

            case 'youtu.be': // -> www.youtube.com
                $uri = $uri->withScheme('https');
                if ('/watch/' === $uri->getPath()) {
                    $uri = $uri->withHost(Host::createFromString('www.youtube.com')->__toString());
                } else {
                    $mediaId = Path::createFromString($uri->getPath())->withoutLeadingSlash()->withoutTrailingSlash()->__toString();
                    $query = Query::createFromPairs([['v', $mediaId]]);
                    $uri = $uri->withHost(Host::createFromString('www.youtube.com')->__toString())->withPath('/watch/')->withQuery($query->__toString());
                }

                break;

            default:
                throw new InvalidMediaUrlException($mediaUrl);
        }

        return $this->normalizer->normalize($uri->__toString());
    }
}

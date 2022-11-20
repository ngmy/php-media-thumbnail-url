<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl;

use League\Uri\Components\Path;
use League\Uri\Components\Query;
use League\Uri\Http;

class UrlNormalizer
{
    public function normalize(string $url): string
    {
        $uri = Http::createFromString($url);
        $path = Path::createFromString($uri->getPath())->withTrailingSlash()->withoutDotSegments();
        $query = Query::createFromRFC3986($uri->getQuery())->withoutDuplicates()->withoutEmptyPairs()->sort();
        $uri = $uri->withScheme('https')->withPath($path->__toString())->withQuery($query->__toString());

        return $uri->__toString();
    }
}

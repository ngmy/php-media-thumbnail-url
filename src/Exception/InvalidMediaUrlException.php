<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl\Exception;

class InvalidMediaUrlException extends \InvalidArgumentException
{
    public function __construct(string $mediaUrl)
    {
        parent::__construct("Invalid media URL: {$mediaUrl}");
    }
}

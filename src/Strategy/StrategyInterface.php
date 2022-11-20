<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl\Strategy;

use Ngmy\MediaThumbnailUrl\MediaUrlParser;

interface StrategyInterface
{
    public function generate(string $mediaUrl, MediaUrlParser $mediaUrlParser): string;
}

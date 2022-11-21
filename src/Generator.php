<?php

declare(strict_types=1);

namespace Ngmy\MediaThumbnailUrl;

use Ngmy\MediaThumbnailUrl\Strategy\StrategyInterface;

class Generator
{
    private StrategyInterface $strategy;

    public function __construct(private readonly MediaUrlParser $mediaUrlParser)
    {
    }

    public static function createFromStrategy(StrategyInterface $strategy): self
    {
        return (new self(new MediaUrlParser(new MediaUrlNormalizer(new UrlNormalizer()))))->setStrategy($strategy);
    }

    public function setStrategy(StrategyInterface $strategy): self
    {
        $this->strategy = $strategy;

        return $this;
    }

    public function generate(string $mediaUrl): string
    {
        return $this->strategy->generate($mediaUrl, $this->mediaUrlParser);
    }
}

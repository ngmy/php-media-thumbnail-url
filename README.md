# PHP Media Thumbnail URL

[![test](https://github.com/ngmy/php-media-thumbnail-url/actions/workflows/test.yml/badge.svg)](https://github.com/ngmy/php-media-thumbnail-url/actions/workflows/test.yml)
[![coverage](https://coveralls.io/repos/github/ngmy/php-media-thumbnail-url/badge.svg?branch=master)](https://coveralls.io/github/ngmy/php-media-thumbnail-url?branch=master)

Get thumbnail URL for a given media URL. Supports Instagram and YouTube.

## Installation

```console
composer require ngmy/media-thumbnail-url
```

## Usage
### Instagram
```php
use Ngmy\MediaThumbnailUrl\Generator;
use Ngmy\MediaThumbnailUrl\Strategy\InstagramStrategy;
use Ngmy\MediaThumbnailUrl\Strategy\InstagramStrategyParameter\InstagramThumbnailSize;

$mediaUrl = 'https://www.instagram.com/p/CkRFMwSjajp/';
$strategy = new InstagramStrategy(
    thumbnailSize: InstagramThumbnailSize::Thumbnail,
);
$generator = Generator::createFromStrategy($strategy);
$generator->generate($mediaUrl); // return '//www.instagram.com/p/CkRFMwSjajp/media?size=t'
```

### YouTube
```php
use Ngmy\MediaThumbnailUrl\Generator;
use Ngmy\MediaThumbnailUrl\Strategy\YoutubeStrategy;
use Ngmy\MediaThumbnailUrl\Strategy\YoutubeStrategyParameter\YoutubeThumbnailSize;
use Ngmy\MediaThumbnailUrl\Strategy\YoutubeStrategyParameter\YoutubeThumbnailFormat;

$mediaUrl = 'https://www.youtube.com/watch?v=EEixTRM5gUk';
$strategy = new YoutubeStrategy(
    thumbnailSize: YoutubeThumbnailSize::NormalQualityDefault,
    thumbnailFormat: YoutubeThumbnailFormat::Jpeg,
);
$generator = Generator::createFromStrategy($strategy);
$generator->generate($mediaUrl); // return '//img.youtube.com/vi/EEixTRM5gUk/default.jpg'
```

## License

PHP Media Thumbnail URL is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

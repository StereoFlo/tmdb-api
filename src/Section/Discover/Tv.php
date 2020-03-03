<?php

declare(strict_types = 1);

namespace TMDB\Section\Discover;

use TMDB\Section\AbstractSection;

/**
 * @see for query params https://developers.themoviedb.org/3/discover/tv-discover
 */
class Tv extends AbstractSection
{
    protected $path = '/discover/tv';
}

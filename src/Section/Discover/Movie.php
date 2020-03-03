<?php

declare(strict_types = 1);

namespace TMDB\Section\Discover;

use TMDB\Section\AbstractSection;

/**
 * @see for query params https://developers.themoviedb.org/3/discover/movie-discover
 */
class Movie extends AbstractSection
{
    protected $path = '/discover/movie';
}

<?php

declare(strict_types = 1);

namespace TMDB\Section\Search;

use TMDB\Section\AbstractSection;

/**
 * @see for details https://developers.themoviedb.org/3/search/search-people
 */
class People extends AbstractSection
{
    protected $path = '/search/person';
}

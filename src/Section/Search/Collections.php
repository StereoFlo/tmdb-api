<?php

declare(strict_types = 1);

namespace TMDB\Section\Search;

use TMDB\Section\AbstractSection;

/**
 * @see for details https://developers.themoviedb.org/3/search/search-collections
 */
class Collections extends AbstractSection
{
    protected $path = '/search/collection';
}

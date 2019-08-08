<?php

namespace TmdbApi\Section\Search;

use TmdbApi\Section\AbstractSection;

/**
 * Class Movie
 * @package TmdbApi\Section\Movie
 */
class Movie extends AbstractSection
{
    const SECTION_NAME = 'search';
    const METHOD = 'GET';
    const URL = 'movie';

    /**
     * @var bool
     */
    protected $queryToPath = true;
}

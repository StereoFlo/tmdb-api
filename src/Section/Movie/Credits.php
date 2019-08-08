<?php

namespace TmdbApi\Section\Movie;

use TmdbApi\Section\AbstractSection;

/**
 * Class AccountStates
 * @package TmdbApi\Section\Movie
 */
class Credits extends AbstractSection
{
    const SECTION_NAME = 'movie';
    const METHOD = 'GET';
    const END_URL = '%d/credits';
}

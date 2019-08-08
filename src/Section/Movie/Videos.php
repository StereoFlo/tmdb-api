<?php

namespace TmdbApi\Section\Movie;

use TmdbApi\Section\AbstractSection;

/**
 * Class AccountStates
 * @package TmdbApi\Section\Movie
 */
class Videos extends AbstractSection
{
    const SECTION_NAME = 'movie';
    const METHOD = 'GET';
    const URL = '%d/videos';
}

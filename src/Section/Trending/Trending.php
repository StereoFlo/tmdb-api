<?php

namespace TmdbApi\Section\Trending;

use TmdbApi\Section\AbstractSection;

/**
 * Class Trending
 * @package TmdbApi\Section\Trending
 */
class Trending extends AbstractSection
{
    const SECTION_NAME = 'trending';
    const METHOD = 'GET';
    const END_URL = 'all/week';
}

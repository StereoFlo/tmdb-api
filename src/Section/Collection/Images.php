<?php

namespace TmdbApi\Section\Collection;

use TmdbApi\Section\AbstractSection;

/**
 * Class Images
 * @package TmdbApi\Section\Collection
 */
class Images extends AbstractSection
{
    const SECTION_NAME = 'collection';
    const METHOD = 'GET';
    const END_URL = '%d/images';
}

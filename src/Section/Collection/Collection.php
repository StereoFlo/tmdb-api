<?php

namespace TmdbApi\Section\Collection;

use TmdbApi\Section\AbstractSection;

/**
 * Class Collection
 * @package TmdbApi\Section\Collection
 */
class Collection extends AbstractSection
{
    const SECTION_NAME = 'collection';
    const METHOD = 'GET';
    const END_URL = '%d';
}

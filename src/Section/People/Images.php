<?php

namespace TmdbApi\Section\People;

use TmdbApi\Section\AbstractSection;

/**
 * Class Person
 * @package TmdbApi\Section\People
 */
class Person extends AbstractSection
{
    const SECTION_NAME = 'person';
    const METHOD = 'GET';
    const END_URL = '%d/images';
}

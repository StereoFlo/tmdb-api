<?php

declare(strict_types = 1);

namespace TMDB\Section\People;

use TMDB\Section\AbstractSection;

class Person extends AbstractSection
{
    protected $path = '/person/%s';
}

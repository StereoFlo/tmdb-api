<?php

declare(strict_types = 1);

namespace TMDB\Section\People;

use TMDB\Section\AbstractSection;

class Latest extends AbstractSection
{
    protected $path = '/person/latest';
}

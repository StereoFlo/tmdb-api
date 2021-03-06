<?php

declare(strict_types = 1);

namespace TMDB\Section\People;

use TMDB\Section\AbstractSection;

class Images extends AbstractSection
{
    protected $path = '/person/%s/images';
}

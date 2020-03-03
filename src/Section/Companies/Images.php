<?php

declare(strict_types = 1);

namespace TMDB\Section\Companies;

use TMDB\Section\AbstractSection;

class Images extends AbstractSection
{
    protected $path = '/company/%s/images';
}

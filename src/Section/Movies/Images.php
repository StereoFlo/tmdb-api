<?php

declare(strict_types = 1);

namespace TMDB\Section\Movies;

use TMDB\Section\AbstractSection;

class Images extends AbstractSection
{
    protected $path = '/movie/%s/images';
}

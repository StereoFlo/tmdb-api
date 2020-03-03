<?php

declare(strict_types = 1);

namespace TMDB\Section\Movies;

use TMDB\Section\AbstractSection;

class Changes extends AbstractSection
{
    protected $path = '/movie/%s/changes';
}

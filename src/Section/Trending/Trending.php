<?php

declare(strict_types = 1);

namespace TMDB\Section\Trending;

use TMDB\Section\AbstractSection;

class Trending extends AbstractSection
{
    protected $path = '/trending/%s/%s';
}

<?php

declare(strict_types = 1);

namespace TMDB\Section\Collections;

use TMDB\Section\AbstractSection;

class Images extends AbstractSection
{
    protected $path = '/collection/%s/images';
}

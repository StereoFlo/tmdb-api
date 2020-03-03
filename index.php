<?php

declare(strict_types = 1);

use TMDB\Credentials;
use TMDB\Section\Movies\MovieDetails;
use TMDB\TMDB;

include 'vendor/autoload.php';

$tmdb        = new TMDB();
$credentials = new Credentials('YOU_API_KEY');
$section     = new MovieDetails(null, [429203]);
$tmdb->setCredentials($credentials)->setSection($section)->setLanguage('ru');

var_dump($tmdb->get());

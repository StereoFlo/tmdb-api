<?php

namespace Tests;

use PHPUnit\Framework\TestCase;;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use TmdbApi\Common;
use TmdbApi\Query;
use TmdbApi\Section\Movie\Movie;
use TmdbApi\TmdbApi;

/**
 * Class TmdbTest
 * @package Tests
 */
class TmdbTest extends TestCase
{
    /**
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function testGteMovieById()
    {
        $common = new Common('https://api.themoviedb.org/3', '0c98d8bc68d597418394646776babd5e');
        $query = new Query(2502, true, ['language' => 'ru']);
        $movie = new Movie($query);
        $tmdb = new TmdbApi($common, $movie);
        $res = $tmdb->get();

        $this->assertArrayHasKey('title', $res);
        $this->assertArrayHasKey('overview', $res);
        $this->assertArrayHasKey('id', $res);
    }
}

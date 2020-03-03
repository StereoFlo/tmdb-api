<?php

declare(strict_types = 1);

namespace TMDB;

class Credentials
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * Credentials constructor.
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }
}

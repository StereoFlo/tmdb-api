<?php

namespace TmdbApi;

/**
 * Class Query
 * @package TmdbApi
 */
class Query
{
    /**
     * @var string
     */
    private $query;

    /**
     * @var array
     */
    private $additionalData;

    /**
     * @var bool
     */
    private $addToMainQuery;

    /**
     * Query constructor.
     * @param string $query
     * @param bool $addToMainQuery
     * @param array|null $additionalData
     */
    public function __construct(string $query, bool $addToMainQuery = false, array $additionalData = null)
    {
        $this->query = $query;
        $this->additionalData = $additionalData;
        $this->addToMainQuery = $addToMainQuery;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function getAdditionalData(): array
    {
        return $this->additionalData;
    }

    /**
     * @return bool
     */
    public function getIsAddToMainQuery(): bool
    {
        return $this->addToMainQuery;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return ['query' => $this->query] + $this->additionalData;
    }
}

<?php

declare(strict_types = 1);

namespace TMDB\Section;

/**
 * Class AbstractSection.
 */
abstract class AbstractSection
{
    /**
     * @var string
     */
    protected $method = 'GET';

    /**
     * @var string
     */
    protected $path = '';

    /**
     * @var string[]
     */
    protected $pathParams = [];

    /**
     * @var array<string, mixed>
     */
    protected $query = [];

    /**
     * @param string[]             $pathParams
     * @param array<string, mixed> $query
     */
    public function __construct(string $path = null, array $pathParams = [], array $query = [])
    {
        if ($path) {
            $this->path = $path;
        }
        if ($pathParams) {
            $this->pathParams = $pathParams;
        }
        if ($query) {
            $this->query = $query;
        }
    }

    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return array<string, mixed>
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @return string[]
     */
    public function getPathParams(): array
    {
        return $this->pathParams;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}

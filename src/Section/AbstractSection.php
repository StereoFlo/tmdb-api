<?php

namespace TmdbApi\Section;

use RuntimeException;

/**
 * Class AbstractSection
 * @package TmdbApi\Section
 */
abstract class AbstractSection
{
    const SECTION_NAME = '';
    const METHOD = '';
    const URL = '';

    /**
     * @var string
     */
    protected $sectionName;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string|int
     */
    protected $query;

    /**
     * @var bool
     */
    protected $queryToPath = false;

    /**
     * AbstractSection constructor.
     */
    public function __construct()
    {
        if (empty(static::SECTION_NAME) || empty(static::METHOD) || empty(static::URL)) {
            throw new RuntimeException('sectionName or method is empty');
        }

        $this->sectionName = static::SECTION_NAME;
        $this->method = static::METHOD;
        $this->url = static::URL;
    }

    /**
     * @param int|string $query
     * @return static
     */
    public function setQuery($query): AbstractSection
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return bool
     */
    public function isQueryToPath(): bool
    {
        return $this->queryToPath;
    }

    /**
     * @return int|string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return string
     */
    public function getSectionName(): string
    {
        return $this->sectionName;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        if (empty($this->query)) {
            throw new RuntimeException('query cannot be empty');
        }
        return $this->sectionName . '/' . sprintf($this->url, $this->query);
    }
}

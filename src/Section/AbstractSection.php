<?php

namespace TmdbApi\Section;

use RuntimeException;
use TmdbApi\Query;

/**
 * Class AbstractSection
 * @package TmdbApi\Section
 */
abstract class AbstractSection
{
    const SECTION_NAME = '';
    const METHOD = '';
    const END_URL = '';

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
    protected $endUrl;

    /**
     * @var Query
     */
    protected $query;

    /**
     * AbstractSection constructor.
     */
    public function __construct()
    {
        if (empty(static::SECTION_NAME) || empty(static::METHOD) || empty(static::END_URL)) {
            throw new RuntimeException('sectionName or method is empty');
        }

        $this->sectionName = static::SECTION_NAME;
        $this->method = static::METHOD;
        $this->endUrl = static::END_URL;
    }

    /**
     * @param Query $query
     * @return static
     */
    public function setQuery(Query $query): AbstractSection
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return Query
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
    public function getEndUrl(): string
    {
        return $this->endUrl;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        if (empty($this->query->getQuery())) {
            throw new RuntimeException('query cannot be empty');
        }
        return $this->sectionName . '/' . sprintf($this->endUrl, $this->query->getQuery());
    }
}

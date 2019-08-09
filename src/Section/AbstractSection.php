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
     * @param Query $query
     */
    public function __construct(Query $query)
    {
        if (empty(static::SECTION_NAME) || empty(static::METHOD) || empty(static::END_URL)) {
            throw new RuntimeException('sectionName or method is empty');
        }

        $this->sectionName = static::SECTION_NAME;
        $this->method = static::METHOD;
        $this->endUrl = static::END_URL;
        $this->query = $query;
    }

    /**
     * @return Query
     */
    public function getQuery(): Query
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
        if (strpos($this->endUrl, '%') === false) {
            return $this->sectionName . '/' . $this->endUrl;
        }
        return $this->sectionName . '/' . sprintf($this->endUrl, $this->query->getQuery());
    }
}

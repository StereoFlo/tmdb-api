<?php

namespace TmdbApi;

use Exception;
use RuntimeException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use TmdbApi\Section\AbstractSection;

/**
 * Class TmdbApi
 * @package TmdbApi
 */
class TmdbApi
{
    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var AbstractSection
     */
    private $section;

    /**
     * @var Query
     */
    private $query;

    /**
     * TmdbApi constructor.
     * @param string $apiUrl
     * @param string $apiKey
     * @param AbstractSection $section
     * @param Query $query
     */
    public function __construct(string $apiUrl, string $apiKey, AbstractSection $section, Query $query)
    {
        $this->apiKey = $apiKey;
        $this->section = $section;
        $this->apiUrl = $apiUrl;
        $this->query = $query;
        $this->section->setQuery($query);
    }

    /**
     * @return array
     * @throws TransportExceptionInterface
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     */
    public function get(): array
    {
        $query = [
            'api_key' => $this->apiKey,
        ];
        if ($this->query->getIsAddToMainQuery()) {
            $query = $query + $this->query->toArray();
        }
        try {
            $response = HttpClient::create()->request($this->section->getMethod(), $this->apiUrl . '/' . $this->section->getPath(), [
                'query' => $query,
            ]);
            return $response->toArray();
        } catch (Exception $exception) {
            throw new RuntimeException($exception->getMessage());
        }
    }
}

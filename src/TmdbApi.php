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
     * @var Common
     */
    private $common;

    /**
     * TmdbApi constructor.
     * @param Common $common
     * @param AbstractSection $section
     */
    public function __construct(Common $common, AbstractSection $section)
    {
        $this->common = $common;
        $this->apiKey = $common->getApiKey();
        $this->section = $section;
        $this->apiUrl = $common->getApiUrl();
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
        try {
            $response = HttpClient::create()->request($this->section->getMethod(), $this->apiUrl . '/' . $this->section->getPath(), [
                'query' => $this->getQueryArray(),
            ]);
            return $response->toArray();
        } catch (Exception $exception) {
            throw new RuntimeException($exception->getMessage());
        }
    }

    /**
     * @return array
     */
    private function getQueryArray(): array
    {
        $query = [
            'api_key' => $this->apiKey,
        ];
        if ($this->section->getQuery()->getIsAddToMainQuery()) {
            $query = $query + $this->section->getQuery()->toArray();
        }
        return $query;
    }
}

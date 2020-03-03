<?php

declare(strict_types = 1);

namespace TMDB;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use TMDB\Exception\EmptyQueryParamException;
use TMDB\Exception\InvalidParamException;
use TMDB\Section\AbstractSection;
use function preg_match;
use function strlen;
use function strpos;
use function vsprintf;

/**
 * Class TMDB.
 */
class TMDB
{
    const API_URL = 'https://api.themoviedb.org/3';

    /**
     * @var string
     */
    private $language = 'en';

    /**
     * @var Credentials
     */
    private $credentials;

    /**
     * @var AbstractSection
     */
    private $section;

    /**
     * @throws InvalidParamException
     *
     * @return TMDB
     */
    public function setLanguage(string $language): self
    {
        if (2 === strlen($language) || 0 < preg_match('/[a-z]{2}-[A-Z]{2}/', $language)) {
            $this->language = $language;

            return $this;
        }
        throw new InvalidParamException('Language must be valid ISO-639-1 standard');
    }

    public function setCredentials(Credentials $credentials): self
    {
        $this->credentials = $credentials;

        return $this;
    }

    public function setSection(AbstractSection $section): self
    {
        $this->section = $section;

        return $this;
    }

    /**
     * @throws EmptyQueryParamException
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     *
     * @return array<mixed, mixed>
     */
    public function get(): array
    {
        $path = $this->section->getPath();
        if (false === strpos($path, '%')) {
            return $this->makeRequest($this->section->getMethod(), self::API_URL . $path, [
                'api_key'  => $this->credentials->getApiKey(),
                'language' => $this->language,
            ] + $this->section->getQuery());
        }
        if (empty($this->section->getPathParams())) {
            throw new EmptyQueryParamException('the path params is missing');
        }

        return $this->makeRequest($this->section->getMethod(), self::API_URL . vsprintf($this->section->getPath(), $this->section->getPathParams()), [
            'api_key'  => $this->credentials->getApiKey(),
            'language' => $this->language,
        ] + $this->section->getQuery());
    }

    /**
     * @param array<string, mixed> $query
     *
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     *
     * @return array<mixed, mixed>
     */
    private function makeRequest(string $method, string $url, array $query): array
    {
        $response = HttpClient::create()
            ->request($method, $url, [
                'query' => $query,
            ]);

        return $response->toArray();
    }
}

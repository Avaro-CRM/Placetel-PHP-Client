<?php
/**
 * @author Jan Habbo Brüning <jan.habbo.bruening@gmail.com>
 */

namespace Avaro\Placetel\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiClient {
    private Client $http;

    public function __construct(private string $apiToken) {
        $this->http = new Client([
            'base_uri' => 'https://api.placetel.de/v2/',
            'headers' => [
                'Authorization' => "Bearer {$this->apiToken}",
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    /**
     * @param string $endpoint
     * @return array
     * @throws \Avaro\Placetel\Exception\NotFoundException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $endpoint): array {
        return $this->request('GET', $endpoint);
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @return array
     * @throws \Avaro\Placetel\Exception\NotFoundException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post(string $endpoint, array $data): array {
        return $this->request('POST', $endpoint, $data);
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @return array
     * @throws \Avaro\Placetel\Exception\NotFoundException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put(string $endpoint, array $data): array {
        return $this->request('PUT', $endpoint, $data);
    }

    public function delete(string $endpoint): array {
        return $this->request('DELETE', $endpoint);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $data
     * @return array
     * @throws \Avaro\Placetel\Exception\NotFoundException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function request(string $method, string $endpoint, array $data = []): array
    {
        try {

            $response = $this->http->request($method, $endpoint, [
                'json' => $data
            ]);

            return json_decode((string)$response->getBody(), true);
        }
        catch (RequestException $e) {

            if ($e->getCode() == 404) {
                throw new \Avaro\Placetel\Exception\NotFoundException($e->getMessage());
            }
            else {
                throw new \RuntimeException("Placetel API error: " . $e->getMessage());
            }
        }
    }
}

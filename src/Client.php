<?php
/**
 * @author Jan Habbo Brüning <jan.habbo.bruening@gmail.com>
 */

namespace Avaro\Placetel;

use Avaro\Placetel\Http\ApiClient;
use Avaro\Placetel\Repository\ContactRepository;
use Avaro\Placetel\Repository\CallLogRepository;

/**
 * Main entry point for Placetel API integration
 *
 * Usage:
 * $client = new \Avaro\Placetel\Client($apiToken);
 * $contacts = $client->contacts()->all();
 */
class Client
{
    private ApiClient $apiClient;

    private ?ContactRepository $contactRepository = null;
    private ?CallLogRepository $callLogRepo = null;

    /**
     * Client constructor.
     *
     * @param string $apiToken Your Placetel API token
     */
    public function __construct(string $apiToken)
    {
        $this->apiClient = new ApiClient($apiToken);
    }

    /**
     * Access Contacts repository
     *
     * @return ContactRepository
     */
    public function contacts(): ContactRepository
    {
        if ($this->contactRepository === null) {
            $this->contactRepository = new ContactRepository($this->apiClient);
        }
        return $this->contactRepository;
    }

    /**
     * Access Call Logs repository
     *
     * @return CallLogRepository
     */
    public function callLogs(): CallLogRepository
    {
        if ($this->callLogRepo === null) {
            $this->callLogRepo = new CallLogRepository($this->apiClient);
        }
        return $this->callLogRepo;
    }
    
    public static function create(
        string $apiToken
    ): self
    {
        return new self($apiToken);
    }
}

<?php

declare(strict_types=1);

namespace Dataleon;

use Dataleon\Core\BaseClient;
use Dataleon\Resources\Companies;
use Dataleon\Resources\Individuals;

class Client extends BaseClient
{
    public string $apiKey;

    public Individuals $individuals;

    public Companies $companies;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('DATALEON_API_KEY'));

        $base = $baseUrl ?? getenv(
            'DATALEON_BASE_URL'
        ) ?: 'https://inference.eu-west-1.dataleon.ai';

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $base,
            options: new RequestOptions,
        );

        $this->individuals = new Individuals($this);
        $this->companies = new Companies($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        return ['Api-Key' => $this->apiKey];
    }
}

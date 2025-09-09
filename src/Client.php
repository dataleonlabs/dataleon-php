<?php

declare(strict_types=1);

namespace Dataleon;

use Dataleon\Core\BaseClient;
use Dataleon\Services\CompaniesService;
use Dataleon\Services\IndividualsService;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;

class Client extends BaseClient
{
    public string $apiKey;

    /**
     * @api
     */
    public IndividualsService $individuals;

    /**
     * @api
     */
    public CompaniesService $companies;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('DATALEON_API_KEY'));

        $base = $baseUrl ?? getenv(
            'DATALEON_BASE_URL'
        ) ?: 'https://inference.eu-west-1.dataleon.ai';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $base,
            options: $options,
        );

        $this->individuals = new IndividualsService($this);
        $this->companies = new CompaniesService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        return ['Api-Key' => $this->apiKey];
    }
}

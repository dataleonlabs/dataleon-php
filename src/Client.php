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

        $baseUrl ??= getenv(
            'DATALEON_BASE_URL'
        ) ?: 'https://inference.eu-west-1.dataleon.ai';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            // x-release-please-start-version
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('dataleon/PHP %s', '0.17.0'),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.17.0',
                'X-Stainless-OS' => $this->getNormalizedOS(),
                'X-Stainless-Arch' => $this->getNormalizedArchitecture(),
                'X-Stainless-Runtime' => 'php',
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            // x-release-please-end
            baseUrl: $baseUrl,
            options: $options,
        );

        $this->individuals = new IndividualsService($this);
        $this->companies = new CompaniesService($this);
    }

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return $this->apiKey ? ['Api-Key' => $this->apiKey] : [];
    }
}

<?php

declare(strict_types=1);

namespace Dataleon\Services;

use Dataleon\Client;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Core\Implementation\HasRawResponse;
use Dataleon\Individuals\Individual;
use Dataleon\Individuals\IndividualCreateParams;
use Dataleon\Individuals\IndividualCreateParams\Person;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData;
use Dataleon\Individuals\IndividualListParams;
use Dataleon\Individuals\IndividualListParams\State;
use Dataleon\Individuals\IndividualListParams\Status;
use Dataleon\Individuals\IndividualRetrieveParams;
use Dataleon\Individuals\IndividualUpdateParams;
use Dataleon\Individuals\IndividualUpdateParams\Person as Person1;
use Dataleon\Individuals\IndividualUpdateParams\TechnicalData as TechnicalData1;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\IndividualsContract;
use Dataleon\Services\Individuals\DocumentsService;

use const Dataleon\Core\OMIT as omit;

final class IndividualsService implements IndividualsContract
{
    /**
     * @@api
     */
    public DocumentsService $documents;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->documents = new DocumentsService($client);
    }

    /**
     * @api
     *
     * Create a new individual
     *
     * @param string $workspaceID unique identifier of the workspace where the individual is being registered
     * @param Person $person personal information about the individual
     * @param string $sourceID optional identifier for tracking the source system or integration from your system
     * @param TechnicalData $technicalData technical metadata related to the request or processing
     *
     * @return Individual<HasRawResponse>
     */
    public function create(
        $workspaceID,
        $person = omit,
        $sourceID = omit,
        $technicalData = omit,
        ?RequestOptions $requestOptions = null,
    ): Individual {
        [$parsed, $options] = IndividualCreateParams::parseRequest(
            [
                'workspaceID' => $workspaceID,
                'person' => $person,
                'sourceID' => $sourceID,
                'technicalData' => $technicalData,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'individuals',
            body: (object) $parsed,
            options: $options,
            convert: Individual::class,
        );
    }

    /**
     * @api
     *
     * Get an individual by ID
     *
     * @param bool $document Include document information
     * @param string $scope Scope filter (id or scope)
     *
     * @return Individual<HasRawResponse>
     */
    public function retrieve(
        string $individualID,
        $document = omit,
        $scope = omit,
        ?RequestOptions $requestOptions = null,
    ): Individual {
        [$parsed, $options] = IndividualRetrieveParams::parseRequest(
            ['document' => $document, 'scope' => $scope],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['individuals/%1$s', $individualID],
            query: $parsed,
            options: $options,
            convert: Individual::class,
        );
    }

    /**
     * @api
     *
     * Update an individual by ID
     *
     * @param string $workspaceID unique identifier of the workspace where the individual is being registered
     * @param Person1 $person personal information about the individual
     * @param string $sourceID optional identifier for tracking the source system or integration from your system
     * @param TechnicalData1 $technicalData technical metadata related to the request or processing
     *
     * @return Individual<HasRawResponse>
     */
    public function update(
        string $individualID,
        $workspaceID,
        $person = omit,
        $sourceID = omit,
        $technicalData = omit,
        ?RequestOptions $requestOptions = null,
    ): Individual {
        [$parsed, $options] = IndividualUpdateParams::parseRequest(
            [
                'workspaceID' => $workspaceID,
                'person' => $person,
                'sourceID' => $sourceID,
                'technicalData' => $technicalData,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['individuals/%1$s', $individualID],
            body: (object) $parsed,
            options: $options,
            convert: Individual::class,
        );
    }

    /**
     * @api
     *
     * Get all individuals
     *
     * @param \DateTimeInterface $endDate Filter individuals created before this date (format YYYY-MM-DD)
     * @param int $limit Number of results to return (between 1 and 100)
     * @param int $offset Number of results to offset (must be ≥ 0)
     * @param string $sourceID Filter by source ID
     * @param \DateTimeInterface $startDate Filter individuals created after this date (format YYYY-MM-DD)
     * @param State|value-of<State> $state Filter by individual status (must be one of the allowed values)
     * @param Status|value-of<Status> $status Filter by individual status (must be one of the allowed values)
     * @param string $workspaceID Filter by workspace ID
     *
     * @return list<Individual>
     */
    public function list(
        $endDate = omit,
        $limit = omit,
        $offset = omit,
        $sourceID = omit,
        $startDate = omit,
        $state = omit,
        $status = omit,
        $workspaceID = omit,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = IndividualListParams::parseRequest(
            [
                'endDate' => $endDate,
                'limit' => $limit,
                'offset' => $offset,
                'sourceID' => $sourceID,
                'startDate' => $startDate,
                'state' => $state,
                'status' => $status,
                'workspaceID' => $workspaceID,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'individuals',
            query: $parsed,
            options: $options,
            convert: new ListOf(Individual::class),
        );
    }

    /**
     * @api
     *
     * Delete an individual by ID
     */
    public function delete(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['individuals/%1$s', $individualID],
            options: $requestOptions,
            convert: null,
        );
    }
}

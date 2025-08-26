<?php

declare(strict_types=1);

namespace Dataleon\Services;

use Dataleon\Client;
use Dataleon\Contracts\IndividualsContract;
use Dataleon\Core\Conversion;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Core\Util;
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
use Dataleon\Services\Individuals\DocumentsService;

use const Dataleon\Core\OMIT as omit;

final class IndividualsService implements IndividualsContract
{
    public DocumentsService $documents;

    public function __construct(private Client $client)
    {
        $this->documents = new DocumentsService($this->client);
    }

    /**
     * Create a new individual.
     *
     * @param string $workspaceID unique identifier of the workspace where the individual is being registered
     * @param Person $person personal information about the individual
     * @param string $sourceID optional identifier for tracking the source system or integration from your system
     * @param TechnicalData $technicalData technical metadata related to the request or processing
     */
    public function create(
        $workspaceID,
        $person = omit,
        $sourceID = omit,
        $technicalData = omit,
        ?RequestOptions $requestOptions = null,
    ): Individual {
        $args = Util::array_filter_omit(
            [
                'workspaceID' => $workspaceID,
                'person' => $person,
                'sourceID' => $sourceID,
                'technicalData' => $technicalData,
            ],
        );
        [$parsed, $options] = IndividualCreateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'individuals',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Individual::class, value: $resp);
    }

    /**
     * Get an individual by ID.
     *
     * @param bool $document Include document information
     * @param string $scope Scope filter (id or scope)
     */
    public function retrieve(
        string $individualID,
        $document = omit,
        $scope = omit,
        ?RequestOptions $requestOptions = null,
    ): Individual {
        $args = Util::array_filter_omit(
            ['document' => $document, 'scope' => $scope]
        );
        [$parsed, $options] = IndividualRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'get',
            path: ['individuals/%1$s', $individualID],
            query: $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Individual::class, value: $resp);
    }

    /**
     * Update an individual by ID.
     *
     * @param string $workspaceID unique identifier of the workspace where the individual is being registered
     * @param Person1 $person personal information about the individual
     * @param string $sourceID optional identifier for tracking the source system or integration from your system
     * @param TechnicalData1 $technicalData technical metadata related to the request or processing
     */
    public function update(
        string $individualID,
        $workspaceID,
        $person = omit,
        $sourceID = omit,
        $technicalData = omit,
        ?RequestOptions $requestOptions = null,
    ): Individual {
        $args = Util::array_filter_omit(
            [
                'workspaceID' => $workspaceID,
                'person' => $person,
                'sourceID' => $sourceID,
                'technicalData' => $technicalData,
            ],
        );
        [$parsed, $options] = IndividualUpdateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'put',
            path: ['individuals/%1$s', $individualID],
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Individual::class, value: $resp);
    }

    /**
     * Get all individuals.
     *
     * @param \DateTimeInterface $endDate Filter individuals created before this date (format YYYY-MM-DD)
     * @param int $limit Number of results to return (between 1 and 100)
     * @param int $offset Number of results to offset (must be ≥ 0)
     * @param string $sourceID Filter by source ID
     * @param \DateTimeInterface $startDate Filter individuals created after this date (format YYYY-MM-DD)
     * @param State::* $state Filter by individual status (must be one of the allowed values)
     * @param Status::* $status Filter by individual status (must be one of the allowed values)
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
        $args = Util::array_filter_omit(
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
        );
        [$parsed, $options] = IndividualListParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'get',
            path: 'individuals',
            query: $parsed,
            options: $options
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(new ListOf(Individual::class), value: $resp);
    }

    /**
     * Delete an individual by ID.
     */
    public function delete(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        return $this->client->request(
            method: 'delete',
            path: ['individuals/%1$s', $individualID],
            options: $requestOptions,
        );
    }
}

<?php

declare(strict_types=1);

namespace Dataleon\Services;

use Dataleon\Client;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Core\Util;
use Dataleon\Individuals\Individual;
use Dataleon\Individuals\IndividualCreateParams\Person;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData;
use Dataleon\Individuals\IndividualListParams\State;
use Dataleon\Individuals\IndividualListParams\Status;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\IndividualsContract;
use Dataleon\Services\Individuals\DocumentsService;

/**
 * @phpstan-import-type PersonShape from \Dataleon\Individuals\IndividualCreateParams\Person
 * @phpstan-import-type TechnicalDataShape from \Dataleon\Individuals\IndividualCreateParams\TechnicalData
 * @phpstan-import-type PersonShape from \Dataleon\Individuals\IndividualUpdateParams\Person as PersonShape1
 * @phpstan-import-type TechnicalDataShape from \Dataleon\Individuals\IndividualUpdateParams\TechnicalData as TechnicalDataShape1
 * @phpstan-import-type RequestOpts from \Dataleon\RequestOptions
 */
final class IndividualsService implements IndividualsContract
{
    /**
     * @api
     */
    public IndividualsRawService $raw;

    /**
     * @api
     */
    public DocumentsService $documents;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new IndividualsRawService($client);
        $this->documents = new DocumentsService($client);
    }

    /**
     * @api
     *
     * Create a new individual
     *
     * @param string $workspaceID unique identifier of the workspace where the individual is being registered
     * @param Person|PersonShape $person personal information about the individual
     * @param string $sourceID optional identifier for tracking the source system or integration from your system
     * @param TechnicalData|TechnicalDataShape $technicalData technical metadata related to the request or processing
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $workspaceID,
        Person|array|null $person = null,
        ?string $sourceID = null,
        TechnicalData|array|null $technicalData = null,
        RequestOptions|array|null $requestOptions = null,
    ): Individual {
        $params = Util::removeNulls(
            [
                'workspaceID' => $workspaceID,
                'person' => $person,
                'sourceID' => $sourceID,
                'technicalData' => $technicalData,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get an individual by ID
     *
     * @param string $individualID ID of the individual
     * @param bool $document Include document information
     * @param string $scope Scope filter (id or scope)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $individualID,
        ?bool $document = null,
        ?string $scope = null,
        RequestOptions|array|null $requestOptions = null,
    ): Individual {
        $params = Util::removeNulls(['document' => $document, 'scope' => $scope]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($individualID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an individual by ID
     *
     * @param string $individualID ID of the individual to update
     * @param string $workspaceID unique identifier of the workspace where the individual is being registered
     * @param \Dataleon\Individuals\IndividualUpdateParams\Person|PersonShape1 $person personal information about the individual
     * @param string $sourceID optional identifier for tracking the source system or integration from your system
     * @param \Dataleon\Individuals\IndividualUpdateParams\TechnicalData|TechnicalDataShape1 $technicalData technical metadata related to the request or processing
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $individualID,
        string $workspaceID,
        \Dataleon\Individuals\IndividualUpdateParams\Person|array|null $person = null,
        ?string $sourceID = null,
        \Dataleon\Individuals\IndividualUpdateParams\TechnicalData|array|null $technicalData = null,
        RequestOptions|array|null $requestOptions = null,
    ): Individual {
        $params = Util::removeNulls(
            [
                'workspaceID' => $workspaceID,
                'person' => $person,
                'sourceID' => $sourceID,
                'technicalData' => $technicalData,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($individualID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all individuals
     *
     * @param string $endDate Filter individuals created before this date (format YYYY-MM-DD)
     * @param int $limit Number of results to return (between 1 and 100)
     * @param int $offset Number of results to offset (must be ≥ 0)
     * @param string $sourceID Filter by source ID
     * @param string $startDate Filter individuals created after this date (format YYYY-MM-DD)
     * @param State|value-of<State> $state Filter by individual status (must be one of the allowed values)
     * @param Status|value-of<Status> $status Filter by individual status (must be one of the allowed values)
     * @param string $workspaceID Filter by workspace ID
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Individual>
     *
     * @throws APIException
     */
    public function list(
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $sourceID = null,
        ?string $startDate = null,
        State|string|null $state = null,
        Status|string|null $status = null,
        ?string $workspaceID = null,
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
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

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an individual by ID
     *
     * @param string $individualID ID of the individual to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $individualID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($individualID, requestOptions: $requestOptions);

        return $response->parse();
    }
}

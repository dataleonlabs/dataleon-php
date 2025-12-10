<?php

declare(strict_types=1);

namespace Dataleon\Services;

use Dataleon\Client;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Individuals\Individual;
use Dataleon\Individuals\IndividualCreateParams\Person\Gender;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData\PortalStep;
use Dataleon\Individuals\IndividualListParams\State;
use Dataleon\Individuals\IndividualListParams\Status;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\IndividualsContract;
use Dataleon\Services\Individuals\DocumentsService;

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
     * @param array{
     *   birthday?: string,
     *   email?: string,
     *   firstName?: string,
     *   gender?: 'M'|'F'|Gender,
     *   lastName?: string,
     *   maidenName?: string,
     *   nationality?: string,
     *   phoneNumber?: string,
     * } $person Personal information about the individual
     * @param string $sourceID optional identifier for tracking the source system or integration from your system
     * @param array{
     *   activeAmlSuspicions?: bool,
     *   callbackURL?: string,
     *   callbackURLNotification?: string,
     *   filteringScoreAmlSuspicions?: float,
     *   language?: string,
     *   portalSteps?: list<'identity_verification'|'document_signing'|'proof_of_address'|'selfie'|'face_match'|PortalStep>,
     *   rawData?: bool,
     * } $technicalData Technical metadata related to the request or processing
     *
     * @throws APIException
     */
    public function create(
        string $workspaceID,
        ?array $person = null,
        ?string $sourceID = null,
        ?array $technicalData = null,
        ?RequestOptions $requestOptions = null,
    ): Individual {
        $params = [
            'workspaceID' => $workspaceID,
            'person' => $person,
            'sourceID' => $sourceID,
            'technicalData' => $technicalData,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $individualID,
        ?bool $document = null,
        ?string $scope = null,
        ?RequestOptions $requestOptions = null,
    ): Individual {
        $params = ['document' => $document, 'scope' => $scope];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param array{
     *   birthday?: string,
     *   email?: string,
     *   firstName?: string,
     *   gender?: 'M'|'F'|\Dataleon\Individuals\IndividualUpdateParams\Person\Gender,
     *   lastName?: string,
     *   maidenName?: string,
     *   nationality?: string,
     *   phoneNumber?: string,
     * } $person Personal information about the individual
     * @param string $sourceID optional identifier for tracking the source system or integration from your system
     * @param array{
     *   activeAmlSuspicions?: bool,
     *   callbackURL?: string,
     *   callbackURLNotification?: string,
     *   filteringScoreAmlSuspicions?: float,
     *   language?: string,
     *   portalSteps?: list<'identity_verification'|'document_signing'|'proof_of_address'|'selfie'|'face_match'|\Dataleon\Individuals\IndividualUpdateParams\TechnicalData\PortalStep>,
     *   rawData?: bool,
     * } $technicalData Technical metadata related to the request or processing
     *
     * @throws APIException
     */
    public function update(
        string $individualID,
        string $workspaceID,
        ?array $person = null,
        ?string $sourceID = null,
        ?array $technicalData = null,
        ?RequestOptions $requestOptions = null,
    ): Individual {
        $params = [
            'workspaceID' => $workspaceID,
            'person' => $person,
            'sourceID' => $sourceID,
            'technicalData' => $technicalData,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($individualID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all individuals
     *
     * @param string|\DateTimeInterface $endDate Filter individuals created before this date (format YYYY-MM-DD)
     * @param int $limit Number of results to return (between 1 and 100)
     * @param int $offset Number of results to offset (must be ≥ 0)
     * @param string $sourceID Filter by source ID
     * @param string|\DateTimeInterface $startDate Filter individuals created after this date (format YYYY-MM-DD)
     * @param 'VOID'|'WAITING'|'STARTED'|'RUNNING'|'PROCESSED'|'FAILED'|'ABORTED'|'EXPIRED'|'DELETED'|State $state Filter by individual status (must be one of the allowed values)
     * @param 'rejected'|'need_review'|'approved'|Status $status Filter by individual status (must be one of the allowed values)
     * @param string $workspaceID Filter by workspace ID
     *
     * @return list<Individual>
     *
     * @throws APIException
     */
    public function list(
        string|\DateTimeInterface|null $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $sourceID = null,
        string|\DateTimeInterface|null $startDate = null,
        string|State|null $state = null,
        string|Status|null $status = null,
        ?string $workspaceID = null,
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = [
            'endDate' => $endDate,
            'limit' => $limit,
            'offset' => $offset,
            'sourceID' => $sourceID,
            'startDate' => $startDate,
            'state' => $state,
            'status' => $status,
            'workspaceID' => $workspaceID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function delete(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($individualID, requestOptions: $requestOptions);

        return $response->parse();
    }
}

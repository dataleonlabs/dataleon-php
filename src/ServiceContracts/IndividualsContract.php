<?php

declare(strict_types=1);

namespace Dataleon\ServiceContracts;

use Dataleon\Core\Exceptions\APIException;
use Dataleon\Individuals\Individual;
use Dataleon\Individuals\IndividualCreateParams\Person\Gender;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData\PortalStep;
use Dataleon\Individuals\IndividualListParams\State;
use Dataleon\Individuals\IndividualListParams\Status;
use Dataleon\RequestOptions;

interface IndividualsContract
{
    /**
     * @api
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
    ): Individual;

    /**
     * @api
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
    ): Individual;

    /**
     * @api
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
    ): Individual;

    /**
     * @api
     *
     * @param string $endDate Filter individuals created before this date (format YYYY-MM-DD)
     * @param int $limit Number of results to return (between 1 and 100)
     * @param int $offset Number of results to offset (must be ≥ 0)
     * @param string $sourceID Filter by source ID
     * @param string $startDate Filter individuals created after this date (format YYYY-MM-DD)
     * @param 'VOID'|'WAITING'|'STARTED'|'RUNNING'|'PROCESSED'|'FAILED'|'ABORTED'|'EXPIRED'|'DELETED'|State $state Filter by individual status (must be one of the allowed values)
     * @param 'rejected'|'need_review'|'approved'|Status $status Filter by individual status (must be one of the allowed values)
     * @param string $workspaceID Filter by workspace ID
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
        string|State|null $state = null,
        string|Status|null $status = null,
        ?string $workspaceID = null,
        ?RequestOptions $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param string $individualID ID of the individual to delete
     *
     * @throws APIException
     */
    public function delete(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}

<?php

declare(strict_types=1);

namespace Dataleon\ServiceContracts;

use Dataleon\Individuals\Individual;
use Dataleon\Individuals\IndividualCreateParams\Person;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData;
use Dataleon\Individuals\IndividualListParams\State;
use Dataleon\Individuals\IndividualListParams\Status;
use Dataleon\Individuals\IndividualUpdateParams\Person as Person1;
use Dataleon\Individuals\IndividualUpdateParams\TechnicalData as TechnicalData1;
use Dataleon\RequestOptions;

use const Dataleon\Core\OMIT as omit;

interface IndividualsContract
{
    /**
     * @api
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
    ): Individual;

    /**
     * @api
     *
     * @param bool $document Include document information
     * @param string $scope Scope filter (id or scope)
     */
    public function retrieve(
        string $individualID,
        $document = omit,
        $scope = omit,
        ?RequestOptions $requestOptions = null,
    ): Individual;

    /**
     * @api
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
    ): Individual;

    /**
     * @api
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
    ): array;

    /**
     * @api
     */
    public function delete(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}

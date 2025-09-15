<?php

declare(strict_types=1);

namespace Dataleon\ServiceContracts;

use Dataleon\Companies\CompanyCreateParams\Company;
use Dataleon\Companies\CompanyCreateParams\TechnicalData;
use Dataleon\Companies\CompanyListParams\State;
use Dataleon\Companies\CompanyListParams\Status;
use Dataleon\Companies\CompanyRegistration;
use Dataleon\Companies\CompanyUpdateParams\Company as Company1;
use Dataleon\Companies\CompanyUpdateParams\TechnicalData as TechnicalData1;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Core\Implementation\HasRawResponse;
use Dataleon\RequestOptions;

use const Dataleon\Core\OMIT as omit;

interface CompaniesContract
{
    /**
     * @api
     *
     * @param Company $company main information about the company being registered
     * @param string $workspaceID unique identifier of the workspace in which the company is being created
     * @param string $sourceID optional identifier to track the origin of the request or integration from your system
     * @param TechnicalData $technicalData technical metadata and callback configuration
     *
     * @return CompanyRegistration<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $company,
        $workspaceID,
        $sourceID = omit,
        $technicalData = omit,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CompanyRegistration<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CompanyRegistration;

    /**
     * @api
     *
     * @param bool $document Include document signed url
     * @param string $scope Scope filter (id or scope)
     *
     * @return CompanyRegistration<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $companyID,
        $document = omit,
        $scope = omit,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CompanyRegistration<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $companyID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CompanyRegistration;

    /**
     * @api
     *
     * @param Company1 $company main information about the company being registered
     * @param string $workspaceID unique identifier of the workspace in which the company is being created
     * @param string $sourceID optional identifier to track the origin of the request or integration from your system
     * @param TechnicalData1 $technicalData technical metadata and callback configuration
     *
     * @return CompanyRegistration<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $companyID,
        $company,
        $workspaceID,
        $sourceID = omit,
        $technicalData = omit,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CompanyRegistration<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $companyID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CompanyRegistration;

    /**
     * @api
     *
     * @param \DateTimeInterface $endDate Filter companies created before this date (format YYYY-MM-DD)
     * @param int $limit Number of results to return (between 1 and 100)
     * @param int $offset Number of results to skip (must be ≥ 0)
     * @param string $sourceID Filter by source ID
     * @param \DateTimeInterface $startDate Filter companies created after this date (format YYYY-MM-DD)
     * @param State|value-of<State> $state Filter by company state (must be one of the allowed values)
     * @param Status|value-of<Status> $status Filter by individual status (must be one of the allowed values)
     * @param string $workspaceID Filter by workspace ID
     *
     * @return list<CompanyRegistration>
     *
     * @throws APIException
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
     *
     * @param array<string, mixed> $params
     *
     * @return list<CompanyRegistration>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $companyID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}

<?php

declare(strict_types=1);

namespace Dataleon\Services;

use Dataleon\Client;
use Dataleon\Companies\CompanyCreateParams\Company;
use Dataleon\Companies\CompanyCreateParams\TechnicalData;
use Dataleon\Companies\CompanyListParams\State;
use Dataleon\Companies\CompanyListParams\Status;
use Dataleon\Companies\CompanyRegistration;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Core\Util;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\CompaniesContract;
use Dataleon\Services\Companies\DocumentsService;

/**
 * @phpstan-import-type CompanyShape from \Dataleon\Companies\CompanyCreateParams\Company
 * @phpstan-import-type TechnicalDataShape from \Dataleon\Companies\CompanyCreateParams\TechnicalData
 * @phpstan-import-type CompanyShape from \Dataleon\Companies\CompanyUpdateParams\Company as CompanyShape1
 * @phpstan-import-type TechnicalDataShape from \Dataleon\Companies\CompanyUpdateParams\TechnicalData as TechnicalDataShape1
 * @phpstan-import-type RequestOpts from \Dataleon\RequestOptions
 */
final class CompaniesService implements CompaniesContract
{
    /**
     * @api
     */
    public CompaniesRawService $raw;

    /**
     * @api
     */
    public DocumentsService $documents;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CompaniesRawService($client);
        $this->documents = new DocumentsService($client);
    }

    /**
     * @api
     *
     * Create a new company
     *
     * @param Company|CompanyShape $company main information about the company being registered
     * @param string $workspaceID unique identifier of the workspace in which the company is being created
     * @param string $sourceID optional identifier to track the origin of the request or integration from your system
     * @param TechnicalData|TechnicalDataShape $technicalData technical metadata and callback configuration
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Company|array $company,
        string $workspaceID,
        ?string $sourceID = null,
        TechnicalData|array|null $technicalData = null,
        RequestOptions|array|null $requestOptions = null,
    ): CompanyRegistration {
        $params = Util::removeNulls(
            [
                'company' => $company,
                'workspaceID' => $workspaceID,
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
     * Get a company by ID
     *
     * @param string $companyID ID of the company
     * @param bool $document Include document signed url
     * @param string $scope Scope filter (id or scope)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $companyID,
        ?bool $document = null,
        ?string $scope = null,
        RequestOptions|array|null $requestOptions = null,
    ): CompanyRegistration {
        $params = Util::removeNulls(['document' => $document, 'scope' => $scope]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($companyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a company by ID
     *
     * @param string $companyID ID of the company to update
     * @param \Dataleon\Companies\CompanyUpdateParams\Company|CompanyShape1 $company main information about the company being registered
     * @param string $workspaceID unique identifier of the workspace in which the company is being created
     * @param string $sourceID optional identifier to track the origin of the request or integration from your system
     * @param \Dataleon\Companies\CompanyUpdateParams\TechnicalData|TechnicalDataShape1 $technicalData technical metadata and callback configuration
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $companyID,
        \Dataleon\Companies\CompanyUpdateParams\Company|array $company,
        string $workspaceID,
        ?string $sourceID = null,
        \Dataleon\Companies\CompanyUpdateParams\TechnicalData|array|null $technicalData = null,
        RequestOptions|array|null $requestOptions = null,
    ): CompanyRegistration {
        $params = Util::removeNulls(
            [
                'company' => $company,
                'workspaceID' => $workspaceID,
                'sourceID' => $sourceID,
                'technicalData' => $technicalData,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($companyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all companies
     *
     * @param string $endDate Filter companies created before this date (format YYYY-MM-DD)
     * @param int $limit Number of results to return (between 1 and 100)
     * @param int $offset Number of results to skip (must be ≥ 0)
     * @param string $sourceID Filter by source ID
     * @param string $startDate Filter companies created after this date (format YYYY-MM-DD)
     * @param State|value-of<State> $state Filter by company state (must be one of the allowed values)
     * @param Status|value-of<Status> $status Filter by individual status (must be one of the allowed values)
     * @param string $workspaceID Filter by workspace ID
     * @param RequestOpts|null $requestOptions
     *
     * @return list<CompanyRegistration>
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
     * Delete a company by ID
     *
     * @param string $companyID ID of the company to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $companyID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($companyID, requestOptions: $requestOptions);

        return $response->parse();
    }
}

<?php

declare(strict_types=1);

namespace Dataleon\Services;

use Dataleon\Client;
use Dataleon\Companies\CompanyCreateParams;
use Dataleon\Companies\CompanyCreateParams\Company;
use Dataleon\Companies\CompanyCreateParams\TechnicalData;
use Dataleon\Companies\CompanyListParams;
use Dataleon\Companies\CompanyListParams\State;
use Dataleon\Companies\CompanyListParams\Status;
use Dataleon\Companies\CompanyRegistration;
use Dataleon\Companies\CompanyRetrieveParams;
use Dataleon\Companies\CompanyUpdateParams;
use Dataleon\Companies\CompanyUpdateParams\Company as Company1;
use Dataleon\Companies\CompanyUpdateParams\TechnicalData as TechnicalData1;
use Dataleon\Contracts\CompaniesContract;
use Dataleon\Core\Conversion;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Core\Util;
use Dataleon\RequestOptions;
use Dataleon\Services\Companies\DocumentsService;

final class CompaniesService implements CompaniesContract
{
    public DocumentsService $documents;

    public function __construct(private Client $client)
    {
        $this->documents = new DocumentsService($this->client);
    }

    /**
     * Create a new company.
     *
     * @param Company $company main information about the company being registered
     * @param string $workspaceID unique identifier of the workspace in which the company is being created
     * @param string $sourceID optional identifier to track the origin of the request or integration from your system
     * @param TechnicalData $technicalData technical metadata and callback configuration
     */
    public function create(
        $company,
        $workspaceID,
        $sourceID = null,
        $technicalData = null,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration {
        $args = [
            'company' => $company,
            'workspaceID' => $workspaceID,
            'sourceID' => $sourceID,
            'technicalData' => $technicalData,
        ];
        $args = Util::array_filter_null($args, ['sourceID', 'technicalData']);
        [$parsed, $options] = CompanyCreateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'companies',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(CompanyRegistration::class, value: $resp);
    }

    /**
     * Get a company by ID.
     *
     * @param bool $document Include document signed url
     * @param string $scope Scope filter (id or scope)
     */
    public function retrieve(
        string $companyID,
        $document = null,
        $scope = null,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration {
        $args = ['document' => $document, 'scope' => $scope];
        $args = Util::array_filter_null($args, ['document', 'scope']);
        [$parsed, $options] = CompanyRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'get',
            path: ['companies/%1$s', $companyID],
            query: $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(CompanyRegistration::class, value: $resp);
    }

    /**
     * Update a company by ID.
     *
     * @param Company1 $company main information about the company being registered
     * @param string $workspaceID unique identifier of the workspace in which the company is being created
     * @param string $sourceID optional identifier to track the origin of the request or integration from your system
     * @param TechnicalData1 $technicalData technical metadata and callback configuration
     */
    public function update(
        string $companyID,
        $company,
        $workspaceID,
        $sourceID = null,
        $technicalData = null,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration {
        $args = [
            'company' => $company,
            'workspaceID' => $workspaceID,
            'sourceID' => $sourceID,
            'technicalData' => $technicalData,
        ];
        $args = Util::array_filter_null($args, ['sourceID', 'technicalData']);
        [$parsed, $options] = CompanyUpdateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'put',
            path: ['companies/%1$s', $companyID],
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(CompanyRegistration::class, value: $resp);
    }

    /**
     * Get all companies.
     *
     * @param \DateTimeInterface $endDate Filter companies created before this date (format YYYY-MM-DD)
     * @param int $limit Number of results to return (between 1 and 100)
     * @param int $offset Number of results to skip (must be ≥ 0)
     * @param string $sourceID Filter by source ID
     * @param \DateTimeInterface $startDate Filter companies created after this date (format YYYY-MM-DD)
     * @param State::* $state Filter by company state (must be one of the allowed values)
     * @param Status::* $status Filter by individual status (must be one of the allowed values)
     * @param string $workspaceID Filter by workspace ID
     *
     * @return list<CompanyRegistration>
     */
    public function list(
        $endDate = null,
        $limit = null,
        $offset = null,
        $sourceID = null,
        $startDate = null,
        $state = null,
        $status = null,
        $workspaceID = null,
        ?RequestOptions $requestOptions = null,
    ): array {
        $args = [
            'endDate' => $endDate,
            'limit' => $limit,
            'offset' => $offset,
            'sourceID' => $sourceID,
            'startDate' => $startDate,
            'state' => $state,
            'status' => $status,
            'workspaceID' => $workspaceID,
        ];
        $args = Util::array_filter_null(
            $args,
            [
                'endDate',
                'limit',
                'offset',
                'sourceID',
                'startDate',
                'state',
                'status',
                'workspaceID',
            ],
        );
        [$parsed, $options] = CompanyListParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'get',
            path: 'companies',
            query: $parsed,
            options: $options
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(
            new ListOf(CompanyRegistration::class),
            value: $resp
        );
    }

    /**
     * Delete a company by ID.
     */
    public function delete(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        return $this->client->request(
            method: 'delete',
            path: ['companies/%1$s', $companyID],
            options: $requestOptions,
        );
    }
}

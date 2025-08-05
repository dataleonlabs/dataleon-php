<?php

declare(strict_types=1);

namespace Dataleon\Resources;

use Dataleon\Client;
use Dataleon\Contracts\CompaniesContract;
use Dataleon\Core\Conversion;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Models\CompanyRegistration;
use Dataleon\Parameters\CompanyCreateParam;
use Dataleon\Parameters\CompanyCreateParam\Company;
use Dataleon\Parameters\CompanyCreateParam\TechnicalData;
use Dataleon\Parameters\CompanyListParam;
use Dataleon\Parameters\CompanyListParam\State;
use Dataleon\Parameters\CompanyListParam\Status;
use Dataleon\Parameters\CompanyRetrieveParam;
use Dataleon\Parameters\CompanyUpdateParam;
use Dataleon\Parameters\CompanyUpdateParam\Company as Company1;
use Dataleon\Parameters\CompanyUpdateParam\TechnicalData as TechnicalData1;
use Dataleon\RequestOptions;
use Dataleon\Resources\Companies\Documents;

final class Companies implements CompaniesContract
{
    public Documents $documents;

    public function __construct(private Client $client)
    {
        $this->documents = new Documents($this->client);
    }

    /**
     * Create a new company.
     *
     * @param array{
     *   company: Company,
     *   workspaceID: string,
     *   sourceID?: string,
     *   technicalData?: TechnicalData,
     * }|CompanyCreateParam $params
     */
    public function create(
        array|CompanyCreateParam $params,
        ?RequestOptions $requestOptions = null
    ): CompanyRegistration {
        [$parsed, $options] = CompanyCreateParam::parseRequest(
            $params,
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
     * @param array{document?: bool, scope?: string}|CompanyRetrieveParam $params
     */
    public function retrieve(
        string $companyID,
        array|CompanyRetrieveParam $params,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration {
        [$parsed, $options] = CompanyRetrieveParam::parseRequest(
            $params,
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
     * @param array{
     *   company: Company1,
     *   workspaceID: string,
     *   sourceID?: string,
     *   technicalData?: TechnicalData1,
     * }|CompanyUpdateParam $params
     */
    public function update(
        string $companyID,
        array|CompanyUpdateParam $params,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration {
        [$parsed, $options] = CompanyUpdateParam::parseRequest(
            $params,
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
     * @param array{
     *   endDate?: \DateTimeInterface,
     *   limit?: int,
     *   offset?: int,
     *   sourceID?: string,
     *   startDate?: \DateTimeInterface,
     *   state?: State::*,
     *   status?: Status::*,
     *   workspaceID?: string,
     * }|CompanyListParam $params
     *
     * @return list<CompanyRegistration>
     */
    public function list(
        array|CompanyListParam $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = CompanyListParam::parseRequest(
            $params,
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

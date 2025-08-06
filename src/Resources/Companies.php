<?php

declare(strict_types=1);

namespace Dataleon\Resources;

use Dataleon\Client;
use Dataleon\Contracts\CompaniesContract;
use Dataleon\Core\Conversion;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Models\CompanyRegistration;
use Dataleon\Parameters\CompanyCreateParams;
use Dataleon\Parameters\CompanyCreateParams\Company;
use Dataleon\Parameters\CompanyCreateParams\TechnicalData;
use Dataleon\Parameters\CompanyListParams;
use Dataleon\Parameters\CompanyListParams\State;
use Dataleon\Parameters\CompanyListParams\Status;
use Dataleon\Parameters\CompanyRetrieveParams;
use Dataleon\Parameters\CompanyUpdateParams;
use Dataleon\Parameters\CompanyUpdateParams\Company as Company1;
use Dataleon\Parameters\CompanyUpdateParams\TechnicalData as TechnicalData1;
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
     * }|CompanyCreateParams $params
     */
    public function create(
        array|CompanyCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CompanyRegistration {
        [$parsed, $options] = CompanyCreateParams::parseRequest(
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
     * @param array{document?: bool, scope?: string}|CompanyRetrieveParams $params
     */
    public function retrieve(
        string $companyID,
        array|CompanyRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration {
        [$parsed, $options] = CompanyRetrieveParams::parseRequest(
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
     * }|CompanyUpdateParams $params
     */
    public function update(
        string $companyID,
        array|CompanyUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration {
        [$parsed, $options] = CompanyUpdateParams::parseRequest(
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
     * }|CompanyListParams $params
     *
     * @return list<CompanyRegistration>
     */
    public function list(
        array|CompanyListParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = CompanyListParams::parseRequest(
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

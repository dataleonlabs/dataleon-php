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
}

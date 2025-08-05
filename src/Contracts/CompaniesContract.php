<?php

declare(strict_types=1);

namespace Dataleon\Contracts;

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

interface CompaniesContract
{
    /**
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
    ): CompanyRegistration;

    /**
     * @param array{document?: bool, scope?: string}|CompanyRetrieveParam $params
     */
    public function retrieve(
        string $companyID,
        array|CompanyRetrieveParam $params,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration;

    /**
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
    ): CompanyRegistration;

    /**
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
    ): array;

    public function delete(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}

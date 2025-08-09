<?php

declare(strict_types=1);

namespace Dataleon\Contracts;

use Dataleon\Models\CompanyCreateParams;
use Dataleon\Models\CompanyCreateParams\Company;
use Dataleon\Models\CompanyCreateParams\TechnicalData;
use Dataleon\Models\CompanyListParams;
use Dataleon\Models\CompanyListParams\State;
use Dataleon\Models\CompanyListParams\Status;
use Dataleon\Models\CompanyRegistration;
use Dataleon\Models\CompanyRetrieveParams;
use Dataleon\Models\CompanyUpdateParams;
use Dataleon\Models\CompanyUpdateParams\Company as Company1;
use Dataleon\Models\CompanyUpdateParams\TechnicalData as TechnicalData1;
use Dataleon\RequestOptions;

interface CompaniesContract
{
    /**
     * @param array{
     *   company: Company,
     *   workspaceID: string,
     *   sourceID?: string,
     *   technicalData?: TechnicalData,
     * }|CompanyCreateParams $params
     */
    public function create(
        array|CompanyCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration;

    /**
     * @param array{document?: bool, scope?: string}|CompanyRetrieveParams $params
     */
    public function retrieve(
        string $companyID,
        array|CompanyRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration;

    /**
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
     * }|CompanyListParams $params
     *
     * @return list<CompanyRegistration>
     */
    public function list(
        array|CompanyListParams $params,
        ?RequestOptions $requestOptions = null
    ): array;

    public function delete(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}

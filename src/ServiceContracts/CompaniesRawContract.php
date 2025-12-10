<?php

declare(strict_types=1);

namespace Dataleon\ServiceContracts;

use Dataleon\Companies\CompanyCreateParams;
use Dataleon\Companies\CompanyListParams;
use Dataleon\Companies\CompanyRegistration;
use Dataleon\Companies\CompanyRetrieveParams;
use Dataleon\Companies\CompanyUpdateParams;
use Dataleon\Core\Contracts\BaseResponse;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\RequestOptions;

interface CompaniesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|CompanyCreateParams $params
     *
     * @return BaseResponse<CompanyRegistration>
     *
     * @throws APIException
     */
    public function create(
        array|CompanyCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $companyID ID of the company
     * @param array<mixed>|CompanyRetrieveParams $params
     *
     * @return BaseResponse<CompanyRegistration>
     *
     * @throws APIException
     */
    public function retrieve(
        string $companyID,
        array|CompanyRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $companyID ID of the company to update
     * @param array<mixed>|CompanyUpdateParams $params
     *
     * @return BaseResponse<CompanyRegistration>
     *
     * @throws APIException
     */
    public function update(
        string $companyID,
        array|CompanyUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|CompanyListParams $params
     *
     * @return BaseResponse<list<CompanyRegistration>>
     *
     * @throws APIException
     */
    public function list(
        array|CompanyListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $companyID ID of the company to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}

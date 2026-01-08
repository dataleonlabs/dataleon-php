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

/**
 * @phpstan-import-type RequestOpts from \Dataleon\RequestOptions
 */
interface CompaniesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CompanyCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompanyRegistration>
     *
     * @throws APIException
     */
    public function create(
        array|CompanyCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $companyID ID of the company
     * @param array<string,mixed>|CompanyRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompanyRegistration>
     *
     * @throws APIException
     */
    public function retrieve(
        string $companyID,
        array|CompanyRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $companyID ID of the company to update
     * @param array<string,mixed>|CompanyUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompanyRegistration>
     *
     * @throws APIException
     */
    public function update(
        string $companyID,
        array|CompanyUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CompanyListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<CompanyRegistration>>
     *
     * @throws APIException
     */
    public function list(
        array|CompanyListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $companyID ID of the company to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $companyID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}

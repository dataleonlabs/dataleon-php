<?php

declare(strict_types=1);

namespace Dataleon\ServiceContracts;

use Dataleon\Core\Contracts\BaseResponse;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Individuals\Individual;
use Dataleon\Individuals\IndividualCreateParams;
use Dataleon\Individuals\IndividualListParams;
use Dataleon\Individuals\IndividualRetrieveParams;
use Dataleon\Individuals\IndividualUpdateParams;
use Dataleon\RequestOptions;

interface IndividualsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|IndividualCreateParams $params
     *
     * @return BaseResponse<Individual>
     *
     * @throws APIException
     */
    public function create(
        array|IndividualCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $individualID ID of the individual
     * @param array<string,mixed>|IndividualRetrieveParams $params
     *
     * @return BaseResponse<Individual>
     *
     * @throws APIException
     */
    public function retrieve(
        string $individualID,
        array|IndividualRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $individualID ID of the individual to update
     * @param array<string,mixed>|IndividualUpdateParams $params
     *
     * @return BaseResponse<Individual>
     *
     * @throws APIException
     */
    public function update(
        string $individualID,
        array|IndividualUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|IndividualListParams $params
     *
     * @return BaseResponse<list<Individual>>
     *
     * @throws APIException
     */
    public function list(
        array|IndividualListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $individualID ID of the individual to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}

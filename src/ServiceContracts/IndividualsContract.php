<?php

declare(strict_types=1);

namespace Dataleon\ServiceContracts;

use Dataleon\Core\Exceptions\APIException;
use Dataleon\Individuals\Individual;
use Dataleon\Individuals\IndividualCreateParams;
use Dataleon\Individuals\IndividualListParams;
use Dataleon\Individuals\IndividualRetrieveParams;
use Dataleon\Individuals\IndividualUpdateParams;
use Dataleon\RequestOptions;

interface IndividualsContract
{
    /**
     * @api
     *
     * @param array<mixed>|IndividualCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|IndividualCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Individual;

    /**
     * @api
     *
     * @param array<mixed>|IndividualRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $individualID,
        array|IndividualRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): Individual;

    /**
     * @api
     *
     * @param array<mixed>|IndividualUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $individualID,
        array|IndividualUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Individual;

    /**
     * @api
     *
     * @param array<mixed>|IndividualListParams $params
     *
     * @return list<Individual>
     *
     * @throws APIException
     */
    public function list(
        array|IndividualListParams $params,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}

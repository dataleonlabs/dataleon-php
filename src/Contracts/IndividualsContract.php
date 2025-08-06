<?php

declare(strict_types=1);

namespace Dataleon\Contracts;

use Dataleon\Models\Individual;
use Dataleon\Parameters\IndividualCreateParams;
use Dataleon\Parameters\IndividualCreateParams\Person;
use Dataleon\Parameters\IndividualCreateParams\TechnicalData;
use Dataleon\Parameters\IndividualListParams;
use Dataleon\Parameters\IndividualListParams\State;
use Dataleon\Parameters\IndividualListParams\Status;
use Dataleon\Parameters\IndividualRetrieveParams;
use Dataleon\Parameters\IndividualUpdateParams;
use Dataleon\Parameters\IndividualUpdateParams\Person as Person1;
use Dataleon\Parameters\IndividualUpdateParams\TechnicalData as TechnicalData1;
use Dataleon\RequestOptions;

interface IndividualsContract
{
    /**
     * @param array{
     *   workspaceID: string,
     *   person?: Person,
     *   sourceID?: string,
     *   technicalData?: TechnicalData,
     * }|IndividualCreateParams $params
     */
    public function create(
        array|IndividualCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Individual;

    /**
     * @param array{document?: bool, scope?: string}|IndividualRetrieveParams $params
     */
    public function retrieve(
        string $individualID,
        array|IndividualRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): Individual;

    /**
     * @param array{
     *   workspaceID: string,
     *   person?: Person1,
     *   sourceID?: string,
     *   technicalData?: TechnicalData1,
     * }|IndividualUpdateParams $params
     */
    public function update(
        string $individualID,
        array|IndividualUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Individual;

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
     * }|IndividualListParams $params
     *
     * @return list<Individual>
     */
    public function list(
        array|IndividualListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;

    public function delete(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}

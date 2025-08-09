<?php

declare(strict_types=1);

namespace Dataleon\Contracts;

use Dataleon\Models\Individual;
use Dataleon\Models\IndividualCreateParams;
use Dataleon\Models\IndividualCreateParams\Person;
use Dataleon\Models\IndividualCreateParams\TechnicalData;
use Dataleon\Models\IndividualListParams;
use Dataleon\Models\IndividualListParams\State;
use Dataleon\Models\IndividualListParams\Status;
use Dataleon\Models\IndividualRetrieveParams;
use Dataleon\Models\IndividualUpdateParams;
use Dataleon\Models\IndividualUpdateParams\Person as Person1;
use Dataleon\Models\IndividualUpdateParams\TechnicalData as TechnicalData1;
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

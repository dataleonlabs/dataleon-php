<?php

declare(strict_types=1);

namespace Dataleon\Contracts;

use Dataleon\Models\Individual;
use Dataleon\Parameters\IndividualCreateParam;
use Dataleon\Parameters\IndividualCreateParam\Person;
use Dataleon\Parameters\IndividualCreateParam\TechnicalData;
use Dataleon\Parameters\IndividualListParam;
use Dataleon\Parameters\IndividualListParam\State;
use Dataleon\Parameters\IndividualListParam\Status;
use Dataleon\Parameters\IndividualRetrieveParam;
use Dataleon\Parameters\IndividualUpdateParam;
use Dataleon\Parameters\IndividualUpdateParam\Person as Person1;
use Dataleon\Parameters\IndividualUpdateParam\TechnicalData as TechnicalData1;
use Dataleon\RequestOptions;

interface IndividualsContract
{
    /**
     * @param array{
     *   workspaceID: string,
     *   person?: Person,
     *   sourceID?: string,
     *   technicalData?: TechnicalData,
     * }|IndividualCreateParam $params
     */
    public function create(
        array|IndividualCreateParam $params,
        ?RequestOptions $requestOptions = null,
    ): Individual;

    /**
     * @param array{document?: bool, scope?: string}|IndividualRetrieveParam $params
     */
    public function retrieve(
        string $individualID,
        array|IndividualRetrieveParam $params,
        ?RequestOptions $requestOptions = null,
    ): Individual;

    /**
     * @param array{
     *   workspaceID: string,
     *   person?: Person1,
     *   sourceID?: string,
     *   technicalData?: TechnicalData1,
     * }|IndividualUpdateParam $params
     */
    public function update(
        string $individualID,
        array|IndividualUpdateParam $params,
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
     * }|IndividualListParam $params
     *
     * @return list<Individual>
     */
    public function list(
        array|IndividualListParam $params,
        ?RequestOptions $requestOptions = null,
    ): array;

    public function delete(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}

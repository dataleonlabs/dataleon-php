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
}

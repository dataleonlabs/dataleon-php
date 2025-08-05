<?php

declare(strict_types=1);

namespace Dataleon\Resources;

use Dataleon\Client;
use Dataleon\Contracts\IndividualsContract;
use Dataleon\Core\Conversion;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Models\Individual;
use Dataleon\Parameters\IndividualCreateParam;
use Dataleon\Parameters\IndividualCreateParam\Person;
use Dataleon\Parameters\IndividualCreateParam\TechnicalData;
use Dataleon\Parameters\IndividualListParam;
use Dataleon\Parameters\IndividualListParam\State;
use Dataleon\Parameters\IndividualListParam\Status;
use Dataleon\RequestOptions;
use Dataleon\Resources\Individuals\Documents;

final class Individuals implements IndividualsContract
{
    public Documents $documents;

    public function __construct(private Client $client)
    {
        $this->documents = new Documents($this->client);
    }

    /**
     * Create a new individual.
     *
     * @param array{
     *   workspaceID: string,
     *   person?: Person,
     *   sourceID?: string,
     *   technicalData?: TechnicalData,
     * }|IndividualCreateParam $params
     */
    public function create(
        array|IndividualCreateParam $params,
        ?RequestOptions $requestOptions = null
    ): Individual {
        [$parsed, $options] = IndividualCreateParam::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'individuals',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Individual::class, value: $resp);
    }

    /**
     * Get all individuals.
     *
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
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = IndividualListParam::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'get',
            path: 'individuals',
            query: $parsed,
            options: $options
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(new ListOf(Individual::class), value: $resp);
    }
}

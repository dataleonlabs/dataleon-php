<?php

declare(strict_types=1);

namespace Dataleon\Resources;

use Dataleon\Client;
use Dataleon\Contracts\IndividualsContract;
use Dataleon\Core\Conversion;
use Dataleon\Core\Conversion\ListOf;
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
     * }|IndividualCreateParams $params
     */
    public function create(
        array|IndividualCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): Individual {
        [$parsed, $options] = IndividualCreateParams::parseRequest(
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
     * Get an individual by ID.
     *
     * @param array{document?: bool, scope?: string}|IndividualRetrieveParams $params
     */
    public function retrieve(
        string $individualID,
        array|IndividualRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): Individual {
        [$parsed, $options] = IndividualRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'get',
            path: ['individuals/%1$s', $individualID],
            query: $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Individual::class, value: $resp);
    }

    /**
     * Update an individual by ID.
     *
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
    ): Individual {
        [$parsed, $options] = IndividualUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'put',
            path: ['individuals/%1$s', $individualID],
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
     * }|IndividualListParams $params
     *
     * @return list<Individual>
     */
    public function list(
        array|IndividualListParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = IndividualListParams::parseRequest(
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

    /**
     * Delete an individual by ID.
     */
    public function delete(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        return $this->client->request(
            method: 'delete',
            path: ['individuals/%1$s', $individualID],
            options: $requestOptions,
        );
    }
}

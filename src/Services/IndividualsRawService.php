<?php

declare(strict_types=1);

namespace Dataleon\Services;

use Dataleon\Client;
use Dataleon\Core\Contracts\BaseResponse;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Core\Util;
use Dataleon\Individuals\Individual;
use Dataleon\Individuals\IndividualCreateParams;
use Dataleon\Individuals\IndividualCreateParams\Person;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData;
use Dataleon\Individuals\IndividualListParams;
use Dataleon\Individuals\IndividualListParams\State;
use Dataleon\Individuals\IndividualListParams\Status;
use Dataleon\Individuals\IndividualRetrieveParams;
use Dataleon\Individuals\IndividualUpdateParams;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\IndividualsRawContract;

/**
 * @phpstan-import-type PersonShape from \Dataleon\Individuals\IndividualCreateParams\Person
 * @phpstan-import-type TechnicalDataShape from \Dataleon\Individuals\IndividualCreateParams\TechnicalData
 * @phpstan-import-type PersonShape from \Dataleon\Individuals\IndividualUpdateParams\Person as PersonShape1
 * @phpstan-import-type TechnicalDataShape from \Dataleon\Individuals\IndividualUpdateParams\TechnicalData as TechnicalDataShape1
 * @phpstan-import-type RequestOpts from \Dataleon\RequestOptions
 */
final class IndividualsRawService implements IndividualsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new individual
     *
     * @param array{
     *   workspaceID: string,
     *   person?: Person|PersonShape,
     *   sourceID?: string,
     *   technicalData?: TechnicalData|TechnicalDataShape,
     * }|IndividualCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Individual>
     *
     * @throws APIException
     */
    public function create(
        array|IndividualCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IndividualCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'individuals',
            body: (object) $parsed,
            options: $options,
            convert: Individual::class,
        );
    }

    /**
     * @api
     *
     * Get an individual by ID
     *
     * @param string $individualID ID of the individual
     * @param array{document?: bool, scope?: string}|IndividualRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Individual>
     *
     * @throws APIException
     */
    public function retrieve(
        string $individualID,
        array|IndividualRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IndividualRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['individuals/%1$s', $individualID],
            query: $parsed,
            options: $options,
            convert: Individual::class,
        );
    }

    /**
     * @api
     *
     * Update an individual by ID
     *
     * @param string $individualID ID of the individual to update
     * @param array{
     *   workspaceID: string,
     *   person?: IndividualUpdateParams\Person|PersonShape1,
     *   sourceID?: string,
     *   technicalData?: IndividualUpdateParams\TechnicalData|TechnicalDataShape1,
     * }|IndividualUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Individual>
     *
     * @throws APIException
     */
    public function update(
        string $individualID,
        array|IndividualUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IndividualUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['individuals/%1$s', $individualID],
            body: (object) $parsed,
            options: $options,
            convert: Individual::class,
        );
    }

    /**
     * @api
     *
     * Get all individuals
     *
     * @param array{
     *   endDate?: string,
     *   limit?: int,
     *   offset?: int,
     *   sourceID?: string,
     *   startDate?: string,
     *   state?: value-of<State>,
     *   status?: Status|value-of<Status>,
     *   workspaceID?: string,
     * }|IndividualListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Individual>>
     *
     * @throws APIException
     */
    public function list(
        array|IndividualListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IndividualListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'individuals',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'endDate' => 'end_date',
                    'sourceID' => 'source_id',
                    'startDate' => 'start_date',
                    'workspaceID' => 'workspace_id',
                ],
            ),
            options: $options,
            convert: new ListOf(Individual::class),
        );
    }

    /**
     * @api
     *
     * Delete an individual by ID
     *
     * @param string $individualID ID of the individual to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $individualID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['individuals/%1$s', $individualID],
            options: $requestOptions,
            convert: null,
        );
    }
}

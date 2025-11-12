<?php

declare(strict_types=1);

namespace Dataleon\Services;

use Dataleon\Client;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Individuals\Individual;
use Dataleon\Individuals\IndividualCreateParams;
use Dataleon\Individuals\IndividualListParams;
use Dataleon\Individuals\IndividualRetrieveParams;
use Dataleon\Individuals\IndividualUpdateParams;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\IndividualsContract;
use Dataleon\Services\Individuals\DocumentsService;

final class IndividualsService implements IndividualsContract
{
    /**
     * @api
     */
    public DocumentsService $documents;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->documents = new DocumentsService($client);
    }

    /**
     * @api
     *
     * Create a new individual
     *
     * @param array{
     *   workspace_id: string,
     *   person?: array{
     *     birthday?: string,
     *     email?: string,
     *     first_name?: string,
     *     gender?: "M"|"F",
     *     last_name?: string,
     *     maiden_name?: string,
     *     nationality?: string,
     *     phone_number?: string,
     *   },
     *   source_id?: string,
     *   technical_data?: array{
     *     active_aml_suspicions?: bool,
     *     callback_url?: string,
     *     callback_url_notification?: string,
     *     filtering_score_aml_suspicions?: float,
     *     language?: string,
     *     portal_steps?: list<"identity_verification"|"document_signing"|"proof_of_address"|"selfie"|"face_match">,
     *     raw_data?: bool,
     *   },
     * }|IndividualCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|IndividualCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): Individual {
        [$parsed, $options] = IndividualCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @param array{document?: bool, scope?: string}|IndividualRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $individualID,
        array|IndividualRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): Individual {
        [$parsed, $options] = IndividualRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @param array{
     *   workspace_id: string,
     *   person?: array{
     *     birthday?: string,
     *     email?: string,
     *     first_name?: string,
     *     gender?: "M"|"F",
     *     last_name?: string,
     *     maiden_name?: string,
     *     nationality?: string,
     *     phone_number?: string,
     *   },
     *   source_id?: string,
     *   technical_data?: array{
     *     active_aml_suspicions?: bool,
     *     callback_url?: string,
     *     callback_url_notification?: string,
     *     filtering_score_aml_suspicions?: float,
     *     language?: string,
     *     portal_steps?: list<"identity_verification"|"document_signing"|"proof_of_address"|"selfie"|"face_match">,
     *     raw_data?: bool,
     *   },
     * }|IndividualUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $individualID,
        array|IndividualUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Individual {
        [$parsed, $options] = IndividualUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @phpstan-type State = "VOID"|"WAITING"|"STARTED"|"RUNNING"|"PROCESSED"|"FAILED"|"ABORTED"|"EXPIRED"|"DELETED"
     *
     * Get all individuals
     *
     * @param array{
     *   end_date?: string|\DateTimeInterface,
     *   limit?: int,
     *   offset?: int,
     *   source_id?: string,
     *   start_date?: string|\DateTimeInterface,
     *   state?: State,
     *   status?: "rejected"|"need_review"|"approved",
     *   workspace_id?: string,
     * }|IndividualListParams $params
     *
     * @return list<Individual>
     *
     * @throws APIException
     */
    public function list(
        array|IndividualListParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = IndividualListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'individuals',
            query: $parsed,
            options: $options,
            convert: new ListOf(Individual::class),
        );
    }

    /**
     * @api
     *
     * Delete an individual by ID
     *
     * @throws APIException
     */
    public function delete(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['individuals/%1$s', $individualID],
            options: $requestOptions,
            convert: null,
        );
    }
}

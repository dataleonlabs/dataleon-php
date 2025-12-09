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
use Dataleon\Individuals\IndividualCreateParams\Person\Gender;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData\PortalStep;
use Dataleon\Individuals\IndividualListParams;
use Dataleon\Individuals\IndividualListParams\State;
use Dataleon\Individuals\IndividualListParams\Status;
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
     *   workspaceID: string,
     *   person?: array{
     *     birthday?: string,
     *     email?: string,
     *     firstName?: string,
     *     gender?: 'M'|'F'|Gender,
     *     lastName?: string,
     *     maidenName?: string,
     *     nationality?: string,
     *     phoneNumber?: string,
     *   },
     *   sourceID?: string,
     *   technicalData?: array{
     *     activeAmlSuspicions?: bool,
     *     callbackURL?: string,
     *     callbackURLNotification?: string,
     *     filteringScoreAmlSuspicions?: float,
     *     language?: string,
     *     portalSteps?: list<'identity_verification'|'document_signing'|'proof_of_address'|'selfie'|'face_match'|PortalStep>,
     *     rawData?: bool,
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

        /** @var BaseResponse<Individual> */
        $response = $this->client->request(
            method: 'post',
            path: 'individuals',
            body: (object) $parsed,
            options: $options,
            convert: Individual::class,
        );

        return $response->parse();
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

        /** @var BaseResponse<Individual> */
        $response = $this->client->request(
            method: 'get',
            path: ['individuals/%1$s', $individualID],
            query: $parsed,
            options: $options,
            convert: Individual::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an individual by ID
     *
     * @param array{
     *   workspaceID: string,
     *   person?: array{
     *     birthday?: string,
     *     email?: string,
     *     firstName?: string,
     *     gender?: 'M'|'F'|IndividualUpdateParams\Person\Gender,
     *     lastName?: string,
     *     maidenName?: string,
     *     nationality?: string,
     *     phoneNumber?: string,
     *   },
     *   sourceID?: string,
     *   technicalData?: array{
     *     activeAmlSuspicions?: bool,
     *     callbackURL?: string,
     *     callbackURLNotification?: string,
     *     filteringScoreAmlSuspicions?: float,
     *     language?: string,
     *     portalSteps?: list<'identity_verification'|'document_signing'|'proof_of_address'|'selfie'|'face_match'|IndividualUpdateParams\TechnicalData\PortalStep>,
     *     rawData?: bool,
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

        /** @var BaseResponse<Individual> */
        $response = $this->client->request(
            method: 'put',
            path: ['individuals/%1$s', $individualID],
            body: (object) $parsed,
            options: $options,
            convert: Individual::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all individuals
     *
     * @param array{
     *   endDate?: string|\DateTimeInterface,
     *   limit?: int,
     *   offset?: int,
     *   sourceID?: string,
     *   startDate?: string|\DateTimeInterface,
     *   state?: value-of<State>,
     *   status?: 'rejected'|'need_review'|'approved'|Status,
     *   workspaceID?: string,
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

        /** @var BaseResponse<list<Individual>> */
        $response = $this->client->request(
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

        return $response->parse();
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
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['individuals/%1$s', $individualID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}

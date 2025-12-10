<?php

declare(strict_types=1);

namespace Dataleon\Services;

use Dataleon\Client;
use Dataleon\Companies\CompanyCreateParams;
use Dataleon\Companies\CompanyCreateParams\TechnicalData\PortalStep;
use Dataleon\Companies\CompanyListParams;
use Dataleon\Companies\CompanyListParams\State;
use Dataleon\Companies\CompanyListParams\Status;
use Dataleon\Companies\CompanyRegistration;
use Dataleon\Companies\CompanyRetrieveParams;
use Dataleon\Companies\CompanyUpdateParams;
use Dataleon\Core\Contracts\BaseResponse;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Core\Util;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\CompaniesRawContract;

final class CompaniesRawService implements CompaniesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new company
     *
     * @param array{
     *   company: array{
     *     name: string,
     *     address?: string,
     *     commercialName?: string,
     *     country?: string,
     *     email?: string,
     *     employerIdentificationNumber?: string,
     *     legalForm?: string,
     *     phoneNumber?: string,
     *     registrationDate?: string,
     *     registrationID?: string,
     *     shareCapital?: string,
     *     status?: string,
     *     taxIdentificationNumber?: string,
     *     type?: string,
     *     websiteURL?: string,
     *   },
     *   workspaceID: string,
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
     * }|CompanyCreateParams $params
     *
     * @return BaseResponse<CompanyRegistration>
     *
     * @throws APIException
     */
    public function create(
        array|CompanyCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = CompanyCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'companies',
            body: (object) $parsed,
            options: $options,
            convert: CompanyRegistration::class,
        );
    }

    /**
     * @api
     *
     * Get a company by ID
     *
     * @param string $companyID ID of the company
     * @param array{document?: bool, scope?: string}|CompanyRetrieveParams $params
     *
     * @return BaseResponse<CompanyRegistration>
     *
     * @throws APIException
     */
    public function retrieve(
        string $companyID,
        array|CompanyRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CompanyRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['companies/%1$s', $companyID],
            query: $parsed,
            options: $options,
            convert: CompanyRegistration::class,
        );
    }

    /**
     * @api
     *
     * Update a company by ID
     *
     * @param string $companyID ID of the company to update
     * @param array{
     *   company: array{
     *     name: string,
     *     address?: string,
     *     commercialName?: string,
     *     country?: string,
     *     email?: string,
     *     employerIdentificationNumber?: string,
     *     legalForm?: string,
     *     phoneNumber?: string,
     *     registrationDate?: string,
     *     registrationID?: string,
     *     shareCapital?: string,
     *     status?: string,
     *     taxIdentificationNumber?: string,
     *     type?: string,
     *     websiteURL?: string,
     *   },
     *   workspaceID: string,
     *   sourceID?: string,
     *   technicalData?: array{
     *     activeAmlSuspicions?: bool,
     *     callbackURL?: string,
     *     callbackURLNotification?: string,
     *     filteringScoreAmlSuspicions?: float,
     *     language?: string,
     *     portalSteps?: list<'identity_verification'|'document_signing'|'proof_of_address'|'selfie'|'face_match'|CompanyUpdateParams\TechnicalData\PortalStep>,
     *     rawData?: bool,
     *   },
     * }|CompanyUpdateParams $params
     *
     * @return BaseResponse<CompanyRegistration>
     *
     * @throws APIException
     */
    public function update(
        string $companyID,
        array|CompanyUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CompanyUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['companies/%1$s', $companyID],
            body: (object) $parsed,
            options: $options,
            convert: CompanyRegistration::class,
        );
    }

    /**
     * @api
     *
     * Get all companies
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
     * }|CompanyListParams $params
     *
     * @return BaseResponse<list<CompanyRegistration>>
     *
     * @throws APIException
     */
    public function list(
        array|CompanyListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = CompanyListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'companies',
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
            convert: new ListOf(CompanyRegistration::class),
        );
    }

    /**
     * @api
     *
     * Delete a company by ID
     *
     * @param string $companyID ID of the company to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['companies/%1$s', $companyID],
            options: $requestOptions,
            convert: null,
        );
    }
}

<?php

declare(strict_types=1);

namespace Dataleon\Services;

use Dataleon\Client;
use Dataleon\Companies\CompanyCreateParams\TechnicalData\PortalStep;
use Dataleon\Companies\CompanyListParams\State;
use Dataleon\Companies\CompanyListParams\Status;
use Dataleon\Companies\CompanyRegistration;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Core\Util;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\CompaniesContract;
use Dataleon\Services\Companies\DocumentsService;

final class CompaniesService implements CompaniesContract
{
    /**
     * @api
     */
    public CompaniesRawService $raw;

    /**
     * @api
     */
    public DocumentsService $documents;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CompaniesRawService($client);
        $this->documents = new DocumentsService($client);
    }

    /**
     * @api
     *
     * Create a new company
     *
     * @param array{
     *   name: string,
     *   address?: string,
     *   commercialName?: string,
     *   country?: string,
     *   email?: string,
     *   employerIdentificationNumber?: string,
     *   legalForm?: string,
     *   phoneNumber?: string,
     *   registrationDate?: string,
     *   registrationID?: string,
     *   shareCapital?: string,
     *   status?: string,
     *   taxIdentificationNumber?: string,
     *   type?: string,
     *   websiteURL?: string,
     * } $company Main information about the company being registered
     * @param string $workspaceID unique identifier of the workspace in which the company is being created
     * @param string $sourceID optional identifier to track the origin of the request or integration from your system
     * @param array{
     *   activeAmlSuspicions?: bool,
     *   callbackURL?: string,
     *   callbackURLNotification?: string,
     *   filteringScoreAmlSuspicions?: float,
     *   language?: string,
     *   portalSteps?: list<'identity_verification'|'document_signing'|'proof_of_address'|'selfie'|'face_match'|PortalStep>,
     *   rawData?: bool,
     * } $technicalData Technical metadata and callback configuration
     *
     * @throws APIException
     */
    public function create(
        array $company,
        string $workspaceID,
        ?string $sourceID = null,
        ?array $technicalData = null,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration {
        $params = Util::removeNulls(
            [
                'company' => $company,
                'workspaceID' => $workspaceID,
                'sourceID' => $sourceID,
                'technicalData' => $technicalData,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a company by ID
     *
     * @param string $companyID ID of the company
     * @param bool $document Include document signed url
     * @param string $scope Scope filter (id or scope)
     *
     * @throws APIException
     */
    public function retrieve(
        string $companyID,
        ?bool $document = null,
        ?string $scope = null,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration {
        $params = Util::removeNulls(['document' => $document, 'scope' => $scope]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($companyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a company by ID
     *
     * @param string $companyID ID of the company to update
     * @param array{
     *   name: string,
     *   address?: string,
     *   commercialName?: string,
     *   country?: string,
     *   email?: string,
     *   employerIdentificationNumber?: string,
     *   legalForm?: string,
     *   phoneNumber?: string,
     *   registrationDate?: string,
     *   registrationID?: string,
     *   shareCapital?: string,
     *   status?: string,
     *   taxIdentificationNumber?: string,
     *   type?: string,
     *   websiteURL?: string,
     * } $company Main information about the company being registered
     * @param string $workspaceID unique identifier of the workspace in which the company is being created
     * @param string $sourceID optional identifier to track the origin of the request or integration from your system
     * @param array{
     *   activeAmlSuspicions?: bool,
     *   callbackURL?: string,
     *   callbackURLNotification?: string,
     *   filteringScoreAmlSuspicions?: float,
     *   language?: string,
     *   portalSteps?: list<'identity_verification'|'document_signing'|'proof_of_address'|'selfie'|'face_match'|\Dataleon\Companies\CompanyUpdateParams\TechnicalData\PortalStep>,
     *   rawData?: bool,
     * } $technicalData Technical metadata and callback configuration
     *
     * @throws APIException
     */
    public function update(
        string $companyID,
        array $company,
        string $workspaceID,
        ?string $sourceID = null,
        ?array $technicalData = null,
        ?RequestOptions $requestOptions = null,
    ): CompanyRegistration {
        $params = Util::removeNulls(
            [
                'company' => $company,
                'workspaceID' => $workspaceID,
                'sourceID' => $sourceID,
                'technicalData' => $technicalData,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($companyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all companies
     *
     * @param string $endDate Filter companies created before this date (format YYYY-MM-DD)
     * @param int $limit Number of results to return (between 1 and 100)
     * @param int $offset Number of results to skip (must be ≥ 0)
     * @param string $sourceID Filter by source ID
     * @param string $startDate Filter companies created after this date (format YYYY-MM-DD)
     * @param 'VOID'|'WAITING'|'STARTED'|'RUNNING'|'PROCESSED'|'FAILED'|'ABORTED'|'EXPIRED'|'DELETED'|State $state Filter by company state (must be one of the allowed values)
     * @param 'rejected'|'need_review'|'approved'|Status $status Filter by individual status (must be one of the allowed values)
     * @param string $workspaceID Filter by workspace ID
     *
     * @return list<CompanyRegistration>
     *
     * @throws APIException
     */
    public function list(
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $sourceID = null,
        ?string $startDate = null,
        string|State|null $state = null,
        string|Status|null $status = null,
        ?string $workspaceID = null,
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'endDate' => $endDate,
                'limit' => $limit,
                'offset' => $offset,
                'sourceID' => $sourceID,
                'startDate' => $startDate,
                'state' => $state,
                'status' => $status,
                'workspaceID' => $workspaceID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a company by ID
     *
     * @param string $companyID ID of the company to delete
     *
     * @throws APIException
     */
    public function delete(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($companyID, requestOptions: $requestOptions);

        return $response->parse();
    }
}

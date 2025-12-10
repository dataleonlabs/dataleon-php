<?php

declare(strict_types=1);

namespace Dataleon\Services\Individuals;

use Dataleon\Client;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\Individuals\DocumentsContract;

final class DocumentsService implements DocumentsContract
{
    /**
     * @api
     */
    public DocumentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DocumentsRawService($client);
    }

    /**
     * @api
     *
     * Get documents to an individuals
     *
     * @param string $individualID ID of the individual to upload document
     *
     * @throws APIException
     */
    public function list(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): DocumentResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($individualID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Upload documents to an individual
     *
     * @param string $individualID ID of the individual to upload document
     * @param 'liasse_fiscale'|'amortised_loan_schedule'|'invoice'|'receipt'|'company_statuts'|'registration_company_certificate'|'kbis'|'rib'|'livret_famille'|'birth_certificate'|'payslip'|'social_security_card'|'vehicle_registration_certificate'|'carte_grise'|'criminal_record_extract'|'proof_of_address'|'identity_card_front'|'identity_card_back'|'driver_license_front'|'driver_license_back'|'identity_document'|'driver_license'|'passport'|'tax'|'certificate_of_incorporation'|'certificate_of_good_standing'|'lcb_ft_lab_aml_policies'|'niu_entreprise'|'financial_statements'|'rccm'|'proof_of_source_funds'|'organizational_chart'|'risk_policies'|DocumentType $documentType Filter by document type for upload (must be one of the allowed values)
     * @param string $file File to upload (required)
     * @param string $url URL of the file to upload (either `file` or `url` is required)
     *
     * @throws APIException
     */
    public function upload(
        string $individualID,
        string|DocumentType $documentType,
        ?string $file = null,
        ?string $url = null,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument {
        $params = ['documentType' => $documentType, 'file' => $file, 'url' => $url];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upload($individualID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

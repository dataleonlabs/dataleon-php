<?php

declare(strict_types=1);

namespace Dataleon\Services\Companies;

use Dataleon\Client;
use Dataleon\Companies\Documents\DocumentUploadParams;
use Dataleon\Companies\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Core\Implementation\HasRawResponse;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\Companies\DocumentsContract;

use const Dataleon\Core\OMIT as omit;

final class DocumentsService implements DocumentsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get documents to an company
     *
     * @return DocumentResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): DocumentResponse {
        $params = [];

        return $this->listRaw($companyID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return DocumentResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $companyID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): DocumentResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['companies/%1$s/documents', $companyID],
            options: $requestOptions,
            convert: DocumentResponse::class,
        );
    }

    /**
     * @api
     *
     * Upload documents to an company
     *
     * @param DocumentType|value-of<DocumentType> $documentType Filter by document type for upload (must be one of the allowed values)
     * @param string $file File to upload (required)
     * @param string $url URL of the file to upload (either `file` or `url` is required)
     *
     * @return GenericDocument<HasRawResponse>
     *
     * @throws APIException
     */
    public function upload(
        string $companyID,
        $documentType,
        $file = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument {
        $params = ['documentType' => $documentType, 'file' => $file, 'url' => $url];

        return $this->uploadRaw($companyID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return GenericDocument<HasRawResponse>
     *
     * @throws APIException
     */
    public function uploadRaw(
        string $companyID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): GenericDocument {
        [$parsed, $options] = DocumentUploadParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['companies/%1$s/documents', $companyID],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: GenericDocument::class,
        );
    }
}

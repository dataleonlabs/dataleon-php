<?php

declare(strict_types=1);

namespace Dataleon\Services\Companies;

use Dataleon\Client;
use Dataleon\Companies\Documents\DocumentUploadParams;
use Dataleon\Companies\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\Companies\DocumentsContract;

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
     * @throws APIException
     */
    public function list(
        string $companyID,
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
     * @param array{
     *   document_type: value-of<DocumentType>, file?: string, url?: string
     * }|DocumentUploadParams $params
     *
     * @throws APIException
     */
    public function upload(
        string $companyID,
        array|DocumentUploadParams $params,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument {
        [$parsed, $options] = DocumentUploadParams::parseRequest(
            $params,
            $requestOptions,
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

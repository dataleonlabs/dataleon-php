<?php

declare(strict_types=1);

namespace Dataleon\Resources\Companies;

use Dataleon\Client;
use Dataleon\Contracts\Companies\DocumentsContract;
use Dataleon\Core\Conversion;
use Dataleon\Models\Individuals\DocumentResponse;
use Dataleon\Models\Individuals\GenericDocument;
use Dataleon\Parameters\Companies\DocumentUploadParams;
use Dataleon\Parameters\Companies\DocumentUploadParams\DocumentType;
use Dataleon\RequestOptions;

final class Documents implements DocumentsContract
{
    public function __construct(private Client $client) {}

    /**
     * Get documents to an company.
     */
    public function list(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): DocumentResponse {
        $resp = $this->client->request(
            method: 'get',
            path: ['companies/%1$s/documents', $companyID],
            options: $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(DocumentResponse::class, value: $resp);
    }

    /**
     * Upload documents to an company.
     *
     * @param array{
     *   documentType: DocumentType::*, file?: string, url?: string
     * }|DocumentUploadParams $params
     */
    public function upload(
        string $companyID,
        array|DocumentUploadParams $params,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument {
        [$parsed, $options] = DocumentUploadParams::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: ['companies/%1$s/documents', $companyID],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(GenericDocument::class, value: $resp);
    }
}

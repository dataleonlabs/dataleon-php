<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Client;
use Dataleon\Contracts\Individuals\DocumentsContract;
use Dataleon\Core\Conversion;
use Dataleon\Individuals\Documents\DocumentUploadParams\DocumentType;
use Dataleon\RequestOptions;

final class DocumentsService implements DocumentsContract
{
    public function __construct(private Client $client) {}

    /**
     * Get documents to an individuals.
     */
    public function list(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): DocumentResponse {
        $resp = $this->client->request(
            method: 'get',
            path: ['individuals/%1$s/documents', $individualID],
            options: $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(DocumentResponse::class, value: $resp);
    }

    /**
     * Upload documents to an individual.
     *
     * @param DocumentType::* $documentType Filter by document type for upload (must be one of the allowed values)
     * @param string $file File to upload (required)
     * @param string $url URL of the file to upload (either `file` or `url` is required)
     */
    public function upload(
        string $individualID,
        $documentType,
        $file = null,
        $url = null,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument {
        [$parsed, $options] = DocumentUploadParams::parseRequest(
            ['documentType' => $documentType, 'file' => $file, 'url' => $url],
            $requestOptions,
        );
        $resp = $this->client->request(
            method: 'post',
            path: ['individuals/%1$s/documents', $individualID],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(GenericDocument::class, value: $resp);
    }
}

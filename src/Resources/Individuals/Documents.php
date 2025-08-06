<?php

declare(strict_types=1);

namespace Dataleon\Resources\Individuals;

use Dataleon\Client;
use Dataleon\Contracts\Individuals\DocumentsContract;
use Dataleon\Core\Conversion;
use Dataleon\Models\Individuals\DocumentResponse;
use Dataleon\Models\Individuals\GenericDocument;
use Dataleon\Parameters\Individuals\DocumentUploadParams;
use Dataleon\Parameters\Individuals\DocumentUploadParams\DocumentType;
use Dataleon\RequestOptions;

final class Documents implements DocumentsContract
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
     * @param array{
     *   documentType: DocumentType::*, file?: string, url?: string
     * }|DocumentUploadParams $params
     */
    public function upload(
        string $individualID,
        array|DocumentUploadParams $params,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument {
        [$parsed, $options] = DocumentUploadParams::parseRequest(
            $params,
            $requestOptions
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

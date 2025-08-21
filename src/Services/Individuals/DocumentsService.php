<?php

declare(strict_types=1);

namespace Dataleon\Services\Individuals;

use Dataleon\Client;
use Dataleon\Contracts\Individuals\DocumentsContract;
use Dataleon\Core\Conversion;
use Dataleon\Core\Util;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\DocumentUploadParams;
use Dataleon\Individuals\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Individuals\Documents\GenericDocument;
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
        $args = ['documentType' => $documentType, 'file' => $file, 'url' => $url];
        $args = Util::array_filter_null($args, ['file', 'url']);
        [$parsed, $options] = DocumentUploadParams::parseRequest(
            $args,
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

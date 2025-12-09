<?php

declare(strict_types=1);

namespace Dataleon\Services\Individuals;

use Dataleon\Client;
use Dataleon\Core\Contracts\BaseResponse;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\DocumentUploadParams;
use Dataleon\Individuals\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\Individuals\DocumentsContract;

final class DocumentsService implements DocumentsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get documents to an individuals
     *
     * @throws APIException
     */
    public function list(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): DocumentResponse {
        /** @var BaseResponse<DocumentResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['individuals/%1$s/documents', $individualID],
            options: $requestOptions,
            convert: DocumentResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Upload documents to an individual
     *
     * @param array{
     *   document_type: value-of<DocumentType>, file?: string, url?: string
     * }|DocumentUploadParams $params
     *
     * @throws APIException
     */
    public function upload(
        string $individualID,
        array|DocumentUploadParams $params,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument {
        [$parsed, $options] = DocumentUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<GenericDocument> */
        $response = $this->client->request(
            method: 'post',
            path: ['individuals/%1$s/documents', $individualID],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: GenericDocument::class,
        );

        return $response->parse();
    }
}

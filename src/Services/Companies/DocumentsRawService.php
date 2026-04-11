<?php

declare(strict_types=1);

namespace Dataleon\Services\Companies;

use Dataleon\Client;
use Dataleon\Companies\Documents\DocumentUploadParams;
use Dataleon\Companies\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Core\Contracts\BaseResponse;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Core\FileParam;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\Companies\DocumentsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Dataleon\RequestOptions
 */
final class DocumentsRawService implements DocumentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get documents to an company
     *
     * @param string $companyID ID of the company to upload document
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DocumentResponse>
     *
     * @throws APIException
     */
    public function list(
        string $companyID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $companyID ID of the company to upload document
     * @param array{
     *   documentType: value-of<DocumentType>, file?: string|FileParam, url?: string
     * }|DocumentUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GenericDocument>
     *
     * @throws APIException
     */
    public function upload(
        string $companyID,
        array|DocumentUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DocumentUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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

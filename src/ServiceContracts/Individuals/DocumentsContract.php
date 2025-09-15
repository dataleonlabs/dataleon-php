<?php

declare(strict_types=1);

namespace Dataleon\ServiceContracts\Individuals;

use Dataleon\Core\Exceptions\APIException;
use Dataleon\Core\Implementation\HasRawResponse;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;

use const Dataleon\Core\OMIT as omit;

interface DocumentsContract
{
    /**
     * @api
     *
     * @return DocumentResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): DocumentResponse;

    /**
     * @api
     *
     * @return DocumentResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $individualID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): DocumentResponse;

    /**
     * @api
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
        string $individualID,
        $documentType,
        $file = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument;

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
        string $individualID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument;
}

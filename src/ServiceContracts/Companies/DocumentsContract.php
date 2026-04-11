<?php

declare(strict_types=1);

namespace Dataleon\ServiceContracts\Companies;

use Dataleon\Companies\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Core\FileParam;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Dataleon\RequestOptions
 */
interface DocumentsContract
{
    /**
     * @api
     *
     * @param string $companyID ID of the company to upload document
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $companyID,
        RequestOptions|array|null $requestOptions = null
    ): DocumentResponse;

    /**
     * @api
     *
     * @param string $companyID ID of the company to upload document
     * @param DocumentType|value-of<DocumentType> $documentType Filter by document type for upload (must be one of the allowed values)
     * @param string|FileParam $file File to upload (required)
     * @param string $url URL of the file to upload (either `file` or `url` is required)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upload(
        string $companyID,
        DocumentType|string $documentType,
        string|FileParam|null $file = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): GenericDocument;
}

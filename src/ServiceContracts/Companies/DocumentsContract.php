<?php

declare(strict_types=1);

namespace Dataleon\ServiceContracts\Companies;

use Dataleon\Companies\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Core\Implementation\HasRawResponse;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;

use const Dataleon\Core\OMIT as omit;

interface DocumentsContract
{
    /**
     * @api
     *
     * @return DocumentResponse<HasRawResponse>
     */
    public function list(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): DocumentResponse;

    /**
     * @api
     *
     * @param DocumentType|value-of<DocumentType> $documentType Filter by document type for upload (must be one of the allowed values)
     * @param string $file File to upload (required)
     * @param string $url URL of the file to upload (either `file` or `url` is required)
     *
     * @return GenericDocument<HasRawResponse>
     */
    public function upload(
        string $companyID,
        $documentType,
        $file = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument;
}

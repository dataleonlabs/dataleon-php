<?php

declare(strict_types=1);

namespace Dataleon\Contracts\Companies;

use Dataleon\Companies\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;

interface DocumentsContract
{
    public function list(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): DocumentResponse;

    /**
     * @param DocumentType::* $documentType Filter by document type for upload (must be one of the allowed values)
     * @param string $file File to upload (required)
     * @param string $url URL of the file to upload (either `file` or `url` is required)
     */
    public function upload(
        string $companyID,
        $documentType,
        $file = null,
        $url = null,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument;
}

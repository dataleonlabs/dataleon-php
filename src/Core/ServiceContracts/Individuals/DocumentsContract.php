<?php

declare(strict_types=1);

namespace Dataleon\Core\ServiceContracts\Individuals;

use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;

use const Dataleon\Core\OMIT as omit;

interface DocumentsContract
{
    /**
     * @api
     */
    public function list(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): DocumentResponse;

    /**
     * @api
     *
     * @param DocumentType::* $documentType Filter by document type for upload (must be one of the allowed values)
     * @param string $file File to upload (required)
     * @param string $url URL of the file to upload (either `file` or `url` is required)
     */
    public function upload(
        string $individualID,
        $documentType,
        $file = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument;
}

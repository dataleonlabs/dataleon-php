<?php

declare(strict_types=1);

namespace Dataleon\Contracts\Companies;

use Dataleon\Models\Individuals\DocumentResponse;
use Dataleon\Models\Individuals\GenericDocument;
use Dataleon\Parameters\Companies\DocumentUploadParams;
use Dataleon\Parameters\Companies\DocumentUploadParams\DocumentType;
use Dataleon\RequestOptions;

interface DocumentsContract
{
    public function list(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): DocumentResponse;

    /**
     * @param array{
     *   documentType: DocumentType::*, file?: string, url?: string
     * }|DocumentUploadParams $params
     */
    public function upload(
        string $companyID,
        array|DocumentUploadParams $params,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument;
}

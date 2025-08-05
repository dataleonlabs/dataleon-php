<?php

declare(strict_types=1);

namespace Dataleon\Contracts\Individuals;

use Dataleon\Models\Individuals\DocumentResponse;
use Dataleon\Models\Individuals\GenericDocument;
use Dataleon\Parameters\Individuals\DocumentUploadParam;
use Dataleon\Parameters\Individuals\DocumentUploadParam\DocumentType;
use Dataleon\RequestOptions;

interface DocumentsContract
{
    public function list(
        string $individualID,
        ?RequestOptions $requestOptions = null
    ): DocumentResponse;

    /**
     * @param array{
     *   documentType: DocumentType::*, file?: string, url?: string
     * }|DocumentUploadParam $params
     */
    public function upload(
        string $individualID,
        array|DocumentUploadParam $params,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument;
}

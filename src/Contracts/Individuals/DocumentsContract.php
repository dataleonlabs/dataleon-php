<?php

declare(strict_types=1);

namespace Dataleon\Contracts\Individuals;

use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\DocumentUploadParams;
use Dataleon\Individuals\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Individuals\Documents\GenericDocument;
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
     * }|DocumentUploadParams $params
     */
    public function upload(
        string $individualID,
        array|DocumentUploadParams $params,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument;
}

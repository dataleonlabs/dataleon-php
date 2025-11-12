<?php

declare(strict_types=1);

namespace Dataleon\ServiceContracts\Individuals;

use Dataleon\Core\Exceptions\APIException;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\DocumentUploadParams;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;

interface DocumentsContract
{
    /**
     * @api
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
     * @param array<mixed>|DocumentUploadParams $params
     *
     * @throws APIException
     */
    public function upload(
        string $individualID,
        array|DocumentUploadParams $params,
        ?RequestOptions $requestOptions = null,
    ): GenericDocument;
}

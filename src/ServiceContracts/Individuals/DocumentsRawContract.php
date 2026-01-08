<?php

declare(strict_types=1);

namespace Dataleon\ServiceContracts\Individuals;

use Dataleon\Core\Contracts\BaseResponse;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\DocumentUploadParams;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Dataleon\RequestOptions
 */
interface DocumentsRawContract
{
    /**
     * @api
     *
     * @param string $individualID ID of the individual to upload document
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DocumentResponse>
     *
     * @throws APIException
     */
    public function list(
        string $individualID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $individualID ID of the individual to upload document
     * @param array<string,mixed>|DocumentUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GenericDocument>
     *
     * @throws APIException
     */
    public function upload(
        string $individualID,
        array|DocumentUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}

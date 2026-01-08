<?php

declare(strict_types=1);

namespace Dataleon\ServiceContracts\Companies;

use Dataleon\Companies\Documents\DocumentUploadParams;
use Dataleon\Core\Contracts\BaseResponse;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Individuals\Documents\DocumentResponse;
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
     * @param string $companyID ID of the company to upload document
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DocumentResponse>
     *
     * @throws APIException
     */
    public function list(
        string $companyID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $companyID ID of the company to upload document
     * @param array<string,mixed>|DocumentUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GenericDocument>
     *
     * @throws APIException
     */
    public function upload(
        string $companyID,
        array|DocumentUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}

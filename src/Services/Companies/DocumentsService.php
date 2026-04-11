<?php

declare(strict_types=1);

namespace Dataleon\Services\Companies;

use Dataleon\Client;
use Dataleon\Companies\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Core\FileParam;
use Dataleon\Core\Util;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\Companies\DocumentsContract;

/**
 * @phpstan-import-type RequestOpts from \Dataleon\RequestOptions
 */
final class DocumentsService implements DocumentsContract
{
    /**
     * @api
     */
    public DocumentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DocumentsRawService($client);
    }

    /**
     * @api
     *
     * Get documents to an company
     *
     * @param string $companyID ID of the company to upload document
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $companyID,
        RequestOptions|array|null $requestOptions = null
    ): DocumentResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($companyID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Upload documents to an company
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
    ): GenericDocument {
        $params = Util::removeNulls(
            ['documentType' => $documentType, 'file' => $file, 'url' => $url]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upload($companyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

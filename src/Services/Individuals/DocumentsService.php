<?php

declare(strict_types=1);

namespace Dataleon\Services\Individuals;

use Dataleon\Client;
use Dataleon\Core\Exceptions\APIException;
use Dataleon\Core\FileParam;
use Dataleon\Core\Util;
use Dataleon\Individuals\Documents\DocumentResponse;
use Dataleon\Individuals\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\RequestOptions;
use Dataleon\ServiceContracts\Individuals\DocumentsContract;

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
     * Get documents to an individuals
     *
     * @param string $individualID ID of the individual to upload document
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $individualID,
        RequestOptions|array|null $requestOptions = null
    ): DocumentResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($individualID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Upload documents to an individual
     *
     * @param string $individualID ID of the individual to upload document
     * @param DocumentType|value-of<DocumentType> $documentType Filter by document type for upload (must be one of the allowed values)
     * @param string|FileParam $file File to upload (required)
     * @param string $url URL of the file to upload (either `file` or `url` is required)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upload(
        string $individualID,
        DocumentType|string $documentType,
        string|FileParam|null $file = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): GenericDocument {
        $params = Util::removeNulls(
            ['documentType' => $documentType, 'file' => $file, 'url' => $url]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upload($individualID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

<?php

declare(strict_types=1);

namespace Dataleon\Companies\Documents;

use Dataleon\Companies\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DocumentUploadParams); // set properties as needed
 * $client->companies.documents->upload(...$params->toArray());
 * ```
 * Upload documents to an company.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->companies.documents->upload(...$params->toArray());`
 *
 * @see Dataleon\Companies\Documents->upload
 *
 * @phpstan-type document_upload_params = array{
 *   documentType: DocumentType|value-of<DocumentType>, file?: string, url?: string
 * }
 */
final class DocumentUploadParams implements BaseModel
{
    /** @use SdkModel<document_upload_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by document type for upload (must be one of the allowed values).
     *
     * @var value-of<DocumentType> $documentType
     */
    #[Api('document_type', enum: DocumentType::class)]
    public string $documentType;

    /**
     * File to upload (required).
     */
    #[Api(optional: true)]
    public ?string $file;

    /**
     * URL of the file to upload (either `file` or `url` is required).
     */
    #[Api(optional: true)]
    public ?string $url;

    /**
     * `new DocumentUploadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DocumentUploadParams::with(documentType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DocumentUploadParams)->withDocumentType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DocumentType|value-of<DocumentType> $documentType
     */
    public static function with(
        DocumentType|string $documentType,
        ?string $file = null,
        ?string $url = null
    ): self {
        $obj = new self;

        $obj->documentType = $documentType instanceof DocumentType ? $documentType->value : $documentType;

        null !== $file && $obj->file = $file;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    /**
     * Filter by document type for upload (must be one of the allowed values).
     *
     * @param DocumentType|value-of<DocumentType> $documentType
     */
    public function withDocumentType(DocumentType|string $documentType): self
    {
        $obj = clone $this;
        $obj->documentType = $documentType instanceof DocumentType ? $documentType->value : $documentType;

        return $obj;
    }

    /**
     * File to upload (required).
     */
    public function withFile(string $file): self
    {
        $obj = clone $this;
        $obj->file = $file;

        return $obj;
    }

    /**
     * URL of the file to upload (either `file` or `url` is required).
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}

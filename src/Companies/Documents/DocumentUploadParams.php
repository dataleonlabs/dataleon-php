<?php

declare(strict_types=1);

namespace Dataleon\Companies\Documents;

use Dataleon\Companies\Documents\DocumentUploadParams\DocumentType;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Concerns\Params;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Upload documents to an company.
 *
 * @phpstan-type upload_params = array{
 *   documentType: DocumentType::*, file?: string, url?: string
 * }
 */
final class DocumentUploadParams implements BaseModel
{
    use Model;
    use Params;

    /**
     * Filter by document type for upload (must be one of the allowed values).
     *
     * @var DocumentType::* $documentType
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
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DocumentType::* $documentType
     */
    public static function with(
        string $documentType,
        ?string $file = null,
        ?string $url = null
    ): self {
        $obj = new self;

        $obj->documentType = $documentType;

        null !== $file && $obj->file = $file;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    /**
     * Filter by document type for upload (must be one of the allowed values).
     *
     * @param DocumentType::* $documentType
     */
    public function withDocumentType(string $documentType): self
    {
        $obj = clone $this;
        $obj->documentType = $documentType;

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

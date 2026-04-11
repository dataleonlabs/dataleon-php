<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Attributes\Required;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\FileParam;
use Dataleon\Individuals\Documents\DocumentUploadParams\DocumentType;

/**
 * Upload documents to an individual.
 *
 * @see Dataleon\Services\Individuals\DocumentsService::upload()
 *
 * @phpstan-type DocumentUploadParamsShape = array{
 *   documentType: DocumentType|value-of<DocumentType>,
 *   file?: string|null|FileParam,
 *   url?: string|null,
 * }
 */
final class DocumentUploadParams implements BaseModel
{
    /** @use SdkModel<DocumentUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by document type for upload (must be one of the allowed values).
     *
     * @var value-of<DocumentType> $documentType
     */
    #[Required('document_type', enum: DocumentType::class)]
    public string $documentType;

    /**
     * File to upload (required).
     */
    #[Optional]
    public ?string $file;

    /**
     * URL of the file to upload (either `file` or `url` is required).
     */
    #[Optional]
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
        string|FileParam|null $file = null,
        ?string $url = null,
    ): self {
        $self = new self;

        $self['documentType'] = $documentType;

        null !== $file && $self['file'] = $file;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * Filter by document type for upload (must be one of the allowed values).
     *
     * @param DocumentType|value-of<DocumentType> $documentType
     */
    public function withDocumentType(DocumentType|string $documentType): self
    {
        $self = clone $this;
        $self['documentType'] = $documentType;

        return $self;
    }

    /**
     * File to upload (required).
     */
    public function withFile(string|FileParam $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    /**
     * URL of the file to upload (either `file` or `url` is required).
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}

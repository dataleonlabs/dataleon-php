<?php

declare(strict_types=1);

namespace Dataleon\Models\Individuals;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Concerns\Params;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Models\Individuals\DocumentUploadParams\DocumentType;

/**
 * Upload documents to an individual.
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
    public static function new(
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
}

<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\DocumentResponse\Document;

/**
 * @phpstan-type DocumentResponseShape = array{
 *   documents?: list<Document>|null, totalDocument?: int|null
 * }
 */
final class DocumentResponse implements BaseModel
{
    /** @use SdkModel<DocumentResponseShape> */
    use SdkModel;

    /**
     * List of documents associated with the response.
     *
     * @var list<Document>|null $documents
     */
    #[Optional(list: Document::class)]
    public ?array $documents;

    /**
     * Total number of documents available in the response.
     */
    #[Optional('total_document')]
    public ?int $totalDocument;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Document|array{
     *   id?: string|null,
     *   documentType?: string|null,
     *   filename?: string|null,
     *   name?: string|null,
     *   signedURL?: string|null,
     *   state?: string|null,
     *   status?: string|null,
     *   workspaceID?: string|null,
     * }> $documents
     */
    public static function with(
        ?array $documents = null,
        ?int $totalDocument = null
    ): self {
        $obj = new self;

        null !== $documents && $obj['documents'] = $documents;
        null !== $totalDocument && $obj['totalDocument'] = $totalDocument;

        return $obj;
    }

    /**
     * List of documents associated with the response.
     *
     * @param list<Document|array{
     *   id?: string|null,
     *   documentType?: string|null,
     *   filename?: string|null,
     *   name?: string|null,
     *   signedURL?: string|null,
     *   state?: string|null,
     *   status?: string|null,
     *   workspaceID?: string|null,
     * }> $documents
     */
    public function withDocuments(array $documents): self
    {
        $obj = clone $this;
        $obj['documents'] = $documents;

        return $obj;
    }

    /**
     * Total number of documents available in the response.
     */
    public function withTotalDocument(int $totalDocument): self
    {
        $obj = clone $this;
        $obj['totalDocument'] = $totalDocument;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\DocumentResponse\Document;

/**
 * @phpstan-type DocumentResponseShape = array{
 *   documents?: list<Document>|null, total_document?: int|null
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
    #[Api(list: Document::class, optional: true)]
    public ?array $documents;

    /**
     * Total number of documents available in the response.
     */
    #[Api(optional: true)]
    public ?int $total_document;

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
     *   document_type?: string|null,
     *   filename?: string|null,
     *   name?: string|null,
     *   signed_url?: string|null,
     *   state?: string|null,
     *   status?: string|null,
     *   workspace_id?: string|null,
     * }> $documents
     */
    public static function with(
        ?array $documents = null,
        ?int $total_document = null
    ): self {
        $obj = new self;

        null !== $documents && $obj['documents'] = $documents;
        null !== $total_document && $obj['total_document'] = $total_document;

        return $obj;
    }

    /**
     * List of documents associated with the response.
     *
     * @param list<Document|array{
     *   id?: string|null,
     *   document_type?: string|null,
     *   filename?: string|null,
     *   name?: string|null,
     *   signed_url?: string|null,
     *   state?: string|null,
     *   status?: string|null,
     *   workspace_id?: string|null,
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
        $obj['total_document'] = $totalDocument;

        return $obj;
    }
}

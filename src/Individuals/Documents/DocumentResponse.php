<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\DocumentResponse\Document;

/**
 * @phpstan-import-type DocumentShape from \Dataleon\Individuals\Documents\DocumentResponse\Document
 *
 * @phpstan-type DocumentResponseShape = array{
 *   documents?: list<DocumentShape>|null, totalDocument?: int|null
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
     * @param list<DocumentShape> $documents
     */
    public static function with(
        ?array $documents = null,
        ?int $totalDocument = null
    ): self {
        $self = new self;

        null !== $documents && $self['documents'] = $documents;
        null !== $totalDocument && $self['totalDocument'] = $totalDocument;

        return $self;
    }

    /**
     * List of documents associated with the response.
     *
     * @param list<DocumentShape> $documents
     */
    public function withDocuments(array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }

    /**
     * Total number of documents available in the response.
     */
    public function withTotalDocument(int $totalDocument): self
    {
        $self = clone $this;
        $self['totalDocument'] = $totalDocument;

        return $self;
    }
}

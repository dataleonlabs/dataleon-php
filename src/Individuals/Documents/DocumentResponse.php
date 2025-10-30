<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkResponse;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\Contracts\ResponseConverter;
use Dataleon\Individuals\Documents\DocumentResponse\Document;

/**
 * @phpstan-type DocumentResponseShape = array{
 *   documents?: list<Document>, totalDocument?: int
 * }
 */
final class DocumentResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<DocumentResponseShape> */
    use SdkModel;

    use SdkResponse;

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
    #[Api('total_document', optional: true)]
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
     * @param list<Document> $documents
     */
    public static function with(
        ?array $documents = null,
        ?int $totalDocument = null
    ): self {
        $obj = new self;

        null !== $documents && $obj->documents = $documents;
        null !== $totalDocument && $obj->totalDocument = $totalDocument;

        return $obj;
    }

    /**
     * List of documents associated with the response.
     *
     * @param list<Document> $documents
     */
    public function withDocuments(array $documents): self
    {
        $obj = clone $this;
        $obj->documents = $documents;

        return $obj;
    }

    /**
     * Total number of documents available in the response.
     */
    public function withTotalDocument(int $totalDocument): self
    {
        $obj = clone $this;
        $obj->totalDocument = $totalDocument;

        return $obj;
    }
}

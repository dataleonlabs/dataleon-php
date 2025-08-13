<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Individuals\Documents\DocumentResponse\Document;

/**
 * @phpstan-type document_response_alias = array{
 *   documents?: list<Document>, totalDocument?: int
 * }
 */
final class DocumentResponse implements BaseModel
{
    use Model;

    /**
     * List of documents associated with the response.
     *
     * @var null|list<Document> $documents
     */
    #[Api(type: new ListOf(Document::class), optional: true)]
    public ?array $documents;

    /**
     * Total number of documents available in the response.
     */
    #[Api('total_document', optional: true)]
    public ?int $totalDocument;

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
     * @param null|list<Document> $documents
     */
    public static function from(
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
    public function setDocuments(array $documents): self
    {
        $this->documents = $documents;

        return $this;
    }

    /**
     * Total number of documents available in the response.
     */
    public function setTotalDocument(int $totalDocument): self
    {
        $this->totalDocument = $totalDocument;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Individuals\Documents\GenericDocument\Table;
use Dataleon\Individuals\Documents\GenericDocument\Value;
use Dataleon\Shared\Check;

/**
 * Represents a general document with metadata, verification checks, and extracted data.
 *
 * @phpstan-type generic_document_alias = array{
 *   id?: string,
 *   checks?: list<Check>,
 *   createdAt?: \DateTimeInterface,
 *   documentType?: string,
 *   name?: string,
 *   signedURL?: string,
 *   state?: string,
 *   status?: string,
 *   tables?: list<Table>,
 *   values?: list<Value>,
 * }
 */
final class GenericDocument implements BaseModel
{
    use SdkModel;

    /**
     * Unique identifier of the document.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * List of verification checks performed on the document.
     *
     * @var null|list<Check> $checks
     */
    #[Api(type: new ListOf(Check::class), optional: true)]
    public ?array $checks;

    /**
     * Timestamp when the document was created or uploaded.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Type/category of the document.
     */
    #[Api('document_type', optional: true)]
    public ?string $documentType;

    /**
     * Name or label for the document.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Signed URL for accessing the document file.
     */
    #[Api('signed_url', optional: true)]
    public ?string $signedURL;

    /**
     * Current processing state of the document (e.g., WAITING, PROCESSED).
     */
    #[Api(optional: true)]
    public ?string $state;

    /**
     * Status of the document reception or approval.
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * List of tables extracted from the document, each containing operations.
     *
     * @var null|list<Table> $tables
     */
    #[Api(type: new ListOf(Table::class), optional: true)]
    public ?array $tables;

    /**
     * Extracted key-value pairs from the document, including confidence scores.
     *
     * @var null|list<Value> $values
     */
    #[Api(type: new ListOf(Value::class), optional: true)]
    public ?array $values;

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
     * @param null|list<Check> $checks
     * @param null|list<Table> $tables
     * @param null|list<Value> $values
     */
    public static function with(
        ?string $id = null,
        ?array $checks = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $documentType = null,
        ?string $name = null,
        ?string $signedURL = null,
        ?string $state = null,
        ?string $status = null,
        ?array $tables = null,
        ?array $values = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $checks && $obj->checks = $checks;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $documentType && $obj->documentType = $documentType;
        null !== $name && $obj->name = $name;
        null !== $signedURL && $obj->signedURL = $signedURL;
        null !== $state && $obj->state = $state;
        null !== $status && $obj->status = $status;
        null !== $tables && $obj->tables = $tables;
        null !== $values && $obj->values = $values;

        return $obj;
    }

    /**
     * Unique identifier of the document.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * List of verification checks performed on the document.
     *
     * @param list<Check> $checks
     */
    public function withChecks(array $checks): self
    {
        $obj = clone $this;
        $obj->checks = $checks;

        return $obj;
    }

    /**
     * Timestamp when the document was created or uploaded.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Type/category of the document.
     */
    public function withDocumentType(string $documentType): self
    {
        $obj = clone $this;
        $obj->documentType = $documentType;

        return $obj;
    }

    /**
     * Name or label for the document.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Signed URL for accessing the document file.
     */
    public function withSignedURL(string $signedURL): self
    {
        $obj = clone $this;
        $obj->signedURL = $signedURL;

        return $obj;
    }

    /**
     * Current processing state of the document (e.g., WAITING, PROCESSED).
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * Status of the document reception or approval.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * List of tables extracted from the document, each containing operations.
     *
     * @param list<Table> $tables
     */
    public function withTables(array $tables): self
    {
        $obj = clone $this;
        $obj->tables = $tables;

        return $obj;
    }

    /**
     * Extracted key-value pairs from the document, including confidence scores.
     *
     * @param list<Value> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj->values = $values;

        return $obj;
    }
}

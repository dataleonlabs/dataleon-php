<?php

declare(strict_types=1);

namespace Dataleon\Models\Individuals;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Models\Check;
use Dataleon\Models\Individuals\GenericDocument\Table;
use Dataleon\Models\Individuals\GenericDocument\Value;

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
    use Model;

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
    public static function new(
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
    public function setID(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * List of verification checks performed on the document.
     *
     * @param list<Check> $checks
     */
    public function setChecks(array $checks): self
    {
        $this->checks = $checks;

        return $this;
    }

    /**
     * Timestamp when the document was created or uploaded.
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Type/category of the document.
     */
    public function setDocumentType(string $documentType): self
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Name or label for the document.
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Signed URL for accessing the document file.
     */
    public function setSignedURL(string $signedURL): self
    {
        $this->signedURL = $signedURL;

        return $this;
    }

    /**
     * Current processing state of the document (e.g., WAITING, PROCESSED).
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Status of the document reception or approval.
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * List of tables extracted from the document, each containing operations.
     *
     * @param list<Table> $tables
     */
    public function setTables(array $tables): self
    {
        $this->tables = $tables;

        return $this;
    }

    /**
     * Extracted key-value pairs from the document, including confidence scores.
     *
     * @param list<Value> $values
     */
    public function setValues(array $values): self
    {
        $this->values = $values;

        return $this;
    }
}

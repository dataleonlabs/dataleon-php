<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Check;
use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\GenericDocument\Table;
use Dataleon\Individuals\Documents\GenericDocument\Value;

/**
 * Represents a general document with metadata, verification checks, and extracted data.
 *
 * @phpstan-import-type CheckShape from \Dataleon\Check
 * @phpstan-import-type TableShape from \Dataleon\Individuals\Documents\GenericDocument\Table
 * @phpstan-import-type ValueShape from \Dataleon\Individuals\Documents\GenericDocument\Value
 *
 * @phpstan-type GenericDocumentShape = array{
 *   id?: string|null,
 *   checks?: list<Check|CheckShape>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   documentType?: string|null,
 *   name?: string|null,
 *   signedURL?: string|null,
 *   state?: string|null,
 *   status?: string|null,
 *   tables?: list<Table|TableShape>|null,
 *   values?: list<Value|ValueShape>|null,
 * }
 */
final class GenericDocument implements BaseModel
{
    /** @use SdkModel<GenericDocumentShape> */
    use SdkModel;

    /**
     * Unique identifier of the document.
     */
    #[Optional]
    public ?string $id;

    /**
     * List of verification checks performed on the document.
     *
     * @var list<Check>|null $checks
     */
    #[Optional(list: Check::class)]
    public ?array $checks;

    /**
     * Timestamp when the document was created or uploaded.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Type/category of the document.
     */
    #[Optional('document_type')]
    public ?string $documentType;

    /**
     * Name or label for the document.
     */
    #[Optional]
    public ?string $name;

    /**
     * Signed URL for accessing the document file.
     */
    #[Optional('signed_url')]
    public ?string $signedURL;

    /**
     * Current processing state of the document (e.g., WAITING, PROCESSED).
     */
    #[Optional]
    public ?string $state;

    /**
     * Status of the document reception or approval.
     */
    #[Optional]
    public ?string $status;

    /**
     * List of tables extracted from the document, each containing operations.
     *
     * @var list<Table>|null $tables
     */
    #[Optional(list: Table::class)]
    public ?array $tables;

    /**
     * Extracted key-value pairs from the document, including confidence scores.
     *
     * @var list<Value>|null $values
     */
    #[Optional(list: Value::class)]
    public ?array $values;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Check|CheckShape>|null $checks
     * @param list<Table|TableShape>|null $tables
     * @param list<Value|ValueShape>|null $values
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $checks && $self['checks'] = $checks;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $documentType && $self['documentType'] = $documentType;
        null !== $name && $self['name'] = $name;
        null !== $signedURL && $self['signedURL'] = $signedURL;
        null !== $state && $self['state'] = $state;
        null !== $status && $self['status'] = $status;
        null !== $tables && $self['tables'] = $tables;
        null !== $values && $self['values'] = $values;

        return $self;
    }

    /**
     * Unique identifier of the document.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * List of verification checks performed on the document.
     *
     * @param list<Check|CheckShape> $checks
     */
    public function withChecks(array $checks): self
    {
        $self = clone $this;
        $self['checks'] = $checks;

        return $self;
    }

    /**
     * Timestamp when the document was created or uploaded.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Type/category of the document.
     */
    public function withDocumentType(string $documentType): self
    {
        $self = clone $this;
        $self['documentType'] = $documentType;

        return $self;
    }

    /**
     * Name or label for the document.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Signed URL for accessing the document file.
     */
    public function withSignedURL(string $signedURL): self
    {
        $self = clone $this;
        $self['signedURL'] = $signedURL;

        return $self;
    }

    /**
     * Current processing state of the document (e.g., WAITING, PROCESSED).
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Status of the document reception or approval.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * List of tables extracted from the document, each containing operations.
     *
     * @param list<Table|TableShape> $tables
     */
    public function withTables(array $tables): self
    {
        $self = clone $this;
        $self['tables'] = $tables;

        return $self;
    }

    /**
     * Extracted key-value pairs from the document, including confidence scores.
     *
     * @param list<Value|ValueShape> $values
     */
    public function withValues(array $values): self
    {
        $self = clone $this;
        $self['values'] = $values;

        return $self;
    }
}

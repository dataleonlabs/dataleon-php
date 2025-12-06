<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Check;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkResponse;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\Contracts\ResponseConverter;
use Dataleon\Individuals\Documents\GenericDocument\Table;
use Dataleon\Individuals\Documents\GenericDocument\Value;

/**
 * Represents a general document with metadata, verification checks, and extracted data.
 *
 * @phpstan-type GenericDocumentShape = array{
 *   id?: string|null,
 *   checks?: list<Check>|null,
 *   created_at?: \DateTimeInterface|null,
 *   document_type?: string|null,
 *   name?: string|null,
 *   signed_url?: string|null,
 *   state?: string|null,
 *   status?: string|null,
 *   tables?: list<Table>|null,
 *   values?: list<Value>|null,
 * }
 */
final class GenericDocument implements BaseModel, ResponseConverter
{
    /** @use SdkModel<GenericDocumentShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Unique identifier of the document.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * List of verification checks performed on the document.
     *
     * @var list<Check>|null $checks
     */
    #[Api(list: Check::class, optional: true)]
    public ?array $checks;

    /**
     * Timestamp when the document was created or uploaded.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Type/category of the document.
     */
    #[Api(optional: true)]
    public ?string $document_type;

    /**
     * Name or label for the document.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Signed URL for accessing the document file.
     */
    #[Api(optional: true)]
    public ?string $signed_url;

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
     * @var list<Table>|null $tables
     */
    #[Api(list: Table::class, optional: true)]
    public ?array $tables;

    /**
     * Extracted key-value pairs from the document, including confidence scores.
     *
     * @var list<Value>|null $values
     */
    #[Api(list: Value::class, optional: true)]
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
     * @param list<Check|array{
     *   masked?: bool|null,
     *   message?: string|null,
     *   name?: string|null,
     *   validate?: bool|null,
     *   weight?: int|null,
     * }> $checks
     * @param list<Table|array{operation?: list<mixed>|null}> $tables
     * @param list<Value|array{
     *   confidence?: float|null, name?: string|null, value?: list<int>|null
     * }> $values
     */
    public static function with(
        ?string $id = null,
        ?array $checks = null,
        ?\DateTimeInterface $created_at = null,
        ?string $document_type = null,
        ?string $name = null,
        ?string $signed_url = null,
        ?string $state = null,
        ?string $status = null,
        ?array $tables = null,
        ?array $values = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $checks && $obj['checks'] = $checks;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $document_type && $obj['document_type'] = $document_type;
        null !== $name && $obj['name'] = $name;
        null !== $signed_url && $obj['signed_url'] = $signed_url;
        null !== $state && $obj['state'] = $state;
        null !== $status && $obj['status'] = $status;
        null !== $tables && $obj['tables'] = $tables;
        null !== $values && $obj['values'] = $values;

        return $obj;
    }

    /**
     * Unique identifier of the document.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * List of verification checks performed on the document.
     *
     * @param list<Check|array{
     *   masked?: bool|null,
     *   message?: string|null,
     *   name?: string|null,
     *   validate?: bool|null,
     *   weight?: int|null,
     * }> $checks
     */
    public function withChecks(array $checks): self
    {
        $obj = clone $this;
        $obj['checks'] = $checks;

        return $obj;
    }

    /**
     * Timestamp when the document was created or uploaded.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Type/category of the document.
     */
    public function withDocumentType(string $documentType): self
    {
        $obj = clone $this;
        $obj['document_type'] = $documentType;

        return $obj;
    }

    /**
     * Name or label for the document.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Signed URL for accessing the document file.
     */
    public function withSignedURL(string $signedURL): self
    {
        $obj = clone $this;
        $obj['signed_url'] = $signedURL;

        return $obj;
    }

    /**
     * Current processing state of the document (e.g., WAITING, PROCESSED).
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * Status of the document reception or approval.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * List of tables extracted from the document, each containing operations.
     *
     * @param list<Table|array{operation?: list<mixed>|null}> $tables
     */
    public function withTables(array $tables): self
    {
        $obj = clone $this;
        $obj['tables'] = $tables;

        return $obj;
    }

    /**
     * Extracted key-value pairs from the document, including confidence scores.
     *
     * @param list<Value|array{
     *   confidence?: float|null, name?: string|null, value?: list<int>|null
     * }> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj['values'] = $values;

        return $obj;
    }
}

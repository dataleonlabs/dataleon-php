<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Digital certificate associated with the individual, if any.
 *
 * @phpstan-type certificat_alias = array{
 *   id?: string|null, createdAt?: \DateTimeInterface|null, filename?: string|null
 * }
 */
final class Certificat implements BaseModel
{
    /** @use SdkModel<certificat_alias> */
    use SdkModel;

    /**
     * Unique identifier for the certificate.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Timestamp when the certificate was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Name of the certificate file.
     */
    #[Api(optional: true)]
    public ?string $filename;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $filename = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $filename && $obj->filename = $filename;

        return $obj;
    }

    /**
     * Unique identifier for the certificate.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Timestamp when the certificate was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Name of the certificate file.
     */
    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }
}

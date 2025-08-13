<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Digital certificate associated with the individual, if any.
 *
 * @phpstan-type certificat_alias = array{
 *   id?: string, createdAt?: \DateTimeInterface, filename?: string
 * }
 */
final class Certificat implements BaseModel
{
    use Model;

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
    public static function from(
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
    public function setID(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Timestamp when the certificate was created.
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Name of the certificate file.
     */
    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }
}

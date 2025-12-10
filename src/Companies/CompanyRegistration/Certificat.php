<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Digital certificate associated with the company, if any, including its creation timestamp and filename.
 *
 * @phpstan-type CertificatShape = array{
 *   id?: string|null, createdAt?: \DateTimeInterface|null, filename?: string|null
 * }
 */
final class Certificat implements BaseModel
{
    /** @use SdkModel<CertificatShape> */
    use SdkModel;

    /**
     * Unique identifier for the certificate.
     */
    #[Optional]
    public ?string $id;

    /**
     * Timestamp when the certificate was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Name of the certificate file.
     */
    #[Optional]
    public ?string $filename;

    public function __construct()
    {
        $this->initialize();
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $filename && $self['filename'] = $filename;

        return $self;
    }

    /**
     * Unique identifier for the certificate.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Timestamp when the certificate was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Name of the certificate file.
     */
    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }
}

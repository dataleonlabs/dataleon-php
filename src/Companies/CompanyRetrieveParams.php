<?php

declare(strict_types=1);

namespace Dataleon\Companies;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Get a company by ID.
 *
 * @see Dataleon\Services\CompaniesService::retrieve()
 *
 * @phpstan-type CompanyRetrieveParamsShape = array{
 *   document?: bool|null, scope?: string|null
 * }
 */
final class CompanyRetrieveParams implements BaseModel
{
    /** @use SdkModel<CompanyRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Include document signed url.
     */
    #[Optional]
    public ?bool $document;

    /**
     * Scope filter (id or scope).
     */
    #[Optional]
    public ?string $scope;

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
        ?bool $document = null,
        ?string $scope = null
    ): self {
        $self = new self;

        null !== $document && $self['document'] = $document;
        null !== $scope && $self['scope'] = $scope;

        return $self;
    }

    /**
     * Include document signed url.
     */
    public function withDocument(bool $document): self
    {
        $self = clone $this;
        $self['document'] = $document;

        return $self;
    }

    /**
     * Scope filter (id or scope).
     */
    public function withScope(string $scope): self
    {
        $self = clone $this;
        $self['scope'] = $scope;

        return $self;
    }
}

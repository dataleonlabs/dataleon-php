<?php

declare(strict_types=1);

namespace Dataleon\Individuals;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Get an individual by ID.
 *
 * @see Dataleon\Individuals->retrieve
 *
 * @phpstan-type individual_retrieve_params = array{
 *   document?: bool, scope?: string
 * }
 */
final class IndividualRetrieveParams implements BaseModel
{
    /** @use SdkModel<individual_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Include document information.
     */
    #[Api(optional: true)]
    public ?bool $document;

    /**
     * Scope filter (id or scope).
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $document && $obj->document = $document;
        null !== $scope && $obj->scope = $scope;

        return $obj;
    }

    /**
     * Include document information.
     */
    public function withDocument(bool $document): self
    {
        $obj = clone $this;
        $obj->document = $document;

        return $obj;
    }

    /**
     * Scope filter (id or scope).
     */
    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj->scope = $scope;

        return $obj;
    }
}

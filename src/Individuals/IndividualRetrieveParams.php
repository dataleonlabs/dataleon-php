<?php

declare(strict_types=1);

namespace Dataleon\Individuals;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Concerns\Params;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Get an individual by ID.
 *
 * @phpstan-type retrieve_params = array{document?: bool, scope?: string}
 */
final class IndividualRetrieveParams implements BaseModel
{
    use Model;
    use Params;

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
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function from(
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
    public function setDocument(bool $document): self
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Scope filter (id or scope).
     */
    public function setScope(string $scope): self
    {
        $this->scope = $scope;

        return $this;
    }
}

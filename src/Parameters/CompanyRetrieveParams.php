<?php

declare(strict_types=1);

namespace Dataleon\Parameters;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Concerns\Params;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Get a company by ID.
 *
 * @phpstan-type retrieve_params1 = array{document?: bool, scope?: string}
 */
final class CompanyRetrieveParams implements BaseModel
{
    use Model;
    use Params;

    /**
     * Include document signed url.
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
    public static function new(
        ?bool $document = null,
        ?string $scope = null
    ): self {
        $obj = new self;

        null !== $document && $obj->document = $document;
        null !== $scope && $obj->scope = $scope;

        return $obj;
    }
}

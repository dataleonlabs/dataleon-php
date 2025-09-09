<?php

declare(strict_types=1);

namespace Dataleon\Companies;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CompanyRetrieveParams); // set properties as needed
 * $client->companies->retrieve(...$params->toArray());
 * ```
 * Get a company by ID.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->companies->retrieve(...$params->toArray());`
 *
 * @see Dataleon\Companies->retrieve
 *
 * @phpstan-type company_retrieve_params = array{document?: bool, scope?: string}
 */
final class CompanyRetrieveParams implements BaseModel
{
    /** @use SdkModel<company_retrieve_params> */
    use SdkModel;
    use SdkParams;

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
     * Include document signed url.
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

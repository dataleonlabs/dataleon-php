<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Companies\CompanyRegistration\AmlSuspicion\Status;
use Dataleon\Companies\CompanyRegistration\AmlSuspicion\Type;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Represents a record of suspicion raised during Anti-Money Laundering (AML) screening. Includes metadata such as risk score, origin, and linked watchlist types.
 *
 * @phpstan-type aml_suspicion = array{
 *   caption?: string|null,
 *   country?: string|null,
 *   gender?: string|null,
 *   relation?: string|null,
 *   schema?: string|null,
 *   score?: float|null,
 *   source?: string|null,
 *   status?: value-of<Status>|null,
 *   type?: value-of<Type>|null,
 * }
 */
final class AmlSuspicion implements BaseModel
{
    /** @use SdkModel<aml_suspicion> */
    use SdkModel;

    /**
     * Human-readable description or title for the suspicious finding.
     */
    #[Api(optional: true)]
    public ?string $caption;

    /**
     * Country associated with the suspicion (ISO 3166-1 alpha-2 code).
     */
    #[Api(optional: true)]
    public ?string $country;

    /**
     * Gender associated with the suspicion, if applicable.
     */
    #[Api(optional: true)]
    public ?string $gender;

    /**
     * Nature of the relationship between the entity and the suspicious activity (e.g., "linked", "associated").
     */
    #[Api(optional: true)]
    public ?string $relation;

    /**
     * Version of the evaluation schema or rule engine used.
     */
    #[Api(optional: true)]
    public ?string $schema;

    /**
     * Risk score between 0.0 and 1 indicating the severity of the suspicion.
     */
    #[Api(optional: true)]
    public ?float $score;

    /**
     * Source system or service providing this suspicion.
     */
    #[Api(optional: true)]
    public ?string $source;

    /**
     * Status of the suspicion review process. Possible values: "true_positive", "false_positive", "pending".
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Category of the suspicion. Possible values: "crime", "sanction", "pep", "adverse_news", "other".
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $caption = null,
        ?string $country = null,
        ?string $gender = null,
        ?string $relation = null,
        ?string $schema = null,
        ?float $score = null,
        ?string $source = null,
        Status|string|null $status = null,
        Type|string|null $type = null,
    ): self {
        $obj = new self;

        null !== $caption && $obj->caption = $caption;
        null !== $country && $obj->country = $country;
        null !== $gender && $obj->gender = $gender;
        null !== $relation && $obj->relation = $relation;
        null !== $schema && $obj->schema = $schema;
        null !== $score && $obj->score = $score;
        null !== $source && $obj->source = $source;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $type && $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * Human-readable description or title for the suspicious finding.
     */
    public function withCaption(string $caption): self
    {
        $obj = clone $this;
        $obj->caption = $caption;

        return $obj;
    }

    /**
     * Country associated with the suspicion (ISO 3166-1 alpha-2 code).
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    /**
     * Gender associated with the suspicion, if applicable.
     */
    public function withGender(string $gender): self
    {
        $obj = clone $this;
        $obj->gender = $gender;

        return $obj;
    }

    /**
     * Nature of the relationship between the entity and the suspicious activity (e.g., "linked", "associated").
     */
    public function withRelation(string $relation): self
    {
        $obj = clone $this;
        $obj->relation = $relation;

        return $obj;
    }

    /**
     * Version of the evaluation schema or rule engine used.
     */
    public function withSchema(string $schema): self
    {
        $obj = clone $this;
        $obj->schema = $schema;

        return $obj;
    }

    /**
     * Risk score between 0.0 and 1 indicating the severity of the suspicion.
     */
    public function withScore(float $score): self
    {
        $obj = clone $this;
        $obj->score = $score;

        return $obj;
    }

    /**
     * Source system or service providing this suspicion.
     */
    public function withSource(string $source): self
    {
        $obj = clone $this;
        $obj->source = $source;

        return $obj;
    }

    /**
     * Status of the suspicion review process. Possible values: "true_positive", "false_positive", "pending".
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * Category of the suspicion. Possible values: "crime", "sanction", "pep", "adverse_news", "other".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}

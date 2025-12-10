<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Individual\AmlSuspicion\Status;
use Dataleon\Individuals\Individual\AmlSuspicion\Type;

/**
 * Represents a record of suspicion raised during Anti-Money Laundering (AML) screening. Includes metadata such as risk score, origin, and linked watchlist types.
 *
 * @phpstan-type AmlSuspicionShape = array{
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
    /** @use SdkModel<AmlSuspicionShape> */
    use SdkModel;

    /**
     * Human-readable description or title for the suspicious finding.
     */
    #[Optional]
    public ?string $caption;

    /**
     * Country associated with the suspicion (ISO 3166-1 alpha-2 code).
     */
    #[Optional]
    public ?string $country;

    /**
     * Gender associated with the suspicion, if applicable.
     */
    #[Optional]
    public ?string $gender;

    /**
     * Nature of the relationship between the entity and the suspicious activity (e.g., "linked", "associated").
     */
    #[Optional]
    public ?string $relation;

    /**
     * Version of the evaluation schema or rule engine used.
     */
    #[Optional]
    public ?string $schema;

    /**
     * Risk score between 0.0 and 1 indicating the severity of the suspicion.
     */
    #[Optional]
    public ?float $score;

    /**
     * Source system or service providing this suspicion.
     */
    #[Optional]
    public ?string $source;

    /**
     * Status of the suspicion review process. Possible values: "true_positive", "false_positive", "pending".
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Category of the suspicion. Possible values: "crime", "sanction", "pep", "adverse_news", "other".
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
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
        $self = new self;

        null !== $caption && $self['caption'] = $caption;
        null !== $country && $self['country'] = $country;
        null !== $gender && $self['gender'] = $gender;
        null !== $relation && $self['relation'] = $relation;
        null !== $schema && $self['schema'] = $schema;
        null !== $score && $self['score'] = $score;
        null !== $source && $self['source'] = $source;
        null !== $status && $self['status'] = $status;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Human-readable description or title for the suspicious finding.
     */
    public function withCaption(string $caption): self
    {
        $self = clone $this;
        $self['caption'] = $caption;

        return $self;
    }

    /**
     * Country associated with the suspicion (ISO 3166-1 alpha-2 code).
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * Gender associated with the suspicion, if applicable.
     */
    public function withGender(string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    /**
     * Nature of the relationship between the entity and the suspicious activity (e.g., "linked", "associated").
     */
    public function withRelation(string $relation): self
    {
        $self = clone $this;
        $self['relation'] = $relation;

        return $self;
    }

    /**
     * Version of the evaluation schema or rule engine used.
     */
    public function withSchema(string $schema): self
    {
        $self = clone $this;
        $self['schema'] = $schema;

        return $self;
    }

    /**
     * Risk score between 0.0 and 1 indicating the severity of the suspicion.
     */
    public function withScore(float $score): self
    {
        $self = clone $this;
        $self['score'] = $score;

        return $self;
    }

    /**
     * Source system or service providing this suspicion.
     */
    public function withSource(string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * Status of the suspicion review process. Possible values: "true_positive", "false_positive", "pending".
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Category of the suspicion. Possible values: "crime", "sanction", "pep", "adverse_news", "other".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}

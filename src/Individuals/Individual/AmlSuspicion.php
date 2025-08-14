<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Individual\AmlSuspicion\Type;

/**
 * Represents a record of suspicion raised during Anti-Money Laundering (AML) screening. Includes metadata such as risk score, origin, and linked watchlist types.
 *
 * @phpstan-type aml_suspicion_alias = array{
 *   caption?: string,
 *   checked?: bool,
 *   relation?: string,
 *   schema?: string,
 *   score?: float,
 *   source?: string,
 *   type?: Type::*,
 * }
 */
final class AmlSuspicion implements BaseModel
{
    use Model;

    /**
     * Human-readable description or title for the suspicious finding.
     */
    #[Api(optional: true)]
    public ?string $caption;

    /**
     * Indicates whether this suspicion has been manually reviewed or confirmed.
     */
    #[Api(optional: true)]
    public ?bool $checked;

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
     * Risk score between 0.0 and 1.0 indicating the severity of the suspicion.
     */
    #[Api(optional: true)]
    public ?float $score;

    /**
     * URL identifying the source system or service providing this suspicion.
     */
    #[Api(optional: true)]
    public ?string $source;

    /**
     * Watchlist category associated with the suspicion. Possible values include Watchlist types like "PEP", "Sanctions", "RiskyEntity", or "Crime".
     *
     * @var null|Type::* $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param null|Type::* $type
     */
    public static function with(
        ?string $caption = null,
        ?bool $checked = null,
        ?string $relation = null,
        ?string $schema = null,
        ?float $score = null,
        ?string $source = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $caption && $obj->caption = $caption;
        null !== $checked && $obj->checked = $checked;
        null !== $relation && $obj->relation = $relation;
        null !== $schema && $obj->schema = $schema;
        null !== $score && $obj->score = $score;
        null !== $source && $obj->source = $source;
        null !== $type && $obj->type = $type;

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
     * Indicates whether this suspicion has been manually reviewed or confirmed.
     */
    public function withChecked(bool $checked): self
    {
        $obj = clone $this;
        $obj->checked = $checked;

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
     * Risk score between 0.0 and 1.0 indicating the severity of the suspicion.
     */
    public function withScore(float $score): self
    {
        $obj = clone $this;
        $obj->score = $score;

        return $obj;
    }

    /**
     * URL identifying the source system or service providing this suspicion.
     */
    public function withSource(string $source): self
    {
        $obj = clone $this;
        $obj->source = $source;

        return $obj;
    }

    /**
     * Watchlist category associated with the suspicion. Possible values include Watchlist types like "PEP", "Sanctions", "RiskyEntity", or "Crime".
     *
     * @param Type::* $type
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}

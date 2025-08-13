<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Companies\CompanyRegistration\AmlSuspicion\Type;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

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
    public static function from(
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
    public function setCaption(string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Indicates whether this suspicion has been manually reviewed or confirmed.
     */
    public function setChecked(bool $checked): self
    {
        $this->checked = $checked;

        return $this;
    }

    /**
     * Nature of the relationship between the entity and the suspicious activity (e.g., "linked", "associated").
     */
    public function setRelation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * Version of the evaluation schema or rule engine used.
     */
    public function setSchema(string $schema): self
    {
        $this->schema = $schema;

        return $this;
    }

    /**
     * Risk score between 0.0 and 1.0 indicating the severity of the suspicion.
     */
    public function setScore(float $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * URL identifying the source system or service providing this suspicion.
     */
    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Watchlist category associated with the suspicion. Possible values include Watchlist types like "PEP", "Sanctions", "RiskyEntity", or "Crime".
     *
     * @param Type::* $type
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Dataleon\Companies;

use Dataleon\Companies\CompanyListParams\State;
use Dataleon\Companies\CompanyListParams\Status;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Get all companies.
 *
 * @phpstan-type list_params = array{
 *   endDate?: \DateTimeInterface,
 *   limit?: int,
 *   offset?: int,
 *   sourceID?: string,
 *   startDate?: \DateTimeInterface,
 *   state?: State::*,
 *   status?: Status::*,
 *   workspaceID?: string,
 * }
 */
final class CompanyListParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * Filter companies created before this date (format YYYY-MM-DD).
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $endDate;

    /**
     * Number of results to return (between 1 and 100).
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * Number of results to skip (must be ≥ 0).
     */
    #[Api(optional: true)]
    public ?int $offset;

    /**
     * Filter by source ID.
     */
    #[Api(optional: true)]
    public ?string $sourceID;

    /**
     * Filter companies created after this date (format YYYY-MM-DD).
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $startDate;

    /**
     * Filter by company state (must be one of the allowed values).
     *
     * @var null|State::* $state
     */
    #[Api(enum: State::class, optional: true)]
    public ?string $state;

    /**
     * Filter by individual status (must be one of the allowed values).
     *
     * @var null|Status::* $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Filter by workspace ID.
     */
    #[Api(optional: true)]
    public ?string $workspaceID;

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
     * @param null|State::* $state
     * @param null|Status::* $status
     */
    public static function with(
        ?\DateTimeInterface $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $sourceID = null,
        ?\DateTimeInterface $startDate = null,
        ?string $state = null,
        ?string $status = null,
        ?string $workspaceID = null,
    ): self {
        $obj = new self;

        null !== $endDate && $obj->endDate = $endDate;
        null !== $limit && $obj->limit = $limit;
        null !== $offset && $obj->offset = $offset;
        null !== $sourceID && $obj->sourceID = $sourceID;
        null !== $startDate && $obj->startDate = $startDate;
        null !== $state && $obj->state = $state;
        null !== $status && $obj->status = $status;
        null !== $workspaceID && $obj->workspaceID = $workspaceID;

        return $obj;
    }

    /**
     * Filter companies created before this date (format YYYY-MM-DD).
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->endDate = $endDate;

        return $obj;
    }

    /**
     * Number of results to return (between 1 and 100).
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * Number of results to skip (must be ≥ 0).
     */
    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }

    /**
     * Filter by source ID.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj->sourceID = $sourceID;

        return $obj;
    }

    /**
     * Filter companies created after this date (format YYYY-MM-DD).
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj->startDate = $startDate;

        return $obj;
    }

    /**
     * Filter by company state (must be one of the allowed values).
     *
     * @param State::* $state
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * Filter by individual status (must be one of the allowed values).
     *
     * @param Status::* $status
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * Filter by workspace ID.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj->workspaceID = $workspaceID;

        return $obj;
    }
}

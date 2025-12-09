<?php

declare(strict_types=1);

namespace Dataleon\Individuals;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\IndividualListParams\State;
use Dataleon\Individuals\IndividualListParams\Status;

/**
 * Get all individuals.
 *
 * @see Dataleon\Services\IndividualsService::list()
 *
 * @phpstan-type IndividualListParamsShape = array{
 *   end_date?: \DateTimeInterface,
 *   limit?: int,
 *   offset?: int,
 *   source_id?: string,
 *   start_date?: \DateTimeInterface,
 *   state?: State|value-of<State>,
 *   status?: Status|value-of<Status>,
 *   workspace_id?: string,
 * }
 */
final class IndividualListParams implements BaseModel
{
    /** @use SdkModel<IndividualListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter individuals created before this date (format YYYY-MM-DD).
     */
    #[Optional]
    public ?\DateTimeInterface $end_date;

    /**
     * Number of results to return (between 1 and 100).
     */
    #[Optional]
    public ?int $limit;

    /**
     * Number of results to offset (must be ≥ 0).
     */
    #[Optional]
    public ?int $offset;

    /**
     * Filter by source ID.
     */
    #[Optional]
    public ?string $source_id;

    /**
     * Filter individuals created after this date (format YYYY-MM-DD).
     */
    #[Optional]
    public ?\DateTimeInterface $start_date;

    /**
     * Filter by individual status (must be one of the allowed values).
     *
     * @var value-of<State>|null $state
     */
    #[Optional(enum: State::class)]
    public ?string $state;

    /**
     * Filter by individual status (must be one of the allowed values).
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Filter by workspace ID.
     */
    #[Optional]
    public ?string $workspace_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param State|value-of<State> $state
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?\DateTimeInterface $end_date = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $source_id = null,
        ?\DateTimeInterface $start_date = null,
        State|string|null $state = null,
        Status|string|null $status = null,
        ?string $workspace_id = null,
    ): self {
        $obj = new self;

        null !== $end_date && $obj['end_date'] = $end_date;
        null !== $limit && $obj['limit'] = $limit;
        null !== $offset && $obj['offset'] = $offset;
        null !== $source_id && $obj['source_id'] = $source_id;
        null !== $start_date && $obj['start_date'] = $start_date;
        null !== $state && $obj['state'] = $state;
        null !== $status && $obj['status'] = $status;
        null !== $workspace_id && $obj['workspace_id'] = $workspace_id;

        return $obj;
    }

    /**
     * Filter individuals created before this date (format YYYY-MM-DD).
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['end_date'] = $endDate;

        return $obj;
    }

    /**
     * Number of results to return (between 1 and 100).
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * Number of results to offset (must be ≥ 0).
     */
    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj['offset'] = $offset;

        return $obj;
    }

    /**
     * Filter by source ID.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj['source_id'] = $sourceID;

        return $obj;
    }

    /**
     * Filter individuals created after this date (format YYYY-MM-DD).
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['start_date'] = $startDate;

        return $obj;
    }

    /**
     * Filter by individual status (must be one of the allowed values).
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * Filter by individual status (must be one of the allowed values).
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter by workspace ID.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj['workspace_id'] = $workspaceID;

        return $obj;
    }
}

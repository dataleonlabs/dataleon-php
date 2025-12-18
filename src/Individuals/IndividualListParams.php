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
 *   endDate?: string|null,
 *   limit?: int|null,
 *   offset?: int|null,
 *   sourceID?: string|null,
 *   startDate?: string|null,
 *   state?: null|State|value-of<State>,
 *   status?: null|Status|value-of<Status>,
 *   workspaceID?: string|null,
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
    public ?string $endDate;

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
    public ?string $sourceID;

    /**
     * Filter individuals created after this date (format YYYY-MM-DD).
     */
    #[Optional]
    public ?string $startDate;

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
    public ?string $workspaceID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param State|value-of<State>|null $state
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $sourceID = null,
        ?string $startDate = null,
        State|string|null $state = null,
        Status|string|null $status = null,
        ?string $workspaceID = null,
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $sourceID && $self['sourceID'] = $sourceID;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $state && $self['state'] = $state;
        null !== $status && $self['status'] = $status;
        null !== $workspaceID && $self['workspaceID'] = $workspaceID;

        return $self;
    }

    /**
     * Filter individuals created before this date (format YYYY-MM-DD).
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Number of results to return (between 1 and 100).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of results to offset (must be ≥ 0).
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Filter by source ID.
     */
    public function withSourceID(string $sourceID): self
    {
        $self = clone $this;
        $self['sourceID'] = $sourceID;

        return $self;
    }

    /**
     * Filter individuals created after this date (format YYYY-MM-DD).
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Filter by individual status (must be one of the allowed values).
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Filter by individual status (must be one of the allowed values).
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
     * Filter by workspace ID.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $self = clone $this;
        $self['workspaceID'] = $workspaceID;

        return $self;
    }
}

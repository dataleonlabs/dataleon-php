<?php

declare(strict_types=1);

namespace Dataleon\Parameters;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Concerns\Params;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Parameters\CompanyListParams\State;
use Dataleon\Parameters\CompanyListParams\Status;

/**
 * Get all companies.
 *
 * @phpstan-type list_params1 = array{
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
    use Model;
    use Params;

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
    public static function new(
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
}

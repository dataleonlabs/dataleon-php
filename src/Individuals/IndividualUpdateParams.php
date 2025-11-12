<?php

declare(strict_types=1);

namespace Dataleon\Individuals;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\IndividualUpdateParams\Person;
use Dataleon\Individuals\IndividualUpdateParams\TechnicalData;

/**
 * Update an individual by ID.
 *
 * @see Dataleon\Individuals->update
 *
 * @phpstan-type IndividualUpdateParamsShape = array{
 *   workspace_id: string,
 *   person?: Person,
 *   source_id?: string,
 *   technical_data?: TechnicalData,
 * }
 */
final class IndividualUpdateParams implements BaseModel
{
    /** @use SdkModel<IndividualUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier of the workspace where the individual is being registered.
     */
    #[Api]
    public string $workspace_id;

    /**
     * Personal information about the individual.
     */
    #[Api(optional: true)]
    public ?Person $person;

    /**
     * Optional identifier for tracking the source system or integration from your system.
     */
    #[Api(optional: true)]
    public ?string $source_id;

    /**
     * Technical metadata related to the request or processing.
     */
    #[Api(optional: true)]
    public ?TechnicalData $technical_data;

    /**
     * `new IndividualUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IndividualUpdateParams::with(workspace_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IndividualUpdateParams)->withWorkspaceID(...)
     * ```
     */
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
        string $workspace_id,
        ?Person $person = null,
        ?string $source_id = null,
        ?TechnicalData $technical_data = null,
    ): self {
        $obj = new self;

        $obj->workspace_id = $workspace_id;

        null !== $person && $obj->person = $person;
        null !== $source_id && $obj->source_id = $source_id;
        null !== $technical_data && $obj->technical_data = $technical_data;

        return $obj;
    }

    /**
     * Unique identifier of the workspace where the individual is being registered.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj->workspace_id = $workspaceID;

        return $obj;
    }

    /**
     * Personal information about the individual.
     */
    public function withPerson(Person $person): self
    {
        $obj = clone $this;
        $obj->person = $person;

        return $obj;
    }

    /**
     * Optional identifier for tracking the source system or integration from your system.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj->source_id = $sourceID;

        return $obj;
    }

    /**
     * Technical metadata related to the request or processing.
     */
    public function withTechnicalData(TechnicalData $technicalData): self
    {
        $obj = clone $this;
        $obj->technical_data = $technicalData;

        return $obj;
    }
}

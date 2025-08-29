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
 * @phpstan-type individual_update_params = array{
 *   workspaceID: string,
 *   person?: Person,
 *   sourceID?: string,
 *   technicalData?: TechnicalData,
 * }
 */
final class IndividualUpdateParams implements BaseModel
{
    /** @use SdkModel<individual_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier of the workspace where the individual is being registered.
     */
    #[Api('workspace_id')]
    public string $workspaceID;

    /**
     * Personal information about the individual.
     */
    #[Api(optional: true)]
    public ?Person $person;

    /**
     * Optional identifier for tracking the source system or integration from your system.
     */
    #[Api('source_id', optional: true)]
    public ?string $sourceID;

    /**
     * Technical metadata related to the request or processing.
     */
    #[Api('technical_data', optional: true)]
    public ?TechnicalData $technicalData;

    /**
     * `new IndividualUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IndividualUpdateParams::with(workspaceID: ...)
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
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $workspaceID,
        ?Person $person = null,
        ?string $sourceID = null,
        ?TechnicalData $technicalData = null,
    ): self {
        $obj = new self;

        $obj->workspaceID = $workspaceID;

        null !== $person && $obj->person = $person;
        null !== $sourceID && $obj->sourceID = $sourceID;
        null !== $technicalData && $obj->technicalData = $technicalData;

        return $obj;
    }

    /**
     * Unique identifier of the workspace where the individual is being registered.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj->workspaceID = $workspaceID;

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
        $obj->sourceID = $sourceID;

        return $obj;
    }

    /**
     * Technical metadata related to the request or processing.
     */
    public function withTechnicalData(TechnicalData $technicalData): self
    {
        $obj = clone $this;
        $obj->technicalData = $technicalData;

        return $obj;
    }
}

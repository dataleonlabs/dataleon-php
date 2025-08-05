<?php

declare(strict_types=1);

namespace Dataleon\Parameters;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Concerns\Params;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Parameters\IndividualCreateParam\Person;
use Dataleon\Parameters\IndividualCreateParam\TechnicalData;

/**
 * Create a new individual.
 *
 * @phpstan-type create_params = array{
 *   workspaceID: string,
 *   person?: Person,
 *   sourceID?: string,
 *   technicalData?: TechnicalData,
 * }
 */
final class IndividualCreateParam implements BaseModel
{
    use Model;
    use Params;

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
    public static function new(
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
}

<?php

declare(strict_types=1);

namespace Dataleon\Individuals;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Attributes\Required;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\IndividualCreateParams\Person;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData;

/**
 * Create a new individual.
 *
 * @see Dataleon\Services\IndividualsService::create()
 *
 * @phpstan-import-type PersonShape from \Dataleon\Individuals\IndividualCreateParams\Person
 * @phpstan-import-type TechnicalDataShape from \Dataleon\Individuals\IndividualCreateParams\TechnicalData
 *
 * @phpstan-type IndividualCreateParamsShape = array{
 *   workspaceID: string,
 *   person?: PersonShape|null,
 *   sourceID?: string|null,
 *   technicalData?: TechnicalDataShape|null,
 * }
 */
final class IndividualCreateParams implements BaseModel
{
    /** @use SdkModel<IndividualCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier of the workspace where the individual is being registered.
     */
    #[Required('workspace_id')]
    public string $workspaceID;

    /**
     * Personal information about the individual.
     */
    #[Optional]
    public ?Person $person;

    /**
     * Optional identifier for tracking the source system or integration from your system.
     */
    #[Optional('source_id')]
    public ?string $sourceID;

    /**
     * Technical metadata related to the request or processing.
     */
    #[Optional('technical_data')]
    public ?TechnicalData $technicalData;

    /**
     * `new IndividualCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IndividualCreateParams::with(workspaceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IndividualCreateParams)->withWorkspaceID(...)
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
     *
     * @param PersonShape $person
     * @param TechnicalDataShape $technicalData
     */
    public static function with(
        string $workspaceID,
        Person|array|null $person = null,
        ?string $sourceID = null,
        TechnicalData|array|null $technicalData = null,
    ): self {
        $self = new self;

        $self['workspaceID'] = $workspaceID;

        null !== $person && $self['person'] = $person;
        null !== $sourceID && $self['sourceID'] = $sourceID;
        null !== $technicalData && $self['technicalData'] = $technicalData;

        return $self;
    }

    /**
     * Unique identifier of the workspace where the individual is being registered.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $self = clone $this;
        $self['workspaceID'] = $workspaceID;

        return $self;
    }

    /**
     * Personal information about the individual.
     *
     * @param PersonShape $person
     */
    public function withPerson(Person|array $person): self
    {
        $self = clone $this;
        $self['person'] = $person;

        return $self;
    }

    /**
     * Optional identifier for tracking the source system or integration from your system.
     */
    public function withSourceID(string $sourceID): self
    {
        $self = clone $this;
        $self['sourceID'] = $sourceID;

        return $self;
    }

    /**
     * Technical metadata related to the request or processing.
     *
     * @param TechnicalDataShape $technicalData
     */
    public function withTechnicalData(TechnicalData|array $technicalData): self
    {
        $self = clone $this;
        $self['technicalData'] = $technicalData;

        return $self;
    }
}

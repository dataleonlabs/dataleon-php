<?php

declare(strict_types=1);

namespace Dataleon\Individuals;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Attributes\Required;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\IndividualCreateParams\Person;
use Dataleon\Individuals\IndividualCreateParams\Person\Gender;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData\PortalStep;

/**
 * Create a new individual.
 *
 * @see Dataleon\Services\IndividualsService::create()
 *
 * @phpstan-type IndividualCreateParamsShape = array{
 *   workspaceID: string,
 *   person?: Person|array{
 *     birthday?: string|null,
 *     email?: string|null,
 *     firstName?: string|null,
 *     gender?: value-of<Gender>|null,
 *     lastName?: string|null,
 *     maidenName?: string|null,
 *     nationality?: string|null,
 *     phoneNumber?: string|null,
 *   },
 *   sourceID?: string,
 *   technicalData?: TechnicalData|array{
 *     activeAmlSuspicions?: bool|null,
 *     callbackURL?: string|null,
 *     callbackURLNotification?: string|null,
 *     filteringScoreAmlSuspicions?: float|null,
 *     language?: string|null,
 *     portalSteps?: list<value-of<PortalStep>>|null,
 *     rawData?: bool|null,
 *   },
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
     * @param Person|array{
     *   birthday?: string|null,
     *   email?: string|null,
     *   firstName?: string|null,
     *   gender?: value-of<Gender>|null,
     *   lastName?: string|null,
     *   maidenName?: string|null,
     *   nationality?: string|null,
     *   phoneNumber?: string|null,
     * } $person
     * @param TechnicalData|array{
     *   activeAmlSuspicions?: bool|null,
     *   callbackURL?: string|null,
     *   callbackURLNotification?: string|null,
     *   filteringScoreAmlSuspicions?: float|null,
     *   language?: string|null,
     *   portalSteps?: list<value-of<PortalStep>>|null,
     *   rawData?: bool|null,
     * } $technicalData
     */
    public static function with(
        string $workspaceID,
        Person|array|null $person = null,
        ?string $sourceID = null,
        TechnicalData|array|null $technicalData = null,
    ): self {
        $obj = new self;

        $obj['workspaceID'] = $workspaceID;

        null !== $person && $obj['person'] = $person;
        null !== $sourceID && $obj['sourceID'] = $sourceID;
        null !== $technicalData && $obj['technicalData'] = $technicalData;

        return $obj;
    }

    /**
     * Unique identifier of the workspace where the individual is being registered.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj['workspaceID'] = $workspaceID;

        return $obj;
    }

    /**
     * Personal information about the individual.
     *
     * @param Person|array{
     *   birthday?: string|null,
     *   email?: string|null,
     *   firstName?: string|null,
     *   gender?: value-of<Gender>|null,
     *   lastName?: string|null,
     *   maidenName?: string|null,
     *   nationality?: string|null,
     *   phoneNumber?: string|null,
     * } $person
     */
    public function withPerson(Person|array $person): self
    {
        $obj = clone $this;
        $obj['person'] = $person;

        return $obj;
    }

    /**
     * Optional identifier for tracking the source system or integration from your system.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj['sourceID'] = $sourceID;

        return $obj;
    }

    /**
     * Technical metadata related to the request or processing.
     *
     * @param TechnicalData|array{
     *   activeAmlSuspicions?: bool|null,
     *   callbackURL?: string|null,
     *   callbackURLNotification?: string|null,
     *   filteringScoreAmlSuspicions?: float|null,
     *   language?: string|null,
     *   portalSteps?: list<value-of<PortalStep>>|null,
     *   rawData?: bool|null,
     * } $technicalData
     */
    public function withTechnicalData(TechnicalData|array $technicalData): self
    {
        $obj = clone $this;
        $obj['technicalData'] = $technicalData;

        return $obj;
    }
}

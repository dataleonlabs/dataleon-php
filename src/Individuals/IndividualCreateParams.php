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
 *   workspace_id: string,
 *   person?: Person|array{
 *     birthday?: string|null,
 *     email?: string|null,
 *     first_name?: string|null,
 *     gender?: value-of<Gender>|null,
 *     last_name?: string|null,
 *     maiden_name?: string|null,
 *     nationality?: string|null,
 *     phone_number?: string|null,
 *   },
 *   source_id?: string,
 *   technical_data?: TechnicalData|array{
 *     active_aml_suspicions?: bool|null,
 *     callback_url?: string|null,
 *     callback_url_notification?: string|null,
 *     filtering_score_aml_suspicions?: float|null,
 *     language?: string|null,
 *     portal_steps?: list<value-of<PortalStep>>|null,
 *     raw_data?: bool|null,
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
    #[Required]
    public string $workspace_id;

    /**
     * Personal information about the individual.
     */
    #[Optional]
    public ?Person $person;

    /**
     * Optional identifier for tracking the source system or integration from your system.
     */
    #[Optional]
    public ?string $source_id;

    /**
     * Technical metadata related to the request or processing.
     */
    #[Optional]
    public ?TechnicalData $technical_data;

    /**
     * `new IndividualCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IndividualCreateParams::with(workspace_id: ...)
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
     *   first_name?: string|null,
     *   gender?: value-of<Gender>|null,
     *   last_name?: string|null,
     *   maiden_name?: string|null,
     *   nationality?: string|null,
     *   phone_number?: string|null,
     * } $person
     * @param TechnicalData|array{
     *   active_aml_suspicions?: bool|null,
     *   callback_url?: string|null,
     *   callback_url_notification?: string|null,
     *   filtering_score_aml_suspicions?: float|null,
     *   language?: string|null,
     *   portal_steps?: list<value-of<PortalStep>>|null,
     *   raw_data?: bool|null,
     * } $technical_data
     */
    public static function with(
        string $workspace_id,
        Person|array|null $person = null,
        ?string $source_id = null,
        TechnicalData|array|null $technical_data = null,
    ): self {
        $obj = new self;

        $obj['workspace_id'] = $workspace_id;

        null !== $person && $obj['person'] = $person;
        null !== $source_id && $obj['source_id'] = $source_id;
        null !== $technical_data && $obj['technical_data'] = $technical_data;

        return $obj;
    }

    /**
     * Unique identifier of the workspace where the individual is being registered.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj['workspace_id'] = $workspaceID;

        return $obj;
    }

    /**
     * Personal information about the individual.
     *
     * @param Person|array{
     *   birthday?: string|null,
     *   email?: string|null,
     *   first_name?: string|null,
     *   gender?: value-of<Gender>|null,
     *   last_name?: string|null,
     *   maiden_name?: string|null,
     *   nationality?: string|null,
     *   phone_number?: string|null,
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
        $obj['source_id'] = $sourceID;

        return $obj;
    }

    /**
     * Technical metadata related to the request or processing.
     *
     * @param TechnicalData|array{
     *   active_aml_suspicions?: bool|null,
     *   callback_url?: string|null,
     *   callback_url_notification?: string|null,
     *   filtering_score_aml_suspicions?: float|null,
     *   language?: string|null,
     *   portal_steps?: list<value-of<PortalStep>>|null,
     *   raw_data?: bool|null,
     * } $technicalData
     */
    public function withTechnicalData(TechnicalData|array $technicalData): self
    {
        $obj = clone $this;
        $obj['technical_data'] = $technicalData;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Dataleon\Companies;

use Dataleon\Companies\CompanyUpdateParams\Company;
use Dataleon\Companies\CompanyUpdateParams\TechnicalData;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Update a company by ID.
 *
 * @phpstan-type company_update_params = array{
 *   company: Company,
 *   workspaceID: string,
 *   sourceID?: string,
 *   technicalData?: TechnicalData,
 * }
 */
final class CompanyUpdateParams implements BaseModel
{
    /** @use SdkModel<company_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Main information about the company being registered.
     */
    #[Api]
    public Company $company;

    /**
     * Unique identifier of the workspace in which the company is being created.
     */
    #[Api('workspace_id')]
    public string $workspaceID;

    /**
     * Optional identifier to track the origin of the request or integration from your system.
     */
    #[Api('source_id', optional: true)]
    public ?string $sourceID;

    /**
     * Technical metadata and callback configuration.
     */
    #[Api('technical_data', optional: true)]
    public ?TechnicalData $technicalData;

    /**
     * `new CompanyUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CompanyUpdateParams::with(company: ..., workspaceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CompanyUpdateParams)->withCompany(...)->withWorkspaceID(...)
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
        Company $company,
        string $workspaceID,
        ?string $sourceID = null,
        ?TechnicalData $technicalData = null,
    ): self {
        $obj = new self;

        $obj->company = $company;
        $obj->workspaceID = $workspaceID;

        null !== $sourceID && $obj->sourceID = $sourceID;
        null !== $technicalData && $obj->technicalData = $technicalData;

        return $obj;
    }

    /**
     * Main information about the company being registered.
     */
    public function withCompany(Company $company): self
    {
        $obj = clone $this;
        $obj->company = $company;

        return $obj;
    }

    /**
     * Unique identifier of the workspace in which the company is being created.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj->workspaceID = $workspaceID;

        return $obj;
    }

    /**
     * Optional identifier to track the origin of the request or integration from your system.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj->sourceID = $sourceID;

        return $obj;
    }

    /**
     * Technical metadata and callback configuration.
     */
    public function withTechnicalData(TechnicalData $technicalData): self
    {
        $obj = clone $this;
        $obj->technicalData = $technicalData;

        return $obj;
    }
}

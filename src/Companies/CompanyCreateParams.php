<?php

declare(strict_types=1);

namespace Dataleon\Companies;

use Dataleon\Companies\CompanyCreateParams\Company;
use Dataleon\Companies\CompanyCreateParams\TechnicalData;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Create a new company.
 *
 * @see Dataleon\Services\CompaniesService::create()
 *
 * @phpstan-type CompanyCreateParamsShape = array{
 *   company: Company,
 *   workspace_id: string,
 *   source_id?: string,
 *   technical_data?: TechnicalData,
 * }
 */
final class CompanyCreateParams implements BaseModel
{
    /** @use SdkModel<CompanyCreateParamsShape> */
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
    #[Api]
    public string $workspace_id;

    /**
     * Optional identifier to track the origin of the request or integration from your system.
     */
    #[Api(optional: true)]
    public ?string $source_id;

    /**
     * Technical metadata and callback configuration.
     */
    #[Api(optional: true)]
    public ?TechnicalData $technical_data;

    /**
     * `new CompanyCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CompanyCreateParams::with(company: ..., workspace_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CompanyCreateParams)->withCompany(...)->withWorkspaceID(...)
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
        Company $company,
        string $workspace_id,
        ?string $source_id = null,
        ?TechnicalData $technical_data = null,
    ): self {
        $obj = new self;

        $obj->company = $company;
        $obj->workspace_id = $workspace_id;

        null !== $source_id && $obj->source_id = $source_id;
        null !== $technical_data && $obj->technical_data = $technical_data;

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
        $obj->workspace_id = $workspaceID;

        return $obj;
    }

    /**
     * Optional identifier to track the origin of the request or integration from your system.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj->source_id = $sourceID;

        return $obj;
    }

    /**
     * Technical metadata and callback configuration.
     */
    public function withTechnicalData(TechnicalData $technicalData): self
    {
        $obj = clone $this;
        $obj->technical_data = $technicalData;

        return $obj;
    }
}

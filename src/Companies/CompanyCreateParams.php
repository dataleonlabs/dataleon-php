<?php

declare(strict_types=1);

namespace Dataleon\Companies;

use Dataleon\Companies\CompanyCreateParams\Company;
use Dataleon\Companies\CompanyCreateParams\TechnicalData;
use Dataleon\Companies\CompanyCreateParams\TechnicalData\PortalStep;
use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Attributes\Required;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Create a new company.
 *
 * @see Dataleon\Services\CompaniesService::create()
 *
 * @phpstan-type CompanyCreateParamsShape = array{
 *   company: Company|array{
 *     name: string,
 *     address?: string|null,
 *     commercial_name?: string|null,
 *     country?: string|null,
 *     email?: string|null,
 *     employer_identification_number?: string|null,
 *     legal_form?: string|null,
 *     phone_number?: string|null,
 *     registration_date?: string|null,
 *     registration_id?: string|null,
 *     share_capital?: string|null,
 *     status?: string|null,
 *     tax_identification_number?: string|null,
 *     type?: string|null,
 *     website_url?: string|null,
 *   },
 *   workspace_id: string,
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
final class CompanyCreateParams implements BaseModel
{
    /** @use SdkModel<CompanyCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Main information about the company being registered.
     */
    #[Required]
    public Company $company;

    /**
     * Unique identifier of the workspace in which the company is being created.
     */
    #[Required]
    public string $workspace_id;

    /**
     * Optional identifier to track the origin of the request or integration from your system.
     */
    #[Optional]
    public ?string $source_id;

    /**
     * Technical metadata and callback configuration.
     */
    #[Optional]
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
     *
     * @param Company|array{
     *   name: string,
     *   address?: string|null,
     *   commercial_name?: string|null,
     *   country?: string|null,
     *   email?: string|null,
     *   employer_identification_number?: string|null,
     *   legal_form?: string|null,
     *   phone_number?: string|null,
     *   registration_date?: string|null,
     *   registration_id?: string|null,
     *   share_capital?: string|null,
     *   status?: string|null,
     *   tax_identification_number?: string|null,
     *   type?: string|null,
     *   website_url?: string|null,
     * } $company
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
        Company|array $company,
        string $workspace_id,
        ?string $source_id = null,
        TechnicalData|array|null $technical_data = null,
    ): self {
        $obj = new self;

        $obj['company'] = $company;
        $obj['workspace_id'] = $workspace_id;

        null !== $source_id && $obj['source_id'] = $source_id;
        null !== $technical_data && $obj['technical_data'] = $technical_data;

        return $obj;
    }

    /**
     * Main information about the company being registered.
     *
     * @param Company|array{
     *   name: string,
     *   address?: string|null,
     *   commercial_name?: string|null,
     *   country?: string|null,
     *   email?: string|null,
     *   employer_identification_number?: string|null,
     *   legal_form?: string|null,
     *   phone_number?: string|null,
     *   registration_date?: string|null,
     *   registration_id?: string|null,
     *   share_capital?: string|null,
     *   status?: string|null,
     *   tax_identification_number?: string|null,
     *   type?: string|null,
     *   website_url?: string|null,
     * } $company
     */
    public function withCompany(Company|array $company): self
    {
        $obj = clone $this;
        $obj['company'] = $company;

        return $obj;
    }

    /**
     * Unique identifier of the workspace in which the company is being created.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj['workspace_id'] = $workspaceID;

        return $obj;
    }

    /**
     * Optional identifier to track the origin of the request or integration from your system.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj['source_id'] = $sourceID;

        return $obj;
    }

    /**
     * Technical metadata and callback configuration.
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

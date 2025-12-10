<?php

declare(strict_types=1);

namespace Dataleon\Companies;

use Dataleon\Companies\CompanyUpdateParams\Company;
use Dataleon\Companies\CompanyUpdateParams\TechnicalData;
use Dataleon\Companies\CompanyUpdateParams\TechnicalData\PortalStep;
use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Attributes\Required;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkParams;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Update a company by ID.
 *
 * @see Dataleon\Services\CompaniesService::update()
 *
 * @phpstan-type CompanyUpdateParamsShape = array{
 *   company: Company|array{
 *     name: string,
 *     address?: string|null,
 *     commercialName?: string|null,
 *     country?: string|null,
 *     email?: string|null,
 *     employerIdentificationNumber?: string|null,
 *     legalForm?: string|null,
 *     phoneNumber?: string|null,
 *     registrationDate?: string|null,
 *     registrationID?: string|null,
 *     shareCapital?: string|null,
 *     status?: string|null,
 *     taxIdentificationNumber?: string|null,
 *     type?: string|null,
 *     websiteURL?: string|null,
 *   },
 *   workspaceID: string,
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
final class CompanyUpdateParams implements BaseModel
{
    /** @use SdkModel<CompanyUpdateParamsShape> */
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
    #[Required('workspace_id')]
    public string $workspaceID;

    /**
     * Optional identifier to track the origin of the request or integration from your system.
     */
    #[Optional('source_id')]
    public ?string $sourceID;

    /**
     * Technical metadata and callback configuration.
     */
    #[Optional('technical_data')]
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
     *   commercialName?: string|null,
     *   country?: string|null,
     *   email?: string|null,
     *   employerIdentificationNumber?: string|null,
     *   legalForm?: string|null,
     *   phoneNumber?: string|null,
     *   registrationDate?: string|null,
     *   registrationID?: string|null,
     *   shareCapital?: string|null,
     *   status?: string|null,
     *   taxIdentificationNumber?: string|null,
     *   type?: string|null,
     *   websiteURL?: string|null,
     * } $company
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
        Company|array $company,
        string $workspaceID,
        ?string $sourceID = null,
        TechnicalData|array|null $technicalData = null,
    ): self {
        $self = new self;

        $self['company'] = $company;
        $self['workspaceID'] = $workspaceID;

        null !== $sourceID && $self['sourceID'] = $sourceID;
        null !== $technicalData && $self['technicalData'] = $technicalData;

        return $self;
    }

    /**
     * Main information about the company being registered.
     *
     * @param Company|array{
     *   name: string,
     *   address?: string|null,
     *   commercialName?: string|null,
     *   country?: string|null,
     *   email?: string|null,
     *   employerIdentificationNumber?: string|null,
     *   legalForm?: string|null,
     *   phoneNumber?: string|null,
     *   registrationDate?: string|null,
     *   registrationID?: string|null,
     *   shareCapital?: string|null,
     *   status?: string|null,
     *   taxIdentificationNumber?: string|null,
     *   type?: string|null,
     *   websiteURL?: string|null,
     * } $company
     */
    public function withCompany(Company|array $company): self
    {
        $self = clone $this;
        $self['company'] = $company;

        return $self;
    }

    /**
     * Unique identifier of the workspace in which the company is being created.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $self = clone $this;
        $self['workspaceID'] = $workspaceID;

        return $self;
    }

    /**
     * Optional identifier to track the origin of the request or integration from your system.
     */
    public function withSourceID(string $sourceID): self
    {
        $self = clone $this;
        $self['sourceID'] = $sourceID;

        return $self;
    }

    /**
     * Technical metadata and callback configuration.
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
        $self = clone $this;
        $self['technicalData'] = $technicalData;

        return $self;
    }
}

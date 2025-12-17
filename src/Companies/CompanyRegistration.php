<?php

declare(strict_types=1);

namespace Dataleon\Companies;

use Dataleon\Check;
use Dataleon\Companies\CompanyRegistration\AmlSuspicion;
use Dataleon\Companies\CompanyRegistration\Certificat;
use Dataleon\Companies\CompanyRegistration\Company;
use Dataleon\Companies\CompanyRegistration\Member;
use Dataleon\Companies\CompanyRegistration\Property;
use Dataleon\Companies\CompanyRegistration\Risk;
use Dataleon\Companies\CompanyRegistration\TechnicalData;
use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\GenericDocument;

/**
 * @phpstan-import-type AmlSuspicionShape from \Dataleon\Companies\CompanyRegistration\AmlSuspicion
 * @phpstan-import-type CertificatShape from \Dataleon\Companies\CompanyRegistration\Certificat
 * @phpstan-import-type CheckShape from \Dataleon\Check
 * @phpstan-import-type CompanyShape from \Dataleon\Companies\CompanyRegistration\Company
 * @phpstan-import-type GenericDocumentShape from \Dataleon\Individuals\Documents\GenericDocument
 * @phpstan-import-type MemberShape from \Dataleon\Companies\CompanyRegistration\Member
 * @phpstan-import-type PropertyShape from \Dataleon\Companies\CompanyRegistration\Property
 * @phpstan-import-type RiskShape from \Dataleon\Companies\CompanyRegistration\Risk
 * @phpstan-import-type TechnicalDataShape from \Dataleon\Companies\CompanyRegistration\TechnicalData
 *
 * @phpstan-type CompanyRegistrationShape = array{
 *   amlSuspicions?: list<AmlSuspicionShape>|null,
 *   certificat?: null|Certificat|CertificatShape,
 *   checks?: list<CheckShape>|null,
 *   company?: null|Company|CompanyShape,
 *   documents?: list<GenericDocumentShape>|null,
 *   members?: list<MemberShape>|null,
 *   portalURL?: string|null,
 *   properties?: list<PropertyShape>|null,
 *   risk?: null|Risk|RiskShape,
 *   sourceID?: string|null,
 *   technicalData?: null|TechnicalData|TechnicalDataShape,
 *   webviewURL?: string|null,
 * }
 */
final class CompanyRegistration implements BaseModel
{
    /** @use SdkModel<CompanyRegistrationShape> */
    use SdkModel;

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the company, including their details.
     *
     * @var list<AmlSuspicion>|null $amlSuspicions
     */
    #[Optional('aml_suspicions', list: AmlSuspicion::class)]
    public ?array $amlSuspicions;

    /**
     * Digital certificate associated with the company, if any, including its creation timestamp and filename.
     */
    #[Optional]
    public ?Certificat $certificat;

    /**
     * List of verification or validation checks applied to the company, including their results and messages.
     *
     * @var list<Check>|null $checks
     */
    #[Optional(list: Check::class)]
    public ?array $checks;

    /**
     * Main information about the company being registered, including legal name, registration ID, and address.
     */
    #[Optional]
    public ?Company $company;

    /**
     * All documents submitted or associated with the company, including their metadata and processing status.
     *
     * @var list<GenericDocument>|null $documents
     */
    #[Optional(list: GenericDocument::class)]
    public ?array $documents;

    /**
     * List of members or actors associated with the company, including personal and ownership information.
     *
     * @var list<Member>|null $members
     */
    #[Optional(list: Member::class)]
    public ?array $members;

    /**
     * Admin or internal portal URL for viewing the company's details, typically used by internal users.
     */
    #[Optional('portal_url')]
    public ?string $portalURL;

    /**
     * Custom key-value metadata fields associated with the company, allowing for flexible data storage.
     *
     * @var list<Property>|null $properties
     */
    #[Optional(list: Property::class)]
    public ?array $properties;

    /**
     * Risk assessment associated with the company, including a risk code, reason, and confidence score.
     */
    #[Optional]
    public ?Risk $risk;

    /**
     * Optional identifier indicating the source of the company record, useful for tracking or integration purposes.
     */
    #[Optional('source_id')]
    public ?string $sourceID;

    /**
     * Technical metadata related to the request, such as IP address, QR code settings, and callback URLs.
     */
    #[Optional('technical_data')]
    public ?TechnicalData $technicalData;

    /**
     * Public-facing webview URL for the company’s identification process, allowing external access to the company data.
     */
    #[Optional('webview_url')]
    public ?string $webviewURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AmlSuspicionShape> $amlSuspicions
     * @param CertificatShape $certificat
     * @param list<CheckShape> $checks
     * @param CompanyShape $company
     * @param list<GenericDocumentShape> $documents
     * @param list<MemberShape> $members
     * @param list<PropertyShape> $properties
     * @param RiskShape $risk
     * @param TechnicalDataShape $technicalData
     */
    public static function with(
        ?array $amlSuspicions = null,
        Certificat|array|null $certificat = null,
        ?array $checks = null,
        Company|array|null $company = null,
        ?array $documents = null,
        ?array $members = null,
        ?string $portalURL = null,
        ?array $properties = null,
        Risk|array|null $risk = null,
        ?string $sourceID = null,
        TechnicalData|array|null $technicalData = null,
        ?string $webviewURL = null,
    ): self {
        $self = new self;

        null !== $amlSuspicions && $self['amlSuspicions'] = $amlSuspicions;
        null !== $certificat && $self['certificat'] = $certificat;
        null !== $checks && $self['checks'] = $checks;
        null !== $company && $self['company'] = $company;
        null !== $documents && $self['documents'] = $documents;
        null !== $members && $self['members'] = $members;
        null !== $portalURL && $self['portalURL'] = $portalURL;
        null !== $properties && $self['properties'] = $properties;
        null !== $risk && $self['risk'] = $risk;
        null !== $sourceID && $self['sourceID'] = $sourceID;
        null !== $technicalData && $self['technicalData'] = $technicalData;
        null !== $webviewURL && $self['webviewURL'] = $webviewURL;

        return $self;
    }

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the company, including their details.
     *
     * @param list<AmlSuspicionShape> $amlSuspicions
     */
    public function withAmlSuspicions(array $amlSuspicions): self
    {
        $self = clone $this;
        $self['amlSuspicions'] = $amlSuspicions;

        return $self;
    }

    /**
     * Digital certificate associated with the company, if any, including its creation timestamp and filename.
     *
     * @param CertificatShape $certificat
     */
    public function withCertificat(Certificat|array $certificat): self
    {
        $self = clone $this;
        $self['certificat'] = $certificat;

        return $self;
    }

    /**
     * List of verification or validation checks applied to the company, including their results and messages.
     *
     * @param list<CheckShape> $checks
     */
    public function withChecks(array $checks): self
    {
        $self = clone $this;
        $self['checks'] = $checks;

        return $self;
    }

    /**
     * Main information about the company being registered, including legal name, registration ID, and address.
     *
     * @param CompanyShape $company
     */
    public function withCompany(Company|array $company): self
    {
        $self = clone $this;
        $self['company'] = $company;

        return $self;
    }

    /**
     * All documents submitted or associated with the company, including their metadata and processing status.
     *
     * @param list<GenericDocumentShape> $documents
     */
    public function withDocuments(array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }

    /**
     * List of members or actors associated with the company, including personal and ownership information.
     *
     * @param list<MemberShape> $members
     */
    public function withMembers(array $members): self
    {
        $self = clone $this;
        $self['members'] = $members;

        return $self;
    }

    /**
     * Admin or internal portal URL for viewing the company's details, typically used by internal users.
     */
    public function withPortalURL(string $portalURL): self
    {
        $self = clone $this;
        $self['portalURL'] = $portalURL;

        return $self;
    }

    /**
     * Custom key-value metadata fields associated with the company, allowing for flexible data storage.
     *
     * @param list<PropertyShape> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * Risk assessment associated with the company, including a risk code, reason, and confidence score.
     *
     * @param RiskShape $risk
     */
    public function withRisk(Risk|array $risk): self
    {
        $self = clone $this;
        $self['risk'] = $risk;

        return $self;
    }

    /**
     * Optional identifier indicating the source of the company record, useful for tracking or integration purposes.
     */
    public function withSourceID(string $sourceID): self
    {
        $self = clone $this;
        $self['sourceID'] = $sourceID;

        return $self;
    }

    /**
     * Technical metadata related to the request, such as IP address, QR code settings, and callback URLs.
     *
     * @param TechnicalDataShape $technicalData
     */
    public function withTechnicalData(TechnicalData|array $technicalData): self
    {
        $self = clone $this;
        $self['technicalData'] = $technicalData;

        return $self;
    }

    /**
     * Public-facing webview URL for the company’s identification process, allowing external access to the company data.
     */
    public function withWebviewURL(string $webviewURL): self
    {
        $self = clone $this;
        $self['webviewURL'] = $webviewURL;

        return $self;
    }
}

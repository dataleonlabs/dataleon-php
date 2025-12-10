<?php

declare(strict_types=1);

namespace Dataleon\Companies;

use Dataleon\Check;
use Dataleon\Companies\CompanyRegistration\AmlSuspicion;
use Dataleon\Companies\CompanyRegistration\AmlSuspicion\Status;
use Dataleon\Companies\CompanyRegistration\AmlSuspicion\Type;
use Dataleon\Companies\CompanyRegistration\Certificat;
use Dataleon\Companies\CompanyRegistration\Company;
use Dataleon\Companies\CompanyRegistration\Company\Contact;
use Dataleon\Companies\CompanyRegistration\Member;
use Dataleon\Companies\CompanyRegistration\Member\Source;
use Dataleon\Companies\CompanyRegistration\Property;
use Dataleon\Companies\CompanyRegistration\Risk;
use Dataleon\Companies\CompanyRegistration\TechnicalData;
use Dataleon\Companies\CompanyRegistration\TechnicalData\PortalStep;
use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\Individuals\Documents\GenericDocument\Table;
use Dataleon\Individuals\Documents\GenericDocument\Value;

/**
 * @phpstan-type CompanyRegistrationShape = array{
 *   amlSuspicions?: list<AmlSuspicion>|null,
 *   certificat?: Certificat|null,
 *   checks?: list<Check>|null,
 *   company?: Company|null,
 *   documents?: list<GenericDocument>|null,
 *   members?: list<Member>|null,
 *   portalURL?: string|null,
 *   properties?: list<Property>|null,
 *   risk?: Risk|null,
 *   sourceID?: string|null,
 *   technicalData?: TechnicalData|null,
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
     * @param list<AmlSuspicion|array{
     *   caption?: string|null,
     *   country?: string|null,
     *   gender?: string|null,
     *   relation?: string|null,
     *   schema?: string|null,
     *   score?: float|null,
     *   source?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     * }> $amlSuspicions
     * @param Certificat|array{
     *   id?: string|null, createdAt?: \DateTimeInterface|null, filename?: string|null
     * } $certificat
     * @param list<Check|array{
     *   masked?: bool|null,
     *   message?: string|null,
     *   name?: string|null,
     *   validate?: bool|null,
     *   weight?: int|null,
     * }> $checks
     * @param Company|array{
     *   address?: string|null,
     *   closureDate?: \DateTimeInterface|null,
     *   commercialName?: string|null,
     *   contact?: Contact|null,
     *   country?: string|null,
     *   email?: string|null,
     *   employees?: int|null,
     *   employerIdentificationNumber?: string|null,
     *   insolvencyExists?: bool|null,
     *   insolvencyOngoing?: bool|null,
     *   legalForm?: string|null,
     *   name?: string|null,
     *   phoneNumber?: string|null,
     *   registrationDate?: \DateTimeInterface|null,
     *   registrationID?: string|null,
     *   shareCapital?: string|null,
     *   status?: string|null,
     *   taxIdentificationNumber?: string|null,
     *   type?: string|null,
     *   websiteURL?: string|null,
     * } $company
     * @param list<GenericDocument|array{
     *   id?: string|null,
     *   checks?: list<Check>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   documentType?: string|null,
     *   name?: string|null,
     *   signedURL?: string|null,
     *   state?: string|null,
     *   status?: string|null,
     *   tables?: list<Table>|null,
     *   values?: list<Value>|null,
     * }> $documents
     * @param list<Member|array{
     *   id?: string|null,
     *   address?: string|null,
     *   birthday?: \DateTimeInterface|null,
     *   birthplace?: string|null,
     *   country?: string|null,
     *   documents?: list<GenericDocument>|null,
     *   email?: string|null,
     *   firstName?: string|null,
     *   isBeneficialOwner?: bool|null,
     *   isDelegator?: bool|null,
     *   lastName?: string|null,
     *   livenessVerification?: bool|null,
     *   name?: string|null,
     *   ownershipPercentage?: int|null,
     *   phoneNumber?: string|null,
     *   postalCode?: string|null,
     *   registrationID?: string|null,
     *   relation?: string|null,
     *   roles?: string|null,
     *   source?: value-of<Source>|null,
     *   state?: string|null,
     *   status?: string|null,
     *   type?: value-of<Member\Type>|null,
     *   workspaceID?: string|null,
     * }> $members
     * @param list<Property|array{
     *   name?: string|null, type?: string|null, value?: string|null
     * }> $properties
     * @param Risk|array{
     *   code?: string|null, reason?: string|null, score?: float|null
     * } $risk
     * @param TechnicalData|array{
     *   activeAmlSuspicions?: bool|null,
     *   apiVersion?: int|null,
     *   approvedAt?: \DateTimeInterface|null,
     *   callbackURL?: string|null,
     *   callbackURLNotification?: string|null,
     *   disableNotification?: bool|null,
     *   disableNotificationDate?: \DateTimeInterface|null,
     *   exportType?: string|null,
     *   filteringScoreAmlSuspicions?: float|null,
     *   finishedAt?: \DateTimeInterface|null,
     *   ip?: string|null,
     *   language?: string|null,
     *   locationIP?: string|null,
     *   needReviewAt?: \DateTimeInterface|null,
     *   notificationConfirmation?: bool|null,
     *   portalSteps?: list<value-of<PortalStep>>|null,
     *   qrCode?: string|null,
     *   rawData?: bool|null,
     *   rejectedAt?: \DateTimeInterface|null,
     *   sessionDuration?: int|null,
     *   startedAt?: \DateTimeInterface|null,
     *   transferAt?: \DateTimeInterface|null,
     *   transferMode?: string|null,
     * } $technicalData
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
     * @param list<AmlSuspicion|array{
     *   caption?: string|null,
     *   country?: string|null,
     *   gender?: string|null,
     *   relation?: string|null,
     *   schema?: string|null,
     *   score?: float|null,
     *   source?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     * }> $amlSuspicions
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
     * @param Certificat|array{
     *   id?: string|null, createdAt?: \DateTimeInterface|null, filename?: string|null
     * } $certificat
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
     * @param list<Check|array{
     *   masked?: bool|null,
     *   message?: string|null,
     *   name?: string|null,
     *   validate?: bool|null,
     *   weight?: int|null,
     * }> $checks
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
     * @param Company|array{
     *   address?: string|null,
     *   closureDate?: \DateTimeInterface|null,
     *   commercialName?: string|null,
     *   contact?: Contact|null,
     *   country?: string|null,
     *   email?: string|null,
     *   employees?: int|null,
     *   employerIdentificationNumber?: string|null,
     *   insolvencyExists?: bool|null,
     *   insolvencyOngoing?: bool|null,
     *   legalForm?: string|null,
     *   name?: string|null,
     *   phoneNumber?: string|null,
     *   registrationDate?: \DateTimeInterface|null,
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
     * All documents submitted or associated with the company, including their metadata and processing status.
     *
     * @param list<GenericDocument|array{
     *   id?: string|null,
     *   checks?: list<Check>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   documentType?: string|null,
     *   name?: string|null,
     *   signedURL?: string|null,
     *   state?: string|null,
     *   status?: string|null,
     *   tables?: list<Table>|null,
     *   values?: list<Value>|null,
     * }> $documents
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
     * @param list<Member|array{
     *   id?: string|null,
     *   address?: string|null,
     *   birthday?: \DateTimeInterface|null,
     *   birthplace?: string|null,
     *   country?: string|null,
     *   documents?: list<GenericDocument>|null,
     *   email?: string|null,
     *   firstName?: string|null,
     *   isBeneficialOwner?: bool|null,
     *   isDelegator?: bool|null,
     *   lastName?: string|null,
     *   livenessVerification?: bool|null,
     *   name?: string|null,
     *   ownershipPercentage?: int|null,
     *   phoneNumber?: string|null,
     *   postalCode?: string|null,
     *   registrationID?: string|null,
     *   relation?: string|null,
     *   roles?: string|null,
     *   source?: value-of<Source>|null,
     *   state?: string|null,
     *   status?: string|null,
     *   type?: value-of<Member\Type>|null,
     *   workspaceID?: string|null,
     * }> $members
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
     * @param list<Property|array{
     *   name?: string|null, type?: string|null, value?: string|null
     * }> $properties
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
     * @param Risk|array{
     *   code?: string|null, reason?: string|null, score?: float|null
     * } $risk
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
     * @param TechnicalData|array{
     *   activeAmlSuspicions?: bool|null,
     *   apiVersion?: int|null,
     *   approvedAt?: \DateTimeInterface|null,
     *   callbackURL?: string|null,
     *   callbackURLNotification?: string|null,
     *   disableNotification?: bool|null,
     *   disableNotificationDate?: \DateTimeInterface|null,
     *   exportType?: string|null,
     *   filteringScoreAmlSuspicions?: float|null,
     *   finishedAt?: \DateTimeInterface|null,
     *   ip?: string|null,
     *   language?: string|null,
     *   locationIP?: string|null,
     *   needReviewAt?: \DateTimeInterface|null,
     *   notificationConfirmation?: bool|null,
     *   portalSteps?: list<value-of<PortalStep>>|null,
     *   qrCode?: string|null,
     *   rawData?: bool|null,
     *   rejectedAt?: \DateTimeInterface|null,
     *   sessionDuration?: int|null,
     *   startedAt?: \DateTimeInterface|null,
     *   transferAt?: \DateTimeInterface|null,
     *   transferMode?: string|null,
     * } $technicalData
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

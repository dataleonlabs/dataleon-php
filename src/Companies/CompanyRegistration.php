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
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\Individuals\Documents\GenericDocument\Table;
use Dataleon\Individuals\Documents\GenericDocument\Value;

/**
 * @phpstan-type CompanyRegistrationShape = array{
 *   aml_suspicions?: list<AmlSuspicion>|null,
 *   certificat?: Certificat|null,
 *   checks?: list<Check>|null,
 *   company?: Company|null,
 *   documents?: list<GenericDocument>|null,
 *   members?: list<Member>|null,
 *   portal_url?: string|null,
 *   properties?: list<Property>|null,
 *   risk?: Risk|null,
 *   source_id?: string|null,
 *   technical_data?: TechnicalData|null,
 *   webview_url?: string|null,
 * }
 */
final class CompanyRegistration implements BaseModel
{
    /** @use SdkModel<CompanyRegistrationShape> */
    use SdkModel;

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the company, including their details.
     *
     * @var list<AmlSuspicion>|null $aml_suspicions
     */
    #[Api(list: AmlSuspicion::class, optional: true)]
    public ?array $aml_suspicions;

    /**
     * Digital certificate associated with the company, if any, including its creation timestamp and filename.
     */
    #[Api(optional: true)]
    public ?Certificat $certificat;

    /**
     * List of verification or validation checks applied to the company, including their results and messages.
     *
     * @var list<Check>|null $checks
     */
    #[Api(list: Check::class, optional: true)]
    public ?array $checks;

    /**
     * Main information about the company being registered, including legal name, registration ID, and address.
     */
    #[Api(optional: true)]
    public ?Company $company;

    /**
     * All documents submitted or associated with the company, including their metadata and processing status.
     *
     * @var list<GenericDocument>|null $documents
     */
    #[Api(list: GenericDocument::class, optional: true)]
    public ?array $documents;

    /**
     * List of members or actors associated with the company, including personal and ownership information.
     *
     * @var list<Member>|null $members
     */
    #[Api(list: Member::class, optional: true)]
    public ?array $members;

    /**
     * Admin or internal portal URL for viewing the company's details, typically used by internal users.
     */
    #[Api(optional: true)]
    public ?string $portal_url;

    /**
     * Custom key-value metadata fields associated with the company, allowing for flexible data storage.
     *
     * @var list<Property>|null $properties
     */
    #[Api(list: Property::class, optional: true)]
    public ?array $properties;

    /**
     * Risk assessment associated with the company, including a risk code, reason, and confidence score.
     */
    #[Api(optional: true)]
    public ?Risk $risk;

    /**
     * Optional identifier indicating the source of the company record, useful for tracking or integration purposes.
     */
    #[Api(optional: true)]
    public ?string $source_id;

    /**
     * Technical metadata related to the request, such as IP address, QR code settings, and callback URLs.
     */
    #[Api(optional: true)]
    public ?TechnicalData $technical_data;

    /**
     * Public-facing webview URL for the company’s identification process, allowing external access to the company data.
     */
    #[Api(optional: true)]
    public ?string $webview_url;

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
     * }> $aml_suspicions
     * @param Certificat|array{
     *   id?: string|null, created_at?: \DateTimeInterface|null, filename?: string|null
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
     *   closure_date?: \DateTimeInterface|null,
     *   commercial_name?: string|null,
     *   contact?: Contact|null,
     *   country?: string|null,
     *   email?: string|null,
     *   employees?: int|null,
     *   employer_identification_number?: string|null,
     *   insolvency_exists?: bool|null,
     *   insolvency_ongoing?: bool|null,
     *   legal_form?: string|null,
     *   name?: string|null,
     *   phone_number?: string|null,
     *   registration_date?: \DateTimeInterface|null,
     *   registration_id?: string|null,
     *   share_capital?: string|null,
     *   status?: string|null,
     *   tax_identification_number?: string|null,
     *   type?: string|null,
     *   website_url?: string|null,
     * } $company
     * @param list<GenericDocument|array{
     *   id?: string|null,
     *   checks?: list<Check>|null,
     *   created_at?: \DateTimeInterface|null,
     *   document_type?: string|null,
     *   name?: string|null,
     *   signed_url?: string|null,
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
     *   first_name?: string|null,
     *   is_beneficial_owner?: bool|null,
     *   is_delegator?: bool|null,
     *   last_name?: string|null,
     *   liveness_verification?: bool|null,
     *   name?: string|null,
     *   ownership_percentage?: int|null,
     *   phone_number?: string|null,
     *   postal_code?: string|null,
     *   registration_id?: string|null,
     *   relation?: string|null,
     *   roles?: string|null,
     *   source?: value-of<Source>|null,
     *   state?: string|null,
     *   status?: string|null,
     *   type?: value-of<Member\Type>|null,
     *   workspace_id?: string|null,
     * }> $members
     * @param list<Property|array{
     *   name?: string|null, type?: string|null, value?: string|null
     * }> $properties
     * @param Risk|array{
     *   code?: string|null, reason?: string|null, score?: float|null
     * } $risk
     * @param TechnicalData|array{
     *   active_aml_suspicions?: bool|null,
     *   api_version?: int|null,
     *   approved_at?: \DateTimeInterface|null,
     *   callback_url?: string|null,
     *   callback_url_notification?: string|null,
     *   disable_notification?: bool|null,
     *   disable_notification_date?: \DateTimeInterface|null,
     *   export_type?: string|null,
     *   filtering_score_aml_suspicions?: float|null,
     *   finished_at?: \DateTimeInterface|null,
     *   ip?: string|null,
     *   language?: string|null,
     *   location_ip?: string|null,
     *   need_review_at?: \DateTimeInterface|null,
     *   notification_confirmation?: bool|null,
     *   portal_steps?: list<value-of<PortalStep>>|null,
     *   qr_code?: string|null,
     *   raw_data?: bool|null,
     *   rejected_at?: \DateTimeInterface|null,
     *   session_duration?: int|null,
     *   started_at?: \DateTimeInterface|null,
     *   transfer_at?: \DateTimeInterface|null,
     *   transfer_mode?: string|null,
     * } $technical_data
     */
    public static function with(
        ?array $aml_suspicions = null,
        Certificat|array|null $certificat = null,
        ?array $checks = null,
        Company|array|null $company = null,
        ?array $documents = null,
        ?array $members = null,
        ?string $portal_url = null,
        ?array $properties = null,
        Risk|array|null $risk = null,
        ?string $source_id = null,
        TechnicalData|array|null $technical_data = null,
        ?string $webview_url = null,
    ): self {
        $obj = new self;

        null !== $aml_suspicions && $obj['aml_suspicions'] = $aml_suspicions;
        null !== $certificat && $obj['certificat'] = $certificat;
        null !== $checks && $obj['checks'] = $checks;
        null !== $company && $obj['company'] = $company;
        null !== $documents && $obj['documents'] = $documents;
        null !== $members && $obj['members'] = $members;
        null !== $portal_url && $obj['portal_url'] = $portal_url;
        null !== $properties && $obj['properties'] = $properties;
        null !== $risk && $obj['risk'] = $risk;
        null !== $source_id && $obj['source_id'] = $source_id;
        null !== $technical_data && $obj['technical_data'] = $technical_data;
        null !== $webview_url && $obj['webview_url'] = $webview_url;

        return $obj;
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
        $obj = clone $this;
        $obj['aml_suspicions'] = $amlSuspicions;

        return $obj;
    }

    /**
     * Digital certificate associated with the company, if any, including its creation timestamp and filename.
     *
     * @param Certificat|array{
     *   id?: string|null, created_at?: \DateTimeInterface|null, filename?: string|null
     * } $certificat
     */
    public function withCertificat(Certificat|array $certificat): self
    {
        $obj = clone $this;
        $obj['certificat'] = $certificat;

        return $obj;
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
        $obj = clone $this;
        $obj['checks'] = $checks;

        return $obj;
    }

    /**
     * Main information about the company being registered, including legal name, registration ID, and address.
     *
     * @param Company|array{
     *   address?: string|null,
     *   closure_date?: \DateTimeInterface|null,
     *   commercial_name?: string|null,
     *   contact?: Contact|null,
     *   country?: string|null,
     *   email?: string|null,
     *   employees?: int|null,
     *   employer_identification_number?: string|null,
     *   insolvency_exists?: bool|null,
     *   insolvency_ongoing?: bool|null,
     *   legal_form?: string|null,
     *   name?: string|null,
     *   phone_number?: string|null,
     *   registration_date?: \DateTimeInterface|null,
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
     * All documents submitted or associated with the company, including their metadata and processing status.
     *
     * @param list<GenericDocument|array{
     *   id?: string|null,
     *   checks?: list<Check>|null,
     *   created_at?: \DateTimeInterface|null,
     *   document_type?: string|null,
     *   name?: string|null,
     *   signed_url?: string|null,
     *   state?: string|null,
     *   status?: string|null,
     *   tables?: list<Table>|null,
     *   values?: list<Value>|null,
     * }> $documents
     */
    public function withDocuments(array $documents): self
    {
        $obj = clone $this;
        $obj['documents'] = $documents;

        return $obj;
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
     *   first_name?: string|null,
     *   is_beneficial_owner?: bool|null,
     *   is_delegator?: bool|null,
     *   last_name?: string|null,
     *   liveness_verification?: bool|null,
     *   name?: string|null,
     *   ownership_percentage?: int|null,
     *   phone_number?: string|null,
     *   postal_code?: string|null,
     *   registration_id?: string|null,
     *   relation?: string|null,
     *   roles?: string|null,
     *   source?: value-of<Source>|null,
     *   state?: string|null,
     *   status?: string|null,
     *   type?: value-of<Member\Type>|null,
     *   workspace_id?: string|null,
     * }> $members
     */
    public function withMembers(array $members): self
    {
        $obj = clone $this;
        $obj['members'] = $members;

        return $obj;
    }

    /**
     * Admin or internal portal URL for viewing the company's details, typically used by internal users.
     */
    public function withPortalURL(string $portalURL): self
    {
        $obj = clone $this;
        $obj['portal_url'] = $portalURL;

        return $obj;
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
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
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
        $obj = clone $this;
        $obj['risk'] = $risk;

        return $obj;
    }

    /**
     * Optional identifier indicating the source of the company record, useful for tracking or integration purposes.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj['source_id'] = $sourceID;

        return $obj;
    }

    /**
     * Technical metadata related to the request, such as IP address, QR code settings, and callback URLs.
     *
     * @param TechnicalData|array{
     *   active_aml_suspicions?: bool|null,
     *   api_version?: int|null,
     *   approved_at?: \DateTimeInterface|null,
     *   callback_url?: string|null,
     *   callback_url_notification?: string|null,
     *   disable_notification?: bool|null,
     *   disable_notification_date?: \DateTimeInterface|null,
     *   export_type?: string|null,
     *   filtering_score_aml_suspicions?: float|null,
     *   finished_at?: \DateTimeInterface|null,
     *   ip?: string|null,
     *   language?: string|null,
     *   location_ip?: string|null,
     *   need_review_at?: \DateTimeInterface|null,
     *   notification_confirmation?: bool|null,
     *   portal_steps?: list<value-of<PortalStep>>|null,
     *   qr_code?: string|null,
     *   raw_data?: bool|null,
     *   rejected_at?: \DateTimeInterface|null,
     *   session_duration?: int|null,
     *   started_at?: \DateTimeInterface|null,
     *   transfer_at?: \DateTimeInterface|null,
     *   transfer_mode?: string|null,
     * } $technicalData
     */
    public function withTechnicalData(TechnicalData|array $technicalData): self
    {
        $obj = clone $this;
        $obj['technical_data'] = $technicalData;

        return $obj;
    }

    /**
     * Public-facing webview URL for the company’s identification process, allowing external access to the company data.
     */
    public function withWebviewURL(string $webviewURL): self
    {
        $obj = clone $this;
        $obj['webview_url'] = $webviewURL;

        return $obj;
    }
}

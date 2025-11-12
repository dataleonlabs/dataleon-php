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
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkResponse;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\Contracts\ResponseConverter;
use Dataleon\Individuals\Documents\GenericDocument;

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
final class CompanyRegistration implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CompanyRegistrationShape> */
    use SdkModel;

    use SdkResponse;

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
     * @param list<AmlSuspicion> $aml_suspicions
     * @param list<Check> $checks
     * @param list<GenericDocument> $documents
     * @param list<Member> $members
     * @param list<Property> $properties
     */
    public static function with(
        ?array $aml_suspicions = null,
        ?Certificat $certificat = null,
        ?array $checks = null,
        ?Company $company = null,
        ?array $documents = null,
        ?array $members = null,
        ?string $portal_url = null,
        ?array $properties = null,
        ?Risk $risk = null,
        ?string $source_id = null,
        ?TechnicalData $technical_data = null,
        ?string $webview_url = null,
    ): self {
        $obj = new self;

        null !== $aml_suspicions && $obj->aml_suspicions = $aml_suspicions;
        null !== $certificat && $obj->certificat = $certificat;
        null !== $checks && $obj->checks = $checks;
        null !== $company && $obj->company = $company;
        null !== $documents && $obj->documents = $documents;
        null !== $members && $obj->members = $members;
        null !== $portal_url && $obj->portal_url = $portal_url;
        null !== $properties && $obj->properties = $properties;
        null !== $risk && $obj->risk = $risk;
        null !== $source_id && $obj->source_id = $source_id;
        null !== $technical_data && $obj->technical_data = $technical_data;
        null !== $webview_url && $obj->webview_url = $webview_url;

        return $obj;
    }

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the company, including their details.
     *
     * @param list<AmlSuspicion> $amlSuspicions
     */
    public function withAmlSuspicions(array $amlSuspicions): self
    {
        $obj = clone $this;
        $obj->aml_suspicions = $amlSuspicions;

        return $obj;
    }

    /**
     * Digital certificate associated with the company, if any, including its creation timestamp and filename.
     */
    public function withCertificat(Certificat $certificat): self
    {
        $obj = clone $this;
        $obj->certificat = $certificat;

        return $obj;
    }

    /**
     * List of verification or validation checks applied to the company, including their results and messages.
     *
     * @param list<Check> $checks
     */
    public function withChecks(array $checks): self
    {
        $obj = clone $this;
        $obj->checks = $checks;

        return $obj;
    }

    /**
     * Main information about the company being registered, including legal name, registration ID, and address.
     */
    public function withCompany(Company $company): self
    {
        $obj = clone $this;
        $obj->company = $company;

        return $obj;
    }

    /**
     * All documents submitted or associated with the company, including their metadata and processing status.
     *
     * @param list<GenericDocument> $documents
     */
    public function withDocuments(array $documents): self
    {
        $obj = clone $this;
        $obj->documents = $documents;

        return $obj;
    }

    /**
     * List of members or actors associated with the company, including personal and ownership information.
     *
     * @param list<Member> $members
     */
    public function withMembers(array $members): self
    {
        $obj = clone $this;
        $obj->members = $members;

        return $obj;
    }

    /**
     * Admin or internal portal URL for viewing the company's details, typically used by internal users.
     */
    public function withPortalURL(string $portalURL): self
    {
        $obj = clone $this;
        $obj->portal_url = $portalURL;

        return $obj;
    }

    /**
     * Custom key-value metadata fields associated with the company, allowing for flexible data storage.
     *
     * @param list<Property> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * Risk assessment associated with the company, including a risk code, reason, and confidence score.
     */
    public function withRisk(Risk $risk): self
    {
        $obj = clone $this;
        $obj->risk = $risk;

        return $obj;
    }

    /**
     * Optional identifier indicating the source of the company record, useful for tracking or integration purposes.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj->source_id = $sourceID;

        return $obj;
    }

    /**
     * Technical metadata related to the request, such as IP address, QR code settings, and callback URLs.
     */
    public function withTechnicalData(TechnicalData $technicalData): self
    {
        $obj = clone $this;
        $obj->technical_data = $technicalData;

        return $obj;
    }

    /**
     * Public-facing webview URL for the company’s identification process, allowing external access to the company data.
     */
    public function withWebviewURL(string $webviewURL): self
    {
        $obj = clone $this;
        $obj->webview_url = $webviewURL;

        return $obj;
    }
}

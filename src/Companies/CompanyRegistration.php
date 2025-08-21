<?php

declare(strict_types=1);

namespace Dataleon\Companies;

use Dataleon\Companies\CompanyRegistration\AmlSuspicion;
use Dataleon\Companies\CompanyRegistration\Certificat;
use Dataleon\Companies\CompanyRegistration\Company;
use Dataleon\Companies\CompanyRegistration\Member;
use Dataleon\Companies\CompanyRegistration\Property;
use Dataleon\Companies\CompanyRegistration\Risk;
use Dataleon\Companies\CompanyRegistration\TechnicalData;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\Shared\Check;

/**
 * @phpstan-type company_registration_alias = array{
 *   amlSuspicions?: list<AmlSuspicion>,
 *   certificat?: Certificat,
 *   checks?: list<Check>,
 *   company?: Company,
 *   documents?: list<GenericDocument>,
 *   members?: list<Member>,
 *   portalURL?: string,
 *   properties?: list<Property>,
 *   risk?: Risk,
 *   sourceID?: string,
 *   technicalData?: TechnicalData,
 *   webviewURL?: string,
 * }
 */
final class CompanyRegistration implements BaseModel
{
    use SdkModel;

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the company, including their details.
     *
     * @var null|list<AmlSuspicion> $amlSuspicions
     */
    #[Api(
        'aml_suspicions',
        type: new ListOf(AmlSuspicion::class),
        optional: true
    )]
    public ?array $amlSuspicions;

    /**
     * Digital certificate associated with the company, if any, including its creation timestamp and filename.
     */
    #[Api(optional: true)]
    public ?Certificat $certificat;

    /**
     * List of verification or validation checks applied to the company, including their results and messages.
     *
     * @var null|list<Check> $checks
     */
    #[Api(type: new ListOf(Check::class), optional: true)]
    public ?array $checks;

    /**
     * Main information about the company being registered, including legal name, registration ID, and address.
     */
    #[Api(optional: true)]
    public ?Company $company;

    /**
     * All documents submitted or associated with the company, including their metadata and processing status.
     *
     * @var null|list<GenericDocument> $documents
     */
    #[Api(type: new ListOf(GenericDocument::class), optional: true)]
    public ?array $documents;

    /**
     * List of members or actors associated with the company, including personal and ownership information.
     *
     * @var null|list<Member> $members
     */
    #[Api(type: new ListOf(Member::class), optional: true)]
    public ?array $members;

    /**
     * Admin or internal portal URL for viewing the company's details, typically used by internal users.
     */
    #[Api('portal_url', optional: true)]
    public ?string $portalURL;

    /**
     * Custom key-value metadata fields associated with the company, allowing for flexible data storage.
     *
     * @var null|list<Property> $properties
     */
    #[Api(type: new ListOf(Property::class), optional: true)]
    public ?array $properties;

    /**
     * Risk assessment associated with the company, including a risk code, reason, and confidence score.
     */
    #[Api(optional: true)]
    public ?Risk $risk;

    /**
     * Optional identifier indicating the source of the company record, useful for tracking or integration purposes.
     */
    #[Api('source_id', optional: true)]
    public ?string $sourceID;

    /**
     * Technical metadata related to the request, such as IP address, QR code settings, and callback URLs.
     */
    #[Api('technical_data', optional: true)]
    public ?TechnicalData $technicalData;

    /**
     * Public-facing webview URL for the company’s identification process, allowing external access to the company data.
     */
    #[Api('webview_url', optional: true)]
    public ?string $webviewURL;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param null|list<AmlSuspicion> $amlSuspicions
     * @param null|list<Check> $checks
     * @param null|list<GenericDocument> $documents
     * @param null|list<Member> $members
     * @param null|list<Property> $properties
     */
    public static function with(
        ?array $amlSuspicions = null,
        ?Certificat $certificat = null,
        ?array $checks = null,
        ?Company $company = null,
        ?array $documents = null,
        ?array $members = null,
        ?string $portalURL = null,
        ?array $properties = null,
        ?Risk $risk = null,
        ?string $sourceID = null,
        ?TechnicalData $technicalData = null,
        ?string $webviewURL = null,
    ): self {
        $obj = new self;

        null !== $amlSuspicions && $obj->amlSuspicions = $amlSuspicions;
        null !== $certificat && $obj->certificat = $certificat;
        null !== $checks && $obj->checks = $checks;
        null !== $company && $obj->company = $company;
        null !== $documents && $obj->documents = $documents;
        null !== $members && $obj->members = $members;
        null !== $portalURL && $obj->portalURL = $portalURL;
        null !== $properties && $obj->properties = $properties;
        null !== $risk && $obj->risk = $risk;
        null !== $sourceID && $obj->sourceID = $sourceID;
        null !== $technicalData && $obj->technicalData = $technicalData;
        null !== $webviewURL && $obj->webviewURL = $webviewURL;

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
        $obj->amlSuspicions = $amlSuspicions;

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
        $obj->portalURL = $portalURL;

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
        $obj->sourceID = $sourceID;

        return $obj;
    }

    /**
     * Technical metadata related to the request, such as IP address, QR code settings, and callback URLs.
     */
    public function withTechnicalData(TechnicalData $technicalData): self
    {
        $obj = clone $this;
        $obj->technicalData = $technicalData;

        return $obj;
    }

    /**
     * Public-facing webview URL for the company’s identification process, allowing external access to the company data.
     */
    public function withWebviewURL(string $webviewURL): self
    {
        $obj = clone $this;
        $obj->webviewURL = $webviewURL;

        return $obj;
    }
}

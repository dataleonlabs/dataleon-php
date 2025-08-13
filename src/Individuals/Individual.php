<?php

declare(strict_types=1);

namespace Dataleon\Individuals;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\Individuals\Individual\AmlSuspicion;
use Dataleon\Individuals\Individual\Certificat;
use Dataleon\Individuals\Individual\IdentityCard;
use Dataleon\Individuals\Individual\Person;
use Dataleon\Individuals\Individual\Property;
use Dataleon\Individuals\Individual\Risk;
use Dataleon\Individuals\Individual\Tag;
use Dataleon\Individuals\Individual\TechnicalData;
use Dataleon\Shared\Check;

/**
 * Represents a single individual record, including identification, status, and associated metadata.
 *
 * @phpstan-type individual_alias = array{
 *   id?: string,
 *   amlSuspicions?: list<AmlSuspicion>,
 *   authURL?: string,
 *   certificat?: Certificat,
 *   checks?: list<Check>,
 *   createdAt?: \DateTimeInterface,
 *   documents?: list<GenericDocument>,
 *   identityCard?: IdentityCard,
 *   number?: int,
 *   person?: Person,
 *   portalURL?: string,
 *   properties?: list<Property>,
 *   risk?: Risk,
 *   sourceID?: string,
 *   state?: string,
 *   status?: string,
 *   tags?: list<Tag>,
 *   technicalData?: TechnicalData,
 *   webviewURL?: string,
 *   workspaceID?: string,
 * }
 */
final class Individual implements BaseModel
{
    use Model;

    /**
     * Unique identifier of the individual.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the individual.
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
     * URL to authenticate the individual, usually for document signing or onboarding.
     */
    #[Api('auth_url', optional: true)]
    public ?string $authURL;

    /**
     * Digital certificate associated with the individual, if any.
     */
    #[Api(optional: true)]
    public ?Certificat $certificat;

    /**
     * List of verification or validation checks applied to the individual.
     *
     * @var null|list<Check> $checks
     */
    #[Api(type: new ListOf(Check::class), optional: true)]
    public ?array $checks;

    /**
     * Timestamp of the individual's creation in ISO 8601 format.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * All documents submitted or associated with the individual.
     *
     * @var null|list<GenericDocument> $documents
     */
    #[Api(type: new ListOf(GenericDocument::class), optional: true)]
    public ?array $documents;

    /**
     * Reference to the individual's identity document.
     */
    #[Api('identity_card', optional: true)]
    public ?IdentityCard $identityCard;

    /**
     * Internal sequential number or reference for the individual.
     */
    #[Api(optional: true)]
    public ?int $number;

    /**
     * Personal details of the individual, such as name, date of birth, and contact info.
     */
    #[Api(optional: true)]
    public ?Person $person;

    /**
     * Admin or internal portal URL for viewing the individual's details.
     */
    #[Api('portal_url', optional: true)]
    public ?string $portalURL;

    /**
     * Custom key-value metadata fields associated with the individual.
     *
     * @var null|list<Property> $properties
     */
    #[Api(type: new ListOf(Property::class), optional: true)]
    public ?array $properties;

    /**
     * Risk assessment associated with the individual.
     */
    #[Api(optional: true)]
    public ?Risk $risk;

    /**
     * Optional identifier indicating the source of the individual record.
     */
    #[Api('source_id', optional: true)]
    public ?string $sourceID;

    /**
     * Current operational state in the workflow (e.g., WAITING, IN_PROGRESS, COMPLETED).
     */
    #[Api(optional: true)]
    public ?string $state;

    /**
     * Overall processing status of the individual (e.g., rejected, need_review, approved).
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * List of tags assigned to the individual for categorization or metadata purposes.
     *
     * @var null|list<Tag> $tags
     */
    #[Api(type: new ListOf(Tag::class), optional: true)]
    public ?array $tags;

    /**
     * Technical metadata related to the request (e.g., QR code settings, language).
     */
    #[Api('technical_data', optional: true)]
    public ?TechnicalData $technicalData;

    /**
     * Public-facing webview URL for the individual’s identification process.
     */
    #[Api('webview_url', optional: true)]
    public ?string $webviewURL;

    /**
     * Identifier of the workspace to which the individual belongs.
     */
    #[Api('workspace_id', optional: true)]
    public ?string $workspaceID;

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
     * @param null|list<Property> $properties
     * @param null|list<Tag> $tags
     */
    public static function from(
        ?string $id = null,
        ?array $amlSuspicions = null,
        ?string $authURL = null,
        ?Certificat $certificat = null,
        ?array $checks = null,
        ?\DateTimeInterface $createdAt = null,
        ?array $documents = null,
        ?IdentityCard $identityCard = null,
        ?int $number = null,
        ?Person $person = null,
        ?string $portalURL = null,
        ?array $properties = null,
        ?Risk $risk = null,
        ?string $sourceID = null,
        ?string $state = null,
        ?string $status = null,
        ?array $tags = null,
        ?TechnicalData $technicalData = null,
        ?string $webviewURL = null,
        ?string $workspaceID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $amlSuspicions && $obj->amlSuspicions = $amlSuspicions;
        null !== $authURL && $obj->authURL = $authURL;
        null !== $certificat && $obj->certificat = $certificat;
        null !== $checks && $obj->checks = $checks;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $documents && $obj->documents = $documents;
        null !== $identityCard && $obj->identityCard = $identityCard;
        null !== $number && $obj->number = $number;
        null !== $person && $obj->person = $person;
        null !== $portalURL && $obj->portalURL = $portalURL;
        null !== $properties && $obj->properties = $properties;
        null !== $risk && $obj->risk = $risk;
        null !== $sourceID && $obj->sourceID = $sourceID;
        null !== $state && $obj->state = $state;
        null !== $status && $obj->status = $status;
        null !== $tags && $obj->tags = $tags;
        null !== $technicalData && $obj->technicalData = $technicalData;
        null !== $webviewURL && $obj->webviewURL = $webviewURL;
        null !== $workspaceID && $obj->workspaceID = $workspaceID;

        return $obj;
    }

    /**
     * Unique identifier of the individual.
     */
    public function setID(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the individual.
     *
     * @param list<AmlSuspicion> $amlSuspicions
     */
    public function setAmlSuspicions(array $amlSuspicions): self
    {
        $this->amlSuspicions = $amlSuspicions;

        return $this;
    }

    /**
     * URL to authenticate the individual, usually for document signing or onboarding.
     */
    public function setAuthURL(string $authURL): self
    {
        $this->authURL = $authURL;

        return $this;
    }

    /**
     * Digital certificate associated with the individual, if any.
     */
    public function setCertificat(Certificat $certificat): self
    {
        $this->certificat = $certificat;

        return $this;
    }

    /**
     * List of verification or validation checks applied to the individual.
     *
     * @param list<Check> $checks
     */
    public function setChecks(array $checks): self
    {
        $this->checks = $checks;

        return $this;
    }

    /**
     * Timestamp of the individual's creation in ISO 8601 format.
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * All documents submitted or associated with the individual.
     *
     * @param list<GenericDocument> $documents
     */
    public function setDocuments(array $documents): self
    {
        $this->documents = $documents;

        return $this;
    }

    /**
     * Reference to the individual's identity document.
     */
    public function setIdentityCard(IdentityCard $identityCard): self
    {
        $this->identityCard = $identityCard;

        return $this;
    }

    /**
     * Internal sequential number or reference for the individual.
     */
    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Personal details of the individual, such as name, date of birth, and contact info.
     */
    public function setPerson(Person $person): self
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Admin or internal portal URL for viewing the individual's details.
     */
    public function setPortalURL(string $portalURL): self
    {
        $this->portalURL = $portalURL;

        return $this;
    }

    /**
     * Custom key-value metadata fields associated with the individual.
     *
     * @param list<Property> $properties
     */
    public function setProperties(array $properties): self
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * Risk assessment associated with the individual.
     */
    public function setRisk(Risk $risk): self
    {
        $this->risk = $risk;

        return $this;
    }

    /**
     * Optional identifier indicating the source of the individual record.
     */
    public function setSourceID(string $sourceID): self
    {
        $this->sourceID = $sourceID;

        return $this;
    }

    /**
     * Current operational state in the workflow (e.g., WAITING, IN_PROGRESS, COMPLETED).
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Overall processing status of the individual (e.g., rejected, need_review, approved).
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * List of tags assigned to the individual for categorization or metadata purposes.
     *
     * @param list<Tag> $tags
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Technical metadata related to the request (e.g., QR code settings, language).
     */
    public function setTechnicalData(TechnicalData $technicalData): self
    {
        $this->technicalData = $technicalData;

        return $this;
    }

    /**
     * Public-facing webview URL for the individual’s identification process.
     */
    public function setWebviewURL(string $webviewURL): self
    {
        $this->webviewURL = $webviewURL;

        return $this;
    }

    /**
     * Identifier of the workspace to which the individual belongs.
     */
    public function setWorkspaceID(string $workspaceID): self
    {
        $this->workspaceID = $workspaceID;

        return $this;
    }
}

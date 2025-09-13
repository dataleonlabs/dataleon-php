<?php

declare(strict_types=1);

namespace Dataleon\Individuals;

use Dataleon\Check;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\Individuals\Individual\AmlSuspicion;
use Dataleon\Individuals\Individual\Certificat;
use Dataleon\Individuals\Individual\IdentityCard;
use Dataleon\Individuals\Individual\Person;
use Dataleon\Individuals\Individual\Property;
use Dataleon\Individuals\Individual\Risk;
use Dataleon\Individuals\Individual\Tag;
use Dataleon\Individuals\Individual\TechnicalData;

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
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class Individual implements BaseModel
{
    /** @use SdkModel<individual_alias> */
    use SdkModel;

    /**
     * Unique identifier of the individual.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the individual.
     *
     * @var list<AmlSuspicion>|null $amlSuspicions
     */
    #[Api('aml_suspicions', list: AmlSuspicion::class, optional: true)]
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
     * @var list<Check>|null $checks
     */
    #[Api(list: Check::class, optional: true)]
    public ?array $checks;

    /**
     * Timestamp of the individual's creation in ISO 8601 format.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * All documents submitted or associated with the individual.
     *
     * @var list<GenericDocument>|null $documents
     */
    #[Api(list: GenericDocument::class, optional: true)]
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
     * @var list<Property>|null $properties
     */
    #[Api(list: Property::class, optional: true)]
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
     * @var list<Tag>|null $tags
     */
    #[Api(list: Tag::class, optional: true)]
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
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AmlSuspicion> $amlSuspicions
     * @param list<Check> $checks
     * @param list<GenericDocument> $documents
     * @param list<Property> $properties
     * @param list<Tag> $tags
     */
    public static function with(
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
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the individual.
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
     * URL to authenticate the individual, usually for document signing or onboarding.
     */
    public function withAuthURL(string $authURL): self
    {
        $obj = clone $this;
        $obj->authURL = $authURL;

        return $obj;
    }

    /**
     * Digital certificate associated with the individual, if any.
     */
    public function withCertificat(Certificat $certificat): self
    {
        $obj = clone $this;
        $obj->certificat = $certificat;

        return $obj;
    }

    /**
     * List of verification or validation checks applied to the individual.
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
     * Timestamp of the individual's creation in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * All documents submitted or associated with the individual.
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
     * Reference to the individual's identity document.
     */
    public function withIdentityCard(IdentityCard $identityCard): self
    {
        $obj = clone $this;
        $obj->identityCard = $identityCard;

        return $obj;
    }

    /**
     * Internal sequential number or reference for the individual.
     */
    public function withNumber(int $number): self
    {
        $obj = clone $this;
        $obj->number = $number;

        return $obj;
    }

    /**
     * Personal details of the individual, such as name, date of birth, and contact info.
     */
    public function withPerson(Person $person): self
    {
        $obj = clone $this;
        $obj->person = $person;

        return $obj;
    }

    /**
     * Admin or internal portal URL for viewing the individual's details.
     */
    public function withPortalURL(string $portalURL): self
    {
        $obj = clone $this;
        $obj->portalURL = $portalURL;

        return $obj;
    }

    /**
     * Custom key-value metadata fields associated with the individual.
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
     * Risk assessment associated with the individual.
     */
    public function withRisk(Risk $risk): self
    {
        $obj = clone $this;
        $obj->risk = $risk;

        return $obj;
    }

    /**
     * Optional identifier indicating the source of the individual record.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj->sourceID = $sourceID;

        return $obj;
    }

    /**
     * Current operational state in the workflow (e.g., WAITING, IN_PROGRESS, COMPLETED).
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * Overall processing status of the individual (e.g., rejected, need_review, approved).
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * List of tags assigned to the individual for categorization or metadata purposes.
     *
     * @param list<Tag> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj->tags = $tags;

        return $obj;
    }

    /**
     * Technical metadata related to the request (e.g., QR code settings, language).
     */
    public function withTechnicalData(TechnicalData $technicalData): self
    {
        $obj = clone $this;
        $obj->technicalData = $technicalData;

        return $obj;
    }

    /**
     * Public-facing webview URL for the individual’s identification process.
     */
    public function withWebviewURL(string $webviewURL): self
    {
        $obj = clone $this;
        $obj->webviewURL = $webviewURL;

        return $obj;
    }

    /**
     * Identifier of the workspace to which the individual belongs.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj->workspaceID = $workspaceID;

        return $obj;
    }
}

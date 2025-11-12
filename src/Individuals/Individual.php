<?php

declare(strict_types=1);

namespace Dataleon\Individuals;

use Dataleon\Check;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Concerns\SdkResponse;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\Contracts\ResponseConverter;
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
 * @phpstan-type IndividualShape = array{
 *   id?: string|null,
 *   aml_suspicions?: list<AmlSuspicion>|null,
 *   auth_url?: string|null,
 *   certificat?: Certificat|null,
 *   checks?: list<Check>|null,
 *   created_at?: \DateTimeInterface|null,
 *   documents?: list<GenericDocument>|null,
 *   identity_card?: IdentityCard|null,
 *   number?: int|null,
 *   person?: Person|null,
 *   portal_url?: string|null,
 *   properties?: list<Property>|null,
 *   risk?: Risk|null,
 *   source_id?: string|null,
 *   state?: string|null,
 *   status?: string|null,
 *   tags?: list<Tag>|null,
 *   technical_data?: TechnicalData|null,
 *   webview_url?: string|null,
 *   workspace_id?: string|null,
 * }
 */
final class Individual implements BaseModel, ResponseConverter
{
    /** @use SdkModel<IndividualShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Unique identifier of the individual.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the individual.
     *
     * @var list<AmlSuspicion>|null $aml_suspicions
     */
    #[Api(list: AmlSuspicion::class, optional: true)]
    public ?array $aml_suspicions;

    /**
     * URL to authenticate the individual, usually for document signing or onboarding.
     */
    #[Api(optional: true)]
    public ?string $auth_url;

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
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

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
    #[Api(optional: true)]
    public ?IdentityCard $identity_card;

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
    #[Api(optional: true)]
    public ?string $portal_url;

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
    #[Api(optional: true)]
    public ?string $source_id;

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
    #[Api(optional: true)]
    public ?TechnicalData $technical_data;

    /**
     * Public-facing webview URL for the individual’s identification process.
     */
    #[Api(optional: true)]
    public ?string $webview_url;

    /**
     * Identifier of the workspace to which the individual belongs.
     */
    #[Api(optional: true)]
    public ?string $workspace_id;

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
     * @param list<Property> $properties
     * @param list<Tag> $tags
     */
    public static function with(
        ?string $id = null,
        ?array $aml_suspicions = null,
        ?string $auth_url = null,
        ?Certificat $certificat = null,
        ?array $checks = null,
        ?\DateTimeInterface $created_at = null,
        ?array $documents = null,
        ?IdentityCard $identity_card = null,
        ?int $number = null,
        ?Person $person = null,
        ?string $portal_url = null,
        ?array $properties = null,
        ?Risk $risk = null,
        ?string $source_id = null,
        ?string $state = null,
        ?string $status = null,
        ?array $tags = null,
        ?TechnicalData $technical_data = null,
        ?string $webview_url = null,
        ?string $workspace_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $aml_suspicions && $obj->aml_suspicions = $aml_suspicions;
        null !== $auth_url && $obj->auth_url = $auth_url;
        null !== $certificat && $obj->certificat = $certificat;
        null !== $checks && $obj->checks = $checks;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $documents && $obj->documents = $documents;
        null !== $identity_card && $obj->identity_card = $identity_card;
        null !== $number && $obj->number = $number;
        null !== $person && $obj->person = $person;
        null !== $portal_url && $obj->portal_url = $portal_url;
        null !== $properties && $obj->properties = $properties;
        null !== $risk && $obj->risk = $risk;
        null !== $source_id && $obj->source_id = $source_id;
        null !== $state && $obj->state = $state;
        null !== $status && $obj->status = $status;
        null !== $tags && $obj->tags = $tags;
        null !== $technical_data && $obj->technical_data = $technical_data;
        null !== $webview_url && $obj->webview_url = $webview_url;
        null !== $workspace_id && $obj->workspace_id = $workspace_id;

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
        $obj->aml_suspicions = $amlSuspicions;

        return $obj;
    }

    /**
     * URL to authenticate the individual, usually for document signing or onboarding.
     */
    public function withAuthURL(string $authURL): self
    {
        $obj = clone $this;
        $obj->auth_url = $authURL;

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
        $obj->created_at = $createdAt;

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
        $obj->identity_card = $identityCard;

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
        $obj->portal_url = $portalURL;

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
        $obj->source_id = $sourceID;

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
        $obj->technical_data = $technicalData;

        return $obj;
    }

    /**
     * Public-facing webview URL for the individual’s identification process.
     */
    public function withWebviewURL(string $webviewURL): self
    {
        $obj = clone $this;
        $obj->webview_url = $webviewURL;

        return $obj;
    }

    /**
     * Identifier of the workspace to which the individual belongs.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj->workspace_id = $workspaceID;

        return $obj;
    }
}

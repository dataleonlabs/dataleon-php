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
use Dataleon\Individuals\Documents\GenericDocument\Table;
use Dataleon\Individuals\Documents\GenericDocument\Value;
use Dataleon\Individuals\Individual\AmlSuspicion;
use Dataleon\Individuals\Individual\AmlSuspicion\Status;
use Dataleon\Individuals\Individual\AmlSuspicion\Type;
use Dataleon\Individuals\Individual\Certificat;
use Dataleon\Individuals\Individual\IdentityCard;
use Dataleon\Individuals\Individual\Person;
use Dataleon\Individuals\Individual\Property;
use Dataleon\Individuals\Individual\Risk;
use Dataleon\Individuals\Individual\Tag;
use Dataleon\Individuals\Individual\TechnicalData;
use Dataleon\Individuals\Individual\TechnicalData\PortalStep;

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
     * @param IdentityCard|array{
     *   id?: string|null,
     *   back_document_signed_url?: string|null,
     *   birth_place?: string|null,
     *   birthday?: string|null,
     *   country?: string|null,
     *   expiration_date?: string|null,
     *   first_name?: string|null,
     *   front_document_signed_url?: string|null,
     *   gender?: string|null,
     *   issue_date?: string|null,
     *   last_name?: string|null,
     *   mrz_line_1?: string|null,
     *   mrz_line_2?: string|null,
     *   mrz_line_3?: string|null,
     *   type?: string|null,
     * } $identity_card
     * @param Person|array{
     *   birthday?: string|null,
     *   email?: string|null,
     *   face_image_signed_url?: string|null,
     *   first_name?: string|null,
     *   full_name?: string|null,
     *   gender?: string|null,
     *   last_name?: string|null,
     *   maiden_name?: string|null,
     *   nationality?: string|null,
     *   phone_number?: string|null,
     * } $person
     * @param list<Property|array{
     *   name?: string|null, type?: string|null, value?: string|null
     * }> $properties
     * @param Risk|array{
     *   code?: string|null, reason?: string|null, score?: float|null
     * } $risk
     * @param list<Tag|array{
     *   key?: string|null,
     *   private?: bool|null,
     *   type?: string|null,
     *   value?: string|null,
     * }> $tags
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
        ?string $id = null,
        ?array $aml_suspicions = null,
        ?string $auth_url = null,
        Certificat|array|null $certificat = null,
        ?array $checks = null,
        ?\DateTimeInterface $created_at = null,
        ?array $documents = null,
        IdentityCard|array|null $identity_card = null,
        ?int $number = null,
        Person|array|null $person = null,
        ?string $portal_url = null,
        ?array $properties = null,
        Risk|array|null $risk = null,
        ?string $source_id = null,
        ?string $state = null,
        ?string $status = null,
        ?array $tags = null,
        TechnicalData|array|null $technical_data = null,
        ?string $webview_url = null,
        ?string $workspace_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $aml_suspicions && $obj['aml_suspicions'] = $aml_suspicions;
        null !== $auth_url && $obj['auth_url'] = $auth_url;
        null !== $certificat && $obj['certificat'] = $certificat;
        null !== $checks && $obj['checks'] = $checks;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $documents && $obj['documents'] = $documents;
        null !== $identity_card && $obj['identity_card'] = $identity_card;
        null !== $number && $obj['number'] = $number;
        null !== $person && $obj['person'] = $person;
        null !== $portal_url && $obj['portal_url'] = $portal_url;
        null !== $properties && $obj['properties'] = $properties;
        null !== $risk && $obj['risk'] = $risk;
        null !== $source_id && $obj['source_id'] = $source_id;
        null !== $state && $obj['state'] = $state;
        null !== $status && $obj['status'] = $status;
        null !== $tags && $obj['tags'] = $tags;
        null !== $technical_data && $obj['technical_data'] = $technical_data;
        null !== $webview_url && $obj['webview_url'] = $webview_url;
        null !== $workspace_id && $obj['workspace_id'] = $workspace_id;

        return $obj;
    }

    /**
     * Unique identifier of the individual.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the individual.
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
     * URL to authenticate the individual, usually for document signing or onboarding.
     */
    public function withAuthURL(string $authURL): self
    {
        $obj = clone $this;
        $obj['auth_url'] = $authURL;

        return $obj;
    }

    /**
     * Digital certificate associated with the individual, if any.
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
     * List of verification or validation checks applied to the individual.
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
     * Timestamp of the individual's creation in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * All documents submitted or associated with the individual.
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
     * Reference to the individual's identity document.
     *
     * @param IdentityCard|array{
     *   id?: string|null,
     *   back_document_signed_url?: string|null,
     *   birth_place?: string|null,
     *   birthday?: string|null,
     *   country?: string|null,
     *   expiration_date?: string|null,
     *   first_name?: string|null,
     *   front_document_signed_url?: string|null,
     *   gender?: string|null,
     *   issue_date?: string|null,
     *   last_name?: string|null,
     *   mrz_line_1?: string|null,
     *   mrz_line_2?: string|null,
     *   mrz_line_3?: string|null,
     *   type?: string|null,
     * } $identityCard
     */
    public function withIdentityCard(IdentityCard|array $identityCard): self
    {
        $obj = clone $this;
        $obj['identity_card'] = $identityCard;

        return $obj;
    }

    /**
     * Internal sequential number or reference for the individual.
     */
    public function withNumber(int $number): self
    {
        $obj = clone $this;
        $obj['number'] = $number;

        return $obj;
    }

    /**
     * Personal details of the individual, such as name, date of birth, and contact info.
     *
     * @param Person|array{
     *   birthday?: string|null,
     *   email?: string|null,
     *   face_image_signed_url?: string|null,
     *   first_name?: string|null,
     *   full_name?: string|null,
     *   gender?: string|null,
     *   last_name?: string|null,
     *   maiden_name?: string|null,
     *   nationality?: string|null,
     *   phone_number?: string|null,
     * } $person
     */
    public function withPerson(Person|array $person): self
    {
        $obj = clone $this;
        $obj['person'] = $person;

        return $obj;
    }

    /**
     * Admin or internal portal URL for viewing the individual's details.
     */
    public function withPortalURL(string $portalURL): self
    {
        $obj = clone $this;
        $obj['portal_url'] = $portalURL;

        return $obj;
    }

    /**
     * Custom key-value metadata fields associated with the individual.
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
     * Risk assessment associated with the individual.
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
     * Optional identifier indicating the source of the individual record.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj['source_id'] = $sourceID;

        return $obj;
    }

    /**
     * Current operational state in the workflow (e.g., WAITING, IN_PROGRESS, COMPLETED).
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * Overall processing status of the individual (e.g., rejected, need_review, approved).
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * List of tags assigned to the individual for categorization or metadata purposes.
     *
     * @param list<Tag|array{
     *   key?: string|null,
     *   private?: bool|null,
     *   type?: string|null,
     *   value?: string|null,
     * }> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * Technical metadata related to the request (e.g., QR code settings, language).
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
     * Public-facing webview URL for the individual’s identification process.
     */
    public function withWebviewURL(string $webviewURL): self
    {
        $obj = clone $this;
        $obj['webview_url'] = $webviewURL;

        return $obj;
    }

    /**
     * Identifier of the workspace to which the individual belongs.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj['workspace_id'] = $workspaceID;

        return $obj;
    }
}

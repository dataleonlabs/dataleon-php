<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Check;
use Dataleon\Companies\CompanyRegistration\Member\Source;
use Dataleon\Companies\CompanyRegistration\Member\Type;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\Individuals\Documents\GenericDocument\Table;
use Dataleon\Individuals\Documents\GenericDocument\Value;

/**
 * Represents a member or actor of a company, including personal and ownership information.
 *
 * @phpstan-type MemberShape = array{
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
 *   type?: value-of<Type>|null,
 *   workspace_id?: string|null,
 * }
 */
final class Member implements BaseModel
{
    /** @use SdkModel<MemberShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    /**
     * Address of the member, which may include street, city, postal code, and country.
     */
    #[Api(optional: true)]
    public ?string $address;

    /**
     * Birthday (available only if type = person).
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $birthday;

    /**
     * Birthplace (available only if type = person).
     */
    #[Api(optional: true)]
    public ?string $birthplace;

    /**
     * ISO 3166-1 alpha-2 country code of the member's address (e.g., "FR" for France).
     */
    #[Api(optional: true)]
    public ?string $country;

    /**
     * List of documents associated with the member, including their metadata and processing status.
     *
     * @var list<GenericDocument>|null $documents
     */
    #[Api(list: GenericDocument::class, optional: true)]
    public ?array $documents;

    /**
     * Email address of the member, which may be used for communication or verification purposes.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * First name (available only if type = person).
     */
    #[Api(optional: true)]
    public ?string $first_name;

    /**
     * Indicates whether the member is a beneficial owner of the company, meaning they have significant control or ownership.
     */
    #[Api(optional: true)]
    public ?bool $is_beneficial_owner;

    /**
     * Indicates whether the member is a delegator, meaning they have authority to act on behalf of the company.
     */
    #[Api(optional: true)]
    public ?bool $is_delegator;

    /**
     * Last name (available only if type = person).
     */
    #[Api(optional: true)]
    public ?string $last_name;

    /**
     * Indicates whether liveness verification was performed for the member, typically in the context of identity checks.
     */
    #[Api(optional: true)]
    public ?bool $liveness_verification;

    /**
     * Company name (available only if type = company).
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Percentage of ownership the member has in the company, expressed as an integer between 0 and 100.
     */
    #[Api(optional: true)]
    public ?int $ownership_percentage;

    /**
     * Contact phone number of the member, including country code and area code.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Postal code of the member's address, typically a numeric or alphanumeric code.
     */
    #[Api(optional: true)]
    public ?string $postal_code;

    /**
     * Official registration identifier of the member, such as a national ID or company registration number.
     */
    #[Api(optional: true)]
    public ?string $registration_id;

    /**
     * Type of relationship the member has with the company, such as "shareholder", "director", or "beneficial_owner".
     */
    #[Api(optional: true)]
    public ?string $relation;

    /**
     * Role of the member within the company, such as "legal_representative", "director", or "manager".
     */
    #[Api(optional: true)]
    public ?string $roles;

    /**
     * Source of the data (e.g., government, user, company).
     *
     * @var value-of<Source>|null $source
     */
    #[Api(enum: Source::class, optional: true)]
    public ?string $source;

    /**
     * Current state of the member in the workflow, such as "WAITING", "STARTED", "RUNNING", or "PROCESSED".
     */
    #[Api(optional: true)]
    public ?string $state;

    /**
     * Status of the member in the system, indicating whether they are approved, pending, or rejected. Possible values include "approved", "need_review", "rejected".
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * Member type (person or company).
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * Identifier of the workspace to which the member belongs, used for organizational purposes.
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
     * @param Source|value-of<Source> $source
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $address = null,
        ?\DateTimeInterface $birthday = null,
        ?string $birthplace = null,
        ?string $country = null,
        ?array $documents = null,
        ?string $email = null,
        ?string $first_name = null,
        ?bool $is_beneficial_owner = null,
        ?bool $is_delegator = null,
        ?string $last_name = null,
        ?bool $liveness_verification = null,
        ?string $name = null,
        ?int $ownership_percentage = null,
        ?string $phone_number = null,
        ?string $postal_code = null,
        ?string $registration_id = null,
        ?string $relation = null,
        ?string $roles = null,
        Source|string|null $source = null,
        ?string $state = null,
        ?string $status = null,
        Type|string|null $type = null,
        ?string $workspace_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $address && $obj['address'] = $address;
        null !== $birthday && $obj['birthday'] = $birthday;
        null !== $birthplace && $obj['birthplace'] = $birthplace;
        null !== $country && $obj['country'] = $country;
        null !== $documents && $obj['documents'] = $documents;
        null !== $email && $obj['email'] = $email;
        null !== $first_name && $obj['first_name'] = $first_name;
        null !== $is_beneficial_owner && $obj['is_beneficial_owner'] = $is_beneficial_owner;
        null !== $is_delegator && $obj['is_delegator'] = $is_delegator;
        null !== $last_name && $obj['last_name'] = $last_name;
        null !== $liveness_verification && $obj['liveness_verification'] = $liveness_verification;
        null !== $name && $obj['name'] = $name;
        null !== $ownership_percentage && $obj['ownership_percentage'] = $ownership_percentage;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $postal_code && $obj['postal_code'] = $postal_code;
        null !== $registration_id && $obj['registration_id'] = $registration_id;
        null !== $relation && $obj['relation'] = $relation;
        null !== $roles && $obj['roles'] = $roles;
        null !== $source && $obj['source'] = $source;
        null !== $state && $obj['state'] = $state;
        null !== $status && $obj['status'] = $status;
        null !== $type && $obj['type'] = $type;
        null !== $workspace_id && $obj['workspace_id'] = $workspace_id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Address of the member, which may include street, city, postal code, and country.
     */
    public function withAddress(string $address): self
    {
        $obj = clone $this;
        $obj['address'] = $address;

        return $obj;
    }

    /**
     * Birthday (available only if type = person).
     */
    public function withBirthday(\DateTimeInterface $birthday): self
    {
        $obj = clone $this;
        $obj['birthday'] = $birthday;

        return $obj;
    }

    /**
     * Birthplace (available only if type = person).
     */
    public function withBirthplace(string $birthplace): self
    {
        $obj = clone $this;
        $obj['birthplace'] = $birthplace;

        return $obj;
    }

    /**
     * ISO 3166-1 alpha-2 country code of the member's address (e.g., "FR" for France).
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj['country'] = $country;

        return $obj;
    }

    /**
     * List of documents associated with the member, including their metadata and processing status.
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
     * Email address of the member, which may be used for communication or verification purposes.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * First name (available only if type = person).
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['first_name'] = $firstName;

        return $obj;
    }

    /**
     * Indicates whether the member is a beneficial owner of the company, meaning they have significant control or ownership.
     */
    public function withIsBeneficialOwner(bool $isBeneficialOwner): self
    {
        $obj = clone $this;
        $obj['is_beneficial_owner'] = $isBeneficialOwner;

        return $obj;
    }

    /**
     * Indicates whether the member is a delegator, meaning they have authority to act on behalf of the company.
     */
    public function withIsDelegator(bool $isDelegator): self
    {
        $obj = clone $this;
        $obj['is_delegator'] = $isDelegator;

        return $obj;
    }

    /**
     * Last name (available only if type = person).
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['last_name'] = $lastName;

        return $obj;
    }

    /**
     * Indicates whether liveness verification was performed for the member, typically in the context of identity checks.
     */
    public function withLivenessVerification(bool $livenessVerification): self
    {
        $obj = clone $this;
        $obj['liveness_verification'] = $livenessVerification;

        return $obj;
    }

    /**
     * Company name (available only if type = company).
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Percentage of ownership the member has in the company, expressed as an integer between 0 and 100.
     */
    public function withOwnershipPercentage(int $ownershipPercentage): self
    {
        $obj = clone $this;
        $obj['ownership_percentage'] = $ownershipPercentage;

        return $obj;
    }

    /**
     * Contact phone number of the member, including country code and area code.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Postal code of the member's address, typically a numeric or alphanumeric code.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postal_code'] = $postalCode;

        return $obj;
    }

    /**
     * Official registration identifier of the member, such as a national ID or company registration number.
     */
    public function withRegistrationID(string $registrationID): self
    {
        $obj = clone $this;
        $obj['registration_id'] = $registrationID;

        return $obj;
    }

    /**
     * Type of relationship the member has with the company, such as "shareholder", "director", or "beneficial_owner".
     */
    public function withRelation(string $relation): self
    {
        $obj = clone $this;
        $obj['relation'] = $relation;

        return $obj;
    }

    /**
     * Role of the member within the company, such as "legal_representative", "director", or "manager".
     */
    public function withRoles(string $roles): self
    {
        $obj = clone $this;
        $obj['roles'] = $roles;

        return $obj;
    }

    /**
     * Source of the data (e.g., government, user, company).
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
    }

    /**
     * Current state of the member in the workflow, such as "WAITING", "STARTED", "RUNNING", or "PROCESSED".
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * Status of the member in the system, indicating whether they are approved, pending, or rejected. Possible values include "approved", "need_review", "rejected".
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Member type (person or company).
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Identifier of the workspace to which the member belongs, used for organizational purposes.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj['workspace_id'] = $workspaceID;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Companies\CompanyRegistration\Member\Source;
use Dataleon\Companies\CompanyRegistration\Member\Type;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\GenericDocument;

/**
 * Represents a member or actor of a company, including personal and ownership information.
 *
 * @phpstan-type member_alias = array{
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
 *   type?: value-of<Type>|null,
 *   workspaceID?: string|null,
 * }
 */
final class Member implements BaseModel
{
    /** @use SdkModel<member_alias> */
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
    #[Api('first_name', optional: true)]
    public ?string $firstName;

    /**
     * Indicates whether the member is a beneficial owner of the company, meaning they have significant control or ownership.
     */
    #[Api('is_beneficial_owner', optional: true)]
    public ?bool $isBeneficialOwner;

    /**
     * Indicates whether the member is a delegator, meaning they have authority to act on behalf of the company.
     */
    #[Api('is_delegator', optional: true)]
    public ?bool $isDelegator;

    /**
     * Last name (available only if type = person).
     */
    #[Api('last_name', optional: true)]
    public ?string $lastName;

    /**
     * Indicates whether liveness verification was performed for the member, typically in the context of identity checks.
     */
    #[Api('liveness_verification', optional: true)]
    public ?bool $livenessVerification;

    /**
     * Company name (available only if type = company).
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Percentage of ownership the member has in the company, expressed as an integer between 0 and 100.
     */
    #[Api('ownership_percentage', optional: true)]
    public ?int $ownershipPercentage;

    /**
     * Contact phone number of the member, including country code and area code.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Postal code of the member's address, typically a numeric or alphanumeric code.
     */
    #[Api('postal_code', optional: true)]
    public ?string $postalCode;

    /**
     * Official registration identifier of the member, such as a national ID or company registration number.
     */
    #[Api('registration_id', optional: true)]
    public ?string $registrationID;

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
     * @param list<GenericDocument> $documents
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
        ?string $firstName = null,
        ?bool $isBeneficialOwner = null,
        ?bool $isDelegator = null,
        ?string $lastName = null,
        ?bool $livenessVerification = null,
        ?string $name = null,
        ?int $ownershipPercentage = null,
        ?string $phoneNumber = null,
        ?string $postalCode = null,
        ?string $registrationID = null,
        ?string $relation = null,
        ?string $roles = null,
        Source|string|null $source = null,
        ?string $state = null,
        ?string $status = null,
        Type|string|null $type = null,
        ?string $workspaceID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $address && $obj->address = $address;
        null !== $birthday && $obj->birthday = $birthday;
        null !== $birthplace && $obj->birthplace = $birthplace;
        null !== $country && $obj->country = $country;
        null !== $documents && $obj->documents = $documents;
        null !== $email && $obj->email = $email;
        null !== $firstName && $obj->firstName = $firstName;
        null !== $isBeneficialOwner && $obj->isBeneficialOwner = $isBeneficialOwner;
        null !== $isDelegator && $obj->isDelegator = $isDelegator;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $livenessVerification && $obj->livenessVerification = $livenessVerification;
        null !== $name && $obj->name = $name;
        null !== $ownershipPercentage && $obj->ownershipPercentage = $ownershipPercentage;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $postalCode && $obj->postalCode = $postalCode;
        null !== $registrationID && $obj->registrationID = $registrationID;
        null !== $relation && $obj->relation = $relation;
        null !== $roles && $obj->roles = $roles;
        null !== $source && $obj->source = $source instanceof Source ? $source->value : $source;
        null !== $state && $obj->state = $state;
        null !== $status && $obj->status = $status;
        null !== $type && $obj->type = $type instanceof Type ? $type->value : $type;
        null !== $workspaceID && $obj->workspaceID = $workspaceID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Address of the member, which may include street, city, postal code, and country.
     */
    public function withAddress(string $address): self
    {
        $obj = clone $this;
        $obj->address = $address;

        return $obj;
    }

    /**
     * Birthday (available only if type = person).
     */
    public function withBirthday(\DateTimeInterface $birthday): self
    {
        $obj = clone $this;
        $obj->birthday = $birthday;

        return $obj;
    }

    /**
     * Birthplace (available only if type = person).
     */
    public function withBirthplace(string $birthplace): self
    {
        $obj = clone $this;
        $obj->birthplace = $birthplace;

        return $obj;
    }

    /**
     * ISO 3166-1 alpha-2 country code of the member's address (e.g., "FR" for France).
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    /**
     * List of documents associated with the member, including their metadata and processing status.
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
     * Email address of the member, which may be used for communication or verification purposes.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * First name (available only if type = person).
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    /**
     * Indicates whether the member is a beneficial owner of the company, meaning they have significant control or ownership.
     */
    public function withIsBeneficialOwner(bool $isBeneficialOwner): self
    {
        $obj = clone $this;
        $obj->isBeneficialOwner = $isBeneficialOwner;

        return $obj;
    }

    /**
     * Indicates whether the member is a delegator, meaning they have authority to act on behalf of the company.
     */
    public function withIsDelegator(bool $isDelegator): self
    {
        $obj = clone $this;
        $obj->isDelegator = $isDelegator;

        return $obj;
    }

    /**
     * Last name (available only if type = person).
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    /**
     * Indicates whether liveness verification was performed for the member, typically in the context of identity checks.
     */
    public function withLivenessVerification(bool $livenessVerification): self
    {
        $obj = clone $this;
        $obj->livenessVerification = $livenessVerification;

        return $obj;
    }

    /**
     * Company name (available only if type = company).
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Percentage of ownership the member has in the company, expressed as an integer between 0 and 100.
     */
    public function withOwnershipPercentage(int $ownershipPercentage): self
    {
        $obj = clone $this;
        $obj->ownershipPercentage = $ownershipPercentage;

        return $obj;
    }

    /**
     * Contact phone number of the member, including country code and area code.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Postal code of the member's address, typically a numeric or alphanumeric code.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj->postalCode = $postalCode;

        return $obj;
    }

    /**
     * Official registration identifier of the member, such as a national ID or company registration number.
     */
    public function withRegistrationID(string $registrationID): self
    {
        $obj = clone $this;
        $obj->registrationID = $registrationID;

        return $obj;
    }

    /**
     * Type of relationship the member has with the company, such as "shareholder", "director", or "beneficial_owner".
     */
    public function withRelation(string $relation): self
    {
        $obj = clone $this;
        $obj->relation = $relation;

        return $obj;
    }

    /**
     * Role of the member within the company, such as "legal_representative", "director", or "manager".
     */
    public function withRoles(string $roles): self
    {
        $obj = clone $this;
        $obj->roles = $roles;

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
        $obj->source = $source instanceof Source ? $source->value : $source;

        return $obj;
    }

    /**
     * Current state of the member in the workflow, such as "WAITING", "STARTED", "RUNNING", or "PROCESSED".
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * Status of the member in the system, indicating whether they are approved, pending, or rejected. Possible values include "approved", "need_review", "rejected".
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

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
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * Identifier of the workspace to which the member belongs, used for organizational purposes.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj->workspaceID = $workspaceID;

        return $obj;
    }
}

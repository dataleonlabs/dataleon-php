<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Companies\CompanyRegistration\Member\Source;
use Dataleon\Companies\CompanyRegistration\Member\Type;
use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\GenericDocument;

/**
 * Represents a member or actor of a company, including personal and ownership information.
 *
 * @phpstan-import-type GenericDocumentShape from \Dataleon\Individuals\Documents\GenericDocument
 *
 * @phpstan-type MemberShape = array{
 *   id?: string|null,
 *   address?: string|null,
 *   birthday?: \DateTimeInterface|null,
 *   birthplace?: string|null,
 *   country?: string|null,
 *   documents?: list<GenericDocumentShape>|null,
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
 *   source?: null|Source|value-of<Source>,
 *   state?: string|null,
 *   status?: string|null,
 *   type?: null|Type|value-of<Type>,
 *   workspaceID?: string|null,
 * }
 */
final class Member implements BaseModel
{
    /** @use SdkModel<MemberShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * Address of the member, which may include street, city, postal code, and country.
     */
    #[Optional]
    public ?string $address;

    /**
     * Birthday (available only if type = person).
     */
    #[Optional]
    public ?\DateTimeInterface $birthday;

    /**
     * Birthplace (available only if type = person).
     */
    #[Optional]
    public ?string $birthplace;

    /**
     * ISO 3166-1 alpha-2 country code of the member's address (e.g., "FR" for France).
     */
    #[Optional]
    public ?string $country;

    /**
     * List of documents associated with the member, including their metadata and processing status.
     *
     * @var list<GenericDocument>|null $documents
     */
    #[Optional(list: GenericDocument::class)]
    public ?array $documents;

    /**
     * Email address of the member, which may be used for communication or verification purposes.
     */
    #[Optional]
    public ?string $email;

    /**
     * First name (available only if type = person).
     */
    #[Optional('first_name')]
    public ?string $firstName;

    /**
     * Indicates whether the member is a beneficial owner of the company, meaning they have significant control or ownership.
     */
    #[Optional('is_beneficial_owner')]
    public ?bool $isBeneficialOwner;

    /**
     * Indicates whether the member is a delegator, meaning they have authority to act on behalf of the company.
     */
    #[Optional('is_delegator')]
    public ?bool $isDelegator;

    /**
     * Last name (available only if type = person).
     */
    #[Optional('last_name')]
    public ?string $lastName;

    /**
     * Indicates whether liveness verification was performed for the member, typically in the context of identity checks.
     */
    #[Optional('liveness_verification')]
    public ?bool $livenessVerification;

    /**
     * Company name (available only if type = company).
     */
    #[Optional]
    public ?string $name;

    /**
     * Percentage of ownership the member has in the company, expressed as an integer between 0 and 100.
     */
    #[Optional('ownership_percentage')]
    public ?int $ownershipPercentage;

    /**
     * Contact phone number of the member, including country code and area code.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Postal code of the member's address, typically a numeric or alphanumeric code.
     */
    #[Optional('postal_code')]
    public ?string $postalCode;

    /**
     * Official registration identifier of the member, such as a national ID or company registration number.
     */
    #[Optional('registration_id')]
    public ?string $registrationID;

    /**
     * Type of relationship the member has with the company, such as "shareholder", "director", or "beneficial_owner".
     */
    #[Optional]
    public ?string $relation;

    /**
     * Role of the member within the company, such as "legal_representative", "director", or "manager".
     */
    #[Optional]
    public ?string $roles;

    /**
     * Source of the data (e.g., government, user, company).
     *
     * @var value-of<Source>|null $source
     */
    #[Optional(enum: Source::class)]
    public ?string $source;

    /**
     * Current state of the member in the workflow, such as "WAITING", "STARTED", "RUNNING", or "PROCESSED".
     */
    #[Optional]
    public ?string $state;

    /**
     * Status of the member in the system, indicating whether they are approved, pending, or rejected. Possible values include "approved", "need_review", "rejected".
     */
    #[Optional]
    public ?string $status;

    /**
     * Member type (person or company).
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * Identifier of the workspace to which the member belongs, used for organizational purposes.
     */
    #[Optional('workspace_id')]
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
     * @param list<GenericDocumentShape> $documents
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $address && $self['address'] = $address;
        null !== $birthday && $self['birthday'] = $birthday;
        null !== $birthplace && $self['birthplace'] = $birthplace;
        null !== $country && $self['country'] = $country;
        null !== $documents && $self['documents'] = $documents;
        null !== $email && $self['email'] = $email;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $isBeneficialOwner && $self['isBeneficialOwner'] = $isBeneficialOwner;
        null !== $isDelegator && $self['isDelegator'] = $isDelegator;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $livenessVerification && $self['livenessVerification'] = $livenessVerification;
        null !== $name && $self['name'] = $name;
        null !== $ownershipPercentage && $self['ownershipPercentage'] = $ownershipPercentage;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $registrationID && $self['registrationID'] = $registrationID;
        null !== $relation && $self['relation'] = $relation;
        null !== $roles && $self['roles'] = $roles;
        null !== $source && $self['source'] = $source;
        null !== $state && $self['state'] = $state;
        null !== $status && $self['status'] = $status;
        null !== $type && $self['type'] = $type;
        null !== $workspaceID && $self['workspaceID'] = $workspaceID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Address of the member, which may include street, city, postal code, and country.
     */
    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * Birthday (available only if type = person).
     */
    public function withBirthday(\DateTimeInterface $birthday): self
    {
        $self = clone $this;
        $self['birthday'] = $birthday;

        return $self;
    }

    /**
     * Birthplace (available only if type = person).
     */
    public function withBirthplace(string $birthplace): self
    {
        $self = clone $this;
        $self['birthplace'] = $birthplace;

        return $self;
    }

    /**
     * ISO 3166-1 alpha-2 country code of the member's address (e.g., "FR" for France).
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * List of documents associated with the member, including their metadata and processing status.
     *
     * @param list<GenericDocumentShape> $documents
     */
    public function withDocuments(array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }

    /**
     * Email address of the member, which may be used for communication or verification purposes.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * First name (available only if type = person).
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * Indicates whether the member is a beneficial owner of the company, meaning they have significant control or ownership.
     */
    public function withIsBeneficialOwner(bool $isBeneficialOwner): self
    {
        $self = clone $this;
        $self['isBeneficialOwner'] = $isBeneficialOwner;

        return $self;
    }

    /**
     * Indicates whether the member is a delegator, meaning they have authority to act on behalf of the company.
     */
    public function withIsDelegator(bool $isDelegator): self
    {
        $self = clone $this;
        $self['isDelegator'] = $isDelegator;

        return $self;
    }

    /**
     * Last name (available only if type = person).
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * Indicates whether liveness verification was performed for the member, typically in the context of identity checks.
     */
    public function withLivenessVerification(bool $livenessVerification): self
    {
        $self = clone $this;
        $self['livenessVerification'] = $livenessVerification;

        return $self;
    }

    /**
     * Company name (available only if type = company).
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Percentage of ownership the member has in the company, expressed as an integer between 0 and 100.
     */
    public function withOwnershipPercentage(int $ownershipPercentage): self
    {
        $self = clone $this;
        $self['ownershipPercentage'] = $ownershipPercentage;

        return $self;
    }

    /**
     * Contact phone number of the member, including country code and area code.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Postal code of the member's address, typically a numeric or alphanumeric code.
     */
    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * Official registration identifier of the member, such as a national ID or company registration number.
     */
    public function withRegistrationID(string $registrationID): self
    {
        $self = clone $this;
        $self['registrationID'] = $registrationID;

        return $self;
    }

    /**
     * Type of relationship the member has with the company, such as "shareholder", "director", or "beneficial_owner".
     */
    public function withRelation(string $relation): self
    {
        $self = clone $this;
        $self['relation'] = $relation;

        return $self;
    }

    /**
     * Role of the member within the company, such as "legal_representative", "director", or "manager".
     */
    public function withRoles(string $roles): self
    {
        $self = clone $this;
        $self['roles'] = $roles;

        return $self;
    }

    /**
     * Source of the data (e.g., government, user, company).
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * Current state of the member in the workflow, such as "WAITING", "STARTED", "RUNNING", or "PROCESSED".
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Status of the member in the system, indicating whether they are approved, pending, or rejected. Possible values include "approved", "need_review", "rejected".
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Member type (person or company).
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Identifier of the workspace to which the member belongs, used for organizational purposes.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $self = clone $this;
        $self['workspaceID'] = $workspaceID;

        return $self;
    }
}

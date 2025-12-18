<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\Kbis;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\Kbis\Member\Type;

/**
 * A member (person or entity) associated with the company from a KBIS document.
 *
 * @phpstan-type MemberShape = array{
 *   id?: string|null,
 *   address?: string|null,
 *   birthday?: \DateTimeInterface|null,
 *   birthplace?: string|null,
 *   country?: string|null,
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
 *   source?: string|null,
 *   status?: string|null,
 *   type?: null|Type|value-of<Type>,
 *   workspaceID?: string|null,
 * }
 */
final class Member implements BaseModel
{
    /** @use SdkModel<MemberShape> */
    use SdkModel;

    /**
     * Unique identifier for the member.
     */
    #[Optional]
    public ?string $id;

    /**
     * Address of the member.
     */
    #[Optional]
    public ?string $address;

    /**
     * Birth date of the person (only if type = person).
     */
    #[Optional]
    public ?\DateTimeInterface $birthday;

    /**
     * Place of birth (only if type = person).
     */
    #[Optional]
    public ?string $birthplace;

    /**
     * Country of residence or registration.
     */
    #[Optional]
    public ?string $country;

    /**
     * Email address of the member.
     */
    #[Optional]
    public ?string $email;

    /**
     * First name of the person (only if type = person).
     */
    #[Optional('first_name')]
    public ?string $firstName;

    /**
     * Indicates if this member is a beneficial owner.
     */
    #[Optional('is_beneficial_owner')]
    public ?bool $isBeneficialOwner;

    /**
     * Indicates if this member is a delegator.
     */
    #[Optional('is_delegator')]
    public ?bool $isDelegator;

    /**
     * Last name of the person (only if type = person).
     */
    #[Optional('last_name')]
    public ?string $lastName;

    /**
     * Indicates if the member passed liveness verification.
     */
    #[Optional('liveness_verification')]
    public ?bool $livenessVerification;

    /**
     * Name of the company (only if type = company).
     */
    #[Optional]
    public ?string $name;

    /**
     * Ownership percentage held by the member.
     */
    #[Optional('ownership_percentage')]
    public ?int $ownershipPercentage;

    /**
     * Phone number of the member.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Postal code of the member's address.
     */
    #[Optional('postal_code')]
    public ?string $postalCode;

    /**
     * Company registration number (if type = company).
     */
    #[Optional('registration_id')]
    public ?string $registrationID;

    /**
     * Type of relation (e.g., shareholder, director).
     */
    #[Optional]
    public ?string $relation;

    /**
     * Roles held by the member (e.g., legal_representative or shareholder).
     */
    #[Optional]
    public ?string $roles;

    /**
     * Source of the data (e.g., gouv, user, company).
     */
    #[Optional]
    public ?string $source;

    /**
     * Current status of the member.
     */
    #[Optional]
    public ?string $status;

    /**
     * Type of entity (company or person).
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * Workspace identifier for internal tracking.
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
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $id = null,
        ?string $address = null,
        ?\DateTimeInterface $birthday = null,
        ?string $birthplace = null,
        ?string $country = null,
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
        ?string $source = null,
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
        null !== $status && $self['status'] = $status;
        null !== $type && $self['type'] = $type;
        null !== $workspaceID && $self['workspaceID'] = $workspaceID;

        return $self;
    }

    /**
     * Unique identifier for the member.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Address of the member.
     */
    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * Birth date of the person (only if type = person).
     */
    public function withBirthday(\DateTimeInterface $birthday): self
    {
        $self = clone $this;
        $self['birthday'] = $birthday;

        return $self;
    }

    /**
     * Place of birth (only if type = person).
     */
    public function withBirthplace(string $birthplace): self
    {
        $self = clone $this;
        $self['birthplace'] = $birthplace;

        return $self;
    }

    /**
     * Country of residence or registration.
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * Email address of the member.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * First name of the person (only if type = person).
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * Indicates if this member is a beneficial owner.
     */
    public function withIsBeneficialOwner(bool $isBeneficialOwner): self
    {
        $self = clone $this;
        $self['isBeneficialOwner'] = $isBeneficialOwner;

        return $self;
    }

    /**
     * Indicates if this member is a delegator.
     */
    public function withIsDelegator(bool $isDelegator): self
    {
        $self = clone $this;
        $self['isDelegator'] = $isDelegator;

        return $self;
    }

    /**
     * Last name of the person (only if type = person).
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * Indicates if the member passed liveness verification.
     */
    public function withLivenessVerification(bool $livenessVerification): self
    {
        $self = clone $this;
        $self['livenessVerification'] = $livenessVerification;

        return $self;
    }

    /**
     * Name of the company (only if type = company).
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Ownership percentage held by the member.
     */
    public function withOwnershipPercentage(int $ownershipPercentage): self
    {
        $self = clone $this;
        $self['ownershipPercentage'] = $ownershipPercentage;

        return $self;
    }

    /**
     * Phone number of the member.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Postal code of the member's address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * Company registration number (if type = company).
     */
    public function withRegistrationID(string $registrationID): self
    {
        $self = clone $this;
        $self['registrationID'] = $registrationID;

        return $self;
    }

    /**
     * Type of relation (e.g., shareholder, director).
     */
    public function withRelation(string $relation): self
    {
        $self = clone $this;
        $self['relation'] = $relation;

        return $self;
    }

    /**
     * Roles held by the member (e.g., legal_representative or shareholder).
     */
    public function withRoles(string $roles): self
    {
        $self = clone $this;
        $self['roles'] = $roles;

        return $self;
    }

    /**
     * Source of the data (e.g., gouv, user, company).
     */
    public function withSource(string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * Current status of the member.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Type of entity (company or person).
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
     * Workspace identifier for internal tracking.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $self = clone $this;
        $self['workspaceID'] = $workspaceID;

        return $self;
    }
}

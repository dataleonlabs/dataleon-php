<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\Kbis;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\Kbis\Member\Type;

/**
 * A member (person or entity) associated with the company from a KBIS document.
 *
 * @phpstan-type member_alias = array{
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
 *   type?: Type::*|null,
 *   workspaceID?: string|null,
 * }
 */
final class Member implements BaseModel
{
    /** @use SdkModel<member_alias> */
    use SdkModel;

    /**
     * Unique identifier for the member.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Address of the member.
     */
    #[Api(optional: true)]
    public ?string $address;

    /**
     * Birth date of the person (only if type = person).
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $birthday;

    /**
     * Place of birth (only if type = person).
     */
    #[Api(optional: true)]
    public ?string $birthplace;

    /**
     * Country of residence or registration.
     */
    #[Api(optional: true)]
    public ?string $country;

    /**
     * Email address of the member.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * First name of the person (only if type = person).
     */
    #[Api('first_name', optional: true)]
    public ?string $firstName;

    /**
     * Indicates if this member is a beneficial owner.
     */
    #[Api('is_beneficial_owner', optional: true)]
    public ?bool $isBeneficialOwner;

    /**
     * Indicates if this member is a delegator.
     */
    #[Api('is_delegator', optional: true)]
    public ?bool $isDelegator;

    /**
     * Last name of the person (only if type = person).
     */
    #[Api('last_name', optional: true)]
    public ?string $lastName;

    /**
     * Indicates if the member passed liveness verification.
     */
    #[Api('liveness_verification', optional: true)]
    public ?bool $livenessVerification;

    /**
     * Name of the company (only if type = company).
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Ownership percentage held by the member.
     */
    #[Api('ownership_percentage', optional: true)]
    public ?int $ownershipPercentage;

    /**
     * Phone number of the member.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Postal code of the member's address.
     */
    #[Api('postal_code', optional: true)]
    public ?string $postalCode;

    /**
     * Company registration number (if type = company).
     */
    #[Api('registration_id', optional: true)]
    public ?string $registrationID;

    /**
     * Type of relation (e.g., shareholder, director).
     */
    #[Api(optional: true)]
    public ?string $relation;

    /**
     * Roles held by the member (e.g., legal_representative or shareholder).
     */
    #[Api(optional: true)]
    public ?string $roles;

    /**
     * Source of the data (e.g., gouv, user, company).
     */
    #[Api(optional: true)]
    public ?string $source;

    /**
     * Current status of the member.
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * Type of entity (company or person).
     *
     * @var Type::*|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * Workspace identifier for internal tracking.
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
     * @param Type::* $type
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
        ?string $type = null,
        ?string $workspaceID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $address && $obj->address = $address;
        null !== $birthday && $obj->birthday = $birthday;
        null !== $birthplace && $obj->birthplace = $birthplace;
        null !== $country && $obj->country = $country;
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
        null !== $source && $obj->source = $source;
        null !== $status && $obj->status = $status;
        null !== $type && $obj->type = $type;
        null !== $workspaceID && $obj->workspaceID = $workspaceID;

        return $obj;
    }

    /**
     * Unique identifier for the member.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Address of the member.
     */
    public function withAddress(string $address): self
    {
        $obj = clone $this;
        $obj->address = $address;

        return $obj;
    }

    /**
     * Birth date of the person (only if type = person).
     */
    public function withBirthday(\DateTimeInterface $birthday): self
    {
        $obj = clone $this;
        $obj->birthday = $birthday;

        return $obj;
    }

    /**
     * Place of birth (only if type = person).
     */
    public function withBirthplace(string $birthplace): self
    {
        $obj = clone $this;
        $obj->birthplace = $birthplace;

        return $obj;
    }

    /**
     * Country of residence or registration.
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    /**
     * Email address of the member.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * First name of the person (only if type = person).
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    /**
     * Indicates if this member is a beneficial owner.
     */
    public function withIsBeneficialOwner(bool $isBeneficialOwner): self
    {
        $obj = clone $this;
        $obj->isBeneficialOwner = $isBeneficialOwner;

        return $obj;
    }

    /**
     * Indicates if this member is a delegator.
     */
    public function withIsDelegator(bool $isDelegator): self
    {
        $obj = clone $this;
        $obj->isDelegator = $isDelegator;

        return $obj;
    }

    /**
     * Last name of the person (only if type = person).
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    /**
     * Indicates if the member passed liveness verification.
     */
    public function withLivenessVerification(bool $livenessVerification): self
    {
        $obj = clone $this;
        $obj->livenessVerification = $livenessVerification;

        return $obj;
    }

    /**
     * Name of the company (only if type = company).
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Ownership percentage held by the member.
     */
    public function withOwnershipPercentage(int $ownershipPercentage): self
    {
        $obj = clone $this;
        $obj->ownershipPercentage = $ownershipPercentage;

        return $obj;
    }

    /**
     * Phone number of the member.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Postal code of the member's address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj->postalCode = $postalCode;

        return $obj;
    }

    /**
     * Company registration number (if type = company).
     */
    public function withRegistrationID(string $registrationID): self
    {
        $obj = clone $this;
        $obj->registrationID = $registrationID;

        return $obj;
    }

    /**
     * Type of relation (e.g., shareholder, director).
     */
    public function withRelation(string $relation): self
    {
        $obj = clone $this;
        $obj->relation = $relation;

        return $obj;
    }

    /**
     * Roles held by the member (e.g., legal_representative or shareholder).
     */
    public function withRoles(string $roles): self
    {
        $obj = clone $this;
        $obj->roles = $roles;

        return $obj;
    }

    /**
     * Source of the data (e.g., gouv, user, company).
     */
    public function withSource(string $source): self
    {
        $obj = clone $this;
        $obj->source = $source;

        return $obj;
    }

    /**
     * Current status of the member.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * Type of entity (company or person).
     *
     * @param Type::* $type
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * Workspace identifier for internal tracking.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj->workspaceID = $workspaceID;

        return $obj;
    }
}

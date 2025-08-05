<?php

declare(strict_types=1);

namespace Dataleon\Models\Individuals\Kbis;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Models\Individuals\Kbis\Member\Type;

/**
 * A member (person or entity) associated with the company from a KBIS document.
 *
 * @phpstan-type member_alias = array{
 *   id?: string,
 *   address?: string,
 *   birthday?: \DateTimeInterface,
 *   birthplace?: string,
 *   country?: string,
 *   email?: string,
 *   firstName?: string,
 *   isBeneficialOwner?: bool,
 *   isDelegator?: bool,
 *   lastName?: string,
 *   livenessVerification?: bool,
 *   name?: string,
 *   ownershipPercentage?: int,
 *   phoneNumber?: string,
 *   postalCode?: string,
 *   registrationID?: string,
 *   relation?: string,
 *   roles?: string,
 *   source?: string,
 *   status?: string,
 *   type?: Type::*,
 *   workspaceID?: string,
 * }
 */
final class Member implements BaseModel
{
    use Model;

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
     * @var null|Type::* $type
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
     * @param null|Type::* $type
     */
    public static function new(
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
    public function setID(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Address of the member.
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Birth date of the person (only if type = person).
     */
    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Place of birth (only if type = person).
     */
    public function setBirthplace(string $birthplace): self
    {
        $this->birthplace = $birthplace;

        return $this;
    }

    /**
     * Country of residence or registration.
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Email address of the member.
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * First name of the person (only if type = person).
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Indicates if this member is a beneficial owner.
     */
    public function setIsBeneficialOwner(bool $isBeneficialOwner): self
    {
        $this->isBeneficialOwner = $isBeneficialOwner;

        return $this;
    }

    /**
     * Indicates if this member is a delegator.
     */
    public function setIsDelegator(bool $isDelegator): self
    {
        $this->isDelegator = $isDelegator;

        return $this;
    }

    /**
     * Last name of the person (only if type = person).
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Indicates if the member passed liveness verification.
     */
    public function setLivenessVerification(bool $livenessVerification): self
    {
        $this->livenessVerification = $livenessVerification;

        return $this;
    }

    /**
     * Name of the company (only if type = company).
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Ownership percentage held by the member.
     */
    public function setOwnershipPercentage(int $ownershipPercentage): self
    {
        $this->ownershipPercentage = $ownershipPercentage;

        return $this;
    }

    /**
     * Phone number of the member.
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Postal code of the member's address.
     */
    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Company registration number (if type = company).
     */
    public function setRegistrationID(string $registrationID): self
    {
        $this->registrationID = $registrationID;

        return $this;
    }

    /**
     * Type of relation (e.g., shareholder, director).
     */
    public function setRelation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * Roles held by the member (e.g., legal_representative or shareholder).
     */
    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Source of the data (e.g., gouv, user, company).
     */
    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Current status of the member.
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Type of entity (company or person).
     *
     * @param Type::* $type
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Workspace identifier for internal tracking.
     */
    public function setWorkspaceID(string $workspaceID): self
    {
        $this->workspaceID = $workspaceID;

        return $this;
    }
}

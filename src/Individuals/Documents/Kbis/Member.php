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
 * @phpstan-type MemberShape = array{
 *   id?: string|null,
 *   address?: string|null,
 *   birthday?: \DateTimeInterface|null,
 *   birthplace?: string|null,
 *   country?: string|null,
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
 *   source?: string|null,
 *   status?: string|null,
 *   type?: value-of<Type>|null,
 *   workspace_id?: string|null,
 * }
 */
final class Member implements BaseModel
{
    /** @use SdkModel<MemberShape> */
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
    #[Api(optional: true)]
    public ?string $first_name;

    /**
     * Indicates if this member is a beneficial owner.
     */
    #[Api(optional: true)]
    public ?bool $is_beneficial_owner;

    /**
     * Indicates if this member is a delegator.
     */
    #[Api(optional: true)]
    public ?bool $is_delegator;

    /**
     * Last name of the person (only if type = person).
     */
    #[Api(optional: true)]
    public ?string $last_name;

    /**
     * Indicates if the member passed liveness verification.
     */
    #[Api(optional: true)]
    public ?bool $liveness_verification;

    /**
     * Name of the company (only if type = company).
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Ownership percentage held by the member.
     */
    #[Api(optional: true)]
    public ?int $ownership_percentage;

    /**
     * Phone number of the member.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Postal code of the member's address.
     */
    #[Api(optional: true)]
    public ?string $postal_code;

    /**
     * Company registration number (if type = company).
     */
    #[Api(optional: true)]
    public ?string $registration_id;

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
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * Workspace identifier for internal tracking.
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $address = null,
        ?\DateTimeInterface $birthday = null,
        ?string $birthplace = null,
        ?string $country = null,
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
        ?string $source = null,
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
        null !== $status && $obj['status'] = $status;
        null !== $type && $obj['type'] = $type;
        null !== $workspace_id && $obj['workspace_id'] = $workspace_id;

        return $obj;
    }

    /**
     * Unique identifier for the member.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Address of the member.
     */
    public function withAddress(string $address): self
    {
        $obj = clone $this;
        $obj['address'] = $address;

        return $obj;
    }

    /**
     * Birth date of the person (only if type = person).
     */
    public function withBirthday(\DateTimeInterface $birthday): self
    {
        $obj = clone $this;
        $obj['birthday'] = $birthday;

        return $obj;
    }

    /**
     * Place of birth (only if type = person).
     */
    public function withBirthplace(string $birthplace): self
    {
        $obj = clone $this;
        $obj['birthplace'] = $birthplace;

        return $obj;
    }

    /**
     * Country of residence or registration.
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj['country'] = $country;

        return $obj;
    }

    /**
     * Email address of the member.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * First name of the person (only if type = person).
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['first_name'] = $firstName;

        return $obj;
    }

    /**
     * Indicates if this member is a beneficial owner.
     */
    public function withIsBeneficialOwner(bool $isBeneficialOwner): self
    {
        $obj = clone $this;
        $obj['is_beneficial_owner'] = $isBeneficialOwner;

        return $obj;
    }

    /**
     * Indicates if this member is a delegator.
     */
    public function withIsDelegator(bool $isDelegator): self
    {
        $obj = clone $this;
        $obj['is_delegator'] = $isDelegator;

        return $obj;
    }

    /**
     * Last name of the person (only if type = person).
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['last_name'] = $lastName;

        return $obj;
    }

    /**
     * Indicates if the member passed liveness verification.
     */
    public function withLivenessVerification(bool $livenessVerification): self
    {
        $obj = clone $this;
        $obj['liveness_verification'] = $livenessVerification;

        return $obj;
    }

    /**
     * Name of the company (only if type = company).
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Ownership percentage held by the member.
     */
    public function withOwnershipPercentage(int $ownershipPercentage): self
    {
        $obj = clone $this;
        $obj['ownership_percentage'] = $ownershipPercentage;

        return $obj;
    }

    /**
     * Phone number of the member.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Postal code of the member's address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postal_code'] = $postalCode;

        return $obj;
    }

    /**
     * Company registration number (if type = company).
     */
    public function withRegistrationID(string $registrationID): self
    {
        $obj = clone $this;
        $obj['registration_id'] = $registrationID;

        return $obj;
    }

    /**
     * Type of relation (e.g., shareholder, director).
     */
    public function withRelation(string $relation): self
    {
        $obj = clone $this;
        $obj['relation'] = $relation;

        return $obj;
    }

    /**
     * Roles held by the member (e.g., legal_representative or shareholder).
     */
    public function withRoles(string $roles): self
    {
        $obj = clone $this;
        $obj['roles'] = $roles;

        return $obj;
    }

    /**
     * Source of the data (e.g., gouv, user, company).
     */
    public function withSource(string $source): self
    {
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
    }

    /**
     * Current status of the member.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Type of entity (company or person).
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
     * Workspace identifier for internal tracking.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj['workspace_id'] = $workspaceID;

        return $obj;
    }
}

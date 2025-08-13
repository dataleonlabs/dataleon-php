<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Companies\CompanyRegistration\Member\Source;
use Dataleon\Companies\CompanyRegistration\Member\Type;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Individuals\Documents\GenericDocument;

/**
 * Represents a member or actor of a company, including personal and ownership information.
 *
 * @phpstan-type member_alias = array{
 *   id?: string,
 *   address?: string,
 *   birthday?: \DateTimeInterface,
 *   birthplace?: string,
 *   country?: string,
 *   documents?: list<GenericDocument>,
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
 *   source?: Source::*,
 *   state?: string,
 *   status?: string,
 *   type?: Type::*,
 *   workspaceID?: string,
 * }
 */
final class Member implements BaseModel
{
    use Model;

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
     * @var null|list<GenericDocument> $documents
     */
    #[Api(type: new ListOf(GenericDocument::class), optional: true)]
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
     * @var null|Source::* $source
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
     * @var null|Type::* $type
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
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param null|list<GenericDocument> $documents
     * @param null|Source::* $source
     * @param null|Type::* $type
     */
    public static function from(
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
        ?string $source = null,
        ?string $state = null,
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
        null !== $source && $obj->source = $source;
        null !== $state && $obj->state = $state;
        null !== $status && $obj->status = $status;
        null !== $type && $obj->type = $type;
        null !== $workspaceID && $obj->workspaceID = $workspaceID;

        return $obj;
    }

    public function setID(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Address of the member, which may include street, city, postal code, and country.
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Birthday (available only if type = person).
     */
    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Birthplace (available only if type = person).
     */
    public function setBirthplace(string $birthplace): self
    {
        $this->birthplace = $birthplace;

        return $this;
    }

    /**
     * ISO 3166-1 alpha-2 country code of the member's address (e.g., "FR" for France).
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * List of documents associated with the member, including their metadata and processing status.
     *
     * @param list<GenericDocument> $documents
     */
    public function setDocuments(array $documents): self
    {
        $this->documents = $documents;

        return $this;
    }

    /**
     * Email address of the member, which may be used for communication or verification purposes.
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * First name (available only if type = person).
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Indicates whether the member is a beneficial owner of the company, meaning they have significant control or ownership.
     */
    public function setIsBeneficialOwner(bool $isBeneficialOwner): self
    {
        $this->isBeneficialOwner = $isBeneficialOwner;

        return $this;
    }

    /**
     * Indicates whether the member is a delegator, meaning they have authority to act on behalf of the company.
     */
    public function setIsDelegator(bool $isDelegator): self
    {
        $this->isDelegator = $isDelegator;

        return $this;
    }

    /**
     * Last name (available only if type = person).
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Indicates whether liveness verification was performed for the member, typically in the context of identity checks.
     */
    public function setLivenessVerification(bool $livenessVerification): self
    {
        $this->livenessVerification = $livenessVerification;

        return $this;
    }

    /**
     * Company name (available only if type = company).
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Percentage of ownership the member has in the company, expressed as an integer between 0 and 100.
     */
    public function setOwnershipPercentage(int $ownershipPercentage): self
    {
        $this->ownershipPercentage = $ownershipPercentage;

        return $this;
    }

    /**
     * Contact phone number of the member, including country code and area code.
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Postal code of the member's address, typically a numeric or alphanumeric code.
     */
    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Official registration identifier of the member, such as a national ID or company registration number.
     */
    public function setRegistrationID(string $registrationID): self
    {
        $this->registrationID = $registrationID;

        return $this;
    }

    /**
     * Type of relationship the member has with the company, such as "shareholder", "director", or "beneficial_owner".
     */
    public function setRelation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * Role of the member within the company, such as "legal_representative", "director", or "manager".
     */
    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Source of the data (e.g., government, user, company).
     *
     * @param Source::* $source
     */
    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Current state of the member in the workflow, such as "WAITING", "STARTED", "RUNNING", or "PROCESSED".
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Status of the member in the system, indicating whether they are approved, pending, or rejected. Possible values include "approved", "need_review", "rejected".
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Member type (person or company).
     *
     * @param Type::* $type
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Identifier of the workspace to which the member belongs, used for organizational purposes.
     */
    public function setWorkspaceID(string $workspaceID): self
    {
        $this->workspaceID = $workspaceID;

        return $this;
    }
}

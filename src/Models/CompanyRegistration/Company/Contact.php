<?php

declare(strict_types=1);

namespace Dataleon\Models\CompanyRegistration\Company;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Contact information for the company, including email, phone number, and address.
 *
 * @phpstan-type contact_alias = array{
 *   department?: string,
 *   email?: string,
 *   firstName?: string,
 *   lastName?: string,
 *   phoneNumber?: string,
 * }
 */
final class Contact implements BaseModel
{
    use Model;

    /**
     * Department of the contact person.
     */
    #[Api(optional: true)]
    public ?string $department;

    /**
     * Email address of the contact person.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * First name of the contact person.
     */
    #[Api('first_name', optional: true)]
    public ?string $firstName;

    /**
     * Last name of the contact person.
     */
    #[Api('last_name', optional: true)]
    public ?string $lastName;

    /**
     * Phone number of the contact person.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function new(
        ?string $department = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $phoneNumber = null,
    ): self {
        $obj = new self;

        null !== $department && $obj->department = $department;
        null !== $email && $obj->email = $email;
        null !== $firstName && $obj->firstName = $firstName;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Department of the contact person.
     */
    public function setDepartment(string $department): self
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Email address of the contact person.
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * First name of the contact person.
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Last name of the contact person.
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Phone number of the contact person.
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}

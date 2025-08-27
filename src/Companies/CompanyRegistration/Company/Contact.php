<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration\Company;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Contact information for the company, including email, phone number, and address.
 *
 * @phpstan-type contact_alias = array{
 *   department?: string|null,
 *   email?: string|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   phoneNumber?: string|null,
 * }
 */
final class Contact implements BaseModel
{
    /** @use SdkModel<contact_alias> */
    use SdkModel;

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
    public static function with(
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
    public function withDepartment(string $department): self
    {
        $obj = clone $this;
        $obj->department = $department;

        return $obj;
    }

    /**
     * Email address of the contact person.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * First name of the contact person.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    /**
     * Last name of the contact person.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    /**
     * Phone number of the contact person.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}

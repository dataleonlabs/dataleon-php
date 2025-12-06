<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration\Company;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Contact information for the company, including email, phone number, and address.
 *
 * @phpstan-type ContactShape = array{
 *   department?: string|null,
 *   email?: string|null,
 *   first_name?: string|null,
 *   last_name?: string|null,
 *   phone_number?: string|null,
 * }
 */
final class Contact implements BaseModel
{
    /** @use SdkModel<ContactShape> */
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
    #[Api(optional: true)]
    public ?string $first_name;

    /**
     * Last name of the contact person.
     */
    #[Api(optional: true)]
    public ?string $last_name;

    /**
     * Phone number of the contact person.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $department = null,
        ?string $email = null,
        ?string $first_name = null,
        ?string $last_name = null,
        ?string $phone_number = null,
    ): self {
        $obj = new self;

        null !== $department && $obj['department'] = $department;
        null !== $email && $obj['email'] = $email;
        null !== $first_name && $obj['first_name'] = $first_name;
        null !== $last_name && $obj['last_name'] = $last_name;
        null !== $phone_number && $obj['phone_number'] = $phone_number;

        return $obj;
    }

    /**
     * Department of the contact person.
     */
    public function withDepartment(string $department): self
    {
        $obj = clone $this;
        $obj['department'] = $department;

        return $obj;
    }

    /**
     * Email address of the contact person.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * First name of the contact person.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['first_name'] = $firstName;

        return $obj;
    }

    /**
     * Last name of the contact person.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['last_name'] = $lastName;

        return $obj;
    }

    /**
     * Phone number of the contact person.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}

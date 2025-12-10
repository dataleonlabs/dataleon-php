<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration\Company;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Contact information for the company, including email, phone number, and address.
 *
 * @phpstan-type ContactShape = array{
 *   department?: string|null,
 *   email?: string|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   phoneNumber?: string|null,
 * }
 */
final class Contact implements BaseModel
{
    /** @use SdkModel<ContactShape> */
    use SdkModel;

    /**
     * Department of the contact person.
     */
    #[Optional]
    public ?string $department;

    /**
     * Email address of the contact person.
     */
    #[Optional]
    public ?string $email;

    /**
     * First name of the contact person.
     */
    #[Optional('first_name')]
    public ?string $firstName;

    /**
     * Last name of the contact person.
     */
    #[Optional('last_name')]
    public ?string $lastName;

    /**
     * Phone number of the contact person.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

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
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $phoneNumber = null,
    ): self {
        $self = new self;

        null !== $department && $self['department'] = $department;
        null !== $email && $self['email'] = $email;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Department of the contact person.
     */
    public function withDepartment(string $department): self
    {
        $self = clone $this;
        $self['department'] = $department;

        return $self;
    }

    /**
     * Email address of the contact person.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * First name of the contact person.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * Last name of the contact person.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * Phone number of the contact person.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}

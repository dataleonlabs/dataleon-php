<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualUpdateParams;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\IndividualUpdateParams\Person\Gender;

/**
 * Personal information about the individual.
 *
 * @phpstan-type PersonShape = array{
 *   birthday?: string|null,
 *   email?: string|null,
 *   firstName?: string|null,
 *   gender?: null|Gender|value-of<Gender>,
 *   lastName?: string|null,
 *   maidenName?: string|null,
 *   nationality?: string|null,
 *   phoneNumber?: string|null,
 * }
 */
final class Person implements BaseModel
{
    /** @use SdkModel<PersonShape> */
    use SdkModel;

    /**
     * Date of birth in DD/MM/YYYY format.
     */
    #[Optional]
    public ?string $birthday;

    /**
     * Email address of the individual.
     */
    #[Optional]
    public ?string $email;

    /**
     * First name of the individual.
     */
    #[Optional('first_name')]
    public ?string $firstName;

    /**
     * Gender of the individual (M for male, F for female).
     *
     * @var value-of<Gender>|null $gender
     */
    #[Optional(enum: Gender::class)]
    public ?string $gender;

    /**
     * Last name (family name) of the individual.
     */
    #[Optional('last_name')]
    public ?string $lastName;

    /**
     * Maiden name, if applicable.
     */
    #[Optional('maiden_name')]
    public ?string $maidenName;

    /**
     * Nationality of the individual (ISO 3166-1 alpha-3 country code).
     */
    #[Optional]
    public ?string $nationality;

    /**
     * Phone number of the individual.
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
     *
     * @param Gender|value-of<Gender>|null $gender
     */
    public static function with(
        ?string $birthday = null,
        ?string $email = null,
        ?string $firstName = null,
        Gender|string|null $gender = null,
        ?string $lastName = null,
        ?string $maidenName = null,
        ?string $nationality = null,
        ?string $phoneNumber = null,
    ): self {
        $self = new self;

        null !== $birthday && $self['birthday'] = $birthday;
        null !== $email && $self['email'] = $email;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $gender && $self['gender'] = $gender;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $maidenName && $self['maidenName'] = $maidenName;
        null !== $nationality && $self['nationality'] = $nationality;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Date of birth in DD/MM/YYYY format.
     */
    public function withBirthday(string $birthday): self
    {
        $self = clone $this;
        $self['birthday'] = $birthday;

        return $self;
    }

    /**
     * Email address of the individual.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * First name of the individual.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * Gender of the individual (M for male, F for female).
     *
     * @param Gender|value-of<Gender> $gender
     */
    public function withGender(Gender|string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    /**
     * Last name (family name) of the individual.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * Maiden name, if applicable.
     */
    public function withMaidenName(string $maidenName): self
    {
        $self = clone $this;
        $self['maidenName'] = $maidenName;

        return $self;
    }

    /**
     * Nationality of the individual (ISO 3166-1 alpha-3 country code).
     */
    public function withNationality(string $nationality): self
    {
        $self = clone $this;
        $self['nationality'] = $nationality;

        return $self;
    }

    /**
     * Phone number of the individual.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}

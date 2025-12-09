<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualCreateParams;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\IndividualCreateParams\Person\Gender;

/**
 * Personal information about the individual.
 *
 * @phpstan-type PersonShape = array{
 *   birthday?: string|null,
 *   email?: string|null,
 *   firstName?: string|null,
 *   gender?: value-of<Gender>|null,
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
     * @param Gender|value-of<Gender> $gender
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
        $obj = new self;

        null !== $birthday && $obj['birthday'] = $birthday;
        null !== $email && $obj['email'] = $email;
        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $gender && $obj['gender'] = $gender;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $maidenName && $obj['maidenName'] = $maidenName;
        null !== $nationality && $obj['nationality'] = $nationality;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Date of birth in DD/MM/YYYY format.
     */
    public function withBirthday(string $birthday): self
    {
        $obj = clone $this;
        $obj['birthday'] = $birthday;

        return $obj;
    }

    /**
     * Email address of the individual.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * First name of the individual.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    /**
     * Gender of the individual (M for male, F for female).
     *
     * @param Gender|value-of<Gender> $gender
     */
    public function withGender(Gender|string $gender): self
    {
        $obj = clone $this;
        $obj['gender'] = $gender;

        return $obj;
    }

    /**
     * Last name (family name) of the individual.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['lastName'] = $lastName;

        return $obj;
    }

    /**
     * Maiden name, if applicable.
     */
    public function withMaidenName(string $maidenName): self
    {
        $obj = clone $this;
        $obj['maidenName'] = $maidenName;

        return $obj;
    }

    /**
     * Nationality of the individual (ISO 3166-1 alpha-3 country code).
     */
    public function withNationality(string $nationality): self
    {
        $obj = clone $this;
        $obj['nationality'] = $nationality;

        return $obj;
    }

    /**
     * Phone number of the individual.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }
}

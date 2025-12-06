<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualCreateParams;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\IndividualCreateParams\Person\Gender;

/**
 * Personal information about the individual.
 *
 * @phpstan-type PersonShape = array{
 *   birthday?: string|null,
 *   email?: string|null,
 *   first_name?: string|null,
 *   gender?: value-of<Gender>|null,
 *   last_name?: string|null,
 *   maiden_name?: string|null,
 *   nationality?: string|null,
 *   phone_number?: string|null,
 * }
 */
final class Person implements BaseModel
{
    /** @use SdkModel<PersonShape> */
    use SdkModel;

    /**
     * Date of birth in DD/MM/YYYY format.
     */
    #[Api(optional: true)]
    public ?string $birthday;

    /**
     * Email address of the individual.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * First name of the individual.
     */
    #[Api(optional: true)]
    public ?string $first_name;

    /**
     * Gender of the individual (M for male, F for female).
     *
     * @var value-of<Gender>|null $gender
     */
    #[Api(enum: Gender::class, optional: true)]
    public ?string $gender;

    /**
     * Last name (family name) of the individual.
     */
    #[Api(optional: true)]
    public ?string $last_name;

    /**
     * Maiden name, if applicable.
     */
    #[Api(optional: true)]
    public ?string $maiden_name;

    /**
     * Nationality of the individual (ISO 3166-1 alpha-3 country code).
     */
    #[Api(optional: true)]
    public ?string $nationality;

    /**
     * Phone number of the individual.
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
     *
     * @param Gender|value-of<Gender> $gender
     */
    public static function with(
        ?string $birthday = null,
        ?string $email = null,
        ?string $first_name = null,
        Gender|string|null $gender = null,
        ?string $last_name = null,
        ?string $maiden_name = null,
        ?string $nationality = null,
        ?string $phone_number = null,
    ): self {
        $obj = new self;

        null !== $birthday && $obj['birthday'] = $birthday;
        null !== $email && $obj['email'] = $email;
        null !== $first_name && $obj['first_name'] = $first_name;
        null !== $gender && $obj['gender'] = $gender;
        null !== $last_name && $obj['last_name'] = $last_name;
        null !== $maiden_name && $obj['maiden_name'] = $maiden_name;
        null !== $nationality && $obj['nationality'] = $nationality;
        null !== $phone_number && $obj['phone_number'] = $phone_number;

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
        $obj['first_name'] = $firstName;

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
        $obj['last_name'] = $lastName;

        return $obj;
    }

    /**
     * Maiden name, if applicable.
     */
    public function withMaidenName(string $maidenName): self
    {
        $obj = clone $this;
        $obj['maiden_name'] = $maidenName;

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
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}

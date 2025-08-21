<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualUpdateParams;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\IndividualUpdateParams\Person\Gender;

/**
 * Personal information about the individual.
 *
 * @phpstan-type person_alias = array{
 *   birthday?: string,
 *   email?: string,
 *   firstName?: string,
 *   gender?: Gender::*,
 *   lastName?: string,
 *   maidenName?: string,
 *   phoneNumber?: string,
 * }
 */
final class Person implements BaseModel
{
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
    #[Api('first_name', optional: true)]
    public ?string $firstName;

    /**
     * Gender of the individual (M for male, F for female).
     *
     * @var null|Gender::* $gender
     */
    #[Api(enum: Gender::class, optional: true)]
    public ?string $gender;

    /**
     * Last name (family name) of the individual.
     */
    #[Api('last_name', optional: true)]
    public ?string $lastName;

    /**
     * Maiden name, if applicable.
     */
    #[Api('maiden_name', optional: true)]
    public ?string $maidenName;

    /**
     * Phone number of the individual.
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
     *
     * @param null|Gender::* $gender
     */
    public static function with(
        ?string $birthday = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $gender = null,
        ?string $lastName = null,
        ?string $maidenName = null,
        ?string $phoneNumber = null,
    ): self {
        $obj = new self;

        null !== $birthday && $obj->birthday = $birthday;
        null !== $email && $obj->email = $email;
        null !== $firstName && $obj->firstName = $firstName;
        null !== $gender && $obj->gender = $gender;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $maidenName && $obj->maidenName = $maidenName;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Date of birth in DD/MM/YYYY format.
     */
    public function withBirthday(string $birthday): self
    {
        $obj = clone $this;
        $obj->birthday = $birthday;

        return $obj;
    }

    /**
     * Email address of the individual.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * First name of the individual.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    /**
     * Gender of the individual (M for male, F for female).
     *
     * @param Gender::* $gender
     */
    public function withGender(string $gender): self
    {
        $obj = clone $this;
        $obj->gender = $gender;

        return $obj;
    }

    /**
     * Last name (family name) of the individual.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    /**
     * Maiden name, if applicable.
     */
    public function withMaidenName(string $maidenName): self
    {
        $obj = clone $this;
        $obj->maidenName = $maidenName;

        return $obj;
    }

    /**
     * Phone number of the individual.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}

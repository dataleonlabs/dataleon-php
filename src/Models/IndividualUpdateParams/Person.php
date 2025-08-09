<?php

declare(strict_types=1);

namespace Dataleon\Models\IndividualUpdateParams;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Models\IndividualUpdateParams\Person\Gender;

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
    use Model;

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
    public static function new(
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
    public function setBirthday(string $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Email address of the individual.
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * First name of the individual.
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Gender of the individual (M for male, F for female).
     *
     * @param Gender::* $gender
     */
    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Last name (family name) of the individual.
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Maiden name, if applicable.
     */
    public function setMaidenName(string $maidenName): self
    {
        $this->maidenName = $maidenName;

        return $this;
    }

    /**
     * Phone number of the individual.
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}

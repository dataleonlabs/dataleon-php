<?php

declare(strict_types=1);

namespace Dataleon\Models\Individual;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Personal details of the individual, such as name, date of birth, and contact info.
 *
 * @phpstan-type person_alias = array{
 *   birthday?: string,
 *   email?: string,
 *   faceImageSignedURL?: string,
 *   firstName?: string,
 *   fullName?: string,
 *   gender?: string,
 *   lastName?: string,
 *   maidenName?: string,
 *   phoneNumber?: string,
 * }
 */
final class Person implements BaseModel
{
    use Model;

    /**
     * Date of birth, formatted as DD/MM/YYYY.
     */
    #[Api(optional: true)]
    public ?string $birthday;

    /**
     * Email address of the individual.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * Signed URL linking to the person’s face image.
     */
    #[Api('face_image_signed_url', optional: true)]
    public ?string $faceImageSignedURL;

    /**
     * First (given) name of the person.
     */
    #[Api('first_name', optional: true)]
    public ?string $firstName;

    /**
     * Full name of the person, typically concatenation of first and last names.
     */
    #[Api('full_name', optional: true)]
    public ?string $fullName;

    /**
     * Gender of the individual (e.g., "M" for male, "F" for female).
     */
    #[Api(optional: true)]
    public ?string $gender;

    /**
     * Last (family) name of the person.
     */
    #[Api('last_name', optional: true)]
    public ?string $lastName;

    /**
     * Maiden name of the person, if applicable.
     */
    #[Api('maiden_name', optional: true)]
    public ?string $maidenName;

    /**
     * Contact phone number including country code.
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
        ?string $birthday = null,
        ?string $email = null,
        ?string $faceImageSignedURL = null,
        ?string $firstName = null,
        ?string $fullName = null,
        ?string $gender = null,
        ?string $lastName = null,
        ?string $maidenName = null,
        ?string $phoneNumber = null,
    ): self {
        $obj = new self;

        null !== $birthday && $obj->birthday = $birthday;
        null !== $email && $obj->email = $email;
        null !== $faceImageSignedURL && $obj->faceImageSignedURL = $faceImageSignedURL;
        null !== $firstName && $obj->firstName = $firstName;
        null !== $fullName && $obj->fullName = $fullName;
        null !== $gender && $obj->gender = $gender;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $maidenName && $obj->maidenName = $maidenName;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Date of birth, formatted as DD/MM/YYYY.
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
     * Signed URL linking to the person’s face image.
     */
    public function setFaceImageSignedURL(string $faceImageSignedURL): self
    {
        $this->faceImageSignedURL = $faceImageSignedURL;

        return $this;
    }

    /**
     * First (given) name of the person.
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Full name of the person, typically concatenation of first and last names.
     */
    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Gender of the individual (e.g., "M" for male, "F" for female).
     */
    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Last (family) name of the person.
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Maiden name of the person, if applicable.
     */
    public function setMaidenName(string $maidenName): self
    {
        $this->maidenName = $maidenName;

        return $this;
    }

    /**
     * Contact phone number including country code.
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}

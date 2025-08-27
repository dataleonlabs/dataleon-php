<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Personal details of the individual, such as name, date of birth, and contact info.
 *
 * @phpstan-type person_alias = array{
 *   birthday?: string|null,
 *   email?: string|null,
 *   faceImageSignedURL?: string|null,
 *   firstName?: string|null,
 *   fullName?: string|null,
 *   gender?: string|null,
 *   lastName?: string|null,
 *   maidenName?: string|null,
 *   phoneNumber?: string|null,
 * }
 */
final class Person implements BaseModel
{
    /** @use SdkModel<person_alias> */
    use SdkModel;

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
    public static function with(
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
     * Signed URL linking to the person’s face image.
     */
    public function withFaceImageSignedURL(string $faceImageSignedURL): self
    {
        $obj = clone $this;
        $obj->faceImageSignedURL = $faceImageSignedURL;

        return $obj;
    }

    /**
     * First (given) name of the person.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    /**
     * Full name of the person, typically concatenation of first and last names.
     */
    public function withFullName(string $fullName): self
    {
        $obj = clone $this;
        $obj->fullName = $fullName;

        return $obj;
    }

    /**
     * Gender of the individual (e.g., "M" for male, "F" for female).
     */
    public function withGender(string $gender): self
    {
        $obj = clone $this;
        $obj->gender = $gender;

        return $obj;
    }

    /**
     * Last (family) name of the person.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    /**
     * Maiden name of the person, if applicable.
     */
    public function withMaidenName(string $maidenName): self
    {
        $obj = clone $this;
        $obj->maidenName = $maidenName;

        return $obj;
    }

    /**
     * Contact phone number including country code.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}

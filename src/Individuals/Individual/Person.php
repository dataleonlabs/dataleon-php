<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Personal details of the individual, such as name, date of birth, and contact info.
 *
 * @phpstan-type PersonShape = array{
 *   birthday?: string|null,
 *   email?: string|null,
 *   faceImageSignedURL?: string|null,
 *   firstName?: string|null,
 *   fullName?: string|null,
 *   gender?: string|null,
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
     * Date of birth, formatted as DD/MM/YYYY.
     */
    #[Optional]
    public ?string $birthday;

    /**
     * Email address of the individual.
     */
    #[Optional]
    public ?string $email;

    /**
     * Signed URL linking to the person’s face image.
     */
    #[Optional('face_image_signed_url')]
    public ?string $faceImageSignedURL;

    /**
     * First (given) name of the person.
     */
    #[Optional('first_name')]
    public ?string $firstName;

    /**
     * Full name of the person, typically concatenation of first and last names.
     */
    #[Optional('full_name')]
    public ?string $fullName;

    /**
     * Gender of the individual (e.g., "M" for male, "F" for female).
     */
    #[Optional]
    public ?string $gender;

    /**
     * Last (family) name of the person.
     */
    #[Optional('last_name')]
    public ?string $lastName;

    /**
     * Maiden name of the person, if applicable.
     */
    #[Optional('maiden_name')]
    public ?string $maidenName;

    /**
     * Nationality of the individual (ISO 3166-1 alpha-3 country code).
     */
    #[Optional]
    public ?string $nationality;

    /**
     * Contact phone number including country code.
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
        ?string $birthday = null,
        ?string $email = null,
        ?string $faceImageSignedURL = null,
        ?string $firstName = null,
        ?string $fullName = null,
        ?string $gender = null,
        ?string $lastName = null,
        ?string $maidenName = null,
        ?string $nationality = null,
        ?string $phoneNumber = null,
    ): self {
        $obj = new self;

        null !== $birthday && $obj['birthday'] = $birthday;
        null !== $email && $obj['email'] = $email;
        null !== $faceImageSignedURL && $obj['faceImageSignedURL'] = $faceImageSignedURL;
        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $fullName && $obj['fullName'] = $fullName;
        null !== $gender && $obj['gender'] = $gender;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $maidenName && $obj['maidenName'] = $maidenName;
        null !== $nationality && $obj['nationality'] = $nationality;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Date of birth, formatted as DD/MM/YYYY.
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
     * Signed URL linking to the person’s face image.
     */
    public function withFaceImageSignedURL(string $faceImageSignedURL): self
    {
        $obj = clone $this;
        $obj['faceImageSignedURL'] = $faceImageSignedURL;

        return $obj;
    }

    /**
     * First (given) name of the person.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    /**
     * Full name of the person, typically concatenation of first and last names.
     */
    public function withFullName(string $fullName): self
    {
        $obj = clone $this;
        $obj['fullName'] = $fullName;

        return $obj;
    }

    /**
     * Gender of the individual (e.g., "M" for male, "F" for female).
     */
    public function withGender(string $gender): self
    {
        $obj = clone $this;
        $obj['gender'] = $gender;

        return $obj;
    }

    /**
     * Last (family) name of the person.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['lastName'] = $lastName;

        return $obj;
    }

    /**
     * Maiden name of the person, if applicable.
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
     * Contact phone number including country code.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }
}

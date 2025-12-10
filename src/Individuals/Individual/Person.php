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
        $self = new self;

        null !== $birthday && $self['birthday'] = $birthday;
        null !== $email && $self['email'] = $email;
        null !== $faceImageSignedURL && $self['faceImageSignedURL'] = $faceImageSignedURL;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $fullName && $self['fullName'] = $fullName;
        null !== $gender && $self['gender'] = $gender;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $maidenName && $self['maidenName'] = $maidenName;
        null !== $nationality && $self['nationality'] = $nationality;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Date of birth, formatted as DD/MM/YYYY.
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
     * Signed URL linking to the person’s face image.
     */
    public function withFaceImageSignedURL(string $faceImageSignedURL): self
    {
        $self = clone $this;
        $self['faceImageSignedURL'] = $faceImageSignedURL;

        return $self;
    }

    /**
     * First (given) name of the person.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * Full name of the person, typically concatenation of first and last names.
     */
    public function withFullName(string $fullName): self
    {
        $self = clone $this;
        $self['fullName'] = $fullName;

        return $self;
    }

    /**
     * Gender of the individual (e.g., "M" for male, "F" for female).
     */
    public function withGender(string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    /**
     * Last (family) name of the person.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * Maiden name of the person, if applicable.
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
     * Contact phone number including country code.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}

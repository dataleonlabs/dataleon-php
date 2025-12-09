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
 *   face_image_signed_url?: string|null,
 *   first_name?: string|null,
 *   full_name?: string|null,
 *   gender?: string|null,
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
    #[Optional]
    public ?string $face_image_signed_url;

    /**
     * First (given) name of the person.
     */
    #[Optional]
    public ?string $first_name;

    /**
     * Full name of the person, typically concatenation of first and last names.
     */
    #[Optional]
    public ?string $full_name;

    /**
     * Gender of the individual (e.g., "M" for male, "F" for female).
     */
    #[Optional]
    public ?string $gender;

    /**
     * Last (family) name of the person.
     */
    #[Optional]
    public ?string $last_name;

    /**
     * Maiden name of the person, if applicable.
     */
    #[Optional]
    public ?string $maiden_name;

    /**
     * Nationality of the individual (ISO 3166-1 alpha-3 country code).
     */
    #[Optional]
    public ?string $nationality;

    /**
     * Contact phone number including country code.
     */
    #[Optional]
    public ?string $phone_number;

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
        ?string $face_image_signed_url = null,
        ?string $first_name = null,
        ?string $full_name = null,
        ?string $gender = null,
        ?string $last_name = null,
        ?string $maiden_name = null,
        ?string $nationality = null,
        ?string $phone_number = null,
    ): self {
        $obj = new self;

        null !== $birthday && $obj['birthday'] = $birthday;
        null !== $email && $obj['email'] = $email;
        null !== $face_image_signed_url && $obj['face_image_signed_url'] = $face_image_signed_url;
        null !== $first_name && $obj['first_name'] = $first_name;
        null !== $full_name && $obj['full_name'] = $full_name;
        null !== $gender && $obj['gender'] = $gender;
        null !== $last_name && $obj['last_name'] = $last_name;
        null !== $maiden_name && $obj['maiden_name'] = $maiden_name;
        null !== $nationality && $obj['nationality'] = $nationality;
        null !== $phone_number && $obj['phone_number'] = $phone_number;

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
        $obj['face_image_signed_url'] = $faceImageSignedURL;

        return $obj;
    }

    /**
     * First (given) name of the person.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['first_name'] = $firstName;

        return $obj;
    }

    /**
     * Full name of the person, typically concatenation of first and last names.
     */
    public function withFullName(string $fullName): self
    {
        $obj = clone $this;
        $obj['full_name'] = $fullName;

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
        $obj['last_name'] = $lastName;

        return $obj;
    }

    /**
     * Maiden name of the person, if applicable.
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
     * Contact phone number including country code.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}

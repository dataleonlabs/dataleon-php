<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Reference to the individual's identity document.
 *
 * @phpstan-type IdentityCardShape = array{
 *   id?: string|null,
 *   back_document_signed_url?: string|null,
 *   birth_place?: string|null,
 *   birthday?: string|null,
 *   country?: string|null,
 *   expiration_date?: string|null,
 *   first_name?: string|null,
 *   front_document_signed_url?: string|null,
 *   gender?: string|null,
 *   issue_date?: string|null,
 *   last_name?: string|null,
 *   mrz_line_1?: string|null,
 *   mrz_line_2?: string|null,
 *   mrz_line_3?: string|null,
 *   type?: string|null,
 * }
 */
final class IdentityCard implements BaseModel
{
    /** @use SdkModel<IdentityCardShape> */
    use SdkModel;

    /**
     * Unique identifier for the document.
     */
    #[Optional]
    public ?string $id;

    /**
     * Signed URL linking to the back image of the document.
     */
    #[Optional]
    public ?string $back_document_signed_url;

    /**
     * Place of birth as indicated on the document.
     */
    #[Optional]
    public ?string $birth_place;

    /**
     * Date of birth in DD/MM/YYYY format as shown on the document.
     */
    #[Optional]
    public ?string $birthday;

    /**
     * Country code issuing the document (ISO 3166-1 alpha-2).
     */
    #[Optional]
    public ?string $country;

    /**
     * Expiration date of the document, in YYYY-MM-DD format.
     */
    #[Optional]
    public ?string $expiration_date;

    /**
     * First name as shown on the document.
     */
    #[Optional]
    public ?string $first_name;

    /**
     * Signed URL linking to the front image of the document.
     */
    #[Optional]
    public ?string $front_document_signed_url;

    /**
     * Gender indicated on the document (e.g., "M" or "F").
     */
    #[Optional]
    public ?string $gender;

    /**
     * Date when the document was issued, in YYYY-MM-DD format.
     */
    #[Optional]
    public ?string $issue_date;

    /**
     * Last name as shown on the document.
     */
    #[Optional]
    public ?string $last_name;

    /**
     * First line of the Machine Readable Zone (MRZ) on the document.
     */
    #[Optional]
    public ?string $mrz_line_1;

    /**
     * Second line of the MRZ on the document.
     */
    #[Optional]
    public ?string $mrz_line_2;

    /**
     * Third line of the MRZ if applicable; otherwise null.
     */
    #[Optional(nullable: true)]
    public ?string $mrz_line_3;

    /**
     * Type of document (e.g., passport, identity card).
     */
    #[Optional]
    public ?string $type;

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
        ?string $id = null,
        ?string $back_document_signed_url = null,
        ?string $birth_place = null,
        ?string $birthday = null,
        ?string $country = null,
        ?string $expiration_date = null,
        ?string $first_name = null,
        ?string $front_document_signed_url = null,
        ?string $gender = null,
        ?string $issue_date = null,
        ?string $last_name = null,
        ?string $mrz_line_1 = null,
        ?string $mrz_line_2 = null,
        ?string $mrz_line_3 = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $back_document_signed_url && $obj['back_document_signed_url'] = $back_document_signed_url;
        null !== $birth_place && $obj['birth_place'] = $birth_place;
        null !== $birthday && $obj['birthday'] = $birthday;
        null !== $country && $obj['country'] = $country;
        null !== $expiration_date && $obj['expiration_date'] = $expiration_date;
        null !== $first_name && $obj['first_name'] = $first_name;
        null !== $front_document_signed_url && $obj['front_document_signed_url'] = $front_document_signed_url;
        null !== $gender && $obj['gender'] = $gender;
        null !== $issue_date && $obj['issue_date'] = $issue_date;
        null !== $last_name && $obj['last_name'] = $last_name;
        null !== $mrz_line_1 && $obj['mrz_line_1'] = $mrz_line_1;
        null !== $mrz_line_2 && $obj['mrz_line_2'] = $mrz_line_2;
        null !== $mrz_line_3 && $obj['mrz_line_3'] = $mrz_line_3;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Unique identifier for the document.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Signed URL linking to the back image of the document.
     */
    public function withBackDocumentSignedURL(
        string $backDocumentSignedURL
    ): self {
        $obj = clone $this;
        $obj['back_document_signed_url'] = $backDocumentSignedURL;

        return $obj;
    }

    /**
     * Place of birth as indicated on the document.
     */
    public function withBirthPlace(string $birthPlace): self
    {
        $obj = clone $this;
        $obj['birth_place'] = $birthPlace;

        return $obj;
    }

    /**
     * Date of birth in DD/MM/YYYY format as shown on the document.
     */
    public function withBirthday(string $birthday): self
    {
        $obj = clone $this;
        $obj['birthday'] = $birthday;

        return $obj;
    }

    /**
     * Country code issuing the document (ISO 3166-1 alpha-2).
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj['country'] = $country;

        return $obj;
    }

    /**
     * Expiration date of the document, in YYYY-MM-DD format.
     */
    public function withExpirationDate(string $expirationDate): self
    {
        $obj = clone $this;
        $obj['expiration_date'] = $expirationDate;

        return $obj;
    }

    /**
     * First name as shown on the document.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['first_name'] = $firstName;

        return $obj;
    }

    /**
     * Signed URL linking to the front image of the document.
     */
    public function withFrontDocumentSignedURL(
        string $frontDocumentSignedURL
    ): self {
        $obj = clone $this;
        $obj['front_document_signed_url'] = $frontDocumentSignedURL;

        return $obj;
    }

    /**
     * Gender indicated on the document (e.g., "M" or "F").
     */
    public function withGender(string $gender): self
    {
        $obj = clone $this;
        $obj['gender'] = $gender;

        return $obj;
    }

    /**
     * Date when the document was issued, in YYYY-MM-DD format.
     */
    public function withIssueDate(string $issueDate): self
    {
        $obj = clone $this;
        $obj['issue_date'] = $issueDate;

        return $obj;
    }

    /**
     * Last name as shown on the document.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['last_name'] = $lastName;

        return $obj;
    }

    /**
     * First line of the Machine Readable Zone (MRZ) on the document.
     */
    public function withMrzLine1(string $mrzLine1): self
    {
        $obj = clone $this;
        $obj['mrz_line_1'] = $mrzLine1;

        return $obj;
    }

    /**
     * Second line of the MRZ on the document.
     */
    public function withMrzLine2(string $mrzLine2): self
    {
        $obj = clone $this;
        $obj['mrz_line_2'] = $mrzLine2;

        return $obj;
    }

    /**
     * Third line of the MRZ if applicable; otherwise null.
     */
    public function withMrzLine3(?string $mrzLine3): self
    {
        $obj = clone $this;
        $obj['mrz_line_3'] = $mrzLine3;

        return $obj;
    }

    /**
     * Type of document (e.g., passport, identity card).
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}

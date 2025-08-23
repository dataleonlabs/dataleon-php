<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Reference to the individual's identity document.
 */
final class IdentityCard implements BaseModel
{
    use SdkModel;

    /**
     * Unique identifier for the document.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Signed URL linking to the back image of the document.
     */
    #[Api('back_document_signed_url', optional: true)]
    public ?string $backDocumentSignedURL;

    /**
     * Place of birth as indicated on the document.
     */
    #[Api('birth_place', optional: true)]
    public ?string $birthPlace;

    /**
     * Date of birth in DD/MM/YYYY format as shown on the document.
     */
    #[Api(optional: true)]
    public ?string $birthday;

    /**
     * Country code issuing the document (ISO 3166-1 alpha-2).
     */
    #[Api(optional: true)]
    public ?string $country;

    /**
     * Expiration date of the document, in YYYY-MM-DD format.
     */
    #[Api('expiration_date', optional: true)]
    public ?string $expirationDate;

    /**
     * First name as shown on the document.
     */
    #[Api('first_name', optional: true)]
    public ?string $firstName;

    /**
     * Signed URL linking to the front image of the document.
     */
    #[Api('front_document_signed_url', optional: true)]
    public ?string $frontDocumentSignedURL;

    /**
     * Gender indicated on the document (e.g., "M" or "F").
     */
    #[Api(optional: true)]
    public ?string $gender;

    /**
     * Date when the document was issued, in YYYY-MM-DD format.
     */
    #[Api('issue_date', optional: true)]
    public ?string $issueDate;

    /**
     * Last name as shown on the document.
     */
    #[Api('last_name', optional: true)]
    public ?string $lastName;

    /**
     * First line of the Machine Readable Zone (MRZ) on the document.
     */
    #[Api('mrz_line_1', optional: true)]
    public ?string $mrzLine1;

    /**
     * Second line of the MRZ on the document.
     */
    #[Api('mrz_line_2', optional: true)]
    public ?string $mrzLine2;

    /**
     * Third line of the MRZ if applicable; otherwise null.
     */
    #[Api('mrz_line_3', optional: true)]
    public ?string $mrzLine3;

    /**
     * Type of document (e.g., passport, identity card).
     */
    #[Api(optional: true)]
    public ?string $type;

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
        ?string $id = null,
        ?string $backDocumentSignedURL = null,
        ?string $birthPlace = null,
        ?string $birthday = null,
        ?string $country = null,
        ?string $expirationDate = null,
        ?string $firstName = null,
        ?string $frontDocumentSignedURL = null,
        ?string $gender = null,
        ?string $issueDate = null,
        ?string $lastName = null,
        ?string $mrzLine1 = null,
        ?string $mrzLine2 = null,
        ?string $mrzLine3 = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $backDocumentSignedURL && $obj->backDocumentSignedURL = $backDocumentSignedURL;
        null !== $birthPlace && $obj->birthPlace = $birthPlace;
        null !== $birthday && $obj->birthday = $birthday;
        null !== $country && $obj->country = $country;
        null !== $expirationDate && $obj->expirationDate = $expirationDate;
        null !== $firstName && $obj->firstName = $firstName;
        null !== $frontDocumentSignedURL && $obj->frontDocumentSignedURL = $frontDocumentSignedURL;
        null !== $gender && $obj->gender = $gender;
        null !== $issueDate && $obj->issueDate = $issueDate;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $mrzLine1 && $obj->mrzLine1 = $mrzLine1;
        null !== $mrzLine2 && $obj->mrzLine2 = $mrzLine2;
        null !== $mrzLine3 && $obj->mrzLine3 = $mrzLine3;
        null !== $type && $obj->type = $type;

        return $obj;
    }

    /**
     * Unique identifier for the document.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Signed URL linking to the back image of the document.
     */
    public function withBackDocumentSignedURL(
        string $backDocumentSignedURL
    ): self {
        $obj = clone $this;
        $obj->backDocumentSignedURL = $backDocumentSignedURL;

        return $obj;
    }

    /**
     * Place of birth as indicated on the document.
     */
    public function withBirthPlace(string $birthPlace): self
    {
        $obj = clone $this;
        $obj->birthPlace = $birthPlace;

        return $obj;
    }

    /**
     * Date of birth in DD/MM/YYYY format as shown on the document.
     */
    public function withBirthday(string $birthday): self
    {
        $obj = clone $this;
        $obj->birthday = $birthday;

        return $obj;
    }

    /**
     * Country code issuing the document (ISO 3166-1 alpha-2).
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    /**
     * Expiration date of the document, in YYYY-MM-DD format.
     */
    public function withExpirationDate(string $expirationDate): self
    {
        $obj = clone $this;
        $obj->expirationDate = $expirationDate;

        return $obj;
    }

    /**
     * First name as shown on the document.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    /**
     * Signed URL linking to the front image of the document.
     */
    public function withFrontDocumentSignedURL(
        string $frontDocumentSignedURL
    ): self {
        $obj = clone $this;
        $obj->frontDocumentSignedURL = $frontDocumentSignedURL;

        return $obj;
    }

    /**
     * Gender indicated on the document (e.g., "M" or "F").
     */
    public function withGender(string $gender): self
    {
        $obj = clone $this;
        $obj->gender = $gender;

        return $obj;
    }

    /**
     * Date when the document was issued, in YYYY-MM-DD format.
     */
    public function withIssueDate(string $issueDate): self
    {
        $obj = clone $this;
        $obj->issueDate = $issueDate;

        return $obj;
    }

    /**
     * Last name as shown on the document.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    /**
     * First line of the Machine Readable Zone (MRZ) on the document.
     */
    public function withMrzLine1(string $mrzLine1): self
    {
        $obj = clone $this;
        $obj->mrzLine1 = $mrzLine1;

        return $obj;
    }

    /**
     * Second line of the MRZ on the document.
     */
    public function withMrzLine2(string $mrzLine2): self
    {
        $obj = clone $this;
        $obj->mrzLine2 = $mrzLine2;

        return $obj;
    }

    /**
     * Third line of the MRZ if applicable; otherwise null.
     */
    public function withMrzLine3(?string $mrzLine3): self
    {
        $obj = clone $this;
        $obj->mrzLine3 = $mrzLine3;

        return $obj;
    }

    /**
     * Type of document (e.g., passport, identity card).
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}

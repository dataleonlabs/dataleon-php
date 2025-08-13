<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Reference to the individual's identity document.
 *
 * @phpstan-type identity_card_alias = array{
 *   id?: string,
 *   backDocumentSignedURL?: string,
 *   birthPlace?: string,
 *   birthday?: string,
 *   country?: string,
 *   expirationDate?: string,
 *   firstName?: string,
 *   frontDocumentSignedURL?: string,
 *   gender?: string,
 *   issueDate?: string,
 *   lastName?: string,
 *   mrzLine1?: string,
 *   mrzLine2?: string,
 *   mrzLine3?: string|null,
 *   type?: string,
 * }
 */
final class IdentityCard implements BaseModel
{
    use Model;

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
    public static function from(
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
    public function setID(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Signed URL linking to the back image of the document.
     */
    public function setBackDocumentSignedURL(
        string $backDocumentSignedURL
    ): self {
        $this->backDocumentSignedURL = $backDocumentSignedURL;

        return $this;
    }

    /**
     * Place of birth as indicated on the document.
     */
    public function setBirthPlace(string $birthPlace): self
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    /**
     * Date of birth in DD/MM/YYYY format as shown on the document.
     */
    public function setBirthday(string $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Country code issuing the document (ISO 3166-1 alpha-2).
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Expiration date of the document, in YYYY-MM-DD format.
     */
    public function setExpirationDate(string $expirationDate): self
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * First name as shown on the document.
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Signed URL linking to the front image of the document.
     */
    public function setFrontDocumentSignedURL(
        string $frontDocumentSignedURL
    ): self {
        $this->frontDocumentSignedURL = $frontDocumentSignedURL;

        return $this;
    }

    /**
     * Gender indicated on the document (e.g., "M" or "F").
     */
    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Date when the document was issued, in YYYY-MM-DD format.
     */
    public function setIssueDate(string $issueDate): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * Last name as shown on the document.
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * First line of the Machine Readable Zone (MRZ) on the document.
     */
    public function setMrzLine1(string $mrzLine1): self
    {
        $this->mrzLine1 = $mrzLine1;

        return $this;
    }

    /**
     * Second line of the MRZ on the document.
     */
    public function setMrzLine2(string $mrzLine2): self
    {
        $this->mrzLine2 = $mrzLine2;

        return $this;
    }

    /**
     * Third line of the MRZ if applicable; otherwise null.
     */
    public function setMrzLine3(?string $mrzLine3): self
    {
        $this->mrzLine3 = $mrzLine3;

        return $this;
    }

    /**
     * Type of document (e.g., passport, identity card).
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}

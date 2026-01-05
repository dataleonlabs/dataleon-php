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
 *   backDocumentSignedURL?: string|null,
 *   birthPlace?: string|null,
 *   birthday?: string|null,
 *   country?: string|null,
 *   entitlementDate?: string|null,
 *   expirationDate?: string|null,
 *   firstName?: string|null,
 *   frontDocumentSignedURL?: string|null,
 *   gender?: string|null,
 *   issueDate?: string|null,
 *   lastName?: string|null,
 *   mrzLine1?: string|null,
 *   mrzLine2?: string|null,
 *   mrzLine3?: string|null,
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
    #[Optional('back_document_signed_url')]
    public ?string $backDocumentSignedURL;

    /**
     * Place of birth as indicated on the document.
     */
    #[Optional('birth_place')]
    public ?string $birthPlace;

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
     * Date of entitlement or validity start date, in YYYY-MM-DD format.
     */
    #[Optional('entitlement_date')]
    public ?string $entitlementDate;

    /**
     * Expiration date of the document, in YYYY-MM-DD format.
     */
    #[Optional('expiration_date')]
    public ?string $expirationDate;

    /**
     * First name as shown on the document.
     */
    #[Optional('first_name')]
    public ?string $firstName;

    /**
     * Signed URL linking to the front image of the document.
     */
    #[Optional('front_document_signed_url')]
    public ?string $frontDocumentSignedURL;

    /**
     * Gender indicated on the document (e.g., "M" or "F").
     */
    #[Optional]
    public ?string $gender;

    /**
     * Date when the document was issued, in YYYY-MM-DD format.
     */
    #[Optional('issue_date')]
    public ?string $issueDate;

    /**
     * Last name as shown on the document.
     */
    #[Optional('last_name')]
    public ?string $lastName;

    /**
     * First line of the Machine Readable Zone (MRZ) on the document.
     */
    #[Optional('mrz_line_1')]
    public ?string $mrzLine1;

    /**
     * Second line of the MRZ on the document.
     */
    #[Optional('mrz_line_2')]
    public ?string $mrzLine2;

    /**
     * Third line of the MRZ if applicable; otherwise null.
     */
    #[Optional('mrz_line_3', nullable: true)]
    public ?string $mrzLine3;

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
        ?string $backDocumentSignedURL = null,
        ?string $birthPlace = null,
        ?string $birthday = null,
        ?string $country = null,
        ?string $entitlementDate = null,
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $backDocumentSignedURL && $self['backDocumentSignedURL'] = $backDocumentSignedURL;
        null !== $birthPlace && $self['birthPlace'] = $birthPlace;
        null !== $birthday && $self['birthday'] = $birthday;
        null !== $country && $self['country'] = $country;
        null !== $entitlementDate && $self['entitlementDate'] = $entitlementDate;
        null !== $expirationDate && $self['expirationDate'] = $expirationDate;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $frontDocumentSignedURL && $self['frontDocumentSignedURL'] = $frontDocumentSignedURL;
        null !== $gender && $self['gender'] = $gender;
        null !== $issueDate && $self['issueDate'] = $issueDate;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $mrzLine1 && $self['mrzLine1'] = $mrzLine1;
        null !== $mrzLine2 && $self['mrzLine2'] = $mrzLine2;
        null !== $mrzLine3 && $self['mrzLine3'] = $mrzLine3;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Unique identifier for the document.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Signed URL linking to the back image of the document.
     */
    public function withBackDocumentSignedURL(
        string $backDocumentSignedURL
    ): self {
        $self = clone $this;
        $self['backDocumentSignedURL'] = $backDocumentSignedURL;

        return $self;
    }

    /**
     * Place of birth as indicated on the document.
     */
    public function withBirthPlace(string $birthPlace): self
    {
        $self = clone $this;
        $self['birthPlace'] = $birthPlace;

        return $self;
    }

    /**
     * Date of birth in DD/MM/YYYY format as shown on the document.
     */
    public function withBirthday(string $birthday): self
    {
        $self = clone $this;
        $self['birthday'] = $birthday;

        return $self;
    }

    /**
     * Country code issuing the document (ISO 3166-1 alpha-2).
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * Date of entitlement or validity start date, in YYYY-MM-DD format.
     */
    public function withEntitlementDate(string $entitlementDate): self
    {
        $self = clone $this;
        $self['entitlementDate'] = $entitlementDate;

        return $self;
    }

    /**
     * Expiration date of the document, in YYYY-MM-DD format.
     */
    public function withExpirationDate(string $expirationDate): self
    {
        $self = clone $this;
        $self['expirationDate'] = $expirationDate;

        return $self;
    }

    /**
     * First name as shown on the document.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * Signed URL linking to the front image of the document.
     */
    public function withFrontDocumentSignedURL(
        string $frontDocumentSignedURL
    ): self {
        $self = clone $this;
        $self['frontDocumentSignedURL'] = $frontDocumentSignedURL;

        return $self;
    }

    /**
     * Gender indicated on the document (e.g., "M" or "F").
     */
    public function withGender(string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    /**
     * Date when the document was issued, in YYYY-MM-DD format.
     */
    public function withIssueDate(string $issueDate): self
    {
        $self = clone $this;
        $self['issueDate'] = $issueDate;

        return $self;
    }

    /**
     * Last name as shown on the document.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * First line of the Machine Readable Zone (MRZ) on the document.
     */
    public function withMrzLine1(string $mrzLine1): self
    {
        $self = clone $this;
        $self['mrzLine1'] = $mrzLine1;

        return $self;
    }

    /**
     * Second line of the MRZ on the document.
     */
    public function withMrzLine2(string $mrzLine2): self
    {
        $self = clone $this;
        $self['mrzLine2'] = $mrzLine2;

        return $self;
    }

    /**
     * Third line of the MRZ if applicable; otherwise null.
     */
    public function withMrzLine3(?string $mrzLine3): self
    {
        $self = clone $this;
        $self['mrzLine3'] = $mrzLine3;

        return $self;
    }

    /**
     * Type of document (e.g., passport, identity card).
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}

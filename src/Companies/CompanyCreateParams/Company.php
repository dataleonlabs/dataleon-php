<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyCreateParams;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Attributes\Required;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Main information about the company being registered.
 *
 * @phpstan-type CompanyShape = array{
 *   name: string,
 *   address?: string|null,
 *   commercialName?: string|null,
 *   country?: string|null,
 *   email?: string|null,
 *   employerIdentificationNumber?: string|null,
 *   legalForm?: string|null,
 *   phoneNumber?: string|null,
 *   registrationDate?: string|null,
 *   registrationID?: string|null,
 *   shareCapital?: string|null,
 *   status?: string|null,
 *   taxIdentificationNumber?: string|null,
 *   type?: string|null,
 *   websiteURL?: string|null,
 * }
 */
final class Company implements BaseModel
{
    /** @use SdkModel<CompanyShape> */
    use SdkModel;

    /**
     * Legal name of the company.
     */
    #[Required]
    public string $name;

    /**
     * Registered address of the company.
     */
    #[Optional]
    public ?string $address;

    /**
     * Commercial or trade name of the company, if different from the legal name.
     */
    #[Optional('commercial_name')]
    public ?string $commercialName;

    /**
     * ISO 3166-1 alpha-2 country code of company registration (e.g., "FR" for France).
     */
    #[Optional]
    public ?string $country;

    /**
     * Contact email address for the company.
     */
    #[Optional]
    public ?string $email;

    /**
     * Employer Identification Number (EIN) or equivalent.
     */
    #[Optional('employer_identification_number')]
    public ?string $employerIdentificationNumber;

    /**
     * Legal structure of the company (e.g., SARL, SAS).
     */
    #[Optional('legal_form')]
    public ?string $legalForm;

    /**
     * Contact phone number for the company.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Date of official company registration in YYYY-MM-DD format.
     */
    #[Optional('registration_date')]
    public ?string $registrationDate;

    /**
     * Official company registration identifier.
     */
    #[Optional('registration_id')]
    public ?string $registrationID;

    /**
     * Declared share capital of the company, usually in euros.
     */
    #[Optional('share_capital')]
    public ?string $shareCapital;

    /**
     * Current status of the company (e.g., active, inactive).
     */
    #[Optional]
    public ?string $status;

    /**
     * National tax identifier (e.g., VAT or TIN).
     */
    #[Optional('tax_identification_number')]
    public ?string $taxIdentificationNumber;

    /**
     * Type of company, such as "main" or "affiliated".
     */
    #[Optional]
    public ?string $type;

    /**
     * Company’s official website URL.
     */
    #[Optional('website_url')]
    public ?string $websiteURL;

    /**
     * `new Company()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Company::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Company)->withName(...)
     * ```
     */
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
        string $name,
        ?string $address = null,
        ?string $commercialName = null,
        ?string $country = null,
        ?string $email = null,
        ?string $employerIdentificationNumber = null,
        ?string $legalForm = null,
        ?string $phoneNumber = null,
        ?string $registrationDate = null,
        ?string $registrationID = null,
        ?string $shareCapital = null,
        ?string $status = null,
        ?string $taxIdentificationNumber = null,
        ?string $type = null,
        ?string $websiteURL = null,
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $address && $self['address'] = $address;
        null !== $commercialName && $self['commercialName'] = $commercialName;
        null !== $country && $self['country'] = $country;
        null !== $email && $self['email'] = $email;
        null !== $employerIdentificationNumber && $self['employerIdentificationNumber'] = $employerIdentificationNumber;
        null !== $legalForm && $self['legalForm'] = $legalForm;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $registrationDate && $self['registrationDate'] = $registrationDate;
        null !== $registrationID && $self['registrationID'] = $registrationID;
        null !== $shareCapital && $self['shareCapital'] = $shareCapital;
        null !== $status && $self['status'] = $status;
        null !== $taxIdentificationNumber && $self['taxIdentificationNumber'] = $taxIdentificationNumber;
        null !== $type && $self['type'] = $type;
        null !== $websiteURL && $self['websiteURL'] = $websiteURL;

        return $self;
    }

    /**
     * Legal name of the company.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Registered address of the company.
     */
    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * Commercial or trade name of the company, if different from the legal name.
     */
    public function withCommercialName(string $commercialName): self
    {
        $self = clone $this;
        $self['commercialName'] = $commercialName;

        return $self;
    }

    /**
     * ISO 3166-1 alpha-2 country code of company registration (e.g., "FR" for France).
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * Contact email address for the company.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Employer Identification Number (EIN) or equivalent.
     */
    public function withEmployerIdentificationNumber(
        string $employerIdentificationNumber
    ): self {
        $self = clone $this;
        $self['employerIdentificationNumber'] = $employerIdentificationNumber;

        return $self;
    }

    /**
     * Legal structure of the company (e.g., SARL, SAS).
     */
    public function withLegalForm(string $legalForm): self
    {
        $self = clone $this;
        $self['legalForm'] = $legalForm;

        return $self;
    }

    /**
     * Contact phone number for the company.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Date of official company registration in YYYY-MM-DD format.
     */
    public function withRegistrationDate(string $registrationDate): self
    {
        $self = clone $this;
        $self['registrationDate'] = $registrationDate;

        return $self;
    }

    /**
     * Official company registration identifier.
     */
    public function withRegistrationID(string $registrationID): self
    {
        $self = clone $this;
        $self['registrationID'] = $registrationID;

        return $self;
    }

    /**
     * Declared share capital of the company, usually in euros.
     */
    public function withShareCapital(string $shareCapital): self
    {
        $self = clone $this;
        $self['shareCapital'] = $shareCapital;

        return $self;
    }

    /**
     * Current status of the company (e.g., active, inactive).
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * National tax identifier (e.g., VAT or TIN).
     */
    public function withTaxIdentificationNumber(
        string $taxIdentificationNumber
    ): self {
        $self = clone $this;
        $self['taxIdentificationNumber'] = $taxIdentificationNumber;

        return $self;
    }

    /**
     * Type of company, such as "main" or "affiliated".
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Company’s official website URL.
     */
    public function withWebsiteURL(string $websiteURL): self
    {
        $self = clone $this;
        $self['websiteURL'] = $websiteURL;

        return $self;
    }
}

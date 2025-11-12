<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyCreateParams;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Main information about the company being registered.
 *
 * @phpstan-type CompanyShape = array{
 *   name: string,
 *   address?: string|null,
 *   commercial_name?: string|null,
 *   country?: string|null,
 *   email?: string|null,
 *   employer_identification_number?: string|null,
 *   legal_form?: string|null,
 *   phone_number?: string|null,
 *   registration_date?: string|null,
 *   registration_id?: string|null,
 *   share_capital?: string|null,
 *   status?: string|null,
 *   tax_identification_number?: string|null,
 *   type?: string|null,
 *   website_url?: string|null,
 * }
 */
final class Company implements BaseModel
{
    /** @use SdkModel<CompanyShape> */
    use SdkModel;

    /**
     * Legal name of the company.
     */
    #[Api]
    public string $name;

    /**
     * Registered address of the company.
     */
    #[Api(optional: true)]
    public ?string $address;

    /**
     * Commercial or trade name of the company, if different from the legal name.
     */
    #[Api(optional: true)]
    public ?string $commercial_name;

    /**
     * ISO 3166-1 alpha-2 country code of company registration (e.g., "FR" for France).
     */
    #[Api(optional: true)]
    public ?string $country;

    /**
     * Contact email address for the company.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * Employer Identification Number (EIN) or equivalent.
     */
    #[Api(optional: true)]
    public ?string $employer_identification_number;

    /**
     * Legal structure of the company (e.g., SARL, SAS).
     */
    #[Api(optional: true)]
    public ?string $legal_form;

    /**
     * Contact phone number for the company.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Date of official company registration in YYYY-MM-DD format.
     */
    #[Api(optional: true)]
    public ?string $registration_date;

    /**
     * Official company registration identifier.
     */
    #[Api(optional: true)]
    public ?string $registration_id;

    /**
     * Declared share capital of the company, usually in euros.
     */
    #[Api(optional: true)]
    public ?string $share_capital;

    /**
     * Current status of the company (e.g., active, inactive).
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * National tax identifier (e.g., VAT or TIN).
     */
    #[Api(optional: true)]
    public ?string $tax_identification_number;

    /**
     * Type of company, such as "main" or "affiliated".
     */
    #[Api(optional: true)]
    public ?string $type;

    /**
     * Company’s official website URL.
     */
    #[Api(optional: true)]
    public ?string $website_url;

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
        ?string $commercial_name = null,
        ?string $country = null,
        ?string $email = null,
        ?string $employer_identification_number = null,
        ?string $legal_form = null,
        ?string $phone_number = null,
        ?string $registration_date = null,
        ?string $registration_id = null,
        ?string $share_capital = null,
        ?string $status = null,
        ?string $tax_identification_number = null,
        ?string $type = null,
        ?string $website_url = null,
    ): self {
        $obj = new self;

        $obj->name = $name;

        null !== $address && $obj->address = $address;
        null !== $commercial_name && $obj->commercial_name = $commercial_name;
        null !== $country && $obj->country = $country;
        null !== $email && $obj->email = $email;
        null !== $employer_identification_number && $obj->employer_identification_number = $employer_identification_number;
        null !== $legal_form && $obj->legal_form = $legal_form;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $registration_date && $obj->registration_date = $registration_date;
        null !== $registration_id && $obj->registration_id = $registration_id;
        null !== $share_capital && $obj->share_capital = $share_capital;
        null !== $status && $obj->status = $status;
        null !== $tax_identification_number && $obj->tax_identification_number = $tax_identification_number;
        null !== $type && $obj->type = $type;
        null !== $website_url && $obj->website_url = $website_url;

        return $obj;
    }

    /**
     * Legal name of the company.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Registered address of the company.
     */
    public function withAddress(string $address): self
    {
        $obj = clone $this;
        $obj->address = $address;

        return $obj;
    }

    /**
     * Commercial or trade name of the company, if different from the legal name.
     */
    public function withCommercialName(string $commercialName): self
    {
        $obj = clone $this;
        $obj->commercial_name = $commercialName;

        return $obj;
    }

    /**
     * ISO 3166-1 alpha-2 country code of company registration (e.g., "FR" for France).
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    /**
     * Contact email address for the company.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * Employer Identification Number (EIN) or equivalent.
     */
    public function withEmployerIdentificationNumber(
        string $employerIdentificationNumber
    ): self {
        $obj = clone $this;
        $obj->employer_identification_number = $employerIdentificationNumber;

        return $obj;
    }

    /**
     * Legal structure of the company (e.g., SARL, SAS).
     */
    public function withLegalForm(string $legalForm): self
    {
        $obj = clone $this;
        $obj->legal_form = $legalForm;

        return $obj;
    }

    /**
     * Contact phone number for the company.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }

    /**
     * Date of official company registration in YYYY-MM-DD format.
     */
    public function withRegistrationDate(string $registrationDate): self
    {
        $obj = clone $this;
        $obj->registration_date = $registrationDate;

        return $obj;
    }

    /**
     * Official company registration identifier.
     */
    public function withRegistrationID(string $registrationID): self
    {
        $obj = clone $this;
        $obj->registration_id = $registrationID;

        return $obj;
    }

    /**
     * Declared share capital of the company, usually in euros.
     */
    public function withShareCapital(string $shareCapital): self
    {
        $obj = clone $this;
        $obj->share_capital = $shareCapital;

        return $obj;
    }

    /**
     * Current status of the company (e.g., active, inactive).
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * National tax identifier (e.g., VAT or TIN).
     */
    public function withTaxIdentificationNumber(
        string $taxIdentificationNumber
    ): self {
        $obj = clone $this;
        $obj->tax_identification_number = $taxIdentificationNumber;

        return $obj;
    }

    /**
     * Type of company, such as "main" or "affiliated".
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * Company’s official website URL.
     */
    public function withWebsiteURL(string $websiteURL): self
    {
        $obj = clone $this;
        $obj->website_url = $websiteURL;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyCreateParams;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Main information about the company being registered.
 *
 * @phpstan-type company_alias = array{
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
    /** @use SdkModel<company_alias> */
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
    #[Api('commercial_name', optional: true)]
    public ?string $commercialName;

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
    #[Api('employer_identification_number', optional: true)]
    public ?string $employerIdentificationNumber;

    /**
     * Legal structure of the company (e.g., SARL, SAS).
     */
    #[Api('legal_form', optional: true)]
    public ?string $legalForm;

    /**
     * Contact phone number for the company.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Date of official company registration in YYYY-MM-DD format.
     */
    #[Api('registration_date', optional: true)]
    public ?string $registrationDate;

    /**
     * Official company registration identifier.
     */
    #[Api('registration_id', optional: true)]
    public ?string $registrationID;

    /**
     * Declared share capital of the company, usually in euros.
     */
    #[Api('share_capital', optional: true)]
    public ?string $shareCapital;

    /**
     * Current status of the company (e.g., active, inactive).
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * National tax identifier (e.g., VAT or TIN).
     */
    #[Api('tax_identification_number', optional: true)]
    public ?string $taxIdentificationNumber;

    /**
     * Type of company, such as "main" or "affiliated".
     */
    #[Api(optional: true)]
    public ?string $type;

    /**
     * Company’s official website URL.
     */
    #[Api('website_url', optional: true)]
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
        $obj = new self;

        $obj->name = $name;

        null !== $address && $obj->address = $address;
        null !== $commercialName && $obj->commercialName = $commercialName;
        null !== $country && $obj->country = $country;
        null !== $email && $obj->email = $email;
        null !== $employerIdentificationNumber && $obj->employerIdentificationNumber = $employerIdentificationNumber;
        null !== $legalForm && $obj->legalForm = $legalForm;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $registrationDate && $obj->registrationDate = $registrationDate;
        null !== $registrationID && $obj->registrationID = $registrationID;
        null !== $shareCapital && $obj->shareCapital = $shareCapital;
        null !== $status && $obj->status = $status;
        null !== $taxIdentificationNumber && $obj->taxIdentificationNumber = $taxIdentificationNumber;
        null !== $type && $obj->type = $type;
        null !== $websiteURL && $obj->websiteURL = $websiteURL;

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
        $obj->commercialName = $commercialName;

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
        $obj->employerIdentificationNumber = $employerIdentificationNumber;

        return $obj;
    }

    /**
     * Legal structure of the company (e.g., SARL, SAS).
     */
    public function withLegalForm(string $legalForm): self
    {
        $obj = clone $this;
        $obj->legalForm = $legalForm;

        return $obj;
    }

    /**
     * Contact phone number for the company.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Date of official company registration in YYYY-MM-DD format.
     */
    public function withRegistrationDate(string $registrationDate): self
    {
        $obj = clone $this;
        $obj->registrationDate = $registrationDate;

        return $obj;
    }

    /**
     * Official company registration identifier.
     */
    public function withRegistrationID(string $registrationID): self
    {
        $obj = clone $this;
        $obj->registrationID = $registrationID;

        return $obj;
    }

    /**
     * Declared share capital of the company, usually in euros.
     */
    public function withShareCapital(string $shareCapital): self
    {
        $obj = clone $this;
        $obj->shareCapital = $shareCapital;

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
        $obj->taxIdentificationNumber = $taxIdentificationNumber;

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
        $obj->websiteURL = $websiteURL;

        return $obj;
    }
}

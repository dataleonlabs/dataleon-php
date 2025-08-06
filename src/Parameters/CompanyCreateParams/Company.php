<?php

declare(strict_types=1);

namespace Dataleon\Parameters\CompanyCreateParams;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Main information about the company being registered.
 *
 * @phpstan-type company_alias = array{
 *   name: string,
 *   address?: string,
 *   commercialName?: string,
 *   country?: string,
 *   email?: string,
 *   employerIdentificationNumber?: string,
 *   legalForm?: string,
 *   phoneNumber?: string,
 *   registrationDate?: string,
 *   registrationID?: string,
 *   shareCapital?: string,
 *   status?: string,
 *   taxIdentificationNumber?: string,
 *   type?: string,
 *   websiteURL?: string,
 * }
 */
final class Company implements BaseModel
{
    use Model;

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
    public static function new(
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
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Registered address of the company.
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Commercial or trade name of the company, if different from the legal name.
     */
    public function setCommercialName(string $commercialName): self
    {
        $this->commercialName = $commercialName;

        return $this;
    }

    /**
     * ISO 3166-1 alpha-2 country code of company registration (e.g., "FR" for France).
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Contact email address for the company.
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Employer Identification Number (EIN) or equivalent.
     */
    public function setEmployerIdentificationNumber(
        string $employerIdentificationNumber
    ): self {
        $this->employerIdentificationNumber = $employerIdentificationNumber;

        return $this;
    }

    /**
     * Legal structure of the company (e.g., SARL, SAS).
     */
    public function setLegalForm(string $legalForm): self
    {
        $this->legalForm = $legalForm;

        return $this;
    }

    /**
     * Contact phone number for the company.
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Date of official company registration in YYYY-MM-DD format.
     */
    public function setRegistrationDate(string $registrationDate): self
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    /**
     * Official company registration identifier.
     */
    public function setRegistrationID(string $registrationID): self
    {
        $this->registrationID = $registrationID;

        return $this;
    }

    /**
     * Declared share capital of the company, usually in euros.
     */
    public function setShareCapital(string $shareCapital): self
    {
        $this->shareCapital = $shareCapital;

        return $this;
    }

    /**
     * Current status of the company (e.g., active, inactive).
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * National tax identifier (e.g., VAT or TIN).
     */
    public function setTaxIdentificationNumber(
        string $taxIdentificationNumber
    ): self {
        $this->taxIdentificationNumber = $taxIdentificationNumber;

        return $this;
    }

    /**
     * Type of company, such as "main" or "affiliated".
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Company’s official website URL.
     */
    public function setWebsiteURL(string $websiteURL): self
    {
        $this->websiteURL = $websiteURL;

        return $this;
    }
}

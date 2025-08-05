<?php

declare(strict_types=1);

namespace Dataleon\Models\CompanyRegistration;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Models\CompanyRegistration\Company\Contact;

/**
 * Main information about the company being registered, including legal name, registration ID, and address.
 *
 * @phpstan-type company_alias = array{
 *   address?: string,
 *   commercialName?: string,
 *   contact?: Contact,
 *   country?: string,
 *   email?: string,
 *   employerIdentificationNumber?: string,
 *   legalForm?: string,
 *   name?: string,
 *   phoneNumber?: string,
 *   registrationDate?: \DateTimeInterface,
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
     * Full registered address of the company.
     */
    #[Api(optional: true)]
    public ?string $address;

    /**
     * Trade or commercial name of the company.
     */
    #[Api('commercial_name', optional: true)]
    public ?string $commercialName;

    /**
     * Contact information for the company, including email, phone number, and address.
     */
    #[Api(optional: true)]
    public ?Contact $contact;

    /**
     * Country code where the company is registered.
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
     * Legal form or structure of the company (e.g., LLC, SARL).
     */
    #[Api('legal_form', optional: true)]
    public ?string $legalForm;

    /**
     * Legal registered name of the company.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Contact phone number for the company, including country code.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Date when the company was officially registered.
     */
    #[Api('registration_date', optional: true)]
    public ?\DateTimeInterface $registrationDate;

    /**
     * Official company registration number or ID.
     */
    #[Api('registration_id', optional: true)]
    public ?string $registrationID;

    /**
     * Total share capital of the company, including currency.
     */
    #[Api('share_capital', optional: true)]
    public ?string $shareCapital;

    /**
     * Current status of the company (e.g., active, inactive).
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * Tax identification number for the company.
     */
    #[Api('tax_identification_number', optional: true)]
    public ?string $taxIdentificationNumber;

    /**
     * Type of company within the workspace, e.g., main or affiliated.
     */
    #[Api(optional: true)]
    public ?string $type;

    /**
     * Official website URL of the company.
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
        ?string $address = null,
        ?string $commercialName = null,
        ?Contact $contact = null,
        ?string $country = null,
        ?string $email = null,
        ?string $employerIdentificationNumber = null,
        ?string $legalForm = null,
        ?string $name = null,
        ?string $phoneNumber = null,
        ?\DateTimeInterface $registrationDate = null,
        ?string $registrationID = null,
        ?string $shareCapital = null,
        ?string $status = null,
        ?string $taxIdentificationNumber = null,
        ?string $type = null,
        ?string $websiteURL = null,
    ): self {
        $obj = new self;

        null !== $address && $obj->address = $address;
        null !== $commercialName && $obj->commercialName = $commercialName;
        null !== $contact && $obj->contact = $contact;
        null !== $country && $obj->country = $country;
        null !== $email && $obj->email = $email;
        null !== $employerIdentificationNumber && $obj->employerIdentificationNumber = $employerIdentificationNumber;
        null !== $legalForm && $obj->legalForm = $legalForm;
        null !== $name && $obj->name = $name;
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
     * Full registered address of the company.
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Trade or commercial name of the company.
     */
    public function setCommercialName(string $commercialName): self
    {
        $this->commercialName = $commercialName;

        return $this;
    }

    /**
     * Contact information for the company, including email, phone number, and address.
     */
    public function setContact(Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Country code where the company is registered.
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
     * Legal form or structure of the company (e.g., LLC, SARL).
     */
    public function setLegalForm(string $legalForm): self
    {
        $this->legalForm = $legalForm;

        return $this;
    }

    /**
     * Legal registered name of the company.
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Contact phone number for the company, including country code.
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Date when the company was officially registered.
     */
    public function setRegistrationDate(
        \DateTimeInterface $registrationDate
    ): self {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    /**
     * Official company registration number or ID.
     */
    public function setRegistrationID(string $registrationID): self
    {
        $this->registrationID = $registrationID;

        return $this;
    }

    /**
     * Total share capital of the company, including currency.
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
     * Tax identification number for the company.
     */
    public function setTaxIdentificationNumber(
        string $taxIdentificationNumber
    ): self {
        $this->taxIdentificationNumber = $taxIdentificationNumber;

        return $this;
    }

    /**
     * Type of company within the workspace, e.g., main or affiliated.
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Official website URL of the company.
     */
    public function setWebsiteURL(string $websiteURL): self
    {
        $this->websiteURL = $websiteURL;

        return $this;
    }
}

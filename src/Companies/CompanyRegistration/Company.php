<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Companies\CompanyRegistration\Company\Contact;
use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Main information about the company being registered, including legal name, registration ID, and address.
 *
 * @phpstan-type CompanyShape = array{
 *   address?: string|null,
 *   closure_date?: \DateTimeInterface|null,
 *   commercial_name?: string|null,
 *   contact?: Contact|null,
 *   country?: string|null,
 *   email?: string|null,
 *   employees?: int|null,
 *   employer_identification_number?: string|null,
 *   insolvency_exists?: bool|null,
 *   insolvency_ongoing?: bool|null,
 *   legal_form?: string|null,
 *   name?: string|null,
 *   phone_number?: string|null,
 *   registration_date?: \DateTimeInterface|null,
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
     * Full registered address of the company.
     */
    #[Api(optional: true)]
    public ?string $address;

    /**
     * Closure date of the company, if applicable.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $closure_date;

    /**
     * Trade or commercial name of the company.
     */
    #[Api(optional: true)]
    public ?string $commercial_name;

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
     * Number of employees in the company.
     */
    #[Api(optional: true)]
    public ?int $employees;

    /**
     * Employer Identification Number (EIN) or equivalent.
     */
    #[Api(optional: true)]
    public ?string $employer_identification_number;

    /**
     * Indicates whether an insolvency procedure exists for the company.
     */
    #[Api(optional: true)]
    public ?bool $insolvency_exists;

    /**
     * Indicates whether an insolvency procedure is ongoing for the company.
     */
    #[Api(optional: true)]
    public ?bool $insolvency_ongoing;

    /**
     * Legal form or structure of the company (e.g., LLC, SARL).
     */
    #[Api(optional: true)]
    public ?string $legal_form;

    /**
     * Legal registered name of the company.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Contact phone number for the company, including country code.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Date when the company was officially registered.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $registration_date;

    /**
     * Official company registration number or ID.
     */
    #[Api(optional: true)]
    public ?string $registration_id;

    /**
     * Total share capital of the company, including currency.
     */
    #[Api(optional: true)]
    public ?string $share_capital;

    /**
     * Current status of the company (e.g., active, inactive).
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * Tax identification number for the company.
     */
    #[Api(optional: true)]
    public ?string $tax_identification_number;

    /**
     * Type of company within the workspace, e.g., main or affiliated.
     */
    #[Api(optional: true)]
    public ?string $type;

    /**
     * Official website URL of the company.
     */
    #[Api(optional: true)]
    public ?string $website_url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Contact|array{
     *   department?: string|null,
     *   email?: string|null,
     *   first_name?: string|null,
     *   last_name?: string|null,
     *   phone_number?: string|null,
     * } $contact
     */
    public static function with(
        ?string $address = null,
        ?\DateTimeInterface $closure_date = null,
        ?string $commercial_name = null,
        Contact|array|null $contact = null,
        ?string $country = null,
        ?string $email = null,
        ?int $employees = null,
        ?string $employer_identification_number = null,
        ?bool $insolvency_exists = null,
        ?bool $insolvency_ongoing = null,
        ?string $legal_form = null,
        ?string $name = null,
        ?string $phone_number = null,
        ?\DateTimeInterface $registration_date = null,
        ?string $registration_id = null,
        ?string $share_capital = null,
        ?string $status = null,
        ?string $tax_identification_number = null,
        ?string $type = null,
        ?string $website_url = null,
    ): self {
        $obj = new self;

        null !== $address && $obj['address'] = $address;
        null !== $closure_date && $obj['closure_date'] = $closure_date;
        null !== $commercial_name && $obj['commercial_name'] = $commercial_name;
        null !== $contact && $obj['contact'] = $contact;
        null !== $country && $obj['country'] = $country;
        null !== $email && $obj['email'] = $email;
        null !== $employees && $obj['employees'] = $employees;
        null !== $employer_identification_number && $obj['employer_identification_number'] = $employer_identification_number;
        null !== $insolvency_exists && $obj['insolvency_exists'] = $insolvency_exists;
        null !== $insolvency_ongoing && $obj['insolvency_ongoing'] = $insolvency_ongoing;
        null !== $legal_form && $obj['legal_form'] = $legal_form;
        null !== $name && $obj['name'] = $name;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $registration_date && $obj['registration_date'] = $registration_date;
        null !== $registration_id && $obj['registration_id'] = $registration_id;
        null !== $share_capital && $obj['share_capital'] = $share_capital;
        null !== $status && $obj['status'] = $status;
        null !== $tax_identification_number && $obj['tax_identification_number'] = $tax_identification_number;
        null !== $type && $obj['type'] = $type;
        null !== $website_url && $obj['website_url'] = $website_url;

        return $obj;
    }

    /**
     * Full registered address of the company.
     */
    public function withAddress(string $address): self
    {
        $obj = clone $this;
        $obj['address'] = $address;

        return $obj;
    }

    /**
     * Closure date of the company, if applicable.
     */
    public function withClosureDate(\DateTimeInterface $closureDate): self
    {
        $obj = clone $this;
        $obj['closure_date'] = $closureDate;

        return $obj;
    }

    /**
     * Trade or commercial name of the company.
     */
    public function withCommercialName(string $commercialName): self
    {
        $obj = clone $this;
        $obj['commercial_name'] = $commercialName;

        return $obj;
    }

    /**
     * Contact information for the company, including email, phone number, and address.
     *
     * @param Contact|array{
     *   department?: string|null,
     *   email?: string|null,
     *   first_name?: string|null,
     *   last_name?: string|null,
     *   phone_number?: string|null,
     * } $contact
     */
    public function withContact(Contact|array $contact): self
    {
        $obj = clone $this;
        $obj['contact'] = $contact;

        return $obj;
    }

    /**
     * Country code where the company is registered.
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj['country'] = $country;

        return $obj;
    }

    /**
     * Contact email address for the company.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * Number of employees in the company.
     */
    public function withEmployees(int $employees): self
    {
        $obj = clone $this;
        $obj['employees'] = $employees;

        return $obj;
    }

    /**
     * Employer Identification Number (EIN) or equivalent.
     */
    public function withEmployerIdentificationNumber(
        string $employerIdentificationNumber
    ): self {
        $obj = clone $this;
        $obj['employer_identification_number'] = $employerIdentificationNumber;

        return $obj;
    }

    /**
     * Indicates whether an insolvency procedure exists for the company.
     */
    public function withInsolvencyExists(bool $insolvencyExists): self
    {
        $obj = clone $this;
        $obj['insolvency_exists'] = $insolvencyExists;

        return $obj;
    }

    /**
     * Indicates whether an insolvency procedure is ongoing for the company.
     */
    public function withInsolvencyOngoing(bool $insolvencyOngoing): self
    {
        $obj = clone $this;
        $obj['insolvency_ongoing'] = $insolvencyOngoing;

        return $obj;
    }

    /**
     * Legal form or structure of the company (e.g., LLC, SARL).
     */
    public function withLegalForm(string $legalForm): self
    {
        $obj = clone $this;
        $obj['legal_form'] = $legalForm;

        return $obj;
    }

    /**
     * Legal registered name of the company.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Contact phone number for the company, including country code.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Date when the company was officially registered.
     */
    public function withRegistrationDate(
        \DateTimeInterface $registrationDate
    ): self {
        $obj = clone $this;
        $obj['registration_date'] = $registrationDate;

        return $obj;
    }

    /**
     * Official company registration number or ID.
     */
    public function withRegistrationID(string $registrationID): self
    {
        $obj = clone $this;
        $obj['registration_id'] = $registrationID;

        return $obj;
    }

    /**
     * Total share capital of the company, including currency.
     */
    public function withShareCapital(string $shareCapital): self
    {
        $obj = clone $this;
        $obj['share_capital'] = $shareCapital;

        return $obj;
    }

    /**
     * Current status of the company (e.g., active, inactive).
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Tax identification number for the company.
     */
    public function withTaxIdentificationNumber(
        string $taxIdentificationNumber
    ): self {
        $obj = clone $this;
        $obj['tax_identification_number'] = $taxIdentificationNumber;

        return $obj;
    }

    /**
     * Type of company within the workspace, e.g., main or affiliated.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Official website URL of the company.
     */
    public function withWebsiteURL(string $websiteURL): self
    {
        $obj = clone $this;
        $obj['website_url'] = $websiteURL;

        return $obj;
    }
}

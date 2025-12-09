<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Companies\CompanyRegistration\Company\Contact;
use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Main information about the company being registered, including legal name, registration ID, and address.
 *
 * @phpstan-type CompanyShape = array{
 *   address?: string|null,
 *   closureDate?: \DateTimeInterface|null,
 *   commercialName?: string|null,
 *   contact?: Contact|null,
 *   country?: string|null,
 *   email?: string|null,
 *   employees?: int|null,
 *   employerIdentificationNumber?: string|null,
 *   insolvencyExists?: bool|null,
 *   insolvencyOngoing?: bool|null,
 *   legalForm?: string|null,
 *   name?: string|null,
 *   phoneNumber?: string|null,
 *   registrationDate?: \DateTimeInterface|null,
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
     * Full registered address of the company.
     */
    #[Optional]
    public ?string $address;

    /**
     * Closure date of the company, if applicable.
     */
    #[Optional('closure_date')]
    public ?\DateTimeInterface $closureDate;

    /**
     * Trade or commercial name of the company.
     */
    #[Optional('commercial_name')]
    public ?string $commercialName;

    /**
     * Contact information for the company, including email, phone number, and address.
     */
    #[Optional]
    public ?Contact $contact;

    /**
     * Country code where the company is registered.
     */
    #[Optional]
    public ?string $country;

    /**
     * Contact email address for the company.
     */
    #[Optional]
    public ?string $email;

    /**
     * Number of employees in the company.
     */
    #[Optional]
    public ?int $employees;

    /**
     * Employer Identification Number (EIN) or equivalent.
     */
    #[Optional('employer_identification_number')]
    public ?string $employerIdentificationNumber;

    /**
     * Indicates whether an insolvency procedure exists for the company.
     */
    #[Optional('insolvency_exists')]
    public ?bool $insolvencyExists;

    /**
     * Indicates whether an insolvency procedure is ongoing for the company.
     */
    #[Optional('insolvency_ongoing')]
    public ?bool $insolvencyOngoing;

    /**
     * Legal form or structure of the company (e.g., LLC, SARL).
     */
    #[Optional('legal_form')]
    public ?string $legalForm;

    /**
     * Legal registered name of the company.
     */
    #[Optional]
    public ?string $name;

    /**
     * Contact phone number for the company, including country code.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Date when the company was officially registered.
     */
    #[Optional('registration_date')]
    public ?\DateTimeInterface $registrationDate;

    /**
     * Official company registration number or ID.
     */
    #[Optional('registration_id')]
    public ?string $registrationID;

    /**
     * Total share capital of the company, including currency.
     */
    #[Optional('share_capital')]
    public ?string $shareCapital;

    /**
     * Current status of the company (e.g., active, inactive).
     */
    #[Optional]
    public ?string $status;

    /**
     * Tax identification number for the company.
     */
    #[Optional('tax_identification_number')]
    public ?string $taxIdentificationNumber;

    /**
     * Type of company within the workspace, e.g., main or affiliated.
     */
    #[Optional]
    public ?string $type;

    /**
     * Official website URL of the company.
     */
    #[Optional('website_url')]
    public ?string $websiteURL;

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
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   phoneNumber?: string|null,
     * } $contact
     */
    public static function with(
        ?string $address = null,
        ?\DateTimeInterface $closureDate = null,
        ?string $commercialName = null,
        Contact|array|null $contact = null,
        ?string $country = null,
        ?string $email = null,
        ?int $employees = null,
        ?string $employerIdentificationNumber = null,
        ?bool $insolvencyExists = null,
        ?bool $insolvencyOngoing = null,
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

        null !== $address && $obj['address'] = $address;
        null !== $closureDate && $obj['closureDate'] = $closureDate;
        null !== $commercialName && $obj['commercialName'] = $commercialName;
        null !== $contact && $obj['contact'] = $contact;
        null !== $country && $obj['country'] = $country;
        null !== $email && $obj['email'] = $email;
        null !== $employees && $obj['employees'] = $employees;
        null !== $employerIdentificationNumber && $obj['employerIdentificationNumber'] = $employerIdentificationNumber;
        null !== $insolvencyExists && $obj['insolvencyExists'] = $insolvencyExists;
        null !== $insolvencyOngoing && $obj['insolvencyOngoing'] = $insolvencyOngoing;
        null !== $legalForm && $obj['legalForm'] = $legalForm;
        null !== $name && $obj['name'] = $name;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $registrationDate && $obj['registrationDate'] = $registrationDate;
        null !== $registrationID && $obj['registrationID'] = $registrationID;
        null !== $shareCapital && $obj['shareCapital'] = $shareCapital;
        null !== $status && $obj['status'] = $status;
        null !== $taxIdentificationNumber && $obj['taxIdentificationNumber'] = $taxIdentificationNumber;
        null !== $type && $obj['type'] = $type;
        null !== $websiteURL && $obj['websiteURL'] = $websiteURL;

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
        $obj['closureDate'] = $closureDate;

        return $obj;
    }

    /**
     * Trade or commercial name of the company.
     */
    public function withCommercialName(string $commercialName): self
    {
        $obj = clone $this;
        $obj['commercialName'] = $commercialName;

        return $obj;
    }

    /**
     * Contact information for the company, including email, phone number, and address.
     *
     * @param Contact|array{
     *   department?: string|null,
     *   email?: string|null,
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   phoneNumber?: string|null,
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
        $obj['employerIdentificationNumber'] = $employerIdentificationNumber;

        return $obj;
    }

    /**
     * Indicates whether an insolvency procedure exists for the company.
     */
    public function withInsolvencyExists(bool $insolvencyExists): self
    {
        $obj = clone $this;
        $obj['insolvencyExists'] = $insolvencyExists;

        return $obj;
    }

    /**
     * Indicates whether an insolvency procedure is ongoing for the company.
     */
    public function withInsolvencyOngoing(bool $insolvencyOngoing): self
    {
        $obj = clone $this;
        $obj['insolvencyOngoing'] = $insolvencyOngoing;

        return $obj;
    }

    /**
     * Legal form or structure of the company (e.g., LLC, SARL).
     */
    public function withLegalForm(string $legalForm): self
    {
        $obj = clone $this;
        $obj['legalForm'] = $legalForm;

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
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Date when the company was officially registered.
     */
    public function withRegistrationDate(
        \DateTimeInterface $registrationDate
    ): self {
        $obj = clone $this;
        $obj['registrationDate'] = $registrationDate;

        return $obj;
    }

    /**
     * Official company registration number or ID.
     */
    public function withRegistrationID(string $registrationID): self
    {
        $obj = clone $this;
        $obj['registrationID'] = $registrationID;

        return $obj;
    }

    /**
     * Total share capital of the company, including currency.
     */
    public function withShareCapital(string $shareCapital): self
    {
        $obj = clone $this;
        $obj['shareCapital'] = $shareCapital;

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
        $obj['taxIdentificationNumber'] = $taxIdentificationNumber;

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
        $obj['websiteURL'] = $websiteURL;

        return $obj;
    }
}

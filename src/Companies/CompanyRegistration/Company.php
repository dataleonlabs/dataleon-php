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
        $self = new self;

        null !== $address && $self['address'] = $address;
        null !== $closureDate && $self['closureDate'] = $closureDate;
        null !== $commercialName && $self['commercialName'] = $commercialName;
        null !== $contact && $self['contact'] = $contact;
        null !== $country && $self['country'] = $country;
        null !== $email && $self['email'] = $email;
        null !== $employees && $self['employees'] = $employees;
        null !== $employerIdentificationNumber && $self['employerIdentificationNumber'] = $employerIdentificationNumber;
        null !== $insolvencyExists && $self['insolvencyExists'] = $insolvencyExists;
        null !== $insolvencyOngoing && $self['insolvencyOngoing'] = $insolvencyOngoing;
        null !== $legalForm && $self['legalForm'] = $legalForm;
        null !== $name && $self['name'] = $name;
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
     * Full registered address of the company.
     */
    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * Closure date of the company, if applicable.
     */
    public function withClosureDate(\DateTimeInterface $closureDate): self
    {
        $self = clone $this;
        $self['closureDate'] = $closureDate;

        return $self;
    }

    /**
     * Trade or commercial name of the company.
     */
    public function withCommercialName(string $commercialName): self
    {
        $self = clone $this;
        $self['commercialName'] = $commercialName;

        return $self;
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
        $self = clone $this;
        $self['contact'] = $contact;

        return $self;
    }

    /**
     * Country code where the company is registered.
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
     * Number of employees in the company.
     */
    public function withEmployees(int $employees): self
    {
        $self = clone $this;
        $self['employees'] = $employees;

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
     * Indicates whether an insolvency procedure exists for the company.
     */
    public function withInsolvencyExists(bool $insolvencyExists): self
    {
        $self = clone $this;
        $self['insolvencyExists'] = $insolvencyExists;

        return $self;
    }

    /**
     * Indicates whether an insolvency procedure is ongoing for the company.
     */
    public function withInsolvencyOngoing(bool $insolvencyOngoing): self
    {
        $self = clone $this;
        $self['insolvencyOngoing'] = $insolvencyOngoing;

        return $self;
    }

    /**
     * Legal form or structure of the company (e.g., LLC, SARL).
     */
    public function withLegalForm(string $legalForm): self
    {
        $self = clone $this;
        $self['legalForm'] = $legalForm;

        return $self;
    }

    /**
     * Legal registered name of the company.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Contact phone number for the company, including country code.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Date when the company was officially registered.
     */
    public function withRegistrationDate(
        \DateTimeInterface $registrationDate
    ): self {
        $self = clone $this;
        $self['registrationDate'] = $registrationDate;

        return $self;
    }

    /**
     * Official company registration number or ID.
     */
    public function withRegistrationID(string $registrationID): self
    {
        $self = clone $this;
        $self['registrationID'] = $registrationID;

        return $self;
    }

    /**
     * Total share capital of the company, including currency.
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
     * Tax identification number for the company.
     */
    public function withTaxIdentificationNumber(
        string $taxIdentificationNumber
    ): self {
        $self = clone $this;
        $self['taxIdentificationNumber'] = $taxIdentificationNumber;

        return $self;
    }

    /**
     * Type of company within the workspace, e.g., main or affiliated.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Official website URL of the company.
     */
    public function withWebsiteURL(string $websiteURL): self
    {
        $self = clone $this;
        $self['websiteURL'] = $websiteURL;

        return $self;
    }
}

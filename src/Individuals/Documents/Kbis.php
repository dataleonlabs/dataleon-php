<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\Kbis\Member;

/**
 * A document representing official registration data from the KBIS (France).
 *
 * @phpstan-type KbisShape = array{
 *   activities?: string|null,
 *   address?: string|null,
 *   capital_social?: string|null,
 *   closure_date?: \DateTimeInterface|null,
 *   company_name?: string|null,
 *   document_date?: \DateTimeInterface|null,
 *   document_type?: string|null,
 *   first_closure_date?: \DateTimeInterface|null,
 *   from_greffe?: string|null,
 *   legal_form?: string|null,
 *   members?: list<Member>|null,
 *   ngestion?: string|null,
 *   rcs_number?: string|null,
 *   registration_date?: \DateTimeInterface|null,
 *   siren_info?: string|null,
 * }
 */
final class Kbis implements BaseModel
{
    /** @use SdkModel<KbisShape> */
    use SdkModel;

    /**
     * Declared business activities.
     */
    #[Api(optional: true)]
    public ?string $activities;

    /**
     * Official address of the company.
     */
    #[Api(optional: true)]
    public ?string $address;

    /**
     * Registered social capital of the company.
     */
    #[Api(optional: true)]
    public ?string $capital_social;

    /**
     * Date of closure, if applicable.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $closure_date;

    /**
     * Official name of the company.
     */
    #[Api(optional: true)]
    public ?string $company_name;

    /**
     * Date when the document was issued.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $document_date;

    /**
     * Fixed identifier for the document type.
     */
    #[Api(optional: true)]
    public ?string $document_type;

    /**
     * Date of the first fiscal closure.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $first_closure_date;

    /**
     * Registry office that issued the document.
     */
    #[Api(optional: true)]
    public ?string $from_greffe;

    /**
     * Legal form of the company (e.g., SAS, SARL).
     */
    #[Api(optional: true)]
    public ?string $legal_form;

    /**
     * List of people or entities associated with the company.
     *
     * @var list<Member>|null $members
     */
    #[Api(list: Member::class, optional: true)]
    public ?array $members;

    /**
     * Business registry number or NGestion.
     */
    #[Api(optional: true)]
    public ?string $ngestion;

    /**
     * RCS (Company Registration Number).
     */
    #[Api(optional: true)]
    public ?string $rcs_number;

    /**
     * Date of registration with the registry.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $registration_date;

    /**
     * SIREN number of the company.
     */
    #[Api(optional: true)]
    public ?string $siren_info;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Member> $members
     */
    public static function with(
        ?string $activities = null,
        ?string $address = null,
        ?string $capital_social = null,
        ?\DateTimeInterface $closure_date = null,
        ?string $company_name = null,
        ?\DateTimeInterface $document_date = null,
        ?string $document_type = null,
        ?\DateTimeInterface $first_closure_date = null,
        ?string $from_greffe = null,
        ?string $legal_form = null,
        ?array $members = null,
        ?string $ngestion = null,
        ?string $rcs_number = null,
        ?\DateTimeInterface $registration_date = null,
        ?string $siren_info = null,
    ): self {
        $obj = new self;

        null !== $activities && $obj->activities = $activities;
        null !== $address && $obj->address = $address;
        null !== $capital_social && $obj->capital_social = $capital_social;
        null !== $closure_date && $obj->closure_date = $closure_date;
        null !== $company_name && $obj->company_name = $company_name;
        null !== $document_date && $obj->document_date = $document_date;
        null !== $document_type && $obj->document_type = $document_type;
        null !== $first_closure_date && $obj->first_closure_date = $first_closure_date;
        null !== $from_greffe && $obj->from_greffe = $from_greffe;
        null !== $legal_form && $obj->legal_form = $legal_form;
        null !== $members && $obj->members = $members;
        null !== $ngestion && $obj->ngestion = $ngestion;
        null !== $rcs_number && $obj->rcs_number = $rcs_number;
        null !== $registration_date && $obj->registration_date = $registration_date;
        null !== $siren_info && $obj->siren_info = $siren_info;

        return $obj;
    }

    /**
     * Declared business activities.
     */
    public function withActivities(string $activities): self
    {
        $obj = clone $this;
        $obj->activities = $activities;

        return $obj;
    }

    /**
     * Official address of the company.
     */
    public function withAddress(string $address): self
    {
        $obj = clone $this;
        $obj->address = $address;

        return $obj;
    }

    /**
     * Registered social capital of the company.
     */
    public function withCapitalSocial(string $capitalSocial): self
    {
        $obj = clone $this;
        $obj->capital_social = $capitalSocial;

        return $obj;
    }

    /**
     * Date of closure, if applicable.
     */
    public function withClosureDate(\DateTimeInterface $closureDate): self
    {
        $obj = clone $this;
        $obj->closure_date = $closureDate;

        return $obj;
    }

    /**
     * Official name of the company.
     */
    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj->company_name = $companyName;

        return $obj;
    }

    /**
     * Date when the document was issued.
     */
    public function withDocumentDate(\DateTimeInterface $documentDate): self
    {
        $obj = clone $this;
        $obj->document_date = $documentDate;

        return $obj;
    }

    /**
     * Fixed identifier for the document type.
     */
    public function withDocumentType(string $documentType): self
    {
        $obj = clone $this;
        $obj->document_type = $documentType;

        return $obj;
    }

    /**
     * Date of the first fiscal closure.
     */
    public function withFirstClosureDate(
        \DateTimeInterface $firstClosureDate
    ): self {
        $obj = clone $this;
        $obj->first_closure_date = $firstClosureDate;

        return $obj;
    }

    /**
     * Registry office that issued the document.
     */
    public function withFromGreffe(string $fromGreffe): self
    {
        $obj = clone $this;
        $obj->from_greffe = $fromGreffe;

        return $obj;
    }

    /**
     * Legal form of the company (e.g., SAS, SARL).
     */
    public function withLegalForm(string $legalForm): self
    {
        $obj = clone $this;
        $obj->legal_form = $legalForm;

        return $obj;
    }

    /**
     * List of people or entities associated with the company.
     *
     * @param list<Member> $members
     */
    public function withMembers(array $members): self
    {
        $obj = clone $this;
        $obj->members = $members;

        return $obj;
    }

    /**
     * Business registry number or NGestion.
     */
    public function withNgestion(string $ngestion): self
    {
        $obj = clone $this;
        $obj->ngestion = $ngestion;

        return $obj;
    }

    /**
     * RCS (Company Registration Number).
     */
    public function withRcsNumber(string $rcsNumber): self
    {
        $obj = clone $this;
        $obj->rcs_number = $rcsNumber;

        return $obj;
    }

    /**
     * Date of registration with the registry.
     */
    public function withRegistrationDate(
        \DateTimeInterface $registrationDate
    ): self {
        $obj = clone $this;
        $obj->registration_date = $registrationDate;

        return $obj;
    }

    /**
     * SIREN number of the company.
     */
    public function withSirenInfo(string $sirenInfo): self
    {
        $obj = clone $this;
        $obj->siren_info = $sirenInfo;

        return $obj;
    }
}

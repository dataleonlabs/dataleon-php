<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\ListOf;
use Dataleon\Individuals\Documents\Kbis\Member;

/**
 * A document representing official registration data from the KBIS (France).
 *
 * @phpstan-type kbis_alias = array{
 *   activities?: string,
 *   address?: string,
 *   capitalSocial?: string,
 *   closureDate?: \DateTimeInterface,
 *   companyName?: string,
 *   documentDate?: \DateTimeInterface,
 *   documentType?: string,
 *   firstClosureDate?: \DateTimeInterface,
 *   fromGreffe?: string,
 *   legalForm?: string,
 *   members?: list<Member>,
 *   ngestion?: string,
 *   rcsNumber?: string,
 *   registrationDate?: \DateTimeInterface,
 *   sirenInfo?: string,
 * }
 */
final class Kbis implements BaseModel
{
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
    #[Api('capital_social', optional: true)]
    public ?string $capitalSocial;

    /**
     * Date of closure, if applicable.
     */
    #[Api('closure_date', optional: true)]
    public ?\DateTimeInterface $closureDate;

    /**
     * Official name of the company.
     */
    #[Api('company_name', optional: true)]
    public ?string $companyName;

    /**
     * Date when the document was issued.
     */
    #[Api('document_date', optional: true)]
    public ?\DateTimeInterface $documentDate;

    /**
     * Fixed identifier for the document type.
     */
    #[Api('document_type', optional: true)]
    public ?string $documentType;

    /**
     * Date of the first fiscal closure.
     */
    #[Api('first_closure_date', optional: true)]
    public ?\DateTimeInterface $firstClosureDate;

    /**
     * Registry office that issued the document.
     */
    #[Api('from_greffe', optional: true)]
    public ?string $fromGreffe;

    /**
     * Legal form of the company (e.g., SAS, SARL).
     */
    #[Api('legal_form', optional: true)]
    public ?string $legalForm;

    /**
     * List of people or entities associated with the company.
     *
     * @var null|list<Member> $members
     */
    #[Api(type: new ListOf(Member::class), optional: true)]
    public ?array $members;

    /**
     * Business registry number or NGestion.
     */
    #[Api(optional: true)]
    public ?string $ngestion;

    /**
     * RCS (Company Registration Number).
     */
    #[Api('rcs_number', optional: true)]
    public ?string $rcsNumber;

    /**
     * Date of registration with the registry.
     */
    #[Api('registration_date', optional: true)]
    public ?\DateTimeInterface $registrationDate;

    /**
     * SIREN number of the company.
     */
    #[Api('siren_info', optional: true)]
    public ?string $sirenInfo;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param null|list<Member> $members
     */
    public static function with(
        ?string $activities = null,
        ?string $address = null,
        ?string $capitalSocial = null,
        ?\DateTimeInterface $closureDate = null,
        ?string $companyName = null,
        ?\DateTimeInterface $documentDate = null,
        ?string $documentType = null,
        ?\DateTimeInterface $firstClosureDate = null,
        ?string $fromGreffe = null,
        ?string $legalForm = null,
        ?array $members = null,
        ?string $ngestion = null,
        ?string $rcsNumber = null,
        ?\DateTimeInterface $registrationDate = null,
        ?string $sirenInfo = null,
    ): self {
        $obj = new self;

        null !== $activities && $obj->activities = $activities;
        null !== $address && $obj->address = $address;
        null !== $capitalSocial && $obj->capitalSocial = $capitalSocial;
        null !== $closureDate && $obj->closureDate = $closureDate;
        null !== $companyName && $obj->companyName = $companyName;
        null !== $documentDate && $obj->documentDate = $documentDate;
        null !== $documentType && $obj->documentType = $documentType;
        null !== $firstClosureDate && $obj->firstClosureDate = $firstClosureDate;
        null !== $fromGreffe && $obj->fromGreffe = $fromGreffe;
        null !== $legalForm && $obj->legalForm = $legalForm;
        null !== $members && $obj->members = $members;
        null !== $ngestion && $obj->ngestion = $ngestion;
        null !== $rcsNumber && $obj->rcsNumber = $rcsNumber;
        null !== $registrationDate && $obj->registrationDate = $registrationDate;
        null !== $sirenInfo && $obj->sirenInfo = $sirenInfo;

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
        $obj->capitalSocial = $capitalSocial;

        return $obj;
    }

    /**
     * Date of closure, if applicable.
     */
    public function withClosureDate(\DateTimeInterface $closureDate): self
    {
        $obj = clone $this;
        $obj->closureDate = $closureDate;

        return $obj;
    }

    /**
     * Official name of the company.
     */
    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj->companyName = $companyName;

        return $obj;
    }

    /**
     * Date when the document was issued.
     */
    public function withDocumentDate(\DateTimeInterface $documentDate): self
    {
        $obj = clone $this;
        $obj->documentDate = $documentDate;

        return $obj;
    }

    /**
     * Fixed identifier for the document type.
     */
    public function withDocumentType(string $documentType): self
    {
        $obj = clone $this;
        $obj->documentType = $documentType;

        return $obj;
    }

    /**
     * Date of the first fiscal closure.
     */
    public function withFirstClosureDate(
        \DateTimeInterface $firstClosureDate
    ): self {
        $obj = clone $this;
        $obj->firstClosureDate = $firstClosureDate;

        return $obj;
    }

    /**
     * Registry office that issued the document.
     */
    public function withFromGreffe(string $fromGreffe): self
    {
        $obj = clone $this;
        $obj->fromGreffe = $fromGreffe;

        return $obj;
    }

    /**
     * Legal form of the company (e.g., SAS, SARL).
     */
    public function withLegalForm(string $legalForm): self
    {
        $obj = clone $this;
        $obj->legalForm = $legalForm;

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
        $obj->rcsNumber = $rcsNumber;

        return $obj;
    }

    /**
     * Date of registration with the registry.
     */
    public function withRegistrationDate(
        \DateTimeInterface $registrationDate
    ): self {
        $obj = clone $this;
        $obj->registrationDate = $registrationDate;

        return $obj;
    }

    /**
     * SIREN number of the company.
     */
    public function withSirenInfo(string $sirenInfo): self
    {
        $obj = clone $this;
        $obj->sirenInfo = $sirenInfo;

        return $obj;
    }
}

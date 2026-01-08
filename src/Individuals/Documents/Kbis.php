<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\Kbis\Member;

/**
 * A document representing official registration data from the KBIS (France).
 *
 * @phpstan-import-type MemberShape from \Dataleon\Individuals\Documents\Kbis\Member
 *
 * @phpstan-type KbisShape = array{
 *   activities?: string|null,
 *   address?: string|null,
 *   capitalSocial?: string|null,
 *   closureDate?: string|null,
 *   companyName?: string|null,
 *   documentDate?: string|null,
 *   documentType?: string|null,
 *   firstClosureDate?: string|null,
 *   fromGreffe?: string|null,
 *   legalForm?: string|null,
 *   members?: list<Member|MemberShape>|null,
 *   ngestion?: string|null,
 *   rcsNumber?: string|null,
 *   registrationDate?: string|null,
 *   sirenInfo?: string|null,
 * }
 */
final class Kbis implements BaseModel
{
    /** @use SdkModel<KbisShape> */
    use SdkModel;

    /**
     * Declared business activities.
     */
    #[Optional]
    public ?string $activities;

    /**
     * Official address of the company.
     */
    #[Optional]
    public ?string $address;

    /**
     * Registered social capital of the company.
     */
    #[Optional('capital_social')]
    public ?string $capitalSocial;

    /**
     * Date of closure, if applicable.
     */
    #[Optional('closure_date')]
    public ?string $closureDate;

    /**
     * Official name of the company.
     */
    #[Optional('company_name')]
    public ?string $companyName;

    /**
     * Date when the document was issued.
     */
    #[Optional('document_date')]
    public ?string $documentDate;

    /**
     * Fixed identifier for the document type.
     */
    #[Optional('document_type')]
    public ?string $documentType;

    /**
     * Date of the first fiscal closure.
     */
    #[Optional('first_closure_date')]
    public ?string $firstClosureDate;

    /**
     * Registry office that issued the document.
     */
    #[Optional('from_greffe')]
    public ?string $fromGreffe;

    /**
     * Legal form of the company (e.g., SAS, SARL).
     */
    #[Optional('legal_form')]
    public ?string $legalForm;

    /**
     * List of people or entities associated with the company.
     *
     * @var list<Member>|null $members
     */
    #[Optional(list: Member::class)]
    public ?array $members;

    /**
     * Business registry number or NGestion.
     */
    #[Optional]
    public ?string $ngestion;

    /**
     * RCS (Company Registration Number).
     */
    #[Optional('rcs_number')]
    public ?string $rcsNumber;

    /**
     * Date of registration with the registry.
     */
    #[Optional('registration_date')]
    public ?string $registrationDate;

    /**
     * SIREN number of the company.
     */
    #[Optional('siren_info')]
    public ?string $sirenInfo;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Member|MemberShape>|null $members
     */
    public static function with(
        ?string $activities = null,
        ?string $address = null,
        ?string $capitalSocial = null,
        ?string $closureDate = null,
        ?string $companyName = null,
        ?string $documentDate = null,
        ?string $documentType = null,
        ?string $firstClosureDate = null,
        ?string $fromGreffe = null,
        ?string $legalForm = null,
        ?array $members = null,
        ?string $ngestion = null,
        ?string $rcsNumber = null,
        ?string $registrationDate = null,
        ?string $sirenInfo = null,
    ): self {
        $self = new self;

        null !== $activities && $self['activities'] = $activities;
        null !== $address && $self['address'] = $address;
        null !== $capitalSocial && $self['capitalSocial'] = $capitalSocial;
        null !== $closureDate && $self['closureDate'] = $closureDate;
        null !== $companyName && $self['companyName'] = $companyName;
        null !== $documentDate && $self['documentDate'] = $documentDate;
        null !== $documentType && $self['documentType'] = $documentType;
        null !== $firstClosureDate && $self['firstClosureDate'] = $firstClosureDate;
        null !== $fromGreffe && $self['fromGreffe'] = $fromGreffe;
        null !== $legalForm && $self['legalForm'] = $legalForm;
        null !== $members && $self['members'] = $members;
        null !== $ngestion && $self['ngestion'] = $ngestion;
        null !== $rcsNumber && $self['rcsNumber'] = $rcsNumber;
        null !== $registrationDate && $self['registrationDate'] = $registrationDate;
        null !== $sirenInfo && $self['sirenInfo'] = $sirenInfo;

        return $self;
    }

    /**
     * Declared business activities.
     */
    public function withActivities(string $activities): self
    {
        $self = clone $this;
        $self['activities'] = $activities;

        return $self;
    }

    /**
     * Official address of the company.
     */
    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * Registered social capital of the company.
     */
    public function withCapitalSocial(string $capitalSocial): self
    {
        $self = clone $this;
        $self['capitalSocial'] = $capitalSocial;

        return $self;
    }

    /**
     * Date of closure, if applicable.
     */
    public function withClosureDate(string $closureDate): self
    {
        $self = clone $this;
        $self['closureDate'] = $closureDate;

        return $self;
    }

    /**
     * Official name of the company.
     */
    public function withCompanyName(string $companyName): self
    {
        $self = clone $this;
        $self['companyName'] = $companyName;

        return $self;
    }

    /**
     * Date when the document was issued.
     */
    public function withDocumentDate(string $documentDate): self
    {
        $self = clone $this;
        $self['documentDate'] = $documentDate;

        return $self;
    }

    /**
     * Fixed identifier for the document type.
     */
    public function withDocumentType(string $documentType): self
    {
        $self = clone $this;
        $self['documentType'] = $documentType;

        return $self;
    }

    /**
     * Date of the first fiscal closure.
     */
    public function withFirstClosureDate(string $firstClosureDate): self
    {
        $self = clone $this;
        $self['firstClosureDate'] = $firstClosureDate;

        return $self;
    }

    /**
     * Registry office that issued the document.
     */
    public function withFromGreffe(string $fromGreffe): self
    {
        $self = clone $this;
        $self['fromGreffe'] = $fromGreffe;

        return $self;
    }

    /**
     * Legal form of the company (e.g., SAS, SARL).
     */
    public function withLegalForm(string $legalForm): self
    {
        $self = clone $this;
        $self['legalForm'] = $legalForm;

        return $self;
    }

    /**
     * List of people or entities associated with the company.
     *
     * @param list<Member|MemberShape> $members
     */
    public function withMembers(array $members): self
    {
        $self = clone $this;
        $self['members'] = $members;

        return $self;
    }

    /**
     * Business registry number or NGestion.
     */
    public function withNgestion(string $ngestion): self
    {
        $self = clone $this;
        $self['ngestion'] = $ngestion;

        return $self;
    }

    /**
     * RCS (Company Registration Number).
     */
    public function withRcsNumber(string $rcsNumber): self
    {
        $self = clone $this;
        $self['rcsNumber'] = $rcsNumber;

        return $self;
    }

    /**
     * Date of registration with the registry.
     */
    public function withRegistrationDate(string $registrationDate): self
    {
        $self = clone $this;
        $self['registrationDate'] = $registrationDate;

        return $self;
    }

    /**
     * SIREN number of the company.
     */
    public function withSirenInfo(string $sirenInfo): self
    {
        $self = clone $this;
        $self['sirenInfo'] = $sirenInfo;

        return $self;
    }
}

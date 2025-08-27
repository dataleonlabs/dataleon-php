<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\DocumentUploadParams;

use Dataleon\Core\Concerns\SdkEnum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Filter by document type for upload (must be one of the allowed values).
 */
final class DocumentType implements ConverterSource
{
    use SdkEnum;

    public const LIASSE_FISCALE = 'liasse_fiscale';

    public const AMORTISED_LOAN_SCHEDULE = 'amortised_loan_schedule';

    public const INVOICE = 'invoice';

    public const RECEIPT = 'receipt';

    public const COMPANY_STATUTS = 'company_statuts';

    public const REGISTRATION_COMPANY_CERTIFICATE = 'registration_company_certificate';

    public const KBIS = 'kbis';

    public const RIB = 'rib';

    public const LIVRET_FAMILLE = 'livret_famille';

    public const BIRTH_CERTIFICATE = 'birth_certificate';

    public const PAYSLIP = 'payslip';

    public const SOCIAL_SECURITY_CARD = 'social_security_card';

    public const VEHICLE_REGISTRATION_CERTIFICATE = 'vehicle_registration_certificate';

    public const CARTE_GRISE = 'carte_grise';

    public const CRIMINAL_RECORD_EXTRACT = 'criminal_record_extract';

    public const PROOF_OF_ADDRESS = 'proof_of_address';

    public const IDENTITY_CARD_FRONT = 'identity_card_front';

    public const IDENTITY_CARD_BACK = 'identity_card_back';

    public const DRIVER_LICENSE_FRONT = 'driver_license_front';

    public const DRIVER_LICENSE_BACK = 'driver_license_back';

    public const IDENTITY_DOCUMENT = 'identity_document';

    public const DRIVER_LICENSE = 'driver_license';

    public const PASSPORT = 'passport';

    public const TAX = 'tax';

    public const CERTIFICATE_OF_INCORPORATION = 'certificate_of_incorporation';

    public const CERTIFICATE_OF_GOOD_STANDING = 'certificate_of_good_standing';

    public const LCB_FT_LAB_AML_POLICIES = 'lcb_ft_lab_aml_policies';

    public const NIU_ENTREPRISE = 'niu_entreprise';

    public const FINANCIAL_STATEMENTS = 'financial_statements';

    public const RCCM = 'rccm';

    public const PROOF_OF_SOURCE_FUNDS = 'proof_of_source_funds';

    public const ORGANIZATIONAL_CHART = 'organizational_chart';

    public const RISK_POLICIES = 'risk_policies';
}

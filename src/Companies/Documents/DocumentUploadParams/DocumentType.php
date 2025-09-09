<?php

declare(strict_types=1);

namespace Dataleon\Companies\Documents\DocumentUploadParams;

/**
 * Filter by document type for upload (must be one of the allowed values).
 */
enum DocumentType: string
{
    case LIASSE_FISCALE = 'liasse_fiscale';

    case AMORTISED_LOAN_SCHEDULE = 'amortised_loan_schedule';

    case INVOICE = 'invoice';

    case RECEIPT = 'receipt';

    case COMPANY_STATUTS = 'company_statuts';

    case REGISTRATION_COMPANY_CERTIFICATE = 'registration_company_certificate';

    case KBIS = 'kbis';

    case RIB = 'rib';

    case LIVRET_FAMILLE = 'livret_famille';

    case BIRTH_CERTIFICATE = 'birth_certificate';

    case PAYSLIP = 'payslip';

    case SOCIAL_SECURITY_CARD = 'social_security_card';

    case VEHICLE_REGISTRATION_CERTIFICATE = 'vehicle_registration_certificate';

    case CARTE_GRISE = 'carte_grise';

    case CRIMINAL_RECORD_EXTRACT = 'criminal_record_extract';

    case PROOF_OF_ADDRESS = 'proof_of_address';

    case IDENTITY_CARD_FRONT = 'identity_card_front';

    case IDENTITY_CARD_BACK = 'identity_card_back';

    case DRIVER_LICENSE_FRONT = 'driver_license_front';

    case DRIVER_LICENSE_BACK = 'driver_license_back';

    case IDENTITY_DOCUMENT = 'identity_document';

    case DRIVER_LICENSE = 'driver_license';

    case PASSPORT = 'passport';

    case TAX = 'tax';

    case CERTIFICATE_OF_INCORPORATION = 'certificate_of_incorporation';

    case CERTIFICATE_OF_GOOD_STANDING = 'certificate_of_good_standing';

    case LCB_FT_LAB_AML_POLICIES = 'lcb_ft_lab_aml_policies';

    case NIU_ENTREPRISE = 'niu_entreprise';

    case FINANCIAL_STATEMENTS = 'financial_statements';

    case RCCM = 'rccm';

    case PROOF_OF_SOURCE_FUNDS = 'proof_of_source_funds';

    case ORGANIZATIONAL_CHART = 'organizational_chart';

    case RISK_POLICIES = 'risk_policies';
}

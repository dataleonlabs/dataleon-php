<?php

declare(strict_types=1);

namespace Dataleon\Models\Individuals\DocumentUploadParams;

use Dataleon\Core\Concerns\Enum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Filter by document type for upload (must be one of the allowed values).
 *
 * @phpstan-type document_type_alias = DocumentType::*
 */
final class DocumentType implements ConverterSource
{
    use Enum;

    public const BANK_STATEMENTS = 'bank_statements';

    public const LIASSE_FISCALE = 'liasse_fiscale';

    public const AMORTISED_LOAN_SCHEDULE = 'amortised_loan_schedule';

    public const ACCOUNTING = 'accounting';

    public const INVOICE = 'invoice';

    public const RECEIPT = 'receipt';

    public const COMPANY_STATUTS = 'company_statuts';

    public const RIB = 'rib';

    public const LIVRET_FAMILLE = 'livret_famille';

    public const PAYSLIP = 'payslip';

    public const CARTE_GRISE = 'carte_grise';

    public const PROOF_ADDRESS = 'proof_address';

    public const IDENTITY_DOCUMENT = 'identity_document';

    public const TAX = 'tax';
}

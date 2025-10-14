<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyCreateParams\TechnicalData;

enum PortalStep: string
{
    case IDENTITY_VERIFICATION = 'identity_verification';

    case DOCUMENT_SIGNING = 'document_signing';

    case PROOF_OF_ADDRESS = 'proof_of_address';

    case SELFIE = 'selfie';

    case FACE_MATCH = 'face_match';
}

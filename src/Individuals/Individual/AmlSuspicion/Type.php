<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual\AmlSuspicion;

use Dataleon\Core\Concerns\SdkEnum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Category of the suspicion. Possible values: "crime", "sanction", "pep", "adverse_news", "other".
 */
final class Type implements ConverterSource
{
    use SdkEnum;

    public const CRIME = 'crime';

    public const SANCTION = 'sanction';

    public const PEP = 'pep';

    public const ADVERSE_NEWS = 'adverse_news';

    public const OTHER = 'other';
}

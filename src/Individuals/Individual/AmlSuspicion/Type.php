<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual\AmlSuspicion;

/**
 * Category of the suspicion. Possible values: "crime", "sanction", "pep", "adverse_news", "other".
 */
enum Type: string
{
    case CRIME = 'crime';

    case SANCTION = 'sanction';

    case PEP = 'pep';

    case ADVERSE_NEWS = 'adverse_news';

    case OTHER = 'other';
}

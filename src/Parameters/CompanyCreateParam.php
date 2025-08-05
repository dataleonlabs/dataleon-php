<?php

declare(strict_types=1);

namespace Dataleon\Parameters;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Concerns\Params;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Parameters\CompanyCreateParam\Company;
use Dataleon\Parameters\CompanyCreateParam\TechnicalData;

/**
 * Create a new company.
 *
 * @phpstan-type create_params1 = array{
 *   company: Company,
 *   workspaceID: string,
 *   sourceID?: string,
 *   technicalData?: TechnicalData,
 * }
 */
final class CompanyCreateParam implements BaseModel
{
    use Model;
    use Params;

    /**
     * Main information about the company being registered.
     */
    #[Api]
    public Company $company;

    /**
     * Unique identifier of the workspace in which the company is being created.
     */
    #[Api('workspace_id')]
    public string $workspaceID;

    /**
     * Optional identifier to track the origin of the request or integration from your system.
     */
    #[Api('source_id', optional: true)]
    public ?string $sourceID;

    /**
     * Technical metadata and callback configuration.
     */
    #[Api('technical_data', optional: true)]
    public ?TechnicalData $technicalData;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function new(
        Company $company,
        string $workspaceID,
        ?string $sourceID = null,
        ?TechnicalData $technicalData = null,
    ): self {
        $obj = new self;

        $obj->company = $company;
        $obj->workspaceID = $workspaceID;

        null !== $sourceID && $obj->sourceID = $sourceID;
        null !== $technicalData && $obj->technicalData = $technicalData;

        return $obj;
    }
}

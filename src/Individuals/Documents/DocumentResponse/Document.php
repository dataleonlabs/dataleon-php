<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\DocumentResponse;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Represents a document stored and processed by the system, such as an identity card or a PDF contract.
 */
final class Document implements BaseModel
{
    use SdkModel;

    /**
     * Unique identifier of the document.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Functional type of the document (e.g., identity document, invoice).
     */
    #[Api('document_type', optional: true)]
    public ?string $documentType;

    /**
     * Original filename of the uploaded document.
     */
    #[Api(optional: true)]
    public ?string $filename;

    /**
     * Human-readable name of the document.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Secure URL to access the document.
     */
    #[Api('signed_url', optional: true)]
    public ?string $signedURL;

    /**
     * Processing state of the document (e.g., WAITING, STARTED, RUNNING, PROCESSED).
     */
    #[Api(optional: true)]
    public ?string $state;

    /**
     * Validation status of the document (e.g., need_review, approved, rejected).
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * Identifier of the workspace to which the document belongs.
     */
    #[Api('workspace_id', optional: true)]
    public ?string $workspaceID;

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
    public static function with(
        ?string $id = null,
        ?string $documentType = null,
        ?string $filename = null,
        ?string $name = null,
        ?string $signedURL = null,
        ?string $state = null,
        ?string $status = null,
        ?string $workspaceID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $documentType && $obj->documentType = $documentType;
        null !== $filename && $obj->filename = $filename;
        null !== $name && $obj->name = $name;
        null !== $signedURL && $obj->signedURL = $signedURL;
        null !== $state && $obj->state = $state;
        null !== $status && $obj->status = $status;
        null !== $workspaceID && $obj->workspaceID = $workspaceID;

        return $obj;
    }

    /**
     * Unique identifier of the document.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Functional type of the document (e.g., identity document, invoice).
     */
    public function withDocumentType(string $documentType): self
    {
        $obj = clone $this;
        $obj->documentType = $documentType;

        return $obj;
    }

    /**
     * Original filename of the uploaded document.
     */
    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }

    /**
     * Human-readable name of the document.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Secure URL to access the document.
     */
    public function withSignedURL(string $signedURL): self
    {
        $obj = clone $this;
        $obj->signedURL = $signedURL;

        return $obj;
    }

    /**
     * Processing state of the document (e.g., WAITING, STARTED, RUNNING, PROCESSED).
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * Validation status of the document (e.g., need_review, approved, rejected).
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * Identifier of the workspace to which the document belongs.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj->workspaceID = $workspaceID;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\DocumentResponse;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Represents a document stored and processed by the system, such as an identity card or a PDF contract.
 *
 * @phpstan-type DocumentShape = array{
 *   id?: string|null,
 *   document_type?: string|null,
 *   filename?: string|null,
 *   name?: string|null,
 *   signed_url?: string|null,
 *   state?: string|null,
 *   status?: string|null,
 *   workspace_id?: string|null,
 * }
 */
final class Document implements BaseModel
{
    /** @use SdkModel<DocumentShape> */
    use SdkModel;

    /**
     * Unique identifier of the document.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Functional type of the document (e.g., identity document, invoice).
     */
    #[Api(optional: true)]
    public ?string $document_type;

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
    #[Api(optional: true)]
    public ?string $signed_url;

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
    #[Api(optional: true)]
    public ?string $workspace_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?string $document_type = null,
        ?string $filename = null,
        ?string $name = null,
        ?string $signed_url = null,
        ?string $state = null,
        ?string $status = null,
        ?string $workspace_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $document_type && $obj->document_type = $document_type;
        null !== $filename && $obj->filename = $filename;
        null !== $name && $obj->name = $name;
        null !== $signed_url && $obj->signed_url = $signed_url;
        null !== $state && $obj->state = $state;
        null !== $status && $obj->status = $status;
        null !== $workspace_id && $obj->workspace_id = $workspace_id;

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
        $obj->document_type = $documentType;

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
        $obj->signed_url = $signedURL;

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
        $obj->workspace_id = $workspaceID;

        return $obj;
    }
}

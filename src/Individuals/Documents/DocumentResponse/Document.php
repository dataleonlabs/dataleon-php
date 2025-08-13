<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\DocumentResponse;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Represents a document stored and processed by the system, such as an identity card or a PDF contract.
 *
 * @phpstan-type document_alias = array{
 *   id?: string,
 *   documentType?: string,
 *   filename?: string,
 *   name?: string,
 *   signedURL?: string,
 *   state?: string,
 *   status?: string,
 *   workspaceID?: string,
 * }
 */
final class Document implements BaseModel
{
    use Model;

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
    public static function from(
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
    public function setID(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Functional type of the document (e.g., identity document, invoice).
     */
    public function setDocumentType(string $documentType): self
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Original filename of the uploaded document.
     */
    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Human-readable name of the document.
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Secure URL to access the document.
     */
    public function setSignedURL(string $signedURL): self
    {
        $this->signedURL = $signedURL;

        return $this;
    }

    /**
     * Processing state of the document (e.g., WAITING, STARTED, RUNNING, PROCESSED).
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Validation status of the document (e.g., need_review, approved, rejected).
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Identifier of the workspace to which the document belongs.
     */
    public function setWorkspaceID(string $workspaceID): self
    {
        $this->workspaceID = $workspaceID;

        return $this;
    }
}

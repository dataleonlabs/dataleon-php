<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\DocumentResponse;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Represents a document stored and processed by the system, such as an identity card or a PDF contract.
 *
 * @phpstan-type DocumentShape = array{
 *   id?: string|null,
 *   documentType?: string|null,
 *   filename?: string|null,
 *   name?: string|null,
 *   signedURL?: string|null,
 *   state?: string|null,
 *   status?: string|null,
 *   workspaceID?: string|null,
 * }
 */
final class Document implements BaseModel
{
    /** @use SdkModel<DocumentShape> */
    use SdkModel;

    /**
     * Unique identifier of the document.
     */
    #[Optional]
    public ?string $id;

    /**
     * Functional type of the document (e.g., identity document, invoice).
     */
    #[Optional('document_type')]
    public ?string $documentType;

    /**
     * Original filename of the uploaded document.
     */
    #[Optional]
    public ?string $filename;

    /**
     * Human-readable name of the document.
     */
    #[Optional]
    public ?string $name;

    /**
     * Secure URL to access the document.
     */
    #[Optional('signed_url')]
    public ?string $signedURL;

    /**
     * Processing state of the document (e.g., WAITING, STARTED, RUNNING, PROCESSED).
     */
    #[Optional]
    public ?string $state;

    /**
     * Validation status of the document (e.g., need_review, approved, rejected).
     */
    #[Optional]
    public ?string $status;

    /**
     * Identifier of the workspace to which the document belongs.
     */
    #[Optional('workspace_id')]
    public ?string $workspaceID;

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
        ?string $documentType = null,
        ?string $filename = null,
        ?string $name = null,
        ?string $signedURL = null,
        ?string $state = null,
        ?string $status = null,
        ?string $workspaceID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $documentType && $self['documentType'] = $documentType;
        null !== $filename && $self['filename'] = $filename;
        null !== $name && $self['name'] = $name;
        null !== $signedURL && $self['signedURL'] = $signedURL;
        null !== $state && $self['state'] = $state;
        null !== $status && $self['status'] = $status;
        null !== $workspaceID && $self['workspaceID'] = $workspaceID;

        return $self;
    }

    /**
     * Unique identifier of the document.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Functional type of the document (e.g., identity document, invoice).
     */
    public function withDocumentType(string $documentType): self
    {
        $self = clone $this;
        $self['documentType'] = $documentType;

        return $self;
    }

    /**
     * Original filename of the uploaded document.
     */
    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }

    /**
     * Human-readable name of the document.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Secure URL to access the document.
     */
    public function withSignedURL(string $signedURL): self
    {
        $self = clone $this;
        $self['signedURL'] = $signedURL;

        return $self;
    }

    /**
     * Processing state of the document (e.g., WAITING, STARTED, RUNNING, PROCESSED).
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Validation status of the document (e.g., need_review, approved, rejected).
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Identifier of the workspace to which the document belongs.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $self = clone $this;
        $self['workspaceID'] = $workspaceID;

        return $self;
    }
}

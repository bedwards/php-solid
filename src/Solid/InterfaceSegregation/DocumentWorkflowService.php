<?php

declare(strict_types=1);

namespace Solid\InterfaceSegregation;

class DocumentWorkflowService
{
    /** @var array<string, Readable|Writable|Printable> */
    private array $docs = [];

    public function createDraft(string $key, string $content): void
    {
        if (array_key_exists($key, $this->docs)) {
            throw new \Exception('Key exists');
        }

        $this->docs[$key] = new DraftDocument($content);
    }

    public function publishDraft(string $key): void
    {
        if (! array_key_exists($key, $this->docs)) {
            throw new \Exception('Key missing');
        }

        $doc = $this->docs[$key];

        if (! $doc instanceof DraftDocument) {
            throw new \Exception("Document is not a draft");
        }

        $this->docs[$key] = new PublishedDocument($doc->read());
    }

    public function archiveDocument(string $key): void
    {
        if (! array_key_exists($key, $this->docs)) {
            throw new \Exception('Key missing');
        }

        $doc = $this->docs[$key];

        if ($doc instanceof ArchivedDocument) {
            throw new \Exception("Document is already archived");
        }

        if (! $doc instanceof Readable) {
            throw new \Exception("Document cannot be read");
        }

        $this->docs[$key] = new ArchivedDocument($doc->read());
    }

    public function readDocument(string $key): string
    {
        if (! array_key_exists($key, $this->docs)) {
            throw new \Exception('Key missing');
        }

        $doc = $this->docs[$key];

        if (! $doc instanceof Readable) {
            throw new \Exception("Document cannot be read");
        }

        return $doc->read();
    }

    public function appendToDocument(string $key, string $content): void
    {
        if (! array_key_exists($key, $this->docs)) {
            throw new \Exception('Key missing');
        }

        $doc = $this->docs[$key];

        if (! $doc instanceof Writable) {
            throw new \Exception("Document cannot be written to");
        }

        $doc->append($content);
    }

    public function printDocument(string $key): void
    {
        if (! array_key_exists($key, $this->docs)) {
            throw new \Exception('Key missing');
        }

        $doc = $this->docs[$key];

        if (! $doc instanceof Printable) {
            throw new \Exception("Document cannot be printed");
        }

        $doc->print();
    }
}

<?php

declare(strict_types=1);

namespace Solid\InterfaceSegregation;

class DraftDocument implements Readable, Writable
{
    public function __construct(private string $content)
    {
    }

    public function read(): string
    {
        return $this->content;
    }

    public function append(string $content): void
    {
        $this->content .= $content;
    }
}

<?php

declare(strict_types=1);

namespace Solid\InterfaceSegregation;

class PublishedDocument implements Readable, Printable
{
    public function __construct(private string $content)
    {
    }

    public function read(): string
    {
        return $this->content;
    }

    public function print(): void
    {
        echo "$this->content\n";
    }
}

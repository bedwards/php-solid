<?php

declare(strict_types=1);

namespace Solid\InterfaceSegregation;

use Solid\InterfaceSegregation\Readable;

class ArchivedDocument implements Readable
{
    public function __construct(private string $content)
    {
    }

    public function read(): string
    {
        return $this->content;
    }
}

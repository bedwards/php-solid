<?php

declare(strict_types=1);

namespace Solid\InterfaceSegregation;

interface Writable
{
    public function append(string $content): void;
}

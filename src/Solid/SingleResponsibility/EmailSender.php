<?php

declare(strict_types=1);

namespace Solid\SingleResponsibility;

class EmailSender
{
    public function deliver(string $presentation): void
    {
        echo "$presentation\n";
    }
}

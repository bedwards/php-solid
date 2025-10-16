<?php

declare(strict_types=1);

namespace Solid\SingleResponsibility;

class EmailSender
{
    public function deliver($presentation)
    {
        echo "$presentation\n";
    }
}

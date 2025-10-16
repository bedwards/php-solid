<?php

declare(strict_types=1);

namespace Solid\SingleResponsibility;

class ReportFormatter
{
    public function present($results)
    {
        return "Results: $results";
    }
}

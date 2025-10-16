<?php

declare(strict_types=1);

namespace Solid\SingleResponsibility;

class ReportFormatter
{
    /** @param int[] $results */
    public function present(array $results): string
    {
        $formatted = implode(',', $results);
        return "Results: $formatted";
    }
}

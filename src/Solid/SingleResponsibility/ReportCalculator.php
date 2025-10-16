<?php

declare(strict_types=1);

namespace Solid\SingleResponsibility;

class ReportCalculator
{
    public function process($data)
    {
        return $data[0] + $data [1];
    }
}

<?php

declare(strict_types=1);

namespace Solid\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Solid\SingleResponsibility\ReportService;

#[CoversClass(ReportService::class)]
class SingleResponsibilityTest extends TestCase
{
    public function testWorkflowCoordination()
    {
        $this->expectOutputString("Results: 21\n");
        $service = new ReportService();
        $result = $service->coordinateWorkflow(57721);
    }
}

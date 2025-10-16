<?php

declare(strict_types=1);

namespace Solid\Tests;

use PHPUnit\Framework\TestCase;
use Solid\SingleResponsibility\ReportService;

class SingleResponsibilityTest extends TestCase
{
    public function testWorkflowCoordination()
    {
        $service = new ReportService();
        try {
            $result = $service->coordinateWorkflow(57721);
            $this->assertTrue(true);
        } catch (\Exception $e) {
            $this->fail("$e");
        }
    }
}

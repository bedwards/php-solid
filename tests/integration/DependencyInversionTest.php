<?php

declare(strict_types=1);

namespace Solid\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Solid\DependencyInversion\OrderProcessor;
use Solid\DependencyInversion\MySQLOrderRepository;
use Solid\DependencyInversion\MongoOrderRepository;

#[CoversClass(OrderProcessor::class)]
class DependencyInversionTest extends TestCase
{
    public function testProcessOrderWithMySQL(): void
    {
        $this->expectOutputString(
            "Saved to MySQL: ORD-123 -> 5000\n" .
            "Order ORD-123 processed: 5000\n"
        );

        $repository = new MySQLOrderRepository();
        $processor = new OrderProcessor($repository);
        $processor->processOrder('ORD-123', 5000);
    }

    public function testProcessOrderWithMongo(): void
    {
        $this->expectOutputString(
            "Saved to MongoDB: ORD-456 -> 3000\n" .
            "Order ORD-456 processed: 3000\n"
        );

        $repository = new MongoOrderRepository();
        $processor = new OrderProcessor($repository);
        $processor->processOrder('ORD-456', 3000);
    }
}

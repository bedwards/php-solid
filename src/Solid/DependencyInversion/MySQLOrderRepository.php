<?php

declare(strict_types=1);

namespace Solid\DependencyInversion;

class MySQLOrderRepository implements OrderRepository
{
    public function save(string $orderId, int $amount): void
    {
        // Simulates MySQL persistence
        echo "Saved to MySQL: $orderId -> $amount\n";
    }
}

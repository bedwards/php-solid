<?php

declare(strict_types=1);

namespace Solid\DependencyInversion;

class MongoOrderRepository implements OrderRepository
{
    public function save(string $orderId, int $amount): void
    {
        // Simulates MongoDB persistence
        echo "Saved to MongoDB: $orderId -> $amount\n";
    }
}

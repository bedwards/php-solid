<?php

declare(strict_types=1);

namespace Solid\DependencyInversion;

class OrderProcessor
{
    private OrderRepository $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function processOrder(string $orderId, int $amount): void
    {
        // Business logic: validate and process
        if ($amount <= 0) {
            throw new \Exception("Invalid amount");
        }

        // Save using abstraction - no knowledge of storage implementation
        $this->repository->save($orderId, $amount);

        echo "Order $orderId processed: $amount\n";
    }
}

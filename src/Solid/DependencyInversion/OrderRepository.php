<?php

declare(strict_types=1);

namespace Solid\DependencyInversion;

interface OrderRepository
{
    public function save(string $orderId, int $amount): void;
}

<?php

declare(strict_types=1);

namespace Solid\OpenClosed;

interface Notifier
{
    public function addRecipient(string $key, string $address): void;

    public function sendNotification(string $recipient, string $message): void;
}

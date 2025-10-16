<?php

declare(strict_types=1);

namespace Solid\OpenClosed;

use Solid\OpenClosed\Notifier;

class EmailNotifier implements Notifier
{
    /** @var array<string, string> */
    private array $recipients = [];

    public function addRecipient(string $key, string $address): void
    {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/';

        if (! (bool) preg_match($pattern, $address)) {
            throw new \Exception("Bad email address: $address");
        }

        $this->recipients[$key] = $address;
    }

    public function sendNotification(string $recipientKey, string $message): void
    {
        $recipient = $this->recipients[$recipientKey] ?? null;

        if ($recipient === null) {
            throw new \Exception('Key missing');
        }

        echo "Email: $recipient $message\n";
    }
}

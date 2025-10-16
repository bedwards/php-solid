<?php

declare(strict_types=1);

namespace Solid\OpenClosed;

class SMSNotifier implements Notifier
{
    /** @var array<string, string> */
    private array $recipients = [];

    public function addRecipient(string $key, string $address): void
    {
        $pattern = '/^\+1-\d{3}-\d{3}-\d{4}$/';

        if (! (bool) preg_match($pattern, $address)) {
            throw new \Exception("Bad phone number: $address");
        }

        $this->recipients[$key] = $address;
    }

    public function sendNotification(string $recipientKey, string $message): void
    {
        $recipient = $this->recipients[$recipientKey] ?? null;

        if ($recipient === null) {
            throw new \Exception('Key missing');
        }

        echo "SMS: $recipient $message\n";
    }
}

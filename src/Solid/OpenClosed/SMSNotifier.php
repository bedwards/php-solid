<?php

declare(strict_types=1);

namespace Solid\OpenClosed;

use Solid\OpenClosed\Notifier;

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
        echo "SMS: " . $this->recipients[$recipientKey] . " $message\n";
    }
}

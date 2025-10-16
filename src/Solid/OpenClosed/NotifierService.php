<?php

declare(strict_types=1);

namespace Solid\OpenClosed;

use Solid\OpenClosed\Notifier;

class NotifierService
{
    private $notifiers = [];

    public function addNotifier(Notifier $notifier): void
    {
        $this->notifiers[] = $notifier;
    }

    public function sendNotifications(string $recipient, string $message): void
    {
        foreach ($this->notifiers as $notifier) {
            $notifier->sendNotification($recipient, $message);
        }
    }
}

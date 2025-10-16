<?php

declare(strict_types=1);

namespace Solid\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Solid\OpenClosed\NotifierService;
use Solid\OpenClosed\EmailNotifier;
use Solid\OpenClosed\SMSNotifier;

#[CoversClass(NotifierService::class)]
class OpenClosedTest extends TestCase
{
    public function testSendNotifications()
    {
        $this->expectOutputString(
            "Email: world@hello.com Hello world\n" .
            "SMS: +1-435-569-6753 Hello world\n"
        );

        $email = new EmailNotifier();
        $sms = new SMSNotifier();
        $service = new NotifierService();

        $recipientKey = 'world';
        $email->addRecipient($recipientKey, "$recipientKey@hello.com");
        $sms->addRecipient($recipientKey, '+1-435-569-6753');

        $service->addNotifier($email);
        $service->addNotifier($sms);

        $service->sendNotifications($recipientKey, "Hello $recipientKey");
    }
}

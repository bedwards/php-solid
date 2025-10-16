<?php

declare(strict_types=1);

namespace Solid\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Solid\InterfaceSegregation\DocumentWorkflowService;

#[CoversClass(DocumentWorkflowService::class)]
class InterfaceSegregationTest extends TestCase
{
    private DocumentWorkflowService $service;

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new DocumentWorkflowService();
    }

    public function testPublishDocumentGood(): void
    {
        $key = 'recipes';
        $content1 = 'ham, eggs, bacon';
        $content2 = ', mayonaise';
        $this->service->createDraft($key, $content1);
        $this->service->appendToDocument($key, $content2);
        $this->service->publishDraft($key);
        $read = $this->service->readDocument($key);
        $this->assertEquals($content1 . $content2, $read);
    }

    public function testPublishDocumentBad(): void
    {
        $key = 'recipes';
        $content = 'ham, eggs, bacon';
        $this->service->createDraft($key, $content);
        $this->service->publishDraft($key);

        $this->expectException(\Exception::class);
        $this->service->publishDraft($key);
    }

    public function testArchiveDocumentGood(): void
    {
        $key = 'recipes';
        $content = 'ham, eggs, bacon';
        $this->service->createDraft($key, $content);
        $this->service->publishDraft($key);
        $this->service->archiveDocument($key);
        $read = $this->service->readDocument($key);
        $this->assertEquals($content, $read);
    }

    public function testArchiveDocumentBad(): void
    {
        $key = 'recipes';
        $content = 'ham, eggs, bacon';
        $this->service->createDraft($key, $content);
        $this->service->publishDraft($key);
        $this->service->archiveDocument($key);
        $this->expectException(\Exception::class);
        $this->service->archiveDocument($key);
    }

}

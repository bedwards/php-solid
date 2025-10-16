<?php

declare(strict_types=1);

namespace Solid\SingleResponsibility;

class ReportService
{
    public function coordinateWorkflow(int $dataId): void
    {
        $repo = new DataRepository();
        $calc = new ReportCalculator();
        $formatter = new ReportFormatter();
        $sender = new EmailSender();

        $data = $repo->getData($dataId);
        $results = $calc->process($data);
        $presentation = $formatter->present($results);
        $sender->deliver($presentation);
    }
}

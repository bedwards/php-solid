<?php

declare(strict_types=1);

namespace Solid\SingleResponsibility;

class DataRepository
{
    /** @return int[] */
    public function getData(int $dataId): array
    {
        return [8, 13];
    }
}

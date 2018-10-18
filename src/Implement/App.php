<?php

declare(strict_types=1);

namespace Implement;

class App {
    public function execute(): int
    {
        $file = 'data.json';

        $fileData = file_get_contents($file);
        $dataMap = json_decode($fileData);

        $dataMapInteger = [];

        foreach ($dataMap as $data) {
            if (!is_string($data)) {
                $dataMapInteger[] = $data;
            }
        }

        $sumPairNumber = 0;

        foreach ($dataMapInteger as $data) {
            if (is_numeric($data) && $data > 1000) {
                $sumPairNumber += $data;
            }
        }

        return $sumPairNumber;
    }
}

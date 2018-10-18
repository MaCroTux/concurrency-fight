<?php

namespace Abstraction\Domain;

class SumPairNumberGreteThatThousandsService
{
    private const THOUSANDS = 1000;

    public function execute(Collection $data) :int
    {
        $dataMapWithoutString    = $this->filterNotBeString($data);
        $numbersGreaterThousands = $this->filterIsNumericAndGreaterThousands($dataMapWithoutString);
        
        return $numbersGreaterThousands->sumInt();
    }

    private function filterNotBeString(Collection $data): Collection
    {
        return $data->filter(function ($item) {
            return !is_string($item);
        });
    }

    private function filterIsNumericAndGreaterThousands(Collection $numbers): Collection
    {
        return $numbers->filter(function ($number) {
            return is_numeric($number) && $number > self::THOUSANDS;
        });
    }
}

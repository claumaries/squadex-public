<?php

namespace App\Support;

use Carbon\CarbonImmutable;
use DateTimeInterface;

class DateDisplayFormatter
{
    /**
     * @return array{date: string, time: string}
     */
    public function publicMatchDateParts(DateTimeInterface|string|null $value): array
    {
        if ($value === null || $value === '') {
            return ['date' => '', 'time' => ''];
        }

        $date = CarbonImmutable::parse($value)->timezone((string) config('app.timezone', 'UTC'));

        return [
            'date' => $date->isoFormat('D MMM YYYY'),
            'time' => $date->format('H:i'),
        ];
    }
}

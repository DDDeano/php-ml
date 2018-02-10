<?php

declare(strict_types=1);

namespace Phpml\Math\Statistic;

use Phpml\Exception\InvalidArgumentException;

class StandardDeviation
{
    /**
     * @param array|float[] $a
     *
     * @throws InvalidArgumentException
     */
    public static function population(array $a, bool $sample = true): float
    {
        if (empty($a)) {
            throw InvalidArgumentException::arrayCantBeEmpty();
        }

        $n = count($a);

        if ($sample && $n === 1) {
            throw InvalidArgumentException::arraySizeToSmall(2);
        }

        $mean = Mean::arithmetic($a);
        $carry = 0.0;
        foreach ($a as $val) {
            $d = $val - $mean;
            $carry += $d * $d;
        }

        if ($sample) {
            --$n;
        }

        return sqrt((float) ($carry / $n));
    }

    public static function sumOfSquares(array $numbers) : float
    {
        if (empty($numbers)) {
            throw InvalidArgumentException::arrayCantBeEmpty();
        }

        $mean = Mean::arithmetic($numbers);

        return array_sum(array_map(
            function ($val) use ($mean) {
                return ($val -$mean) ** 2;
            },
            $numbers
        ));
    }
}

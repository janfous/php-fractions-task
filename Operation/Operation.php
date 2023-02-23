<?php

declare(strict_types=1);

namespace Operation;

use Exception;
use Fraction\Fraction;
use Fraction\MixedFraction;

final class Operation {

    private function __construct() {}

    /// public

    /**
     * @param int|Fraction|MixedFraction $a
     * @param int|Fraction|MixedFraction $b
     * @return int|Fraction
     * @throws Exception
     */
    public static function add(mixed $a, mixed $b): Fraction|int {
        if (is_int($a) && is_int($b)) {
            return $a + $b;
        } elseif (is_object($a) && is_int($b)) {
            return $a->addInt($b);
        } elseif (is_int($a) && is_object($b)) {
            return $b->addInt($a);
        } else {
            return $a->addObj($b);
        }
    }

    /**
     * @param int|Fraction|MixedFraction $a
     * @param int|Fraction|MixedFraction $b
     * @return int|Fraction
     * @throws Exception
     */
    public static function subtract(mixed $a, mixed $b): Fraction|int {
        if (is_int($a) && is_int($b)) {
            return $a - $b;
        } elseif (is_object($a) && is_int($b)) {
            return $a->subInt($b);
        } elseif (is_int($a) && is_object($b)) {
            return $b->subFromInt($a);
        } else {
            return $a->subObj($b);
        }
    }

    /**
     * @param int|Fraction|MixedFraction $a
     * @param int|Fraction|MixedFraction $b
     * @return int|Fraction
     * @throws Exception
     */
    public static function multiply(mixed $a, mixed $b): Fraction|int {
        if (is_int($a) && is_int($b)) {
            return $a * $b;
        } elseif (is_object($a) && is_int($b)) {
            return $a->mulInt($b);
        } elseif (is_int($a) && is_object($b)) {
            return $b->mulInt($a);
        } else {
            return $a->mulObj($b);
        }
    }

    /**
     * @param int|Fraction|MixedFraction $a
     * @param int|Fraction|MixedFraction $b
     * @return float|int|Fraction
     * @throws Exception
     */
    public static function divide(mixed $a, mixed $b): float|Fraction|int
    {
        if (is_int($a) && is_int($b)) {
            return $a / $b;
        } elseif (is_object($a) && is_int($b)) {
            return $a->divByInt($b);
        } elseif (is_int($a) && is_object($b)) {
            return $b->divIntByFraction($a);
        } else {
            return $a->divByObj($b);
        }
    }

}

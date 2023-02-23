<?php

declare(strict_types=1);

namespace Fraction;

use Exception;

class Fraction {

    protected int $numerator;
    protected int $denominator;

    /**
     * @param int $numerator
     * @param int $denominator
     * @throws Exception
     */
    public function __construct(int $numerator, int $denominator = 1) {

        if ($denominator == 0) {
            throw new Exception('Invalid fraction.');
        }

        $this->numerator = $numerator;
        $this->denominator = $denominator;

        $this->reduce();
    }

    /// public

    /**
     * @return string
     *
     * convert fraction to int format: numerator/denominator
     */
    public function toString(): string {
        return "{$this->numerator}/{$this->denominator}";
    }

    /// operations

    /**
     * @param int $number
     * @return Fraction
     * @throws Exception
     *
     * calculate and return int+fraction
     */
    public function addInt(int $number): Fraction {
        $newNumerator = ($this->denominator * $number) + $this->numerator;
        return new Fraction($newNumerator, $this->denominator);
    }

    /**
     * @param Fraction|MixedFraction $fraction
     * @return Fraction
     * @throws Exception
     *
     * calculate and return fraction+fraction
     */
    public function addObj(mixed $fraction): Fraction {
        if (get_class($fraction) == MixedFraction::class) {
            $fraction = $fraction->toFraction();
        }

        $lcm = $this->getLcm($fraction->getDenominator(), $this->denominator);

        $newNumerator = $this->numerator * ($lcm / $this->denominator);
        $newNumerator += $fraction->getNumerator() * ($lcm / $fraction->getDenominator());

        return new Fraction($newNumerator, $lcm);
    }

    /**
     * @param int $number
     * @return Fraction
     * @throws Exception
     *
     * calculate and return int*fraction
     */
    public function mulInt(int $number): Fraction {
        return new Fraction($this->numerator * $number, $this->denominator);
    }

    /**
     * @param Fraction|MixedFraction $fraction
     * @return Fraction
     * @throws Exception
     *
     * calculate and return fraction*fraction
     */
    public function mulObj(mixed $fraction): Fraction {
        if (get_class($fraction) == MixedFraction::class) {
            $fraction = $fraction->toFraction();
        }

        $newNumerator = $fraction->getNumerator() * $this->numerator;
        $newDenominator = $fraction->getDenominator() * $this->denominator;

        return new Fraction($newNumerator, $newDenominator);
    }

    /**
     * @param int $number
     * @return Fraction
     * @throws Exception
     *
     * calculate and return fraction-int
     */
    public function subInt(int $number): Fraction {
        $newNumerator = $this->numerator - ($this->denominator * $number);
        return new Fraction($newNumerator, $this->denominator);
    }

    /**
     * @param int $number
     * @return Fraction
     * @throws Exception
     *
     * calculate and return int-fraction
     */
    public function subFromInt(int $number): Fraction {
        $newNumerator = ($this->denominator * $number) - $this->numerator;
        return new Fraction($newNumerator, $this->denominator);
    }

    /**
     * @param Fraction|MixedFraction $fraction
     * @return Fraction
     * @throws Exception
     *
     * calculate and return fraction-fraction
     */
    public function subObj(mixed $fraction): Fraction {
        if (get_class($fraction) == MixedFraction::class) {
            $fraction = $fraction->toFraction();
        }

        $lcm = $this->getLcm($fraction->getDenominator(), $this->denominator);

        $newNumerator = $this->numerator * ($lcm / $this->denominator);
        $newNumerator -= $fraction->getNumerator() * ($lcm / $fraction->getDenominator());

        return new Fraction($newNumerator, $lcm);
    }

    /**
     * @param int $number
     * @return Fraction
     * @throws Exception
     *
     * calculate and return fraction/int
     */
    public function divByInt(int $number): Fraction {
        return $this->mulObj(new Fraction(1, $number));
    }

    /**
     * @param Fraction|MixedFraction $fraction
     * @return Fraction
     * @throws Exception
     *
     * calculate and return fraction/fraction
     */
    public function divByObj(mixed $fraction): Fraction {
        if (get_class($fraction) == MixedFraction::class) {
            $fraction = $fraction->toFraction();
        }

        return $this->mulObj(new Fraction($fraction->getDenominator(), $fraction->getNumerator()));
    }

    /**
     * @param int $number
     * @return Fraction
     * @throws Exception
     *
     * calculate return int/fraction
     */
    public function divIntByFraction(int $number): Fraction {
        $newFraction = new Fraction($this->denominator, $this->numerator);

        return $newFraction->mulInt($number);
    }

    /// private

    /**
     * reduce fraction to its minimal state
     */
    private function reduce() {
        $gcd = $this->getGcdRecursive($this->numerator, $this->denominator);

        $this->numerator /= $gcd;
        $this->denominator /= $gcd;
    }

    /**
     * @param int $a
     * @param int $b
     * @return int
     *
     * find greatest common divisor of numbers a and b
     */
    private function getGcdRecursive(int $a, int $b): int {
        return ($b == 0) ? $a : $this->getGcdRecursive($b, $a % $b);
    }

    /**
     * @param $a
     * @param $b
     * @return int
     *
     * find least common multiple of numbers a and b
     */
    private function getLcm($a, $b): int {
        return ($a / $this->getGcdRecursive($a, $b)) * $b;
    }

    /// getters/setters

    /**
     * @return int
     */
    public function getNumerator(): int {
        return $this->numerator;
    }

    /**
     * @param int $numerator
     */
    public function setNumerator(int $numerator): void {
        $this->numerator = $numerator;
    }

    /**
     * @return int
     */
    public function getDenominator(): int {
        return $this->denominator;
    }

    /**
     * @param int $denominator
     */
    public function setDenominator(int $denominator): void {
        $this->denominator = $denominator;
    }

}

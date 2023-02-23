<?php

declare(strict_types=1);

namespace Fraction;

use Exception;

final class MixedFraction extends Fraction {

    private int $wholeNumber;

    /**
     * @throws Exception
     */
    public function __construct(int $numerator, int $denominator, int $wholeNumber) {
        if ($numerator > $denominator) {
            throw  new Exception("Invalid Mixed Fraction");
        }

        parent::__construct($numerator, $denominator);

        $this->wholeNumber = $wholeNumber;
    }

    /// public

    /**
     * @return string
     *
     * convert to string
     */
    public function toString(): string {
        return "{$this->wholeNumber} {$this->numerator}/{$this->denominator}";
    }

    /**
     * @return Fraction
     * @throws Exception
     *
     * convert to fraction
     */
    public function toFraction(): Fraction {
        $newNumerator = ($this->denominator * $this->wholeNumber) + $this->numerator;

        return new Fraction($newNumerator, $this->denominator);
    }


    /// operations
    /// see Fraction class for more info and implementation

    public function addInt(int $number): Fraction {
        return $this->toFraction()->addInt($number);
    }

    public function addObj(mixed $fraction): Fraction {
        return $this->toFraction()->addObj($fraction);
    }

    public function mulInt(int $number): Fraction {
        return $this->toFraction()->mulInt($number);
    }

    public function mulObj(mixed $fraction): Fraction {
        return $this->toFraction()->mulObj($fraction);
    }

    public function subInt(int $number): Fraction {
        return $this->toFraction()->subInt($number);
    }

    public function subFromInt(int $number): Fraction {
        return $this->toFraction()->subFromInt($number);
    }

    public function subObj(mixed $fraction): Fraction {
        return $this->toFraction()->subObj($fraction);
    }

    public function divByInt(int $number): Fraction {
        return $this->toFraction()->divByInt($number);
    }

    public function divIntByFraction(int $number): Fraction {
        return $this->toFraction()->divIntByFraction($number);
    }

    public function divByObj(mixed $fraction): Fraction {
        return $this->toFraction()->divByObj($fraction);
    }

    /// getters/setters

    /**
     * @return int
     */
    public function getWholeNumber(): int
    {
        return $this->wholeNumber;
    }

    /**
     * @param int $wholeNumber
     */
    public function setWholeNumber(int $wholeNumber): void
    {
        $this->wholeNumber = $wholeNumber;
    }

}

<?php
use Fraction\Fraction;
use Fraction\MixedFraction;
use Operation\Operation;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$mixed = new MixedFraction(1, 2, 1);

echo "<h4>add</h4>";

echo "1 + 2 = " . Operation::add(1,2)->toString();
echo "<br />";

$b = new Fraction(1,2);
echo "1 + {$b->toString()} = " . Operation::add(1, $b)->toString();
echo "<br />";

$a = new Fraction(3,7);
$b = new Fraction(1,2);
echo "{$a->toString()} + {$b->toString()} = " . Operation::add($a, $b)->toString();
echo "<br />";

$a = new Fraction(3,7);
$b = new MixedFraction(1,2, 2);
echo "{$a->toString()} + {$b->toString()} = " . Operation::add($a, $b)->toString();

echo "<h4>multiply</h4>";

echo "2 * 2 = " . Operation::multiply(2,2)->toString();
echo "<br />";

$b = new Fraction(6,2);
echo "3 * {$b->toString()} = " . Operation::multiply(3, $b)->toString();
echo "<br />";

$a = new Fraction(15,7);
$b = new Fraction(7,4);
echo "{$a->toString()} * {$b->toString()} = " . Operation::multiply($a, $b)->toString();
echo "<br />";

$a = new MixedFraction(2,7, 2);
$b = new MixedFraction(2,7, 2);
echo "{$a->toString()} * {$b->toString()} = " . Operation::multiply($a, $b)->toString();

echo "<h4>subtract</h4>";

echo "2 - 2 = " . Operation::subtract(2,2)->toString();
echo "<br />";

$b = new Fraction(6,1);
echo "2 - {$b->toString()} = " . Operation::subtract(2, $b)->toString();
echo "<br />";

$a = new Fraction(6,7);
echo "{$a->toString()} - 2 = " . Operation::subtract($a, 2)->toString();
echo "<br />";

$a = new Fraction(4,7);
$b = new Fraction(3,7);
echo "{$a->toString()} - {$b->toString()} = " . Operation::subtract($a, $b)->toString();
echo "<br />";

$a = new MixedFraction(10,11, 3);
$b = new Fraction(2,7);
echo "{$a->toString()} - {$b->toString()} = " . Operation::subtract($a, $b)->toString();
echo "<br />";

echo "<h4>divide</h4>";

echo "15 / 10 = " . Operation::divide(15,10)->toString();
echo "<br />";

$b = new Fraction(15,8);
echo "2 / {$b->toString()} = " . Operation::divide(2, $b)->toString();
echo "<br />";

$a = new Fraction(6,7);
echo "{$a->toString()} / 3 = " . Operation::divide($a, 3)->toString();
echo "<br />";

$a = new Fraction(-4,7);
$b = new Fraction(3,7);
echo "{$a->toString()} / {$b->toString()} = " . Operation::divide($a, $b)->toString();
echo "<br />";

$a = new MixedFraction(2,4, 1);
$b = new Fraction(2,3);
echo "{$a->toString()} / {$b->toString()} = " . Operation::divide($a, $b)->toString();
echo "<br />";

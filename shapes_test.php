<?php
require_once 'rectangle.php';
require_once 'square.php';

$rectangle = new Rectangle(4,5);

echo $rectangle->area(). PHP_EOL;

$square = new Square(5,5);

echo $square->perimeter(). PHP_EOL;
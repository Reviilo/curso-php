<?php

$a = 25;
$b = 10;
$c = 20;

if ($a > $b) {
    echo "a es mayor a b";
} else if ($b < $c) {
    echo "c es mayor a b";
}

# switch
echo "<br><br>";
$dia = domingo;

switch($dia) {
    case  'lunes':
    echo "Comienzo de semana";
    break;

    case  'martes':
    echo "Gusanito de la semana";
    break;

    case  'miercoles':
    echo "Comienza la energia a ebullir";
    break;

    default: 
    echo "Nos fuimos de fiesta";
}

echo "<br>" . "<br>";

# while 

$n = 0;

while($n < 5) {
    echo "$n" . "<br>";
    echo "Ya merito llegamos?..." . "<br>";
    echo "NO";
    echo "<br>" . "<br>";
    $n++;
}

echo "Ya merito llegamos while?..." . "<br>";
echo "Siiiiii.... ya llegamos incha bolas!!";
echo "<br>" . "<br>";
echo "<br>" . "<br>";

# Do while

$n = 5;

do {

    echo "$n" . "<br>";
    echo "Ya merito llegamos do while?..." . "<br>";
    echo "NO";
    echo "<br>" . "<br>";
    $n++;

} while ($n < 5);

echo "<br>" . "<br>";

# For 

for ($i = 0; $i <= 5; $i++) {
    echo "$i" . "<br>";
    echo "Ya merito llegamos for?..." . "<br>";
    echo "NO";
    echo "<br>" . "<br>";

}